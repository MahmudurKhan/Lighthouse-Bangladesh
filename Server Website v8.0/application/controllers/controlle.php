<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controlle extends CI_Controller
{
    /* login or not */
    public function session_test()
    {
        if($this->session->userdata('admin_login') != '1')
        {
            redirect(base_url().'sign_me_in/','refresh');
        }
    }

    /*  dashboard view  */
    public function index()
    {
        $this->session_test(); //login or not

        $data['page_name'] = 'dashboard';
        $data['title'] = 'Dashboard';

        $this->load->model('controll_model','c');

        $data['total_events'] = sizeof($this->c->event_list());
        $data['total_newsletter'] = sizeof($this->c->newsletter_list());
        $data['total_registration'] = sizeof($this->c->num_of_reg());

        $this->load->view('controll/index',$data);
    }

    /*     add calender view */
    public  function  add_calender_view()
    {
        $this->session_test(); //login or not

        $data['page_name'] = 'add_calender';
        $data['title'] = 'Add Calender Event';

        $this->load->view('controll/index',$data);
    }

    /*  adding calender  */
    public function adding_calender()
    {
        $this->load->model('controll_model','c');

        $data = json_decode($this->input->post('data'),true);

        if($this->c->insert_calender($data))
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
    }

    /*   calender list   */
    public function  calender_list()
    {
        $this->session_test(); //login or not
        $this->load->model('controll_model','c');

        $data['page_name'] = 'calender_list';
        $data['title'] = 'Upcoming events';
        $data['records'] = $this->c->calender_list();

        $this->load->view('controll/index',$data);
    }

    /*  delete from calender  */
    public function delete_calender($c_id)
    {
        $this->session_test(); //login or not
        $this->load->model('controll_model','c');

        $this->c->delete_calender_event($c_id);

        redirect(base_url().'controlle/calender_list','refresh');

    }

    /*      add event view     */
    public function add_event_view()
    {
        $this->session_test(); //login or not

        $data['page_name'] = 'add_event';
        $data['title'] = 'Add Event';

        $this->load->view('controll/index',$data);
    }

    /* edit event view */
    public function edit_event_view($e_id)
    {
        $this->session_test(); //login or not

        $this->load->model("controll_model","c");

        $data['page_name'] = 'edit_event';
        $data['title'] = 'Edit Event';
        $data['event'] = $this->c->event_details($e_id);


        $this->load->view('controll/index',$data);
    }

    /*      newsletter list view       */
    public function newsletter_list()
    {
        $this->session_test(); //login or not

        $this->load->model('controll_model','c');

        $data['page_name'] = 'newsletter_list';
        $data['title'] = 'Newsletter List';
        $data['newsletter'] = $this->c->newsletter_list();

        $this->load->view('controll/index',$data);
    }

    /*    newslatter csv    */
    public function newsletter_csv()
    {
        require_once 'files/csv/simple_html_dom.php';

        $this->load->model('controll_model', 'c');
        $newsletter = $this->c->newsletter_list();
        $str = '';

        if (sizeof($newsletter)) {
            $str = '<table class="table"><tr><td>email</td></tr>';

            foreach ($newsletter as $n) {

                $str = $str . '<tr><td>'.$n['email'].'</td></tr>';

            }

            $str = $str . '</table>';
        }

        $html = str_get_html($str);


        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename=newsletter_subscriber.csv');

        $fp = fopen("php://output", "w");

        foreach($html->find('tr') as $element)
        {
            $td = array();
            foreach( $element->find('td') as $row)
            {
                $td [] = $row->plaintext;
            }
            fputcsv($fp, $td);
        }


        fclose($fp);


    }

    /*      newsletter delete                        */
    public function newsletter_delete($e_id)
    {
        $this->load->model('controll_model','c');

        $flag = $this->c->delete_newsletter_email($e_id);

        if($flag)
        {
            $this->newsletter_list();
        }
        else
        {
            $this->newsletter_list();
        }
    }


    /*      file upload       */
    public function file()
    {
        $files = array();
        $config = array();

        if(empty($config))
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = TRUE;
        }

        $this->load->library('upload', $config);

        $errors = FALSE;

        foreach($_FILES as $key => $value)
        {
            if( ! empty($value['name']))
            {
                if( ! $this->upload->do_upload($key))
                {
                    $data['upload_message'] = $this->upload->display_errors(ERR_OPEN, ERR_CLOSE); // ERR_OPEN and ERR_CLOSE are error delimiters defined in a config file
                    $this->load->vars($data);

                    $errors = TRUE;
                }
                else
                {
                    // Build a file array from all uploaded files
                    $files[] = $this->upload->data();
                }
            }
        }

        // There was errors, we have to delete the uploaded files
        if($errors)
        {
            foreach($files as $key => $file)
            {
                @unlink($file['full_path']);
            }
        }
        elseif(empty($files) AND empty($data['upload_message']))
        {
            echo 'file is empty';
        }
        else
        {
            return $files;
        }
    }

    public function adding_event()
    {
        $this->load->model('controll_model','c');
        $data = array();

        $data['name'] = $this->input->post('event_name');
        $data['conduct_by'] = $this->input->post('conduct_by');
        $data['short_description'] = $this->input->post('short_des');
        $data['long_description'] = $this->input->post('long_des');
        $data['date_start'] = $this->input->post('start_date');
        $data['date_end'] = $this->input->post('end_date');
        $data['time_start'] = $this->input->post('start_time');
        $data['time_end'] = $this->input->post('end_time');
        $data['details'] = $this->input->post('details');
        $data['profile'] = $this->input->post('profile');
        $data['location'] = $this->input->post('location');
        $data['fees'] = $this->input->post('fee');
        $data['status'] = $this->input->post('status');

        $test = $this->file();
        $files = array();

        foreach($test as $f)
        {
            $files[] = $f['file_name'];
        }

        if(isset($files[0]))
        {
            $data['image_banner'] = $files[0];
        }


        $e_id = $this->c->add_event($data);

        echo $e_id;
    }

    /* add leaflet view */
    public function add_leaflet_view($e_id)
    {
        $this->session_test(); //login or not

        $this->load->model("controll_model","c");

        $data['page_name'] = 'add_leaflet';
        $data['title'] = 'Add Leaflet';

        $data['event'] = $this->c->event_details($e_id);

        $this->load->view('controll/index',$data);
    }

    /* add profile view */
    public function add_profile_view($e_id)
    {
        $this->session_test(); //login or not

        $this->load->model("controll_model","c");

        $data['page_name'] = 'add_profile';
        $data['title'] = 'Add Profile file';

        $data['event'] = $this->c->event_details($e_id);

        $this->load->view('controll/index',$data);
    }

    /*  event list view  */
    public function event_list()
    {
        $this->session_test(); //login or not

        $data['page_name'] = 'event_list';
        $data['title'] = 'Event List';

        $this->load->model("controll_model","c");
        $data['list'] = $this->c->event_list();

        $this->load->view('controll/index',$data);
    }

    /* event edit */
    public function event_edit()
    {
        $this->load->model('controll_model','c');
        $data = array();

        $data['e_id'] = $this->input->post('event_id');
        $data['conduct_by'] = $this->input->post('conduct_by');
        $data['name'] = $this->input->post('event_name');
        $data['short_description'] = $this->input->post('short_des');
        $data['long_description'] = $this->input->post('long_des');
        $data['date_start'] = $this->input->post('start_date');
        $data['date_end'] = $this->input->post('end_date');
        $data['time_start'] = $this->input->post('start_time');
        $data['time_end'] = $this->input->post('end_time');
        $data['details'] = $this->input->post('details');
        $data['profile'] = $this->input->post('profile');
        $data['location'] = $this->input->post('location');
        $data['fees'] = $this->input->post('fee');
        $data['status'] = $this->input->post('status');

        $flag = $this->c->edit_event($data);

    }

    /* edit banner view */
    public function edit_banner_view($e_id)
    {
        $this->session_test(); //login or not

        $this->load->model("controll_model","c");

        $data['page_name'] = 'edit_banner';
        $data['title'] = 'Update Banner';
        $data['event'] = $this->c->event_details($e_id);

        $this->load->view('controll/index',$data);
    }

    /* banner edit */
    public function update_banner()
    {
        $this->load->model('controll_model','c');

        $data = array();
        $data['e_id'] = $this->input->post('event_id');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = "*";
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);

        if($this->upload->do_upload()) {
            $file = $this->upload->data();
            $data['image_banner'] = $file['file_name'];
        }

        $flag = $this->c->update_banner($data['e_id'],$data);
    }


    /* edit leaflet view */
    public function edit_leaflet_view($e_id)
    {
        $this->session_test(); //login or not

        $this->load->model("controll_model","c");

        $data['page_name'] = 'edit_leaflet';
        $data['title'] = 'Update Leafletr';

        $data['event'] = $this->c->event_details($e_id);

        $this->load->view('controll/index',$data);
    }

    /* leaflet edit */
    public function update_leaflet()
    {
        $this->load->model('controll_model','c');

        $data = array();
        $data['e_id'] = $this->input->post('event_id');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = "*";
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);

        if($this->upload->do_upload()) {
            $file = $this->upload->data();
            $data['event_leaflet'] = $file['file_name'];
        }

        $flag = $this->c->update_leaflet($data['e_id'],$data);
    }


    /* edit profile view */
    public function edit_profile_view($e_id)
    {
        $this->session_test(); //login or not

        $this->load->model("controll_model","c");

        $data['page_name'] = 'edit_profile';
        $data['title'] = 'Update Profile';

        $data['event'] = $this->c->event_details($e_id);

        $this->load->view('controll/index',$data);
    }

    /* profile edit */
    public function update_profile_file()
    {
        $this->load->model('controll_model','c');

        $data = array();
        $data['e_id'] = $this->input->post('event_id');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = "*";
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);

        if($this->upload->do_upload()) {
            $file = $this->upload->data();
            $data['profile_file'] = $file['file_name'];
        }

        $flag = $this->c->update_leaflet($data['e_id'],$data);
    }


    /*  event delete    */
    public function delete_event($e_id)
    {
        $this->load->model('controll_model','c');

        $flag = $this->c->delete_event($e_id);

        if($flag)
        {
            $this->event_list();
        }
        else
        {
            $this->event_list();
        }
    }

    /* registration view */
    public function registration_view()
    {
        $this->session_test(); //login or not

        $data['page_name'] = 'reg_view';
        $data['title'] = 'Registration search';

        $this->load->model("controll_model","c");
        $data['list'] = $this->c->event_list();

        $this->load->view('controll/index',$data);
    }


    /* registration list all view */
    public function full_registration_list()
    {
        $this->session_test(); //login or not

        $this->load->model('controll_model','c');

        $data['reg'] = $this->c->registration_all();


        $data['page_name'] = 'full_registration_list';
        $data['title'] = 'Registration';


        $this->load->view('controll/index',$data);
    }


    /* registration list in csv */
    public function registration_all_to_csv()
    {
        require_once 'files/csv/simple_html_dom.php';

        $this->load->model('controll_model','c');

        $reg = $this->c->registration_all();

        $str = '';

        if(sizeof($reg) > 0)
        {
            $str = '<table><tr><td>S_id</td></td><td>Name</td><td>Email</td><td>Company Name</td><td>Designation</td><td>Phone</td><td>Address</td></tr>';

            foreach($reg as $r)
            {
                $str = $str .'<tr><td>'.$r['r_id'].'</td><td>'.$r['name'].'</td><td>'.$r['email'].'</td><td>'.$r['company_name'].'</td><td>'.$r['designation'].'</td><td>'.$r['phone'].'</td><td>'.$r['address'].'</td></tr>';
            }

            $str = $str.'</table>';

            $html = str_get_html($str);

            header('Content-type: application/ms-excel');
            header('Content-Disposition: attachment; filename=registration_all.csv');

            $fp = fopen("php://output", "w");

            foreach($html->find('tr') as $element)
            {
                $td = array();
                foreach( $element->find('td') as $row)
                {
                    $td [] = $row->plaintext;
                }
                fputcsv($fp, $td);
            }


            fclose($fp);

        }
    }


    /* registration find  view */
    public function registration_find($e_id = '')
    {
        if($this->input->post('event_id') != '')
        {
            $e_id = $this->input->post('event_id');
        }

        $this->load->model('controll_model','c');

        $data['reg'] = $this->c->registration_list($e_id);
        $data['event_name'] = $this->c->event_name_by_id($e_id);

        $data['page_name'] = 'reg_result';
        $data['title'] = 'Registration';


        $this->load->view('controll/index',$data);
    }

    /* registration to csv  */
    public function registration_to_csv($e_id)
    {
        require_once 'files/csv/simple_html_dom.php';

        $this->load->model('controll_model','c');

        $reg = $this->c->registration_list($e_id);
        $event_name = $this->c->event_name_by_id($e_id);

        $str = '';

        if(sizeof($reg) > 0)
        {
            $str = '<table> <tr><td colspan="6" align="center">Event-name:'.$event_name['name'].'</td></tr> <tr><td>S_id</td></td><td>Name</td><td>Email</td><td>Company Name</td><td>Designation</td><td>Phone</td><td>Address</td></tr>';

            foreach($reg as $r)
            {
                $str = $str .'<tr><td>'.$r['r_id'].'</td><td>'.$r['name'].'</td><td>'.$r['email'].'</td><td>'.$r['company_name'].'</td><td>'.$r['designation'].'</td><td>'.$r['phone'].'</td><td>'.$r['address'].'</td></tr>';
            }

            $str = $str.'</table>';

            $html = str_get_html($str);

            header('Content-type: application/ms-excel');
            header('Content-Disposition: attachment; filename=registration.csv');

            $fp = fopen("php://output", "w");

            foreach($html->find('tr') as $element)
            {
                $td = array();
                foreach( $element->find('td') as $row)
                {
                    $td [] = $row->plaintext;
                }
                fputcsv($fp, $td);
            }


            fclose($fp);

        }
    }

    /* delete registration */
    public function reg_delete($e_id,$r_id)
    {
        $this->load->model('controll_model','c');

        $flag = $this->c->delete_reg($r_id);

        if($flag)
        {
            $this->registration_find($e_id);
        }
        else
        {
            $this->registration_find($e_id);
        }
    }

    /* delete registration */
    public function reg_delete_from_all($r_id)
    {
        $this->load->model('controll_model','c');

        $flag = $this->c->delete_reg($r_id);

        if($flag)
        {
            $this->full_registration_list();
        }
        else
        {
            $this->full_registration_list();
        }
    }

    /*  update account view   */
    public function profile()
    {
        $data['page_name'] = 'profile';
        $data['title'] = 'Update Admin';

        $this->load->view('controll/index',$data);
    }

    /*   updating account   */
    public function update_profile()
    {
        $data = json_decode($this->input->post('trozan'),true);

        $this->load->model('controll_model','c');

        $flag = $this->c->update_account($data);

        if($flag)
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }

}
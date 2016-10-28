<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    /*     home     */
    public function index()
    {
        $data['page_name'] = 'home';
        $data['banner'] = 'home_banner';
        $data['message'] = 'home_message';

        $this->load->view('site/index',$data);
    }

    /*     voyage     */
    public function voyage()
    {
        $data['page_name'] = 'voyage';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = 'Voyage';
        $data['sentence'] = 'Anchor at Lighthouse and discover your skills.';

        $this->load->view('site/index',$data);
    }

    /*     navigators     */
    public function navigators()
    {
        $data['page_name'] = 'navigators';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = 'Navigators';
        $data['sentence'] = 'The Constellation To Lead Your Voyage';

        $this->load->view('site/index',$data);
    }

    /*     service     */
    public function services()
    {
        $data['page_name'] = 'service';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = 'Services';
        $data['sentence'] = 'You Seek, We Provide';

        $this->load->view('site/index',$data);
    }
    /*     aviation    */
    public function aviation()
    {
        $data['page_name'] = 'aviation';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = 'Aviation';
        $data['sentence'] = 'Lighthouse Bangladesh Aviation & Travel Trade Program';

        $this->load->view('site/index',$data);
    }

    public function fortune()
    {
        $data['page_name'] = 'fortune';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = 'Fortune 100';
        $data['sentence'] = '';

        $this->load->view('site/index',$data);
    }


    /*     contact     */
    public function contact()
    {
        $data['page_name'] = 'contact';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = 'Contact Us';
        $data['sentence'] = 'We are conveniently located in Banani, Dhaka';

        $this->load->view('site/index',$data);
    }

    /*    calender      */
    public function calender()
    {
        $data['page_name'] = 'calender';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = 'Calender';
        $data['sentence'] = 'See Our Calender';

        $data['records'] = $this->db->query("SELECT c_id,name,conduct_by,date_start FROM tbl_calender ORDER BY date_start DESC LIMIT 20")->result_array();

        $this->load->view('site/index',$data);
    }

    /*     events     */
    public function events()
    {
        $this->load->library("pagination");

        $config['base_url'] = base_url().'site/events/';
        $config['total_rows'] = $this->db->get("tbl_event")->num_rows();
        $config['per_page'] = 5;
        $config['num_links'] = 10;

        $config['records'] = $this->db->order_by('e_id','desc')->get('tbl_event',$config['per_page'],$this->uri->segment(3))->result_array();

        $this->pagination->initialize($config);

        $data['page_name'] = 'events';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';
        $data['records'] = $config['records'];

        $data['title'] = 'Events';
        $data['sentence'] = 'See Our Upcoming Events';


        $this->load->view('site/index',$data);
    }

    /*   event details   */
    public function event_details($e_id = '')
    {
        $this->load->model('site_model','s');

        $data['page_name'] = 'event_details';
        $data['banner'] = 'other_banner';
        $data['message'] = 'other_message';

        $data['title'] = '&nbsp;&nbsp;<a href="'.base_url().'site/events/">Events</a>&nbsp;&nbsp;/&nbsp;&nbsp;Event Details&nbsp;&nbsp;';
        $data['event_detail'] = $this->s->event_details($e_id);
        $data['event_title'] = (!empty($data['event_detail']['name']))?$data['event_detail']['name']:'error occured';
        $data['sentence'] = 'Conducted By '.$data['event_detail']['conduct_by'];
        $data['event_name'] = 'Event Name';

        $data['related_events'] = $this->s->related_events($e_id);

        $this->load->view('site/index',$data);
    }

    /*    newsletter subscribe       */
    public function newsletter_add()
    {
        $this->load->model('site_model','s');
        $this->load->model('email_model','e');

        $email = $this->input->post("email");

        $flag1 = $this->s->newsletter_add($email);
        $flag2 = $this->e->send_mail($email,'Confirmation On Newsletter Sign Up','Your newsletter sign up has successfully completed. You will be the first to know about all our new events and updates.');

        if($flag1)
        {
            echo '1';
        }
    }

    /*  registration for event    */
    public function registration()
    {
        $this->load->model('site_model','s');
        $this->load->model('email_model','e');

        $trozan = json_decode($this->input->post('trozan'),true);


        $flag = $this->s->registration($trozan);

        $event_name = $this->s->event_details($trozan['event_id']);

        if($flag)
        {
            $message = 'Dear '.$trozan['name'].', <br><br>Your registration for <strong>'.$event_name['name'].'</strong> completed successfully. Please complete the payment procedure if there is any or wait for our confirmation.';

            $this->e->send_mail($trozan['email'],'Successfully Registered',$message);

            echo '0';
        }
        else
        {
            echo '1';
        }
    }

    /* send msg */
    public function send_msg()
    {
        $this->load->model('email_model','e');

        $packet = json_decode($this->input->post('packet'),true);

        $too = 'info@lighthousebangladesh.com';
        $subject = "public message";
        $message = '<strong>'.$packet['name'].'('.$packet['email'].') said:</strong>"'.$packet['msg'].'"';

        $this->e->send_mail($too,$subject,$message);
        echo 0;
    }

    public function send_fortu()
    {
        $this->load->model('email_model','e');

        $trozan = json_decode($this->input->post('trozan'),true);

        $too = 'info@lighthousebangladesh.com';
        $subject = "Fortune 100 Registration";
        $message = '<strong>Name: '.$trozan['name'].'<br>Email: '.$trozan['email'].'<br>Address: '.$trozan['address'].'<br>Company: '.$trozan['company_name'].'<br>Phone: '.$trozan['phone'];

        $this->e->send_mail($too,$subject,$message);
        echo 0;
    }
}

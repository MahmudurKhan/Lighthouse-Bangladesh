<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class site_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function newsletter_add($email)
    {
        $flag = false;

        if($this->db->insert('tbl_newsletter',array("email"=>$email)))
        {
            $flag = true;
        }

        return $flag;
    }

    function event_details($e_id)
    {
        $data = array();

        $query = $this->db->get_where('tbl_event',array('e_id'=>$e_id));

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }

    function registration($reg)
    {
        $flag = false;

        if($this->db->insert('tbl_registration',$reg))
        {
            $flag = true;
        }

        return $flag;
    }

    function related_events($e_id)
    {
        $data = array();
        $query = $this->db->query("SELECT e_id,name,image_banner FROM tbl_event WHERE e_id != ".$e_id." ORDER BY e_id DESC LIMIT 4");

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }
}
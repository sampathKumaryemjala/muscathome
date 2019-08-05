<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->helper('social_login_helper');
        $this->load->model('Properties_model');
        $this->load->model('User_model');
        $this->load->model('Services_model');
        $this->load->model('Job_post_model');
        $this->load->helper('cookie');
        $this->load->helper('image_upload_helper');
        $this->load->helper('number_to_short_number');
    }

    public function index() {
        //$id = $this->uri->segment(3);
        
        
        if($_GET['xcvc']){
        $id = base64_decode($_GET['xcvc']);
        $this->db->select('users.*,property_agent_details.*,users.id as id');
        $this->db->limit(4);
        $this->db->join('property_agent_details', 'property_agent_details.fk_user_id  = users.id','left');
        //$this->db->order_by('users.id', 'desc');
        $this->db->where('users.id', $id);
        $result['agent'] = $this->db->get('users')->row_array();
        $filter['fk_agent_id'] =  $id;
        $result['properties'] = $this->Properties_model->get_properties($filter);
        //pre($result);die;
        
        $p_types = $this->db->get('property_types')->result_array();
        foreach($p_types as $p_type){
            $tttl = 0;
            $this->db->select('count(id) as ttl');
            $this->db->where('property_type',$p_type['id']);
            $res = $this->db->get('properties')->row_array();
            if($res['ttl']){
               $tttl =  $res['ttl'];
            }
            $result['property_type_count'][$p_type['name']] = $tttl;
        }
        
        $result['property_types'] = $this->Properties_model->get_property_types();
        
        //pre($result);die;
        $this->load->view('profile/agent_profile',$result);
        }
        else{
            redirect('web_panel/home');
        }
    }
    
    public function agent_detail() {
        
        $this->load->view('profile/agent_detail',$data);
    }
    

}

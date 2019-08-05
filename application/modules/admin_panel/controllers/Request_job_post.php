<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request_job_post extends CI_Controller {
    function __construct() {
	
	
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Job_post_model');
        if (empty($this->session->userdata['backend_user']['id'])) { 
               redirect('admin_panel/Admin');
            
        }

	}
	 function get_job_post(){
	  
		$document               = [];
		$data                   = array('title' => 'Users List', 'pageTitle' => 'Users List');
		$data['users']          = $this->Job_post_model->get_job($document);
		$this->load->view('job_post/properties_list', $data);
     }
}
	

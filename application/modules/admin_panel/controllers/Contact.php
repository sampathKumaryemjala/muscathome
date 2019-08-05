<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Users_model');
        //$this->form_validation->CI = & $this;
        if (empty($this->session->userdata['backend_user']['id'])) { 
               redirect('admin_panel/Admin');
        }
        
    }

    public function index() {
        $document = [];
        $data = array('title' => 'Contact users list', 'pageTitle' => 'Contact users list');
        $data['users'] = $this->Users_model->get_contact_queries($document);
        //pre($data);die;
        $this->load->view('query/query_list', $data);
    }



}

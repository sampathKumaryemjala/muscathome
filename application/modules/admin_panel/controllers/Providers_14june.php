<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Providers extends MX_Controller {

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
        $data = array('title' => 'Service Providers List', 'pageTitle' => 'Service Providers List');
        $data['users'] = $this->Users_model->get_users($document);
        $this->load->view('users/users_list', $data);
    }

    public function ajax_get_user() {
        //echo "ghffhhj"; die;
        //pre($this->input->post('id'));die;
        //$id = 156;
        $this->db->where('properties.id', $this->input->post('id'));
        $this->db->join('property_images', 'property_images.fk_property_id = properties.id');
        $result['users'] = $this->db->get('properties')->row_array(); //ravi cahnge tble users to properties
        //pre($result);die;
        $this->load->view('properties/ajax_user_list', $result);
    }

    
    public function view_documents() {
        $data = array('title' => 'Service Providers Document', 'pageTitle' => 'Service Providers List');
        $id = $_GET['id'];
        $filter['id'] = $id;
        $data['provider'] = $this->Users_model->get_doc($filter);
        //pre($data);die;
        $this->load->view('provider/view_documents', $data);
//        if () {
//            redirect('admin_panel/provider/view_documents');
//        }
    }
    
    public function change_user_status() {
        $id = base64_decode($_GET['tyhg']);
        //pre($id);die;
        $result = $this->Users_model->update_user_status(['id' => $id]);
        if ($result) {
            redirect('admin_panel/Users');
        }
    }
    
    public function provider_delete() {
        $id = base64_decode($_GET['tyhg']);
        if (isset($id)) {
            $this->db->where('fk_agent_id', $id);
            $result = $this->db->delete('agent_details');
            $this->db->where('id', $id);
            $result = $this->db->delete('users');
        }
        if ($result) {
            redirect('admin_panel/Users/service_providers');
        }
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prop_agent extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Properties_model');
        $this->load->model('Advertisement_model');
        $this->load->model('Prop_agent_model');
        if ($this->router->fetch_method() != "index") {//pre($this->session->userdata['backend_user']['id']);
            if (empty($this->session->userdata['backend_user']['id'])) { 
               redirect('admin_panel/Admin');
            }
        }
    }

    public function agent_create() {

        $data = array();
        if ($this->input->post()) {
            //pre($this->input->post());die;
            $data = $this->input->post();
            $data['login_type'] = 0;
            $data['user_type'] = 2;
            $data['create_date'] = date('y-m-d h:i:s');
            //print_r($this->input->post()); die;
            //pre($data);die;
            $this->Prop_agent_model->create($data);
            redirect(base_url() . 'index.php/admin_panel/Prop_agent/get_agents');
        }
        $data['country_codes'] = $this->db->get('countries')->result_array();
        $this->load->view('agents/agents_create_view', $data);
    }
    function get_agents() {
        
        //echo("hreloo");
        $document = [];
        $data = array('title' => 'Users List', 'pageTitle' => 'Users List');
        
        $data['users'] = $this->Prop_agent_model->get_agents_list($document);
        $this->load->view('agents/agents_list', $data);
    }

}

?>
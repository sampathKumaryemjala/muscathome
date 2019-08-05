<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->model('Home_model');
        $this->load->model('Properties_model');
        $this->load->model('Services_model');
        $this->load->model('User_model');
        $this->load->helper('social_login_helper');
        $this->load->helper('cookie');
        $this->load->helper('custom');

        //$this->load->library('Facebook');
        //include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
        // include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
    }

    public function index() {
        if ($this->input->post()) {
            if ($this->input->post('name') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter your name', 'error_class'=>'name'));
                die;
            }
            if ($this->input->post('email') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter an email', 'error_class'=>'email'));
                die;
            }
            if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                echo json_encode(array('status' => false, 'message' => 'Please enter an valid email', 'error_class'=>'email'));
                die;
            }
            if ($this->input->post('mobile') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter your mobile number', 'error_class'=>'mobile'));
                die;
            }

            if ($this->input->post('subject') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter subject', 'error_class'=>'subject'));
                die;
            }
            if (strlen($this->input->post('message')) <= 30) {
                echo json_encode(array('status' => false, 'message' => 'Please enter atlest 30 charcters', 'error_class'=>'message'));
                die;
            }



            $insert_data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'create_date' => date("Y-m-d h:i:s")
            );

            $this->db->insert('contact_detail', $insert_data);
            echo json_encode(array('status'=>true,'message'=>'Your message sent successfully')); die;
            
        }
        
        
        $this->load->view('contact');
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service_category extends MX_Controller {

    function __construct() {


        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Service_model');
        $this->load->model('Advertisement_model');
        //$this->form_validation->CI = & $this;
        if ($this->router->fetch_method() != "index") {//pre($this->session->userdata['backend_user']['id']);
            if (empty($this->session->userdata['backend_user']['id'])) {
                redirect('admin_panel/Admin');
            }
        }
    }

    
    function plist() {
        echo("hreloo");
        $document = [];
        $data = array('title' => 'Users List', 'pageTitle' => 'Users List');
        $data['users'] = $this->Service_model->get_service_category($document);
        $this->load->view('service_category/service_list', $data);
    }

    public function advertisement_create() { //die('hello');
        $data = array();

        if ($_GET) {
            //pre($_GET);
            //             die('helo');    
            $_GET['ad_image'] = "default_add.jpg";
            $_GET = array_filter($_GET);
            if (isset($_FILES['ad_image']) and $_FILES['ad_image']['error'] == 0) {
                //die('in');
                $_GET['ad_image'] = file_upload(['key' => 'ad_image', 'path' => $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/project_folder/real_estate/uploads/add_images/']);
            }
            //echo $_GET['ad_image']; die;
            $obj = new Advertisement_model;
            $data['advertisements'] = $obj->advertisement_create($_GET);
            redirect('admin_panel/advertisement');
        }
        $this->load->view('service_category/advertisement_create', $data);
    }

}

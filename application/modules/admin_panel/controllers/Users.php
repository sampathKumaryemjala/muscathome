<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->helper('push_helper');
        $this->load->model('Users_model');
        //$this->form_validation->CI = & $this;
        if (empty($this->session->userdata['backend_user']['id'])) {
            redirect('admin_panel/Admin');
        }
    }

    public function index() {
        $data = array('title' => 'Users List', 'pageTitle' => 'Users List');
        $document = array("user_type" => 0);
        $data['users'] = $this->Users_model->get_users($document);
        //pre($data); die;
        $this->load->view('users/users_list', $data);
    }

    public function service_providers() {
        $document = array("user_type" => 1);
        $data = array('title' => 'Service Providers List', 'pageTitle' => 'Service Providers List');
        $data['users'] = $this->Users_model->get_users($document);
        //pre($data); die;
        $this->load->view('provider/list_providers', $data);
    }
    
    

    public function ajax_get_user() {
        //pre($this->input->post('id'));die;
        $this->db->where('properties.id', $this->input->post('id'));
        $this->db->join('property_images', 'property_images.fk_property_id = properties.id');
        $result['users'] = $this->db->get('properties')->row_array(); //ravi cahnge tble users to properties
        //pre($result);die;
        $this->load->view('properties/ajax_user_list', $result);
    }

    public function change_user_status() {
        $id = base64_decode($_GET['tyhg']);
        $this->db->where('id', $id);
        $agent_detail = $this->db->get('users')->row_array();
        //pre($agent_detail); die;
        $result = $this->Users_model->update_user_status(['id' => $id]);

        $subject = "User blocked.";
        $msg = "Dear User"
                . "<br><br>"
                . "Thank you for submitting a request with Muscat Home, your request is pending admin approval. We will notify you by email once your job is approved."
                . "<br>"
                . "شكرا على تقديم طلب مع مسقط هوم ونحن �?ي انتظار الحصول على الموا�?قات الإدارية على الطب وسنقوم بإبلاغك عن طريق البريد الالكتروني بمجرد الحصول على الموا�?قة المطلوبة"
                . "<br><br>"
                . "Thank You,<br>"
                . "Muscat Home<br>";
        if ($agent_detail['status'] == 0) {
            $subject = "User Approved.";
            $msg = "Dear User"
                    . "<br><br>"
                    . "Your request is approved by admin. You can now login into website."
                    . "<br>"
                    . "<br><br>"
                    . "Thank You,<br>"
                    . "Muscat Home<br>";
        }
        $email_data['msg'] = $msg;
        $this->email->from(ADMIN_EMAIL, 'Muscat Home');
        $this->email->to($agent_detail['email']);
        //$this->email->cc('city@another-example.com');
        $this->email->subject($subject);
        $this->email->message($this->load->view('email/common', $email_data, True));
        $this->email->set_mailtype("html");
        $send = $this->email->send();
        //pre($send); die;
        generatePush($agent_detail['device_type'], $agent_detail['device_token'], $msg);
        if ($result) {
            if (isset($_GET['re'])) {
                redirect($_GET['re']);
                die;
            }
            if($agent_detail['user_type'] == 0){
                redirect('admin_panel/Users');
            }
            if($agent_detail['user_type'] == 1){
                redirect('admin_panel/Users/service_providers');
            }
            if($agent_detail['user_type'] == 3){
                redirect('admin_panel/Servents');
            }
        }
    }

    public function user_detail() {
        if (isset($_GET['id'])) { //pre($_GET['id']); die;
            $data = array('title' => 'User Details', 'pageTitle' => 'User Details');
            $id['id'] = $_GET['id'];
            $user = $this->Users_model->get_users($id);
            $data['agents'] = $user[0];
            //pre($user); die;
            $this->load->view('users/view_user_details', $data);
        }
    }

    public function user_delete() {
        $id = base64_decode($_GET['tyhg']);
        if (isset($id)) {
            $this->db->where('id', $id);
            $result = $this->db->delete('users');
        }
        if ($result) {
            redirect('admin_panel/Users');
        }
    }

}

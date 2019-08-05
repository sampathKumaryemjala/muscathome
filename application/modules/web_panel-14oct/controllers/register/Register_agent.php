<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_agent extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->helper('image_upload');
        //$this->load->model('Home_model');
        $this->load->model('user_model');
        $this->load->helper('cookie');
        //$this->load->library('Facebook');        
    }

    public function register_agent() {

        if ($this->input->post()) { //pre($this->input->post('category')); die;                  
            if ($this->input->post('name') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter name'));
                die;
            }
            if ($this->input->post('email') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter an email'));
                die;
            }
            if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                echo json_encode(array('status' => false, 'message' => 'Please enter an valid email'));
                die;
            }
            if ($this->input->post('phone') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter phone'));
                die;
            }
            if ($this->input->post('password') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter password'));
                die;
            }
            if (strlen($this->input->post('password')) < '5') {
                echo json_encode(array('status' => false, 'message' => 'Enter password atleast 6 character'));
                die;
            }
            if ($this->input->post('category') == 0) {
                echo json_encode(array('status' => false, 'message' => 'Please select category'));
                die;
            }
            if ($this->input->post('subcategory') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter sub category'));
                die;
            }
            if ($this->input->post('upload_count') == 0) {
                echo json_encode(array('status' => false, 'message' => 'Please upload atleast one document'));
                die;
            }
            if ($this->input->post('upload_count') > 5) {
                echo json_encode(array('status' => false, 'message' => 'You can upload maximum 5 documents'));
                die;
            }
            //die('dsfds');
            $this->db->select('mobile,email,password,user_type');
            $this->db->group_start();
            $this->db->Where('mobile', $this->input->post('phone'));
            if ($this->input->post('category') != 5) {
                $this->db->Where('user_type', 1);
            }
            if ($this->input->post('category') == 5) {
                $this->db->Where('user_type', 3);
            }
            $this->db->group_end();
            $this->db->or_Where('email', $this->input->post('email'));
            $result = $this->db->get('re_users')->row_array();
            //pre($result);die;
            if ($result['mobile'] == $this->input->post('phone')) {
                echo json_encode(array('status' => false, 'message' => 'Phone number already exist choose another'));
                die;
            }
            if ($result['email'] == $this->input->post('email')) {
                echo json_encode(array('status' => false, 'message' => 'Email already exist choose another'));
                die;
            }
            //die('sucess');

            echo json_encode(array('status' => true, 'message' => 'Registred succesfully!'));
        }
    }

    public function register_agent_submit() {
        $doc = [];
        //pre($_FILES['files']); die;
        if ($_FILES['files']['error'][0] == 0) {
            $key = $_FILES['files'];
            $path = getcwd() . '/uploads/agent_documents/';
            $doc = upload_multiple_images_for_website($key, $path);
        }

        $insert_data = array(
            'name' => $this->input->post('reg_agent_name'),
            'email' => $this->input->post('reg_agent_email'),
            'password' => md5($this->input->post('reg_agent_password')),
            'login_type' => '0',
            'mobile' => $this->input->post('reg_agent_mobile'),
            'status' => '2',
            'create_date' => date("Y-m-d h:i:s")
        );
        if ($this->input->post('category') == 1) {
            $insert_data['user_type'] = 1;
        }
        if ($this->input->post('category') == 2) {
            $insert_data['user_type'] = 3;
        }
        //pre($insert_data);die;
        $this->db->insert('users', $insert_data);

        $agent['fk_agent_id'] = $this->db->insert_id();
        $agent['fk_service_cat_id'] = $this->input->post('ser_category');
        $agent['fk_service_sub_cat_id'] = $this->input->post('ser_sub_category');
        $agent['document1'] = $doc[0];
        if (isset($doc[1]) && !empty($doc[1])) {
            $agent['document2'] = $doc[1];
        }
        if (isset($doc[2]) && !empty($doc[2])) {
            $agent['document3'] = $doc[2];
        }
        if (isset($doc[3]) && !empty($doc[3])) {
            $agent['document4'] = $doc[3];
        }
        if (isset($doc[4]) && !empty($doc[4])) {
            $agent['document5'] = $doc[4];
        }

        $this->db->insert('agent_details', $agent);

//        Mail on regsiteration  //
        $subject = "Regsitered successfully";
        $email_data['msg'] = "Dear User"
                . "<br><br>"
                . "Thank you for registering with Muscat Home, where you can find your next lovely home much easier or you can book your next home service in less than 30 seconds."
                . "<br>"
                . "شكرا لكم على التسجيل في مسقط هوم، المكان الذي ستجد فيه منزلك التالي بكل سهولة والمكان الذي يمكنك من خلاله حجز خدمة"
                . "المنزل التالي في أقل من 30 ثانية "
                . "<br><br>"
                . "Thank You,<br>"
                . "Muscat Home<br>";
        $this->email->from(ADMIN_EMAIL, 'Muscat Home');
        $this->email->to($this->input->post('reg_agent_email'));
        $this->email->subject($subject);
        $this->email->message($this->load->view('email/common', $email_data, True));
        $this->email->set_mailtype("html");
        $this->email->send();
        $this->load->library('session');
        $this->db->where('id', $agent['fk_agent_id']);
        $result = $this->db->get('users')->row_array();

//        SMS on regsiteration  //        
        $mobile = $result['mobile'];
        $msg = "Thank you for choosing MuscatHome";
        $mobile = $result['country_code'] . $result['mobile'];
        $sms_data = array('mobile' => $mobile, 'message' => $msg);
        //send_sms($sms_data);

        //echo $this->db->last_query();
        //echo"<pre>"; print_r($result);die;
        //echo json_encode(array('status' => true, 'message' => 'Registration successful'));
//        $newdata = array(
//            'active_frontent_user_flag' => True,
//            'active_user_id' => $result['id'],
//            'user_type' => $result['user_type'],
//            'active_user_data' => $result
//        );
//
//        $this->session->set_userdata($newdata);
        redirect('web_panel/Home');
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_user extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        //$this->load->model('Home_model');
        $this->load->helper('cookie');
        $this->load->helper('custom');
        $this->load->helper('sms');
        //$this->load->library('Facebook');        
    }

    public function register_user() {
        if ($this->input->post()) {
            if ($this->input->post('name') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter name'));
                die;
            }
            if ($this->input->post('phone') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter phone'));
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
            if ($this->input->post('password') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter password'));
                die;
            }
            if (strlen($this->input->post('password')) < '6') {
                echo json_encode(array('status' => false, 'message' => 'Enter password atleast 6 character'));
                die;
            }
            if ($this->input->post('checkbox') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please agree with our Terms & condition'));
                die;
            }
            if ($this->input->post('user_response') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please check the captcha'));
                die;
            }

//                    $recaptchaResponse = trim($this->input->post('user_response'));
//                    $userIp=$this->input->ip_address();
//                    $secret='6LdQET4UAAAAAEh0A-oWSKJ9ZWGJTAmCELuT48SC';
//                    $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response;=".$recaptchaResponse."&remoteip;=".$userIp;
//                    
//                    $response = file_get_contents($url);
//                    $response = json_decode($response, true);
//                    //pre($response); 
//                    if($response['success'] === false){
//                        echo json_encode(array('status'=>false,'message'=>'Captacha test fail'));die;
//                    }

            $this->db->select('mobile,email,password,user_type');
            $this->db->group_start();
            $this->db->Where('mobile', $this->input->post('phone'));
            $this->db->Where('user_type', 0);
            $this->db->group_end();
            $this->db->or_Where('email', $this->input->post('email'));
            $result = $this->db->get('users')->row_array();
            //pre($result);die;

            if ($result['mobile'] == $this->input->post('phone')) {
                echo json_encode(array('status' => false, 'message' => 'Phone number already exist choose another'));
                die;
            }

            if ($result['email'] == $this->input->post('email')) {
                echo json_encode(array('status' => false, 'message' => 'Email already exist choose another'));
                die;
            }

            $insert_data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'login_type' => '0',
                'user_type' => '0',
                'status' => '1',
                'create_date' => date("Y-m-d h:i:s")
            );

            $this->db->insert('users', $insert_data);
            $insert_id = array();
            $insert_id['id'] = $this->db->insert_id();

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
            $this->email->to($this->input->post('email'));
            $this->email->subject($subject);
            $this->email->message($this->load->view('email/common', $email_data, True));
            $this->email->set_mailtype("html");
            $this->email->send();
            
            //        SMS on regsiteration  //        
            
            $this->db->where('id', $insert_id['id']);
            $result = $this->db->get('re_users')->row_array();

            $mobile = $result['mobile'];
            $msg = "Thank you for choosing MuscatHome";
            $mobile = $result['country_code'] . $result['mobile'];
            $sms_data = array('mobile' => $mobile, 'message' => $msg);
            send_sms($sms_data);


            $this->load->library('session');
            $newdata = array(
                'active_frontent_user_flag' => True,
                'active_user_id' => $result['id'],
                'user_type' => $result['user_type'],
                'active_user_data' => $result
            );

            $this->session->set_userdata($newdata);

            echo json_encode(array('status' => true, 'message' => 'Registration successfully'));
            //redirect('web_panel/Home');
        }
    }

}

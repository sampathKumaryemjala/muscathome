<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->model('User_model');
        $this->load->helper('cookie');
        $this->load->helper('sms');
        //$this->load->library('Facebook');        
    }

    public function index() {


        if ($this->input->post()) {
            if ($this->input->post('reset_email') == '') {
                echo json_encode(array('status' => false, 'message' => 'please enter an email'));
                die;
            }

            if (!filter_var($this->input->post('reset_email'), FILTER_VALIDATE_EMAIL)) {
                echo json_encode(array('status' => false, 'message' => 'please enter an valid email'));
                die;
            }

            $this->db->Where('email', $this->input->post('reset_email'));
            $result = $this->db->get('re_users')->row_array();
            //pre($result); die;
            
            if (count($result) > 0) {

                $to = $this->input->post('reset_email');
                $subject = 'Change Password';
                $msg = '<a href="https://muscathome.com/index.php/web_panel/reset_password/reset_password/?hjlfl=' . base64_encode($result['id']) . '">Click here</a> to change your password';

                $headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: admin@muscathome.com' . "\r\n" .
                        'Reply-To: admin@muscathome.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $msg, $headers);

                $length = 6;
                $otp = $this->otp($length);
                $msg = "Your OTP for reset password is " . $otp;
                $mobile = $result['country_code'] . $result['mobile'];
                $sms_data = array('mobile' => $mobile, 'message' => $msg);
                send_sms($sms_data);
                               
                $temp_otp = array('user_id' => $result['id'], 'otp' => $otp);
                $this->session->set_userdata($temp_otp);
                
                echo json_encode(array('status' => true, 'message' => 'Please check your email '));
                die;
            } else {
                echo json_encode(array('status' => false, 'message' => 'Email not register'));
                die;
            }
        }
    }

    function otp($length) {
        $chars = "1234567890";
        $otp = substr(str_shuffle($chars), 2, $length);
        return $otp;
    }

    Public function otp_verification() {
        if ($this->input->post()) {
            if ($this->input->post('otp') == $this->session->userdata['otp']) {
                $this->db->Where('id', $this->session->userdata['user_id']);
                $result = $this->db->get('users')->row_array();
                echo json_encode(array('status' => true, 'id' => $result['id']));
            }
            else{
                echo json_encode(array('status' => false, 'message' => 'Wrong OTP entered'));
                die;
            }
        }
    }

//    function random_password($length) {
//        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//        $password = substr(str_shuffle($chars), 0, $length);
//        return $password;
//    }

    function reset_password() {
        
        if (isset($_GET['hjlfl']) and ! empty($_GET['hjlfl'])) {
            $id = base64_decode($_GET['hjlfl']);
            //echo $id; 
        } else {
            redirect('web_panel/home');
            die;
        }
        if ($_POST) {
            $this->form_validation->set_rules('pass', 'Password', 'trim|required');
            $this->form_validation->set_rules('c_pass', 'Confirm Password', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                if ($this->input->post('pass') == $this->input->post('c_pass')) {
                    $this->User_model->edit_user(["id" => $id, "password" => md5($this->input->post('pass'))]);
                    //$this->session->set_flashdata('error', 'Wrong .');
                    $this->session->set_flashdata('success_pass', 'You have successfully changed your password');
                    $user = $this->User_model->get_user($filter);
                    $userid = base64_encode($id);
                     $this->session->unset_userdata('user_id');
                     $this->session->unset_userdata('otp');
                    redirect('web_panel/Reset_password/login?igfg='.$userid);
                }
            }
           
        }
        $data = array();
        $this->load->view('reset_password/reset_password', $data);
        //redirect(site_url('web_panel/reset_password/reset_password'));
    }

    function login() {
        if($_GET['igfg']){
            $id = base64_decode($_GET['igfg']);
            $filter['id'] =   $id;
            $userdata = $this->User_model->get_user($filter);
        }
        if ($_POST) {
            $this->form_validation->set_rules('email', 'Email Id', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $user = $this->User_model->get_user(["email" => $this->input->post('email'), "password" => md5($this->input->post('password'))]);
                $user = (object) $user;
                $userdata[] = $user;
                unset($userdata[0]);
                //pre($userdata); die;
                //$this->session->set_userdata($user);
                if ($userdata) {

                    $newdata = array(
                    'active_frontent_user_flag' => True,
                    'active_user_id' => $userdata['id'],
                    'user_type' => $userdata['user_type'],
                    'active_user_data' => $userdata                  
                    );

                    $this->session->set_userdata($newdata);
                    redirect('web_panel/Home');
                } else {
                    $this->session->set_flashdata('error', 'Please enter correct username and password');
                }
            }
        }
        $data = array();
        $this->db->where('id', $id);
        $data['user'] = $this->db->get('users')->row_array();
       // pre($data); die;
        $this->load->view('login_page/login', $data);
    }

}

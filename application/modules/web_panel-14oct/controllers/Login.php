<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        //$this->load->model('Home_model');
        $this->load->helper('cookie');
        $this->load->library('email');
        //$this->load->library('Facebook');        
    }

    public function index() {


        if ($this->input->post()) {
            if ($this->input->post('name') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter your email/password'));
                die;
            }

            if ($this->input->post('password') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter password'));
                die;
            }

            $this->db->group_start()
                    //->where('mobile', $this->input->post('name'))
                    ->where('email', $this->input->post('name'))
                    ->group_end();
            $this->db->Where('password', md5($this->input->post('password')));
            $this->db->Where('user_type', $this->input->post('toggler'));
//            $this->db->Where('status', '1');
            $result = $this->db->get('re_users')->row_array();
            if ($result['user_type'] == 2) {
                echo json_encode(array('status' => false, 'message' => 'You are not allowed to login here with this Id'));
                die;
            }
            if (!empty($result) && $result['status'] == 2) {
                echo json_encode(array('status' => false, 'message' => 'Your approval is pending!'));
                die;
            }
            if (!empty($result) && $result['status'] == 0) {
                echo json_encode(array('status' => false, 'message' => 'Your are blocked!'));
                die;
            }
            $checkbox_login = $this->input->post('checkbox_login');


            if (!empty($result)) {
                //if($result->password != md5($this->input->post('password'))) {
                //echo json_encode(array('status'=>false,'message'=>'Incorrect credentials'));die;
                //}
                /*
                 * setting session according to auth_panle_ini file in controller master file of panel
                 */


                $newdata = array(
                    'active_frontent_user_flag' => True,
                    'active_user_id' => $result['id'],
                    'user_type' => $result['user_type'],
                    'active_user_data' => $result
                );

                $this->session->set_userdata($newdata);
                if ($result['user_type'] == 3 && $result['is_profile_complete'] == 0) {
                    $this->session->set_flashdata("profile_incomplete","Please complete your profile.");
                    echo json_encode(array('status' => 2, 'message' => 'Your Profile is pending!'));
                    die;
                }
                echo json_encode(array('status' => true, 'message' => ''));
                die;
            } else {
                echo json_encode(array('status' => false, 'message' => 'Wrong username or password !'));
                die;
            }

            if ($checkbox_login != NULL) {
                $user_inputs = array('user_name' => $this->input->post('name'), 'password' => $this->input->post('password'));
                $user_inputs = json_encode($user_inputs, true);
                $this->load->helper('cookie');
                $cookie = array(
                    'name' => 'remember_me',
                    'value' => $user_inputs,
                    'expire' => '3600',
                );
                //$this->input->set_cookie('remember_me', $user_inputs, time() + 86500, '', '/');
                $this->input->set_cookie($cookie);
            } else {
                $this->load->helper('cookie');
                delete_cookie('remember_me');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('web_panel/home'));
    }

}

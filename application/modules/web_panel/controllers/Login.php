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
        //Check if form submitted ( with POST method)       
        if ($this->input->post()) {
            //Check if 'name' value exists
            //Otherwise send error message
            if ($this->input->post('name') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter your email/password'));
                die;
            }
            //Check if 'password' value exists
            //Otherwise send error message
            if ($this->input->post('password') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter password'));
                die;
            }
            
            //Here using CI's db start group
            //As I can remember it getting all
            //names with the given name
            //where password = given pass
            //where user_type = given user type
            $this->db->group_start()
                    //->where('mobile', $this->input->post('name'))
                    ->where('email', $this->input->post('name'))
                    ->group_end();
            $this->db->Where('password', md5($this->input->post('password')));
            $this->db->Where('user_type', $this->input->post('toggler'));
//            $this->db->Where('status', '1');
            //Here it getting only one row from the result
            $result = $this->db->get('re_users')->row_array();
            //If user type == 2 the shwos an error
            if ($result['user_type'] == 2) {
                echo json_encode(array('status' => false, 'message' => 'You are not allowed to login here with this Id'));
                die;
            }
            //If we have result BUT the status (I think is user status ) is 2
            //Approval is pending and it sends an error message
            if (!empty($result) && $result['status'] == 2) {
                echo json_encode(array('status' => false, 'message' => 'Your approval is pending!'));
                die;
            }
            //If user blocked it is sending blocked message
            if (!empty($result) && $result['status'] == 0) {
                echo json_encode(array('status' => false, 'message' => 'Your are blocked!'));
                die;
            }
            //Here I think is the remeber me option
            $checkbox_login = $this->input->post('checkbox_login');

            //If the result isn't empty
            if (!empty($result)) {
                //if($result->password != md5($this->input->post('password'))) {
                //echo json_encode(array('status'=>false,'message'=>'Incorrect credentials'));die;
                //}
                /*
                 * setting session according to auth_panle_ini file in controller master file of panel
                 */

                //Here it's creating an array which we will kepp in the SESSION
                $newdata = array(
                    'active_frontent_user_flag' => True,
                    'active_user_id' => $result['id'],
                    'user_type' => $result['user_type'],
                    'active_user_data' => $result
                );
                //HJere its adding to session our array
                $this->session->set_userdata($newdata);
                //If user type == 3 and the profile ISN'T completed
                //It sending complete your profile message
                if ($result['user_type'] == 3 && $result['is_profile_complete'] == 0) {
                    $this->session->set_flashdata("profile_incomplete","Please complete your profile.");
                    echo json_encode(array('status' => 2, 'message' => 'Your Profile is pending!'));
                    die;
                }
                //All are ok we can login
                echo json_encode(array('status' => true, 'message' => ''));
                die;
            
            //if user not exists, it seneding error
            } else {
                echo json_encode(array('status' => false, 'message' => 'Wrong username or password !'));
                die;
            }

            //If remember me checked
            //it creating a cookie which will expire in 3600 ( ms I think )
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
            //If remeber me is unchecked
            //clear old cookie
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

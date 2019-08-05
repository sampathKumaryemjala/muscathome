<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook_authentication extends CI_Controller {

    function __construct() {
        parent::__construct();
        // Load facebook library
        $this->load->library('Facebook');
        $this->load->model('facebook_model');
    }

    public function index() {
        $userData = array();

        if ($this->facebook->is_authenticated()) {
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,email,gender,locale,picture');
            // Preparing data for database insertion
            if (isset($userProfile['id'])) {
                $userData['oauth_provider'] = 'facebook';
                $userData['oauth_uid'] = $userProfile['id'];
                $userData['name'] = $userProfile['first_name'];
                $userData['email'] = $userProfile['email'];
                $userData['login_type'] = '1';
                $userData['fb_id'] = $userProfile['id'];
                $userData['user_type'] = '';
                $userData['profile_image'] = $userProfile['picture']['data']['url'];
                $userData['create_date'] = date("Y-m-d h:i:s");

                //echo "<pre>";print_r($userData);die;
                //$data['logoutUrl'] = $this->facebook->logout_url();
                //echo "<p><b>Logout from <a href=".$data['logoutUrl'].">Facebook</a></b></p>";die;
                // Insert or update user data
                $userID = (array) $this->facebook_model->checkUser($userData);
                //echo "<pre>";print_r($userID);die;
                // Check user data insert or update status
                if (count($userID) > 0) {
                    $newdata = array(
                        'active_frontent_user_flag' => True,
                        'active_user_id' => $userID['id'],
                        'user_type' => 0,
                        'active_user_data' => $userID
                    );

                    $this->session->set_userdata($newdata);
                }
                redirect(site_url('web_panel/home'));
            }
        } else {
            $fbuser = '';
            // Get login URL
            $data['authUrl'] = $this->facebook->login_url();
            echo $data['authUrl'];
            die;
        }
    }

    // Load login & profile view
    //$this->load->view('user_authentication/index',$data);



    public function logout() {

        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userdata('user_id');
        session_destroy();
        // Redirect to login page
        redirect('home');
    }

}

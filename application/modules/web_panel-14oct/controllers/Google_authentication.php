<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Google_authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
       // $this->load->model('user1');
	   $this->load->model('google_auth_model');
    }
    
    public function index(){
	
	    if($this->input->get('error') != '') { redirect('home'); } 
        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        //$clientId = '660527758915-f8dn9hdbvl61qgg57uls69g6k94832fj.apps.googleusercontent.com';
        //$clientSecret = 'r2v53qZLBm9dbtAqQM77EI_I';
        $clientId = '543537279812-ubkd8tt5s5og4sb2451u6ibbgppqp6bd.apps.googleusercontent.com';
        $clientSecret = '--H0nrFEP8E-WznyOvROkgvx';
        $redirectUrl = base_url() . 'index.php/web_panel/google_authentication';
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to codexworld.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_GET['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['name'] = $userProfile['given_name'];
            $userData['email'] = $userProfile['email'];
            $userData['login_type'] = '2';
            $userData['g_id'] = $userProfile['id'];
            $userData['user_type'] = '';
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_image'] = $userProfile['picture'];
            $userData['create_date'] = date("Y-m-d h:i:s");

            // Insert or update user data
            $userID = (array) $this->google_auth_model->checkUser($userData);
			//echo "<pre>";print_r($userID);die;
            if(!empty($userID)){
                $newdata = array(
                                'active_user_flag'  => True,
                                'active_user_id'    => $userID['id'],
                                'active_user_data'  => $userID
                        );

                        $this->session->set_userdata($newdata);
            }
            redirect(site_url('web_panel/home')); 
            
        } 
		
        //$this->load->view('user_authentication/index1',$data);
    }
    
    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
		
        redirect('home');
    }
}
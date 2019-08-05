<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('email');
        $this->load->helper('array');
        $this->load->helper('custom');
        $this->load->helper('sms');
        $this->load->helper('image_upload');
    }

    /*
     * Modified By      :Amit Kumar
     * Modified Date    :07-June,16
     */

    public function user_sign_up() { //die('amit');
        //echo json_encode(array("isSuccess" => false, "message" => "hello", "Result" => array())); die;
        $input = check_inputs();

        $log = "Time: " . date('Y-m-d, H:i:s') . PHP_EOL;
        $log = $log . "url: " . base_url("signup") . PHP_EOL;
        $log = $log . "Request " . json_encode($input) . PHP_EOL;
        $log = $log . "Request_file " . json_encode($_FILES) . PHP_EOL;
        //$log = $log . "Responce " . json_encode(array("Result" => $data)) . PHP_EOL . PHP_EOL;
        file_put_contents('logs/user_sign_up.txt', $log, FILE_APPEND);
        //$json   = file_get_contents('php://input');
        //$input  = json_decode($json, true);      
        $status = false;
        $message = "Invalid Input";
        $data = $user_e = $user_m = $user_f = $user_g = array();
        if ($input) {
            //input -> user_type(0-user,1-agent), login_type(0-email,1-fb,2-g+), device_type(0-and,1-ios), device_token
            $obj = new User_model;
            if ($input['login_type'] == 0 or $input['login_type'] == 3) { // email , mobile
                $user_e = $obj->get_user(array("email" => $input['email']));

//strlen("Hello");

                //if(strpos($input['mobile'],"968")==0 && strlen($input['mobile'])>11 ){
                    //$input['mobile'] = chop($input['mobile'],"968"); 
                //}

                if(strpos($input['mobile'],"968")==0 && strlen($input['mobile'])>11 ){// die('123');
                    //$input['mobile'] = str_replace("968968","968",$input['mobile']); 
                    $input['mobile'] = substr($input['mobile'], 3);  
                }

                $user_m = $obj->get_user(array("mobile" => $input['mobile']));
                if ($user_e && $user_e['user_type'] == $input['user_type']) {
                    $message = "This email id is already registered with this app";
                } else if ($user_m && $user_m['user_type'] == $input['user_type']) {
                    $message = "This mobile number is already registered with this app";
                } else {
                    $message = "User could not register";
                    if (isset($input['password']) and $input['password'] != "") {
                        $input['password'] = md5($input['password']);
                    }
                    //pre($input); die;
                    $user = $obj->user_sign_up($input);
                    if ($user) {
                        $upd = array('fk_agent_id' => $user['id']);
                        if($user['login_type'] == 1 && $user['email'] == "" && $user['mobile'] == ""){
                            $user['email'] = $user['fb_id']."@facebook.com";
                        }
                        if (isset($_FILES['documents']) and ! empty($_FILES['documents'])) {
                            $path = getcwd() . "/uploads/agent_documents/";
                            $agent_docs = upload_multiple_images_for_app($_FILES['documents'], $path);
                            if ($agent_docs) {
                                for ($i = 0; $i < count($agent_docs); $i++) {
                                    $key_is = 'document' . ($i + 1);
                                    $upd[$key_is] = $agent_docs[$i];
                                }
                                $this->User_model->update_agent_details($upd);
                            }
                        }
                        $status = true;
                        $message = "Successful sign up";
                        $data = $user;
                    }
                }
            } else {
                if (isset($input['email']) and $input['email'] != "") {
                    $get_user = $user_e = $obj->get_user(array("email" => $input['email']));
                    $message = "This email id is already registered with this app.";
                }
                if (isset($input['fb_id']) and $input['fb_id'] != "" and empty($user_e)) {
                    $get_user = $user_f = $obj->get_user(array("fb_id" => $input['fb_id']));
                    $message = "You are already registered with Facebook. Please Login with facebook.";
                } else if (isset($input['g_id']) and $input['g_id'] != "" and empty($user_e)) {
                    $get_user = $user_g = $obj->get_user(array("g_id" => $input['g_id']));
                    $message = "You are already registered with Google. Please Login with google.";
                }
                //if (empty($user_f) and empty($user_g) and empty($user_e)) {
                if (empty($get_user) OR $get_user['user_type'] != $input['user_type']) {
                    $message = "User could not register";
                    $user = $obj->user_sign_up($input);
                    if ($user) {
                        $message = "Successful sign up";
                        $status = true;
                        $data = $user;
                    }
                }
            }
        }
        echo json_encode(array("isSuccess" => $status, "message" => $message, "Result" => $data));

        //$log1 = $log1 . "Responce " . json_encode(array("Result" => $data)).PHP_EOL;
        //file_put_contents('logs/user_sign_up.txt', $log1, FILE_APPEND);
    }

    public function user_login() {
        $input = check_inputs();

        $status = false;
        $data = array();
        //pre($input);
        $obj = new user_model;
        if ($input['login_type'] == '0' OR $input['login_type'] == '3') {
            //if (isset($input['email']) and !empty($input['email'])) {
            if (strpos($input['email'], '@') !== false) {
                $user = $obj->get_user(array("email" => $input['email'], "user_type" => $input['user_type']));
            } else {
                $user = $obj->get_user(array("mobile" => $input['email'], "user_type" => $input['user_type']));
            }

            //$message = "This email id is not registered with this app";
            // } else {
            //if(!$user){
            //$user = $obj->get_user(array("mobile" => $input['mobile']));
            //$message = "This mobile number is not registered with this app";
            //}
            //}
            $message = "Please first register yourself";
            if ($user and $user['user_type'] == $input['user_type']) {
                $message = "Wrong password entered";
                if ($user['password'] == md5($input['password'])) {
                    $status = true;
                    $message = "Successful login";
                    // if ((strpos($user['profile_image'], 'ttp://') === false AND strpos($user['profile_image'], 'ttps://') === false) and $user['profile_image'] != "") {
                    //$user['profile_image'] = base_url() . 'profile_images/' . $user['profile_image'];
                    //}
                    $data = $user;
                } else {
                    if ($user['fb_id'] != "" and $user['g_id'] != "") {
                        $message = "You are registered with facebook and google";
                    } else if ($user['fb_id'] != "") {
                        $message = "You are registered with facebook";
                    } else if ($user['g_id'] != "") {
                        $message = "You are registered with google";
                    }
                }
            }
        } else {
            if (isset($input['fb_id']) and $input['fb_id'] != "") {
                $document['fb_id'] = $input['fb_id'];
            } else if (isset($input['g_id']) and $input['g_id'] != "") {
                $document['g_id'] = $input['g_id'];
            }
            $message = "User does not exist!";
            $user = $obj->get_user($document);
            if ($user) {
                $data = $user;
                $status = true;
                $message = "Successful login";
            }
        }
        if ($data) {
            $get_user = $obj->get_user(array("device_token" => $input['device_token']));
            if ($get_user) {
                $edited = $obj->edit_user(["id" => $get_user['id'], "device_token" => ""]);
            }
            $edited = $obj->edit_user(["id" => $user['id'], "device_type" => $input['device_type'], "device_token" => $input['device_token']]);
        }
        return_data($status, $message, $data);
        //create_log_file();
    }

    public function forget_password() { //forget password and resend otp
        $document               = check_inputs();
        $status                 = false;
        $obj                    = new User_model;
        $otp                    = rand(1001, 9999);
        $message                = "User not exist";
        $document['id']         = (isset($document['id'])) ? $document['id'] : "";
        $document['email']      = (isset($document['email'])) ? $document['email'] : "";
        if(isset($document['mobile']) && !empty($document['mobile'])){
            $document['mobile'] = $document['mobile'];
        }else if(isset($document['phone']) && !empty($document['phone'])){
            $document['mobile'] = $document['phone'];
        }
        $profile                = $obj->get_user($document);
        if ($profile) {
            $phone              = $profile['country_code'] . $profile['mobile'];
            $mesg               = "Your OTP for Muscat Home login is " . $otp;
            $sent               = send_sms(array("mobile" => $phone, "message" => $mesg));

            $headers            = 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'From: admin@muscathome.com' . "\r\n" . 'Reply-To: admin@muscathome.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
            mail($profile['email'], "OTP for Muscat Home login", $mesg, $headers);
            $status             = true;
            $message            = "OTP sent to your phone/email";
            $profile['otp']     = $otp;
            //$editProfile = $obj->editProfile($document);
        }
        return_data($status, $message, $profile);
        //create_log_file();
    }

    function validate_send_message($input) {
        if(!isset($input['country_code']) OR empty($input['country_code'])){
            echo json_encode(array("isSuccess" => false, "message" => "country_code missing", "Result" => [])); die;
        }
        if(!isset($input['phone']) OR empty($input['phone'])){
            echo json_encode(array("isSuccess" => false, "message" => "phone missing", "Result" => [])); die;
        }
    }
    
    public function send_message() {

        $input              = check_inputs();
        $this->validate_send_message($input);
        $otp                = rand(1001, 9999);
        $message            = "Your OTP for Muscat Home login is " . $otp;
        $sent               = send_sms(array("mobile" => $input['country_code'].$input['phone'], "message" => $message));
        if($sent){
            echo json_encode(array("isSuccess" => true, "message" => $message, "Result" => array("otp"=>$otp)));
        }else{
            echo json_encode(array("isSuccess" => false, "message" => "try again", "Result" => []));
        }                         
    }

    function validate_verify_signup_inputs($input) {
        if(!isset($input['country_code']) OR empty($input['country_code'])){
            echo json_encode(array("isSuccess" => false, "message" => "country_code missing", "Result" => [])); die;
        }

        if(!isset($input['phone']) OR empty($input['phone'])){
            echo json_encode(array("isSuccess" => false, "message" => "phone missing", "Result" => [])); die;
        }else{
            $query  = "select * from re_users where user_type=0 AND  mobile='".$input['phone']."'";
            $exist  = $this->db->query($query)->row_array();
            if($exist){
                echo json_encode(array("isSuccess" => false, "message" => "phone already registered", "Result" => [])); die;
            }
        }


        if(!isset($input['email']) OR empty($input['email'])){
            echo json_encode(array("isSuccess" => false, "message" => "email missing", "Result" => [])); die;
        }else{
            $query  = "select * from re_users where user_type=0 AND email='".$input['email']."'";
            $exist = $this->db->query($query)->row_array();
            if($exist){
                echo json_encode(array("isSuccess" => false, "message" => "email id already registered", "Result" => [])); die;
            }
        }
    }

    public function verify_signup_inputs() {

        $input              = check_inputs(); //pre($input);
        $this->validate_verify_signup_inputs($input);
        $otp                = rand(1001, 9999);
        $message            = "<#> Your OTP for Muscat Home login is " . $otp .' 0QH25JHHUHO';
        $sent               = send_sms(array("mobile" => $input['country_code'].$input['phone'], "message" => $message));
        echo json_encode(array("isSuccess" => true, "message" => $message, "Result" => array("otp"=>$otp))); die;
        if($sent){
            echo json_encode(array("isSuccess" => true, "message" => $message, "Result" => array("otp"=>$otp)));
        }else{
            echo json_encode(array("isSuccess" => false, "message" => "try again", "Result" => []));
        }                         
    }



    

    public function update_user() { //forget password and resend otp
        $input = check_inputs();
        //pre($input); die;     
        $obj = new user_model;
        $status = false;
        $message = "User not exist";
        $profile = $obj->get_user(array("id" => $input['id']));
        if ($profile) {
            if (isset($input['profile_image']) and ! empty($input['profile_image'])) {  //die('working');
                $upload['image'] = $input['profile_image'];
                $upload['path'] = getcwd() . "/uploads/profile_images/";
                $upload['file_name'] = $input['profile_image'] = rand(111, 999) . time() . ".png";
                $input['profile_image'] = upload_image_base64($upload);
            }
            if (isset($input['password'])) {
                $input['password'] = md5($input['password']);
            }
            $status = true;
            $message = "User details edited successfully";
            $edited = $obj->edit_user($input);
            $profile = $obj->get_user(array("id" => $input['id']));
        }
        return_data($status, $message, $profile);
        //create_log_file();
    }

    public function user_profile() { //forget password and resend otp
        $input = check_inputs();
        $status = false;
        $message = "User not exist";
        $profile = $this->User_model->get_user(array("id" => $input['user_id']));
        if ($profile) {
            $status = true;
            $message = "User found successfully";
        }
        return_data($status, $message, $profile);
        //create_log_file();
    }

    public function create_servant_profile() { //forget password and resend otp
        //$input = check_inputs();
        //pre($input); die;    
        $input = $this->input->post();
        $log = "Time: " . date('Y-m-d, H:i:s') . PHP_EOL;
        $log = $log . "url: " . base_url("create_servant_profile") . PHP_EOL;
        $log = $log . "Request " . json_encode($input) . PHP_EOL;
        $log = $log . "Request_file " . json_encode($_FILES) . PHP_EOL;
        file_put_contents('logs/create_servant_profile.txt', $log, FILE_APPEND);
        
        $obj = new User_model;
        $status = false;
        $message = "User not exist";
        $profile = $obj->get_user(array("id" => $input['id']));
        //pre($profile); die;
        if ($profile) {
            $input['profile_image'] = "";
            if (isset($_FILES['profile_image'])) {  //die('working');            
                $upload['path'] = getcwd() . "/uploads/profile_images/";
                $res = explode('.',$_FILES['profile_image']['name']);
                $Profile_image = rand(111, 999).time().'.'.end($res); 
                $target_file    = $upload['path'] . $Profile_image;
                if (move_uploaded_file($_FILES['profile_image']["tmp_name"], $target_file)) {
                   $input['profile_image'] = $Profile_image;
                }
            }
                //$Profile_image = upload_multiple_images_for_website($upload['image'], $upload['path']);
                
            
            $user_profile = elements(array("name", "email", "mobile","profile_image"), $input);
            //pre($input); die;
            $input['fk_user_id'] = $user_profile['id'] = $input['id'];
            //pre($input); die;
            $servent_profile = elements(array("fk_user_id", "age", "gender", "nationality","country","country_id","city","city_id","experience", "highest_degree", "occupation", "current_org", "expected_salary", "religion", "marital_status", "about_servent"), $input);
            //pre($servent_profile); 
            if (isset($_FILES['cv_url'])) {
                $upload['path'] = getcwd() . "/uploads/profile_images/servent_cv/";
                $res = explode('.',$_FILES['cv_url']['name']);
                $upload_cv = rand(111, 999).time().'.'.end($res); 
                $target_file    = $upload['path'] . $upload_cv;
                if (move_uploaded_file($_FILES['cv_url']["tmp_name"], $target_file)) {
                   $servent_profile['cv_url'] = base_url('uploads/profile_images/servent_cv/') . $upload_cv;
                }
            }
            if (isset($_FILES['video_url'])) {
                $upload['path'] = getcwd() . "/uploads/profile_images/servent_video_cv/";
                $res = explode('.',$_FILES['video_url']['name']);
                $upload_video_cv = rand(111, 999).time().'.'.end($res); 
                $target_file    = $upload['path'] . $upload_video_cv;
                if (move_uploaded_file($_FILES['video_url']["tmp_name"], $target_file)) {
                   $servent_profile['video_url'] = base_url('uploads/profile_images/servent_video_cv/') . $upload_video_cv;
                }
                
            }
            if (isset($_FILES['video_thumb'])) {
                $upload['path'] = getcwd() . "/uploads/profile_images/servent_video_cv/thumbnails/";
                $res = explode('.',$_FILES['video_thumb']['name']);
                $upload_video_cv_thumb = rand(111, 999).time().'.'.end($res); 
                $target_file    = $upload['path'] . $upload_video_cv_thumb;
                if (move_uploaded_file($_FILES['video_thumb']["tmp_name"], $target_file)) {
                   $servent_profile['video_thumb'] = base_url('uploads/profile_images/servent_video_cv/thumbnails/') . $upload_video_cv_thumb;
                }
                
            }
            //pre($user_profile); pre($servent_profile); die;
            $edited = $obj->edit_user($user_profile);
            $edited = $obj->create_servant_profile($servent_profile);
            $profile = $obj->get_user(array("id" => $input['id']));
            //pre($profile); die;
            $status = true;
            $message = "Your details edited successfully";
            
        }
        return_data($status, $message, $profile);
        //create_log_file();
    }

    public function servents_list() {
        $input = check_inputs();
        $status = false;
        $data = array();
        $obj = new user_model;
        $message = "Servent does not exist!";

        $user = $obj->get_servent($input);
        if ($user) {
            $data = $user;
            $status = true;
            $message = "Servemt list displayed successfully.";
        }
        return_data($status, $message, $data);
        //create_log_file();
    }

}



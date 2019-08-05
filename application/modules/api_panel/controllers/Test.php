<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('push_helper');
        $this->load->helper('custom_helper');
        $this->load->library('email');
        $this->load->helper('sms');
    }

     public function sms_test() { //forget password and resend otp
            
            //$phone              = "96899610404";
            $phone              = "94225656";//$profile['country_code'] . $profile['mobile'];
            //$phone              = "9015190272";
            $msg               = "new testing message";
            $sent               = send_sms(array("mobile" => $phone, "message" => $msg));

            echo "sent";

    }
    
    Public function send_email(){
        
        mail("piyush938@gmail.com","subject","mail body");
         /* Verify Mail for Company registeration */
        $this->email->from('meittech10@gmail.com', 'Ubcool');
        $this->email->to('appsquadzrealestate@gmail.com');
        $this->email->subject('Company registered successfully!');
        //$this->email->message($this->load->view('email/agent_regsitration', $email_data, True));
        $this->email->message("Your OTP for ubcool is ubcool:");
       // $this->email->set_mailtype("html");
        $sent = $this->email->send();
        
        $to = 'meittech10@gmail.com';
        $subject = "New Company registered successfully!";
        $txt = "Your OTP for ubcool is :";
        
        $headers = "From: Ubcool <meittech10@gmail.com>";
        $headers .= "Reply-To: Ubcool <meittech10@gmail.com>\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
        //$headers .= "BCC: $emailList";

        $sent = mail($to, $subject, $txt, $headers);

        
    }


    Public function upload_video(){
        $target = getcwd().'/uploads/videos/'.time().rand(10101010,9090909090).'.mp4';
        move_uploaded_file($_FILES['file']['tmp_name'],$target);

    }
    
    public function notification()
    {
        $inputs                     = $this->input->post();
        $message                    = "This is the testing notification";
        //$push['type']             = $json['push_type'];
        //$push['message']          = "Amit ubcool push Testing working finl";
        $device_type                = '0';
        $device_token                = "c8pCpnOf--4:APA91bEVQYQM6XvfKvAI86W_99JOvp1_FjhCzpHD9fzcbiDbJOkaN2sMCaQcpJPpcvmTCSlO6SUIjEveKmH94rahDsKVzqaKpmfXZhvtSa21TlKOf1ZSpXmjasJcxA82-0eiDUj385KG"; //ios
        if($inputs){
            if(isset($inputs['device_token'])){
                $device_token        = $inputs['device_token'];
            }
            if(isset($inputs['device_type'])){
                $device_type            = $inputs['device_type'];
            }
            if(isset($inputs['message'])){
                $message            = $inputs['message'];
            }            
        }
        $inputs['message']          = $message;
       $generatePush               = generatePush($device_type,$device_token,$inputs);
    }
    
}

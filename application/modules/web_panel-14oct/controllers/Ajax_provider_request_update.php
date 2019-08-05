<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_provider_request_update extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->helper('social_login_helper');
        $this->load->model('Properties_model');
        $this->load->model('Notifications_model');
        $this->load->model('Services_model');
        $this->load->model('Job_post_model');
        $this->load->model('User_model');
        $this->load->helper('cookie');
    }

    function pre($a) {
        echo "<pre>";
        print_r($a);
    }

    public function index() {
        $data['status'] = false;
        $id = $this->input->post('fk_job_request_id');
        $action = $this->input->post('action');
        $job_id = $this->input->post('job_id');
        //$this->db->where('fk_provider_id', $fk_provider_id);
        $this->db->where('id', $id);
        $result = $this->db->update('job_request', array('customer_status' => '1', 'status' => '1'));

        $this->db->where('id', $this->input->post('job_post_id'));
        //pre($this->input->post('fk_job_post_id'));die;
        $result = $this->db->update('job_posts', array('status' => '1'));

        //Get job request details //
        $this->db->where('id', $id);
        $jobpost = $this->db->get('job_request')->row_array();
        $user_id['id'] = $jobpost['fk_provider_id'];
        $user = $this->User_model->get_user($user_id);

        //Notification for Provider //
        $n_data['sender_id'] = $jobpost['fk_customer_id'];
        $n_data['fk_user_id'] = $jobpost['fk_provider_id'];
        $n_data['fk_job_post_id'] = $jobpost['fk_job_post_id'];
        //$n_data['fk_service_cat_id'] = $filter['fk_service_cat_id'];
        $n_data['notification_type'] = 9;
        $n_data['description'] = $n_data['title'] = $user['name'] . " is accepted your request for service name.";
        $this->Notifications_model->create_notification($n_data);

        // Mail for Provider //
        $email_data['email'] = $user['email'];
        $email_data['sub'] = 'Request Accepted';
        $email_data['msg'] = "Dear User"
                . "<br><br>"
                . "Thank you for posting a service request on Muscat Home.  One of our service provider will contact you. Please send us an email: service@muscathome.com if you any enquiry."
                . "<br>"
                . "شكرا على تقديم طلب خدمة على مسقط هوم. سيتصل بك أحد مقدمي الخدمات. رجاء إرسال بريد الكتروني لنا على service@muscathome.comإن كان لديك أي استفسار "
                . "<br><br>"
                . "Thank you for trusting us,<br>"
                . "Muscat Home<br>";
        $this->sendmail($email_data);

        if ($this->input->post('action')) {
            $this->db->where('id', $id);
            $rt = $this->db->get('job_request')->row_array();
            $this->db->where('id !=', $id);
            $this->db->where('fk_job_post_id', $rt['fk_job_post_id']);
            $result = $this->db->update('job_request', array('customer_status' => "3", 'status' => '3'));
        }
        if ($this->input->post('fk_job_post_id')) {

            $this->db->where('id', $this->input->post('fk_job_request_id'));
            $result = $this->db->update('job_request', array('provider_status' => '2', 'customer_status' => '2', 'status' => '2'));

            $this->db->where('id', $this->input->post('fk_job_post_id'));
            $result = $this->db->update('job_posts', array('status' => '2'));
            //pre($this->input->post('id')); die;
            //Notification for Provider //
            $n_data['sender_id'] = $jobpost['fk_customer_id'];
            $n_data['fk_user_id'] = $jobpost['fk_provider_id'];
            $n_data['fk_job_post_id'] = $jobpost['fk_job_post_id'];
            //$n_data['fk_service_cat_id'] = $filter['fk_service_cat_id'];
            $n_data['notification_type'] = 9;
            $n_data['description'] = $n_data['title'] = $user['name'] . " is mark to completed the work for service name";
            $this->Notifications_model->create_notification($n_data);
        }
        $data['status'] = true;
        echo json_encode($data);
        //redirect('web_panel/Job_post/user_posts');die;
        //reload('index.php/web_panel/Job_post/user_posts');
    }

    public function provider_completes_job() {
        if ($this->input->post('provider_confirm')) {
            $provider_confirm = $this->input->post('provider_confirm');
            // pre($provider_confirm);

            if ($this->input->post('provider_confirm') == 2) { //pre($this->input->post()); die;
                $this->db->where('fk_provider_id', $this->input->post('fk_provider_id'));
                $this->db->where('fk_job_post_id', $this->input->post('id'));
                $this->db->update('job_request', array('provider_status' => $provider_confirm));
                // Get job request details //
                $this->db->where('fk_provider_id', $this->input->post('fk_provider_id'));
                $this->db->where('fk_job_post_id', $this->input->post('id'));
                $jobpost = $this->db->get('job_request')->row_array();
                $user_id['id'] = $jobpost['fk_customer_id'];
                $user = $this->User_model->get_user($user_id);
                $sender = $this->User_model->get_user(array('id' => $this->db->session('active_user_data')['id']));
                // Notification for Customer //
                $n_data['sender_id'] = $sender['id'];
                $n_data['fk_user_id'] = $jobpost['fk_customer_id'];
                $n_data['fk_job_post_id'] = $jobpost['fk_job_post_id'];
                //$n_data['fk_service_cat_id'] = $filter['fk_service_cat_id'];
                $n_data['notification_type'] = 6;
                $n_data['description'] = $n_data['title'] = $sender['name'] . "  is start the work for service name";
                $this->Notifications_model->create_notification($n_data);
                // Mail for Customer //

                $email_data['email'] = $user['email'];
                $email_data['sub'] = 'Job Completed By Provider';
                $email_data['msg'] = "Dear User"
                        . "<br><br>"
                        . "<br>"
                        . "We would like to notify you that your job request is now completed"
                        . "<br>"
                        . "نود إبلاغك بأن طلب العمل منك مكتمل الآن"
                        . "<br><br>"
                        . "Thank you for trusting us,<br>"
                        . "Muscat Home<br>";
                $this->sendmail($email_data);
            }
            if ($this->input->post('provider_confirm') == 5) { //pre($this->input->post()); die;
                //pre($this->input->post('id'));
                $this->db->where('fk_provider_id', $this->input->post('fk_provider_id'));
                $this->db->where('fk_job_post_id', $this->input->post('id'));
                $this->db->update('job_request', array('provider_status' => 5, 'status' => $provider_confirm));

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('job_posts', array('status' => $provider_confirm));

                // Get job request details //
                $this->db->where('fk_provider_id', $this->input->post('fk_provider_id'));
                $this->db->where('fk_job_post_id', $this->input->post('id'));
                $jobpost = $this->db->get('job_request')->row_array();
                $sender = $this->User_model->get_user(array('id' => $this->db->session('active_user_data')['id']));
                // Notification for Customer //
                $n_data['sender_id'] = $sender['id'];
                $n_data['fk_user_id'] = $jobpost['fk_customer_id'];
                $n_data['fk_job_post_id'] = $jobpost['fk_job_post_id'];
                //$n_data['fk_service_cat_id'] = $filter['fk_service_cat_id'];
                $n_data['notification_type'] = 7;
                $n_data['description'] = $n_data['title'] = $sender['name'] . "  is completed the work for service name";
                $this->Notifications_model->create_notification($n_data);

                // Mail for Customer //
                $user_id['id'] = $jobpost['fk_customer_id'];
                $user = $this->User_model->get_user($user_id);
                $email_data['email'] = $user['email'];
                $email_data['sub'] = 'Your Job has been started';
                $email_data['msg'] = "Dear User"
                        . "<br><br>"
                        . "We would like to notify you that your job request will commence and you have agreed with our terms and condition.  Preferred method of payment is either online or via bank deposit."
                        . "<br>"
                        . "نود إبلاغك بأن طلبك طلب العمل منك سيبدأ وأنك وافقت على الشروط والأحكام.  طريقة الدفع المفضلة إما عن طريق الانترنت أو الإيداع في الحساب المصرفي"
                        . "<br><br>"
                        . "Thank you,<br>"
                        . "Muscat Home<br>";
                $this->sendmail($email_data);
            }



//            if ($this->input->post('provider_confirm')==2) {
//                $this->db->update('job_posts', array('status' => 1));
//            }
//            else{
//                $this->db->update('job_posts', array('status' => $provider_confirm));
//            }
            //pre($this->input->post('id')); die;
        }
        $data['status'] = true;
        echo json_encode($data);
    }

    public function update_price() {
        $final_price = $this->input->post('final_price');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('job_request', array('final_price' => $final_price, 'provider_status' => 0, 'customer_status' => 0, 'status' => 1));

        $this->db->where('id', $this->input->post('job_post_id'));
        $result = $this->db->update('job_posts', array('status' => 1));

        echo json_encode($result);
    }

    public function reject() {
        $fk_job_post_id = $this->input->post('fk_job_post_id');
        $fk_provider_id = $this->input->post('fk_provider_id');
        $this->db->where('fk_provider_id', $fk_provider_id);
        $this->db->where('fk_job_post_id', $fk_job_post_id);
        $result = $this->db->update('job_request', array('customer_status' => 3));
        //reload('index.php/web_panel/Job_post/user_posts');
    }

    public function payment() {
        $data = [];
        if ($this->input->post()) {
            $input = $this->input->post();
            //pre($input); 

            $this->db->where('id', $input['fk_job_request_id']);
            $result = $this->db->get('job_request')->row_array();
            //pre($result); die;
            $data['payment_details'] = $result;
            $this->db->join('promo_codes', 'promo_codes.id = promo_codes_used.fk_code_id');
            $this->db->where('fk_user_id', $input['fk_user_id']);
            $this->db->where('fk_job_post_id', $input['job_post_id']);
            $data['promocode_detail'] = $this->db->get('promo_codes_used')->row_array();
            //pre($data); die;
        }

        $this->load->view('job_post/ajax_payment', $data);
    }

    function sendmail($document) {
        /* Mails for job post */
        $this->email->from(SERVICE_EMAIL, 'Muscat Home');
        $this->email->to($document['email']);
        //$this->email->cc('city@another-example.com');
        $this->email->subject($document['sub']);
        $this->email->message($this->load->view('email/common', $document, True));
        $this->email->set_mailtype("html");
        $this->email->send();
    }

}

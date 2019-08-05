<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_post extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->helper('social_login_helper');
        $this->load->model('Properties_model');
        $this->load->model('User_model');
        $this->load->model('Services_model');
        $this->load->model('Job_post_model');
        $this->load->helper('cookie');
        $this->load->helper('image_upload');
        $this->load->helper('number_to_short_number');
        if ($this->router->fetch_method() != "index") { //pre($this->session->userdata);
            if (empty($this->session->userdata['active_user_data'])) { //die('w');
                redirect('web_panel/Home');
            }
        }
    }

    function pre($a) {
        echo "<pre>";
        print_r($a);
    }

    public function index() {
        $filter = [];
        if (isset($_GET['ghvj'])) {
            $data['sub_id'] = $filter['sub_id'] = base64_decode($_GET['ghvj']);
            $data['main_sub'] = $sub = $this->Services_model->get_subcategory($filter);
            $filter['cat_id'] = $sub['cat_id'];

            $data['subs'] = $this->Services_model->get_subcategories_by_cat_id($filter);

            //pre($data); die();
        } else {
            redirect('web_panel/Home');
        }

        if ($this->input->post()) { //pre($this->session->userdata['active_user_data']['id']); die;
            $post = $this->input->post();

            //pre($this->input->post()); pre($_FILES);die;
            $id = $this->session->userdata['active_user_data']['id'];
            $post['fk_user_id'] = $id;
            $post['fk_service_cat_id'] = $sub['cat_id'];
            $post['fk_service_sub_cat_id'] = $data['sub_id'];
            if ($this->input->post('address')) {
                $post['address'] = $this->input->post('h_no') . ', ' . $this->input->post('address');
                unset($post['h_no']);
            }
            if ($this->input->post('source')) {
                $post['source'] = $this->input->post('h_no_s') . ', ' . $this->input->post('source');
                unset($post['h_no_s']);
            }
            if ($this->input->post('destination')) {
                $post['destination'] = $this->input->post('h_no_d') . ', ' . $this->input->post('destination');
                unset($post['h_no_d']);
            }
            //$dated = str_replace('/', '-', $this->input->post('dated'));
            $dated = implode('-', array_reverse(explode('/', $this->input->post('dated'))));
            $date_format = explode('-', $dated);
            $date = $date_format[0] . '-' . $date_format[2] . '-' . $date_format[1];
            $post['dated'] = $date;
            $post['image'] = $_FILES['job_image']['name'];
            $time = $this->input->post('timed');
            if ($this->input->post('self_material')) {
                $post['self_material'] = 1;
            } else {
                $post['self_material'] = 0;
            }
            //pre($post); die();
            $data['subs'] = $this->Job_post_model->post_a_job($post);
            //pre($post); die('fhf');
            if (isset($_FILES['job_image'])) { //die('in');
                //pre('ok'); die;
                $key = $_FILES['job_image'];
                $path = getcwd() . '/uploads/job_posts/';
                $images = upload_multiple_images_for_website($key, $path);
                if ($images) {
                    $img['fk_job_post_id'] = $this->db->insert_id();
                    foreach ($images as $image) {
                        $this->db->where('fk_user_id', $this->session->userdata['active_user_data']['id']);
                        $jobid = $this->db->get('job_posts')->result_array();
                        $lastjobid = array_values(array_slice($jobid, -1))[0];
                        $img['fk_job_post_id'] = $lastjobid['id'];
                        $img['create_date'] = date('y-m-d m:i:s');
                        $img['image'] = $image;

                        //pre($img); die;
                        $this->db->insert('job_post_images', $img);
                    }
                }
            }

            if ($data['subs']) {
                // Mail for user/Customer //
                $user_id['id'] = $id;
                $user = $this->User_model->get_user($user_id);
                $email_data['email'] = $user['email'];
                $email_data['sub'] = 'You have posted a job on Muscat Home';
                $email_data['msg'] = "Dear User"
                        . "<br><br>"
                        . "Thank you for posting a service request on Muscat Home.  One of our service provider will contact you. Please send us an email: service@muscathome.com if you any enquiry."
                        . "<br>"
                        . "شكرا على تقديم طلب خدمة على مسقط هوم. سيتصل بك أحد مقدمي الخدمات. رجاء إرسال بريد الكتروني لنا على service@muscathome.comإن كان لديك أي استفسار "
                        . "<br><br>"
                        . "Thank you for trusting us,<br>"
                        . "Muscat Home<br>";
                $this->sendmail($email_data);
            }


            redirect('web_panel/Job_post/user_posts');
        }
        if ($sub['cat_id'] == 4) {
            $this->load->view('services/post_jobs_transport', $data);
        } else {
            $this->load->view('services/post_jobs', $data);
        }
    }

    public function user_posts() {
        $statuss = 4;
        $uri = $this->uri->segment(4);
        $values = array("all", "pending", "completed");
        $value = array("all" => 4, "pending" => 0, "completed" => 2);
        if ($uri && in_array($uri, $values)) { //die('gffd');
            $statuss = $value[$uri];
            if ($uri == "pending") {
                $filter['where_in'] = [0, 1, 5];
            } else if ($uri == "completed") {
                $filter['status'] = 2;
            }
        }



        $filter['user_id'] = $this->session->userdata['active_user_data']['id']; //$_session[''];
        $result['user_posts'] = $this->Job_post_model->user_posts($filter);
        $result['active_tab'] = $statuss; // 
        //pre($result); die;
        $this->load->view('job_post/user_posts', $result);
    }

    public function provider_jobs() {
        $provider['status'] = $statuss = 0;
        $uri = $this->uri->segment(4);
        $values = array("all", "accepted", "started", "completed");
        $value = array("all" => 0, "accepted" => 1, "started" => 5, "completed" => 2);
        if ($uri && in_array($uri, $values)) { //die('gffd');
            $statuss = $value[$uri];
        }

        $inputs = $this->User_model->get_user(array("id" => $this->session->userdata['active_user_data']['id']));
        $inputs['status'] = $statuss;
        $inputs['is_approved'] = 1;
        if ($statuss != 0) {
            $inputs['fk_provider_id'] = $this->session->userdata['active_user_data']['id'];
        }
        //$data['user_posts'] = $this->Job_post_model->get_user_job_posts($provider);


        $status_for = array("pending", "accepted", "completed", "removed", "", "started");
        $final = array();
        $final['pending'] = array();
        $final['accepted'] = array();
        $final['started'] = array();
        $final['completed'] = array();
        $final['pending_n_accepted'] = array();
        //$obj = new Job_post_model;
        $data['user_posts'] = $lists = $this->Job_post_model->get_user_job_posts($inputs);
//        if ($lists) { //pre($lists);             
//            foreach ($lists as $list) {
//                $final[$status_for[$list['status']]][] = $list;
//            }
//            $final['pending_n_accepted'] = array_merge($final['pending'],$final['accepted'],$final['started']);
//        }
        //pre($data); die;
        $data['active_tab'] = $statuss;
        $this->load->view('job_post/provider_jobs', $data);

        $details['fk_provider_id'] = $this->session->userdata['active_user_data']['id'];
    }

    public function job_detail() {
        if (isset($_GET['jhj'])) {
            $filter['fk_job_post_id'] = base64_decode($_GET['jhj']);
            $filter['fk_service_cat_id'] = base64_decode($_GET['hjfh']);
            //pre($filter); die;
            //$data['user_posts'] = $this->Job_post_model->job_detail($filter);
            $data['user_posts'] = $this->Job_post_model->user_posts($filter);
            //pre($data['user_posts'][0]['providers'][0]['fk_job_post_id']); die;
            $providerid = $customerid = $postid = 0;

            if (!empty($data['user_posts'][0]['providers'][0])) {
                $providerid = $data['user_posts'][0]['providers'][0]['fk_provider_id'];
                $customerid = $data['user_posts'][0]['fk_user_id'];
                $postid = $data['user_posts'][0]['fk_job_post_id'];
                $requestid = $data['user_posts'][0]['providers'][0]['id'];
                //pre($postid); die;

                $data['ratings']['job_ratings'] = $data['ratings']['over_all'] = "";
                $this->db->select('AVG(ratings) as ratings');
                $this->db->where('to_id', $providerid);
                $rating = $this->db->get('ratings')->row_array();
                if ($rating['ratings'] or $rating['ratings'] == 0) {
                    $data['ratings']['over_all'] = $rating['ratings'];
                }

                $this->db->select('ratings as job_rating');
                $this->db->where('from_id', $customerid);
                $this->db->where('to_id', $providerid);
                $this->db->where('fk_job_post_id', $postid);
                $rating = $this->db->get('ratings')->row_array();
                if (isset($rating['job_rating']) or $rating['job_rating'] == 0) {
                    $data['ratings']['job_ratings'] = $rating['job_rating'];
                }


                $this->db->where('id', $providerid);
                $data['users'] = $this->db->get('users')->row_array();


                $data['data_for_rating']['fk_job_post_id'] = $postid;
                $data['data_for_rating']['id'] = $requestid;
                $data['data_for_rating']['fk_provider_id'] = $customerid;
                $data['data_for_rating']['fk_customer_id'] = $providerid;
            }
            $payment_filter['fk_provider_id'] = $providerid;
            $payment_filter['fk_customer_id'] = $customerid;
            $payment_filter['fk_job_post_id'] = $postid;
            $payment_status['status'] = 0;
            $payment_status = $this->Job_post_model->check_payment_status($payment_filter);
            $data['payment_status'] = $payment_status['status'];
            //pre($data);die;
            $this->load->view('job_post/job_detail', $data);
        } else {
            redirect('web_panel/home');
        }
        //pre($data); die;
    }

    public function provider_job_detail() {
        //die('sdgdfv');

        if (isset($_GET['jhj'])) {

            $filter['fk_job_post_id'] = base64_decode($_GET['jhj']);
            $filter['fk_service_cat_id'] = base64_decode($_GET['hjfh']);
            $dertails = $this->Job_post_model->job_detail($filter);
            $data['post_details'] = $dertails;

            $this->db->where('fk_provider_id', $this->session->userdata['active_user_data']['id']);
            $this->db->where('fk_job_post_id', $data['post_details'][0]['fk_job_post_id']);
            $result = $this->db->get('job_request')->row_array();
            $data['request_detail'] = $result;
            if ($result) {
                $data['quotation']['job_req_id'] = $result['id'];
                $data['quotation']['quotation'] = $result['quotation'];
                $data['quotation']['quotation_description'] = $result['quotation_description'];
            }
            $data['user_posts'] = $this->Job_post_model->get_user_job_posts($filter);
            //pre($data['user_posts']); die;
            $data['post_details'][0]['category'] = base64_decode($_GET['hjfh']);
            //pre(); die;
            if ($this->input->post()) {
                $inputs = $this->input->post();

                $inputs['fk_customer_id'] = $data['user_posts'][0]['fk_user_id'];
                $inputs['fk_provider_id'] = $this->session->userdata['active_user_data']['id'];
                $inputs['fk_job_post_id'] = $data['post_details'][0]['fk_job_post_id'];
                $inputs['provider_status'] = 0;
                $inputs['customer_status'] = 0;
                $inputs['status'] = 0;
                $inputs['create_date'] = date('y-m-d h:i:s');
                //pre($inputs);die;
                if (isset($inputs['job_req_id'])) {
                    $this->db->where('id', $inputs['job_req_id']);
                    $result = $this->db->update('job_request', ["quotation" => $inputs['quotation'], "quotation_description" => $inputs['quotation_description']]);
                } else {
                    $result = $this->db->insert('job_request', $inputs);
                    // Mail for Customer //
                    $user_id['id'] = $inputs['fk_customer_id'];
                    $user = $this->User_model->get_user($user_id);
                    $email_data['email'] = $user['email'];
                    $email_data['sub'] = 'You Got Job Request to Your Post On Muscat Home';
                    $email_data['msg'] = $user['name'] . ' have sent you a request to your job post.';
                    $this->sendmail($email_data);
                }

                redirect('web_panel/Job_post/provider_jobs/all');
            }

            $data['user_posts'][0]['fk_provider_id'] = $result['fk_provider_id'];
            $data['user_posts'][0]['provider_status'] = $result['provider_status'];
            $data['user_posts'][0]['customer_status'] = $result['customer_status'];


            $data['ratings']['job_ratings'] = $data['ratings']['over_all'] = "";
            $this->db->select('AVG(ratings) as ratings');
            $this->db->where('to_id', $result['fk_customer_id']);
            $rating = $this->db->get('ratings')->row_array();
            if ($rating['ratings'] or $rating['ratings'] == 0) {
                $data['ratings']['over_all'] = $rating['ratings'];
            }

            $this->db->select('ratings as job_rating');
            $this->db->where('from_id', $result['fk_provider_id']);
            $this->db->where('to_id', $result['fk_customer_id']);
            $this->db->where('fk_job_post_id', $result['fk_job_post_id']);
            $rating = $this->db->get('ratings')->row_array();
            if ($rating['job_rating'] or $rating['job_rating'] == 0) {
                $data['ratings']['job_ratings'] = $rating['job_rating'];
            }
            $data['data_for_rating'] = $result;

            $this->db->where('id', $result['fk_customer_id']);
            $data['users'] = $this->db->get('users')->row_array();
            //pre($data['request_detail']); die;

            $payment_filter['fk_provider_id'] = $data['request_detail']['fk_provider_id'];
            $payment_filter['fk_customer_id'] = $data['request_detail']['fk_customer_id'];
            $payment_filter['fk_job_post_id'] = $data['request_detail']['fk_job_post_id'];
            $payment_status['status'] = 0;
            $payment_status = $this->Job_post_model->check_payment_status($payment_filter);
            $data['payment_status'] = $payment_status['status'];
            //pre($data['payment_status']); die;
            $this->load->view('job_post/provider_job_detail', $data);
        } else {
            redirect('web_panel/home');
        }
        //pre($data); die;
    }

    public function ajax_check_promocode() { //die('hj');
        if ($this->input->post()) {// pre($this->input->post()); die;                  
            if ($this->input->post('promocode') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter promocode'));
                die;
            }
            $user_id = $this->session->userdata['active_user_data']['id'];
            $code = $this->input->post('promocode');
            $get_codes = $this->db->get('promo_codes')->result_array();
            //pre($get_codes); die;
            foreach ($get_codes as $get_code) {

                if ($get_code['code'] == $code) {
                    $this->db->select('no_of_used as code_used');
                    $this->db->where('fk_user_id', $user_id);
                    $this->db->where('fk_code_id', $get_code['id']);
                    $check_code_used = $this->db->get('promo_codes_used')->row_array();
                    //pre($check_code_used); die;
                    if ($check_code_used['code_used'] < $get_code['no_of_uses']) {
                        $this->db->where('end_date >=', date('Y-m-d'));
                        $this->db->where('code', $code);
                        $promo = $this->db->get('promo_codes')->row_array();
                        if (!empty($promo)) {
                            $this->db->where('start_date <=', date('Y-m-d'));
                            $this->db->where('code', $code);
                            $promo = $this->db->get('promo_codes')->row_array();
                            if (!empty($promo)) {
                                echo json_encode(array('status' => true, 'message' => 'Code applied!'));
                                die;
                            } else {
                                echo json_encode(array('status' => false, 'message' => 'This promocode has not been started yet!'));
                                die;
                            }
                        } else {
                            echo json_encode(array('status' => false, 'message' => 'This promocode has been expired!'));
                            die;
                        }
                    } else {
                        echo json_encode(array('status' => false, 'message' => 'Your cannot use this code!'));
                        die;
                    }
                }
            }
        }

        echo json_encode(array('status' => false, 'message' => 'Wrong Code entered!'));
        die;
    }

    public function ajax_rating_customer() {

        $input = $this->input->post();
        $input['create_date'] = date('Y:m:d H:m:s');
        $this->db->insert('ratings', $input);
        echo json_encode(array('status' => true, 'message' => 'Rated succesfully!'));
    }

    public function payment() {
        if ($this->input->post()) {
            $input = $this->input->post(); //pre($this->input->post()); die;
            $input['total_amount'] = explode(' ', $this->input->post('total_amount'))[1];
            $input['txn_id'] = "MH" . $this->input->post('job_post_id') . $this->input->post('fk_job_request_id') . $this->input->post('fk_customer_id') . $this->input->post('fk_provider_id');
            $input['create_date'] = date('Y-m-d H:i:s');
            $input['status'] = 1;
            $inseted = $this->db->insert('payment_details', $input);

            $payment_id = $this->db->insert_id();
            $this->db->where('id', $payment_id);
            $payment_details = $this->db->get('payment_details')->row_array();
            if (isset($payment_details)) {
                if ($payment_details['status'] == 1) {
                    echo json_encode(array('status' => true, 'message' => 'Payment successfully done!'));
                }
                if ($payment_details['status'] == 0) {
                    echo json_encode(array('status' => true, 'message' => 'Payment failed!'));
                }

                $this->db->where('id', $payment_details['fk_job_post_id']);
                $get_job_post_detail = $this->db->get('job_posts')->row_array();
                if ($get_job_post_detail['fk_service_cat_id'] == 1) {
                    $this->db->where('fk_job_post_id', $payment_details['fk_job_post_id']);
                    $service_details = $this->db->get('job_household')->row_array();
                }
                if ($get_job_post_detail['fk_service_cat_id'] == 2) {
                    $this->db->where('fk_job_post_id', $payment_details['fk_job_post_id']);
                    $service_details = $this->db->get('job_outdoor')->row_array();
                }
                if ($get_job_post_detail['fk_service_cat_id'] == 3) {
                    $this->db->where('fk_job_post_id', $payment_details['fk_job_post_id']);
                    $service_details = $this->db->get('job_personal')->row_array();
                }
                if ($get_job_post_detail['fk_service_cat_id'] == 4) {
                    $this->db->where('fk_job_post_id', $payment_details['fk_job_post_id']);
                    $service_details = $this->db->get('job_transport')->row_array();
                    $service_details['address'] = $service_details['source'];
                    $service_details['title'] = "Transport service";
                }

                // Email for customer //
                $this->db->where('id', $this->input->post('fk_job_request_id'));
                $jobpost = $this->db->get('job_request')->row_array();
                $user_id['id'] = $jobpost['fk_customer_id'];
                $user = $this->User_model->get_user($user_id);
                $email_data['email'] = $user['email'];
                if ($payment_details['status'] == 1) {
                    $email_data['sub'] = 'Payment successfully done';
                    $email_data['msg'] = "Dear User"
                            . "<br><br>"
                            . "<br>"
                            . "We would like to notify you that your payment was received."
                            . "<br>"
                            . "نودإبلاغكأننااستلمناالمبلغالذيدفعته."
                            . "<br><br>"
                            . "Thank you for trusting us,<br>"
                            . "Muscat Home<br>";
                }
                if ($payment_details['status'] == 0) {
                    $email_data['sub'] = 'Payment Failed';
                    $email_data['msg'] = "Dear User"
                            . "<br><br>"
                            . "<br>"
                            . "Payment could not be done successfully"
                            . "<br><br>"
                            . "Thank you,<br>"
                            . "Muscat Home<br>";
                }
                $this->sendmail($email_data);

                if ($payment_details['status'] == 1) {
                    // Email receipt for customer //
                    $reciept_data['name'] = $user['name'];
                    $reciept_data['mobile'] = $user['country_code'] . " " . $user['mobile'];
                    $reciept_data['email'] = $user['email'];
                    $reciept_data['address'] = $service_details['address'];
                    $reciept_data['service'] = array('name' => $service_details['title'], "amount" => $payment_details['amount']);
                    $reciept_data['sub_total'] = $payment_details['amount'];
                    $reciept_data['total'] = $payment_details['total_amount'];
                    $reciept_data['date'] = $payment_details['create_date'];
                    $reciept_data['txn_id'] = $payment_details['txn_id'];
                    $reciept_data['sub'] = 'Order Reciept #transcation ID - ' . $payment_details['txn_id'];
                    $this->sendreciept($reciept_data);
                }
                // Email for Provider //
                $user_id['id'] = $jobpost['fk_provider_id'];
                $user = $this->User_model->get_user($user_id);
                $email_data['email'] = $user['email'];
                if ($payment_details['status'] == 1) {
                    $email_data['sub'] = 'Payment has been Made by customer for your service.';
                    $email_data['msg'] = 'Customer has been made a payment';
                }
                if ($payment_details['status'] == 0) {
                    $email_data['sub'] = 'Payment Failed';
                    $email_data['msg'] = 'Payment could not be done successfully by the customer.';
                }

                $this->sendmail($email_data);
            } else {
                echo json_encode(array('status' => false, 'message' => 'Payment Failed!'));
            }
        } else {
            redirect('web_panel/Home');
        }
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
        return true;
    }

    function sendreciept($document) {
        /* Send reciept of order */
        $this->email->from(SERVICE_EMAIL, 'Muscat Home');
        $this->email->to($document['email']);
        $this->email->subject($document['sub']);
        $this->email->message($this->load->view('email/rececipt', $document, True));
        $this->email->set_mailtype("html");
        $this->email->send();
        return true;
    }

}

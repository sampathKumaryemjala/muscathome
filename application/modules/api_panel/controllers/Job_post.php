<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_post extends MX_Controller {

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
        $this->load->model('Job_post_model');
        $this->load->model('Offer_model');
        $this->load->model('User_model');
        $this->load->helper('push');
        $this->load->helper('custom');
        $this->load->helper('image_upload_helper');
    }

    /*
     * Modified By      :Amit Kumar
     * Modified Date    :07-June,16
     */

    function validate_promo_code($document) {
        if (isset($document['promo_code']) and ! empty($document['promo_code'])) {
            $document['no_of_used'] = 1;
            $code = $this->Offer_model->get_promo_codes(array("code" => $document['promo_code']));
            if ($code) {
                $code = $code['0'];
                if (strtotime($code['start_date']) > strtotime(date('Y-m-d'))) {
                    $message = "Wait for offer till " . $code['start_date'];
                    return_data($status, $message, array());
                }
                if (strtotime($code['end_date']) < strtotime(date('Y-m-d'))) {
                    $message = "Offer has been expired";
                    return_data($status, $message, array());
                }
                $alredy_used = $this->Offer_model->get_used_promo_code(array("fk_user_id" => $document['fk_user_id'], "code" => $document['promo_code']));
                if ($alredy_used && ($alredy_used['no_of_used'] == $code['no_of_uses'])) {
                    $message = "Limit expire to use this code";
                    return_data($status, $message, array());
                } else {
                    return ($alredy_used['no_of_used'] + 1);
                    //$document['no_of_used'] = $alredy_used['no_of_used'] + 1;
                }
            } else {
                $message = "Wrong promo code entered";
                return_data($status, $message, array());
            }
        }
    }

    public function job_post() { //post a job by customer  
        $document = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "No record availbale";
        $log = "Time: " . date('Y-m-d, H') . PHP_EOL;
        $log = $log . "url: " . base_url("job_post") . PHP_EOL;
        $log = $log . "Request " . json_encode($document) . PHP_EOL;
        $log = $log . "Request " . json_encode($_FILES) . PHP_EOL;
        $log = $log . "Responce " . json_encode(array("Result" => array())) . PHP_EOL . PHP_EOL;
        file_put_contents('logs/job_post.txt', $log, FILE_APPEND);

        if (isset($document['promo_code']) and empty($document['promo_code'])) {
            unset($document['promo_code']);
        }
        //$no_of_used =  $this->validate_promo_code($document);
        if ($this->validate_promo_code($document)) {
            $document['no_of_used'] = $this->validate_promo_code($document);
        }
        if (isset($_FILES) and ! empty($_FILES)) { //pre($_FILES);
            $path = getcwd() . "/uploads/job_posts/";
            $document['job_post_images'] = upload_multiple_images_for_app($_FILES['job_post_images'], $path);
        }
        $created = $obj->job_post($document);
        if ($created) {
            $providers = $this->User_model->get_providers(array("service_sub_cat_id" => $document['service_sub_cat_id']));
            //pre($providers); die;
            foreach ($providers as $provider) {
//                $push_data['title'] = "push_type_8_title";
//                $push_data['message'] = "push_type_8_message";
                $push_data['title'] = "New Job Posted By User";
                $push_data['message'] = "New job posted by user.";
                $push_data['push_type'] = "1008";
                $push_data['key'] = "value";
                $push_data['data'] = $push_data;
                generatePush($provider['device_type'], $provider['device_token'], $push_data);
            }
            $status = true;
            $message = "Success";
        }
        return_data($status, $message, $created);
        //create_log_file();
    }

    public function check_push() {
        $document = check_inputs();
        $created = [];
        //pre($document); //die;
        $push_data['title'] = "New Job Posted By User";
        $push_data['message'] = "New job posted by user.";
        $push_data['push_type'] = "1008";
        $push_data['key'] = "value";
        $push_data['data'] = $push_data;

        $provider['device_type'] = $document['device_type'];
        $provider['device_token'] = $document['device_token'];
        $push_chk = generatePush($provider['device_type'], $provider['device_token'], $push_data);

        $status = true;
        $message = "Success";
        return_data($status, $message, $created);
    }

    public function get_job_post() {
        $inputs = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        $post = $obj->get_user_job_posts($inputs);
        if ($post) {
            $post = $post[0];
            $req_array = ['fk_job_post_id' => $post['id']];
            if (isset($inputs['with_final_provider'])) {
                $req_array['with_final_provider'] = 1;
            }
            $post['requesters'] = $obj->get_all_request_for_a_job_post($req_array); // to get final provider only
            $customer = $this->User_model->get_user(array("id" => $post['fk_user_id'], "job_post_id" => $post['id']));

            $customer['is_payment'] = $post['is_payment'];
            $customer['txn_id'] = $post['txn_id'];
            $customer['amount'] = $post['amount'];
            $customer['tip'] = $post['tip'];
            $customer['total_amount'] = $post['total_amount'];

            $post['customer'] = $customer;
            $status = true;
            $message = "Success";
        }
        return_data($status, $message, $post);
        //create_log_file();
    }

    public function get_user_job_posts() {
        $inputs = check_inputs();
        $log = "Time: " . date('Y-m-d, H:i:s') . PHP_EOL;
        $log = $log . "url: " . base_url("get_user_job_posts") . PHP_EOL;
        $log = $log . "Request " . json_encode($inputs) . PHP_EOL;
        file_put_contents('logs/get_user_job_posts.txt', $log, FILE_APPEND);

        $status_for = array("pending", "accepted", "completed", "removed", "", "started");
        $final = array();
        $final['pending'] = array();
        $final['accepted'] = array();
        $final['removed'] = array();
        $final['started'] = array();
        $final['completed'] = array();
        $inputs = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        $lists = $obj->get_user_job_posts($inputs);
        if ($lists) { //pre($lists);
            if (isset($inputs['individual'])) {
                return_data(true, "Success", $lists[0]);
            }
            foreach ($lists as $list) {
                $list['job_request_id'] = "";
                $requested = $obj->get_all_request_for_a_job_post(["fk_job_post_id" => $list['id'], "with_final_provider" => 1]);
                if ($requested) {
                    $list['job_request_id'] = $requested[0]['id'];
                }
                $final[$status_for[$list['status']]][] = $list;
            }
            $final['pending_n_accepted'] = array_merge($final['pending'], $final['accepted'], $final['started']);

            $status = true;
            $message = "Success";
        }
        //pre($final);  
        return_data($status, $message, $final);
        //create_log_file();
    }

    public function get_users_job_posts_for_provider() {
        $status_for = array("pending", "accepted", "completed");
        $final = array();
        $final['available'] = array();
        $final['requested'] = array();
        $final['accepted'] = array();
        $final['completed'] = array();
        $final['started'] = array();
        $inputs = check_inputs(); //fk_service_cat_id, fk_service_sub_cat_id

        $log = "Time: " . date('Y-m-d, H') . PHP_EOL;
        $log = $log . "url: " . base_url("get_users_job_posts_for_provider") . PHP_EOL;
        $log = $log . "Request " . json_encode($inputs) . PHP_EOL;
        file_put_contents('logs/get_users_job_posts_for_provider.txt', $log, FILE_APPEND);



        $status = false;
        $obj = new Job_post_model;
        $provider = $this->User_model->get_user(array("id" => $inputs['fk_provider_id'])); //pre($provider); die;
        if (!empty($provider) && $provider['user_type'] != 1) {
            return_data($status, "Provider not found", $final);
        }
        $message = "Try again";
        $available = array("fk_service_cat_id" => $provider['fk_service_cat_id'], "fk_service_sub_cat_id" => $provider['fk_service_sub_cat_id']);
        if (isset($inputs['fk_job_post_id'])) {
            $available['fk_job_post_id'] = $inputs['fk_job_post_id'];
        }
        $all_posts = $obj->get_user_job_posts($available);
        //pre($all_posts);

        foreach ($all_posts as $single_post) {
            //pre($inputs);
            $single_post['job_request_id'] = "";
            if (isset($inputs['individual'])) { //die('rgde');
                $requested = $obj->is_post_requested_by_provider(array("fk_job_post_id" => $single_post['id'], "fk_provider_id" => $inputs['fk_provider_id']));
                if ($requested) {
                    $single_post['final_price'] = $requested['final_price'];
                    $single_post['job_request_id'] = $requested['id'];
                    $single_post['quotation'] = $requested['quotation'];
                    $single_post['quotation_description'] = $requested['quotation_description'];
                    $single_post['already_requested'] = 1;
                } else {
                    $single_post['final_price'] = "";
                    $single_post['job_request_id'] = "";
                    $single_post['quotation'] = "";
                    $single_post['quotation_description'] = "";
                    $single_post['already_requested'] = "";
                }

                return_data(true, "success", $single_post);
            }

            $requested = $obj->is_post_requested_by_provider(array("fk_job_post_id" => $single_post['id'], "fk_provider_id" => $inputs['fk_provider_id']));
            if ($requested) {
                $single_post['final_price'] = $requested['final_price'];
                $single_post['job_request_id'] = $requested['id'];
                $single_post['quotation'] = $requested['quotation'];
                $single_post['quotation_description'] = $requested['quotation_description'];
                $single_post['already_requested'] = 1;



                if ($requested['status'] == 0) {
                    $final['available'][] = $single_post;
                } else if ($requested['status'] == 1) {
                    $final['accepted'][] = $single_post;
                } else if ($requested['status'] == 2) {
                    $final['completed'][] = $single_post;
                } else if ($requested['status'] == 5) {
                    $final['accepted'][] = $single_post;
                }
            } else {
                $single_post['already_requested'] = 0;
                $final['available'][] = $single_post;
            }
        }



        /*
          $requests = $obj->get_provider_job_requests($inputs);
          if ($requests) {
          foreach ($requests as $request) {
          $final[$status_for[$request['request_status']]][] = $request;
          }
          }
         */
        /*
          $accepted  = array("fk_provider_id"=>$inputs['fk_provider_id']);
          $lists['accepted'] = $obj->get_provider_job_requests($accepted);

          $completed  = array("fk_provider_id"=>$inputs['fk_provider_id']);
          $lists['completed'] = $obj->get_user_job_posts($completed);
         */
        if ($final['available'] || $final['accepted'] || $final['completed']) { //pre($lists); 
            $status = true;
            $message = "Success";
        }
        return_data($status, $message, $final);
        //create_log_file();
    }

    public function job_request_by_provider() {      // requester to provider        
        //`fk_job_post_id`, `fk_customer_id`, `fk_provider_id`, `quotation`, `provider_status`, 
        //`customer_status`, `provider_reason`, `customer_reason` 
        $document = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        $created = $obj->job_request_by_provider($document);
        if ($created) {
            $status = true;
            $message = "Success";

            $customer = $this->User_model->get_user(["id" => $document['fk_customer_id']]);
            $provider = $this->User_model->get_user(["id" => $document['fk_provider_id']]);

            $title = $description = $provider['name'] . " sent you quotation for your service, You can accept if you are fine with charges";


            $notification = array("fk_user_id" => $document['fk_customer_id'], "notification_type" => 4, "title" => $title, "sender_id" => $document['fk_provider_id'], "fk_job_post_id" => $document['fk_job_post_id'], "description" => $description, "created" => time());
            $this->db->insert('notifications', $notification);



            $push_data['push_type'] = 4;
            $push_data['fk_job_post_id'] = $document['fk_job_post_id'];
            $push_data['sender_id'] = $document['fk_provider_id'];
            $push_data['title'] = $title;
            $push_data['message'] = $description;

            generatePush($customer['device_type'], $customer['device_token'], $push_data);
        }
        return_data($status, $message, $created);
        //create_log_file();
    }

    public function send_push_notification_for_response_to_request($document) {
        $request = $this->Job_post_model->get_request_data($document);
        $provider = $this->User_model->get_user(["id" => $request['fk_provider_id']]);
        $customer = $this->User_model->get_user(["id" => $request['fk_customer_id']]);
        //pre($document); die;
        if ($document['status'] == 1) {
            $title = $description = $customer['name'] . " accepted your request for service.";
            $notification = array("fk_user_id" => $request['fk_provider_id'], "notification_type" => 9, "title" => $title, "sender_id" => $request['fk_customer_id'], "fk_job_post_id" => $request['fk_job_post_id'], "description" => $description, "created" => time());
            $this->db->insert('notifications', $notification);
            $push_data['push_type'] = 9;
            $push_data['fk_job_post_id'] = $request['fk_job_post_id'];
            $push_data['sender_id'] = $request['fk_customer_id'];
            $push_data['title'] = $title;
            $push_data['message'] = $description;
            generatePush($provider['device_type'], $provider['device_token'], $push_data);
        } else if ($document['status'] != 2) {
            $title = $description = $customer['name'] . " accepted your request for change quotation.";
            $notification = array("fk_user_id" => $request['fk_provider_id'], "notification_type" => 9, "title" => $title, "sender_id" => $request['fk_customer_id'], "fk_job_post_id" => $request['fk_job_post_id'], "description" => $description, "created" => time());
            $this->db->insert('notifications', $notification);
            $push_data['push_type'] = 10;
            $push_data['fk_job_post_id'] = $request['fk_job_post_id'];
            $push_data['sender_id'] = $request['fk_customer_id'];
            $push_data['title'] = $title;
            $push_data['message'] = $description;
            generatePush($provider['device_type'], $provider['device_token'], $push_data);
        }
    }

    public function response_to_request() {  //job_request_id, status
        $document = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        $document['customer_status'] = $document['status'];
        $result = $obj->response_to_request($document);
        if ($result) {
            $status = true;
            $message = "Success";
            //$provider     = get_provider_by_job_request();
            $provider = $this->User_model->get_user(["id" => $document['provider_id']]);
            $this->send_push_notification_for_response_to_request($document);
        }
        return_data($status, $message, $result);
        //create_log_file();
    }

    public function send_push_notification_for_provider_response_to_request($document) {
        $request = $this->Job_post_model->get_request_data($document);
        $provider = $this->User_model->get_user(["id" => $request['fk_provider_id']]);
        $customer = $this->User_model->get_user(["id" => $request['fk_customer_id']]);
        if ($document['status'] == 5) {
            $title = $description = $provider['name'] . " has been started the work for your service";
            $notification = array("fk_user_id" => $request['fk_customer_id'], "notification_type" => 6, "title" => $title, "sender_id" => $request['fk_provider_id'], "fk_job_post_id" => $request['fk_job_post_id'], "description" => $description, "created" => time());
            $this->db->insert('notifications', $notification);
            $push_data['push_type'] = 6;
            $push_data['fk_job_post_id'] = $request['fk_job_post_id'];
            $push_data['sender_id'] = $request['fk_provider_id'];
            $push_data['title'] = $title;
            $push_data['message'] = $description;
        } else if ($document['status'] == 2) {
            $title = $description = $provider['name'] . " has been completed the work for your service";
            $notification = array("fk_user_id" => $request['fk_customer_id'], "notification_type" => 7, "title" => $title, "sender_id" => $request['fk_provider_id'], "fk_job_post_id" => $request['fk_job_post_id'], "description" => $description, "created" => time());
            $this->db->insert('notifications', $notification);
            $push_data['push_type'] = 7;
            $push_data['fk_job_post_id'] = $request['fk_job_post_id'];
            $push_data['sender_id'] = $request['fk_provider_id'];
            $push_data['title'] = $title;
            $push_data['message'] = $description;
        }
        generatePush($customer['device_type'], $customer['device_token'], $push_data);
    }

    public function provider_response_to_request() {  //job_request_id,status
        $document = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        //$document['provider_status']= $document['status'];
        //unset($document['status']);
        $result = $obj->provider_response_to_request($document);
        if ($result) {
            $status = true;
            $message = "Successfully updated";
            //$provider = $this->User_model->get_user(["id"=>$document['fk_provider_id']]);
            //$customer = $this->User_model->get_user(["id" => $document['fk_customer_id']]);
            $this->send_push_notification_for_provider_response_to_request($document);
            //generatePush($customer['device_type'], $customer['device_token'], $push_data);
        }
        return_data($status, $message, $result);

        $log = "Time: " . date('Y-m-d, H') . PHP_EOL;
        $log = $log . "url: " . base_url("provider_response_to_request") . PHP_EOL;
        $log = $log . "Request " . json_encode($document) . PHP_EOL;
        file_put_contents('logs/provider_response_to_request.txt', $log, FILE_APPEND);
        //create_log_file();
    }

    public function service_rating() {  //job_request_id,status
        $document = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        $result = $obj->service_rating($document);
        if ($result) {
            $status = true;
            $message = "Success";
        }
        return_data($status, $message, $result);
    }

    public function get_service_reviews() {  //job_request_id,status
        $document = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        $result = $obj->get_service_reviews($document);
        if ($result) {
            $status = true;
            $message = "Success";
        }
        return_data($status, $message, $result);
    }

    public function update_job_request() {  //job_request_id,status
        $document = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "Try again";
        if (isset($document['final_price']) && !empty($document['final_price'])) {

            $request = $obj->get_request_data($document);
            //pre($request);
            $customer = $this->User_model->get_user(["id" => $request['fk_customer_id']]);
            $provider = $this->User_model->get_user(["id" => $request['fk_provider_id']]);
            $title = $description = $provider['name'] . "is change the quotation for your service request, Please accept to start the work";

            $notification = array("fk_user_id" => $request['fk_customer_id'], "notification_type" => 5, "title" => $title, "sender_id" => $request['fk_provider_id'], "fk_job_post_id" => $request['fk_job_post_id'], "description" => $description, "created" => time());
            $this->db->insert('notifications', $notification);


            $push_data['push_type'] = 5;
            $push_data['fk_job_post_id'] = $request['fk_job_post_id'];
            $push_data['sender_id'] = $request['fk_provider_id'];
            $push_data['title'] = $title;
            $push_data['message'] = $description;

            generatePush($customer['device_type'], $customer['device_token'], $push_data);
        }
        $result = $obj->update_job_request($document);
        if ($result) {
            $status = true;
            $message = "Successfully updated";
        }
        return_data($status, $message, $result);
    }

    public function get_servent_request() {
        $input = check_inputs();
        $status = false;
        $data = array();
        $obj = new Job_post_model;
        $message = "Servent request list not exist!";

        $list = $obj->get_servent_request($input);
        if ($list) {
            foreach ($list as $value) {
                $value['already_requested'] = 1;
                if (!empty($value['profile_image']) && !strstr($value['profile_image'], 'http')) {
                    $value['profile_image'] = base_url() . "uploads/profile_images/" . $value['profile_image'];
                }
                $data[] = $value;
            }
            $status = true;
            $message = "Servent request list displayed successfully.";
        }
        return_data($status, $message, $data);
        //create_log_file();
    }

    public function send_request_to_servent() {
        $input = check_inputs();
        $status = false;
        $data = array();
        $obj = new Job_post_model;
        $message = "request could not made successfully.";
        $insert_id = $obj->create_request_for_servent($input);
        if ($insert_id) {
            $filter['id'] = $insert_id;
            $request = $obj->get_servent_request($filter);
            $data = $request;
            $status = true;
            $message = "request have been made successfully.";
        }
        return_data($status, $message, $data);
        //create_log_file();
    }

    public function delete_servent_request_by_user() {
        $input = check_inputs();
        $status = false;
        $obj = new Job_post_model;
        $message = "request could not deleted successfully.";
        $deleted = $obj->delete_servent_request_by_user($input);
        if ($deleted) {
            $status = true;
            $message = "request have been deleted successfully.";
        }
        return_data($status, $message, []);
        //create_log_file();
    }

}

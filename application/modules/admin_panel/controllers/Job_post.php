<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_post extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Job_post_model');
        $this->load->model('Users_model');
        $this->load->library('email');
        //$this->load->helper('push_helper');
        $this->load->helper('custom');
        $this->load->helper('number_to_short_number_helper');
        $this->load->helper('image_upload_helper');
        if (empty($this->session->userdata['backend_user']['id'])) {
            redirect('admin_panel/Admin');
        }
    }

    /*     * *
     *           _         _       _____             _        
     *          | |       | |     |  __ \           | |       
     *          | |  ___  | |__   | |__) |___   ___ | |_  ___ 
     *      _   | | / _ \ | '_ \  |  ___// _ \ / __|| __|/ __|
     *     | |__| || (_) || |_) | | |   | (_) |\__ \| |_ \__ \
     *      \____/  \___/ |_.__/  |_|    \___/ |___/ \__||___/
     *                                                        
     *                                                        
     */

    public function index() {
        $data = array();
        $data = array('title' => 'Job Posts', 'pageTitle' => 'Job Posts');
        $lists = $this->Job_post_model->get_user_job_posts();
        //pre($lists); die;
        if ($lists) {
            $data['job_post'] = $lists;
            $data['provider_detail'] = $lists;
        }
        //pre($data); die;
        $this->load->view('job_post/job_post_list', $data);
    }
    
    
    public function delete_job_post($id) {
        $url = base_url('index.php/admin_panel/Job_post');
        if(!empty($id)){
            $this->db->where('id',$id);
            $this->db->delete('re_job_posts');
        }
        redirect($url);
    }

    public function job_details() {
        $data = array();
        $data = array('title' => 'Job Detail', 'pageTitle' => 'Job Detail');

        if (isset($_GET['id'])) {
            $filter['fk_job_post_id'] = $_GET['id'];
            //$filter['id'] = $_GET['id'];
            $job_post = $this->Job_post_model->job_post_detail($filter);
            $data['job_posts'] = $job_post[0];
            $customer = $this->db->get_where('users', ['id' => $data['job_posts']['fk_user_id']])->row_array();
            $data['job_posts']['customer'] = $customer;
            //pre($data);die; 
            $this->load->view('job_post/job_detail', $data);
        } else {
            redirect('admin_panel/Admin');
        }
    }

    /*     * *
     *           _         _       _____                                 _   
     *          | |       | |     |  __ \                               | |  
     *          | |  ___  | |__   | |__) | ___   __ _  _   _   ___  ___ | |_ 
     *      _   | | / _ \ | '_ \  |  _  / / _ \ / _` || | | | / _ \/ __|| __|
     *     | |__| || (_) || |_) | | | \ \|  __/| (_| || |_| ||  __/\__ \| |_ 
     *      \____/  \___/ |_.__/  |_|  \_\\___| \__, | \__,_| \___||___/ \__|
     *                                             | |                       
     *                                             |_|                       
     */

    public function job_requests() {
        $data = array();
        $data = array('title' => 'Job Requests', 'pageTitle' => 'Job Posts');
        $lists = $this->Job_post_model->get_all_requests();
        if ($lists) {
            $data['job_requests'] = $lists;
        }

        $this->load->view('job_post/job_request_list', $data);
    }

//    public function delete() {
//        $id = base64_decode($_GET['tyhg']);
//        //pre($id);die;
//        $result = $this->Job_post_model->delete_job(['id' => $id]);
//        if ($result) {
//            redirect('admin_panel/Job_post');
//        }
//    }

    public function edit() {
        $id = base64_decode($_GET['tyhg']);
        //pre($id);die;
        $result = $this->Job_post_model->delete_job(['id' => $id]);
        if ($result) {
            redirect('admin_panel/Job_post');
        }
    }

    public function view() {
        $id = base64_decode($_GET['tyhg']);
        //pre($id);die;
        $result = $this->Job_post_model->delete_job(['id' => $id]);
        if ($result) {
            redirect('admin_panel/Job_post');
        }
    }

    public function job_approval() {
        if ($_GET['ghjg']) {
            $id = base64_decode($_GET['ghjg']);
            $filter['fk_job_post_id'] = $id;
            $job_post = $this->Job_post_model->job_post_detail($filter);
            // pre($job_post); die;
        }
        $result = $this->Job_post_model->update_job_status(['id' => $id]);
        if ($job_post[0]['is_approved'] == 0) {
            $filters['fk_service_sub_cat_id'] = $job_post[0]['fk_service_sub_cat_id'];
            $providers = $this->get_provider_emails($filters);
            //pre($providers); die;
            foreach ($providers as $provider) {
                $emails[] = $provider['email'];
            }
            //pre($emails); die;
            $subject = "New job Post";
            $email_data['msg'] = "Someone has posted a new Job.";
            $this->email->from(INFO_EMAIL, 'Muscat Home');
            $this->email->to(ADMIN_EMAIL);
            //$this->email->to('harish88kumar@yahoo.co.in');
            $this->email->cc($emails);
            $this->email->subject($subject);
            $this->email->message($this->load->view('email/agent_regsitration', $email_data, True));
            $this->email->set_mailtype("html");
            $send = $this->email->send();
        }
        if ($result) {
            redirect('admin_panel/Job_post');
        }
    }

    function get_provider_emails($document) {
        $this->db->select('email');
        $this->db->where('fk_service_cat_id', $document['fk_service_sub_cat_id']);
        $this->db->join('agent_details', 'agent_details.fk_agent_id = users.id');
        $this->db->where('user_type', 1);
        $result = $this->db->get('users')->result_array();
        return $result;
    }

}

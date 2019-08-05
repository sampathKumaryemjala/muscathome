<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends MX_Controller {

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
        $this->load->model('Servent_model');
        $this->load->model('Services_model');
        $this->load->model('Job_post_model');
        $this->load->model('Notifications_model');
        $this->load->helper('cookie');
        $this->load->helper('image_upload');
        $this->load->helper('number_to_short_number');
        if ($this->router->fetch_method() != "index") { //pre($this->session->userdata);
            if (empty($this->session->userdata['active_user_data'])) { //die('w');
                redirect('web_panel/Home');
            }
        }
    }

    public function index() {
        $filters = $final = [];
        $filters['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $user = $this->User_model->get_user(array('id' => $this->session->userdata('active_user_data')['id']));
        //pre($user); die;
        $notifications = $this->Notifications_model->get_notifications($filters);
        //pre($notifications); die;
        if (!empty($notifications)) {
            foreach ($notifications as $list) {
                $n_type = $list['notification_type'];
                $list['redirect_path'] = "";
                if ($n_type == 1 or $n_type == 2) {
                    $list['redirect_path'] = site_url('web_panel/Profile/list_properties');
                }
                if ($n_type == 3) {
                    $list['redirect_path'] = site_url('web_panel/Properties/favorite_properties');
                }
                if ($n_type == 4 or $n_type == 5 or $n_type == 6 or $n_type == 7 or $n_type == 9 or $n_type == 10 or $n_type == 11) {
                    $fk_job_post_id = base64_encode($list['fk_job_post_id']);
                    //$fk_service_cat_id = base64_encode($list['fk_service_cat_id']);
                    $fk_service_cat_id = base64_encode($list['fk_job_post_id']);
                    if ($user['user_type'] == 0 or $user['user_type'] == 3) {
                        $url_string = "job_detail";
                    }
                    if ($user['user_type'] == 1) {
                        $url_string = "provider_job_detail";
                    }
                    $list['redirect_path'] = site_url('web_panel/Job_post/' . $url_string . '?jhj=' . $fk_job_post_id . '');
                }
                if ($list['notification_type'] == 8) {
                    $user['user_type'] == 3 ? $url_string = "myrequest" : $url_string = "my_sent_request";
                    $list['redirect_path'] = site_url('web_panel/Servent_request/') . $url_string;
                }
                if ($list['notification_type'] == 12) {
                    $list['redirect_path'] = "javascript:void()";
                }
                $sender_details = $this->User_model->get_user(array('id' => $list['sender_id']));
                if (!empty($sender_details['profile_image'])) {
                    $list['sender_image'] = base_url('uploads/profile_images/') . $sender_details['profile_image'];
                } else {
                    $list['sender_image'] = base_url('uploads/profile_images/default.png');
                }
                $final[] = $list;
            }
        }
        $data['notifications'] = $final;
        $filter_data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $data['unread_count'] = $this->Notifications_model->count_notification($filter_data);
        $data['active_tab'] = 6;
        //pre($data['notifications']); die;
        $this->load->view('profile/profile', $data);
    }

    function ajax_update_notification_status() {
        if ($this->input->post()) {
            if ($this->input->post('id')) {
                $data['id'] = $this->input->post('id');
            }
            $data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
            //pre($data); die;
            $update = $this->Notifications_model->update_status($data);
            return true;
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

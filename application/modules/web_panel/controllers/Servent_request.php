<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servent_request extends MX_Controller {

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
        $this->load->model('Notifications_model');
        $this->load->model('Job_post_model');
        $this->load->helper('cookie');
        $this->load->helper('download');
        $this->load->helper('image_upload');
        $this->load->helper('number_to_short_number');

        if (empty($this->session->userdata['active_user_data'])) {
            $this->session->set_flashdata('without_login', "Please login first.");
            //redirect('web_panel/Home');
        }
    }

    public function index() {

       
        $filter = [];
        if (isset($_GET['ghvj'])) {
            $data['sub_id'] = $filter['sub_id'] = base64_decode($_GET['ghvj']);
            $data['main_sub'] = $sub = $this->Services_model->get_subcategory($filter);
            $filter['cat_id'] = $sub['cat_id'];
            $data['subs'] = $this->Services_model->get_subcategories_by_cat_id($filter);
            if ($sub['cat_id'] == 5) {
                if (isset($this->session->userdata['active_user_data'])) {
                    $filter['self_id'] = $this->session->userdata['active_user_data']['id'];
                }
                $sub_cat_filter['id'] = $data['sub_id'];
                $data['servents_cat_name'] = $this->Services_model->get_subcategories_name($sub_cat_filter);
                $data['cities'] = $this->get_city_list();

                $filter['fk_service_sub_cat_id'] = $data['sub_id'];
                if ($this->input->post()) {
                    //pre($this->input->post()); die;
                    $filter = $this->input->post();
                    $filter['fk_service_sub_cat_id'] = $data['sub_id'];
                    if (isset($this->session->userdata['active_user_data'])) {
                        $filter['self_id'] = $this->session->userdata['active_user_data']['id'];
                    }
                    if (!empty($filter['expected_salary'])) {
                        $salary = explode("-", $filter['expected_salary']);
                        $filter['expected_salary_min'] = $salary[0];
                        $filter['expected_salary_max'] = $salary[1];
                    }
                    if (!empty($filter['age'])) {
                        $age = explode("-", $filter['age']);
                        $filter['age_min'] = $age[0];
                        $filter['age_max'] = $age[1];
                    }
                    if (!empty($filter['experience'])) {
                        $experience = explode("-", $filter['experience']);
                        $filter['experience_min'] = $experience[0];
                        $filter['experience_max'] = $experience[1];
                    }
                    $this->session->set_flashdata('servent_filters',$filter);
                    $data['servents_list'] = $this->Servent_model->get_servent($filter);
                    
                } else {
                    $data['servents_list'] = $this->Servent_model->get_servent($filter);
                }
                // echo "<pre>";
                // print_r($data); 
                // die;
                $this->load->view('profile/servent_list', $data);
            }
            //pre($data); die();
        } else {
            redirect('web_panel/Home');
        }
    }
 
    public function servent_details() {
        //$id = base64_decode($this->uri->segment(4));
        $id = base64_decode($_GET['gdfgd']);
        $filter['id'] = $id;
        $data['servent_detail'] = $this->Servent_model->get_servent($filter);
              
        //pre($data['servent_detail']); die;
        if ($this->input->post()) {
            $input['fk_user_id'] = $this->session->userdata['active_user_data']['id'];
            $input['fk_servent_id'] = $data['servent_detail']['id'];
            //$input['request_cat'] = $data['servent_detail']['cat_name'];
            $input['fk_service_sub_cat_id'] = $data['servent_detail']['fk_service_sub_cat_id'];
            $input['service_sub_cat'] = $data['servent_detail']['sub_cat_name'];
            //pre($input); die;
            $inserted = $this->Servent_model->send_servent_request($input);
            //pre($inserted); die;
            if ($inserted) {
                $this->session->set_flashdata('request_send', "Requset has been sent");
            }
        }
        $this->load->view('profile/servent_details', $data);
        
    }
 
  

    public function my_sent_request() {
        $data['active_tab'] = 4;
        $filter['fk_user_id'] = $this->session->userdata['active_user_data']['id'];
        $data['request'] = $this->Servent_model->get_servent_request($filter);
        //pre($data['request']); die;
        $filter_data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $data['unread_count'] = $this->Notifications_model->count_notification($filter_data);
        $this->load->view('profile/profile', $data);
    }

    public function myrequest() {
        $data['active_tab'] = 5;
        $filter['fk_servent_id'] = $this->session->userdata['active_user_data']['id'];
        $filter['status'] = 1;
        $data['request'] = $this->Servent_model->get_servent_request($filter);
        //pre( $data['request']); die;
        $filter_data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $data['unread_count'] = $this->Notifications_model->count_notification($filter_data);
        $this->load->view('profile/profile', $data);
    }

    public function ajax_delete_servent_request() {
        $filter['id'] = $this->input->post('id');
        echo $this->Servent_model->delete_servent_request($filter);
    }

    public function ajax_update_servent_request() {
        $filter['id'] = $this->input->post('id');
        $filter['status'] = 2;
        echo $this->Servent_model->send_servent_request($filter);
    }

    public function get_city_list() {
        $this->db->select('name');
        $this->db->order_by('name','asc');
        $this->db->where('country_id', 16);
        $city_lists = $this->db->get('cities')->result_array();
        foreach ($city_lists as $city_list) {
            $final[] = $city_list['name'];
        }
        return $final;
    }

    //////////////////////////////////////////////////////////////

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

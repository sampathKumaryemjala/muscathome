<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servents extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Users_model');
        $this->load->model('Servent_model');
        $this->load->model('Notifications_model');
        //$this->form_validation->CI = & $this;
        if (empty($this->session->userdata['backend_user']['id'])) {
            redirect('admin_panel/Admin');
        }
    }

    public function index() {
        $document = array("user_type" => 3);
        $data = array('title' => 'Servents List', 'pageTitle' => 'Servents List');
        $data['users'] = $this->Users_model->get_users($document);
        //pre($data['users']); die;
        $this->load->view('provider/list_providers', $data);
    }

    public function view_requests() {
        $data = array('title' => 'Request List', 'pageTitle' => 'Request List');
        $document = [];
        $document['group_by'] = 1;
        $data['requests'] = $this->Servent_model->get_servent_request($document);
        //pre($data['requests']); die;
        $this->load->view('servents/view_requests', $data);
    }

    public function assign_servent_to_user() {
        $data = array('title' => 'User Request List', 'pageTitle' => 'User Request List');
        $document = [];
        if (isset($_GET['tyhg']) && isset($_GET['adfd'])) {
            $document['fk_user_id'] = base64_decode($_GET['tyhg']);
            $request_type = base64_decode($_GET['adfd']);
            $document['service_sub_cat'] = ucfirst($request_type);
            //pre($document); die;
            $data['requests'] = $this->Servent_model->get_servent_request($document);
            //pre($data['requests']); die;
            $this->load->view('servents/assign_servent', $data);
        } else {
            redirect('admin_panel/Servents/view_requests');
        }
    }

    public function ajax_update_servent_request_status() {
        $get_request['id'] = $data['id'] = $this->input->post('id');
        $data['status'] = $this->input->post('status');

        $update = $this->Servent_model->change_request_status($data);

        $request_detail = $this->Servent_model->get_servent_request($get_request);
        //pre($request_detail['user_profile']['name']); die;
        
        if ($data['status'] == 0) {
            //Notification for user //
            $n_data['sender_id'] = 0;
            $n_data['fk_user_id'] = $request_detail['fk_user_id'];
            $n_data['notification_type'] = 8;
            $n_data['description'] = $n_data['title'] = "Congratulation! " . ucfirst($request_detail['servent_profile']['name']) . " is assigned to you for " . ucfirst($request_detail['service_sub_cat']) . " request";
            $this->Notifications_model->create_notification($n_data);

            //Notification for servant //
            $n_data['sender_id'] = 0;
            $n_data['fk_user_id'] = $request_detail['fk_servent_id'];
            $n_data['notification_type'] = 8;
            $n_data['description'] = $n_data['title'] = "Congratulation! " . ucfirst($request_detail['user_profile']['name']) . " has requested you for " . ucfirst($request_detail['service_sub_cat']) . " service";
            $this->Notifications_model->create_notification($n_data);
        }
        if ($data['status'] == 1) {
            //Notification for user //
            $n_data['sender_id'] = 0;
            $n_data['fk_user_id'] = $request_detail['fk_user_id'];
            $n_data['notification_type'] = 8;
            $n_data['description'] = $n_data['title'] = "Sorry for inconvinence! we could not assign " . ucfirst($request_detail['servent_profile']['name']) . " to you for " . ucfirst($request_detail['service_sub_cat']) . " request";
            $this->Notifications_model->create_notification($n_data);

        }
        $this->db->where('id', $data['id']);
        $request = $this->db->get('servent_request')->row_array();

        if ($request['status'] == 0) {
            $status = 'Pending';
            $status_color = 'btn-warning';
        }
        if ($request['status'] == 1) {
            $status = 'Active';
            $status_color = 'btn-success';
        }
        if ($request['status'] == 2) {
            $status = 'Rejected';
            $status_color = 'btn-danger';
        }
        echo '<a href="javascript:void()" onclick="change_request_status(' . $request['id'] . ',' . $request['status'] . ')" class="btn btn-round btn-xs ' . $status_color . ' request_status">' . $status . '</a>';
    }

    public function servent_delete() {
        $id = base64_decode($_GET['tyhg']);
        if (isset($id)) {
            $this->db->where('id', $id);
            $result = $this->db->delete('servent_request');
        }
        if ($result) {
            redirect('admin_panel/Servents/assign_servent_to_user');
        }
    }

}

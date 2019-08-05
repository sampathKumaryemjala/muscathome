<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->helper('social_login_helper');
        $this->load->model('Properties_model');
        $this->load->helper('cookie');
        $this->load->helper('number_to_short_number');
    }

    public function index() {
        $filter = [];
        $data['active_tab'] = 2;
        if ($this->input->post()) {
            $filter['type'] = $data['active_tab'] = $this->input->post('tab_change_name');
        }
        $data['properties'] = $this->Properties_model->get_properties($filter);

        $this->load->view('properties/properties', $data);
    }

    public function for_sale_properties() {
        
        $social_auth = social_login_authUrl();
        $data['google_authUrl'] = $social_auth['google_authUrl'];
        $data['facebook_authUrl'] = $social_auth['facebook_authUrl'];
        $data['home_latitude'] = $data['home_longitude'] = "";
        if($this->session->flashdata('filter')){
            $filter = $this->session->flashdata('filter');
        }
        if(isset($filter['home_latitude']) && !empty($filter['home_latitude'])){
            $data['home_latitude'] = $filter['home_latitude'];
            $data['home_longitude'] = $filter['home_longitude'];
            unset($filter['home_latitude']);unset($filter['home_longitude']);
        }
        $filter['type'] = 0;
        if ($this->input->get()) {
            $property_type = base64_decode($_GET['gfgd']);
            $filter['property_type'] = $property_type;
        }
        
        if ($this->input->post()) { //pre($this->input->post()); die;
//            $data['serch_inputs'] = $this->input->post();
//            $data['keys'] = $this->input->post();
            $keyword = '';
            if($this->input->post('location_keyword')){
                $keyword = explode(',', $this->input->post('location_keyword'));
            }
            $filter = $this->input->post();
            if ($this->input->post('location_keyword')) { 
                $create_addr = $this->input->post('location_keyword');
                $address = str_replace(' ', '+', $create_addr);
                $json_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=AIzaSyAM6n4Yg0U4IcvZTx6qCF3dCPax9xjvnfk";
                $getlatlong = file_get_contents($json_url);
                $decodeaddrs = json_decode($getlatlong);
                $data['location'] = $decodeaddrs->results[0]->address_components[0]->short_name;
                
                if (!empty($decodeaddrs->results)) {
                    $data['home_latitude'] = $decodeaddrs->results[0]->geometry->location->lat;
                    $data['home_longitude'] = $decodeaddrs->results[0]->geometry->location->lng;
                } 
            }
            unset($filter['location_keyword']);unset($filter['submit']);
            $filter['type'] = 0;
            $filter['keyword'] = $keyword;
            
            if ($this->input->post('price_min')) {
                $p = explode(' ', $this->input->post('price_min'));
                $p = explode(',', $p[1]);
                $filter['price_min'] = implode('', $p);
            }
            if ($this->input->post('price_max')) {
                $p = explode(' ', $this->input->post('price_max'));
                $p = explode(',', $p[1]);
                $filter['price_max'] = implode('', $p);
            }
        }
        //pre($filter); die;
        $data['cities'] = $this->Properties_model->get_properties_cities();
        $data['states'] = $this->Properties_model->get_properties_states();
        $data['property_types'] = $this->Properties_model->get_property_types();
        $data['properties'] = $this->Properties_model->get_properties($filter);
        //pre($data['properties']); die;
        $data['property_type_count'] = $this->Properties_model->property_type_count();
        $data['type_count']['buy'] = $this->Properties_model->buy_count();
        $data['type_count']['rent'] = $this->Properties_model->rent_count();
        $data['featured'] = $this->Properties_model->featured_property();
        //pre($data['featured']); die;
        
        if(isset($_COOKIE['ci_session'])){
            $get_recent_property['user_ip'] = $_COOKIE['ci_session'];
        }
        $data['recent_views'] = $this->Properties_model->recent_views($get_recent_property);
        $this->load->view('properties/for_sale_properties', $data);
    }

    public function for_rent_properties() {
        $social_auth = social_login_authUrl();
        $data['google_authUrl'] = $social_auth['google_authUrl'];
        $data['facebook_authUrl'] = $social_auth['facebook_authUrl'];
        if($this->session->flashdata('filter')){
            $filter = $this->session->flashdata('filter');
        }
        if(isset($filter['home_latitude']) && !empty($filter['home_latitude'])){
            $data['home_latitude'] = $filter['home_latitude'];
            $data['home_longitude'] = $filter['home_longitude'];
            unset($filter['home_latitude']);unset($filter['home_longitude']);
        }
        $filter['type'] = 1;
        if ($this->input->get()) {
            $filter['property_type'] = base64_decode($_GET['gfgd']);
        }
        if ($this->input->post()) {
            $data['serch_inputs'] = $this->input->post();
            $data['keys'] = $this->input->post();
            $keyword = '';
            if($this->input->post('location_keyword')){
                $keyword = explode(',', $this->input->post('location_keyword'));
            }
            $filter = $this->input->post();
            if ($this->input->post('location_keyword')) { 
                $create_addr = $this->input->post('location_keyword');
                $address = str_replace(' ', '+', $create_addr);
                $json_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=AIzaSyAM6n4Yg0U4IcvZTx6qCF3dCPax9xjvnfk";
                $getlatlong = file_get_contents($json_url);
                $decodeaddrs = json_decode($getlatlong);
                $data['location'] = $decodeaddrs->results[0]->address_components[0]->short_name;
                
                if (!empty($decodeaddrs->results)) {
                    $data['home_latitude'] = $decodeaddrs->results[0]->geometry->location->lat;
                    $data['home_longitude'] = $decodeaddrs->results[0]->geometry->location->lng;
                } 
            }
            unset($filter['location_keyword']);unset($filter['submit']);
            $filter['type'] = 0;
            $filter['keyword'] = $keyword;
            
            if ($this->input->post('price_min')) {
                $p = explode(' ', $this->input->post('price_min'));
                $p = explode(',', $p[1]);
                $filter['price_min'] = implode('', $p);
            }
            if ($this->input->post('price_max')) {
                $p = explode(' ', $this->input->post('price_max'));
                $p = explode(',', $p[1]);
                $filter['price_max'] = implode('', $p);
            }
        }
        $data['properties'] = $this->Properties_model->get_properties($filter);
        $data['property_types'] = $this->Properties_model->get_property_types();
        $data['cities'] = $this->Properties_model->get_properties_cities();
        $data['states'] = $this->Properties_model->get_properties_states();
        
        $data['property_type_count'] = $this->Properties_model->property_type_count();
        $data['type_count']['buy'] = $this->Properties_model->buy_count();
        $data['type_count']['rent'] = $this->Properties_model->rent_count();
        $data['featured'] = $this->Properties_model->featured_property();
        
        $data['home_latitude'] = $data['home_longitude'] = "";
        
        //$client_details = json_decode(file_get_contents('https://ipinfo.io/geo'));
        //$get_recent_property['user_ip'] = $client_details->ip;
        if(isset($_COOKIE['ci_session'])){
            $get_recent_property['user_ip'] = $_COOKIE['ci_session'];
        }
        $data['recent_views'] = $this->Properties_model->recent_views($get_recent_property);
        //pre($data); die;
        $this->load->view('properties/for_rent_properties', $data);
    }

    public function favorite_properties() {
        //pre($this->session->userdata['active_user_data']['id']); die;
        $filter['fk_user_id'] = $this->session->userdata['active_user_data']['id'];
        $data['properties'] = $this->Properties_model->get_properties($filter);
        //pre($data['properties']);die;

        $data['property_type_count'] = $this->Properties_model->property_type_count();
        $data['type_count']['buy'] = $this->Properties_model->buy_count();
        $data['type_count']['rent'] = $this->Properties_model->rent_count();
        $data['featured'] = $this->Properties_model->featured_property();


        $data['properties'] = $this->Properties_model->get_properties($filter);
        $data['property_types'] = $this->Properties_model->get_property_types();
        $data['cities'] = $this->Properties_model->get_properties_cities();
        $data['states'] = $this->Properties_model->get_properties_states();

        $this->load->view('properties/favorite_properties', $data);
    }

    public function fav_to_property_ajax() {
        $inputs = $this->input->post();
        //pre($this->input->post()); die();

        if ($this->input->post('is_fav') == 0) {
            $this->Properties_model->fav_to_property($inputs);
        }if ($this->input->post('is_fav') == 1) {
            $this->Properties_model->unfav_to_property($inputs);
        }
        return true;
    }

    

    public function property_details() {

        $prop_id = $filter['id'] = base64_decode($_GET['prjkl']);
        if(isset($_COOKIE['ci_session'])){
            $user_unique_value = $_COOKIE['ci_session'];
        }
        $this->insert_recent_properties($user_unique_value, $prop_id);

        $list = $this->Properties_model->get_properties($filter);
        $data['property'] = $list[0];
        
        $data['property_type_count'] = $this->Properties_model->property_type_count();
        $data['type_count']['buy'] = $this->Properties_model->buy_count();
        $data['type_count']['rent'] = $this->Properties_model->rent_count();
        $data['featured'] = $this->Properties_model->featured_property();

        
        $filter_for_similar['id'] = $list[0]['id'];
        $filter_for_similar['city'] = $list[0]['city'];
        $filter_for_similar['property_type'] = $list[0]['property_type'];
        $data['similiar_properties'] = $this->Properties_model->similiar_properties($filter_for_similar);
        $offer_property['id'] = $list[0]['id'];
        $data['offer_on_property'] = $this->offer_on_property($offer_property);
        //pre($data); die;
        $this->load->view('properties/property_details', $data);
    }

    public function offer_on_property($document) {
        if (isset($document['id'])) {
            $this->db->where('fk_property_id', $document['id']);
        }
        else{
            redirect('web_panel/Home');
        }
        $property = $this->db->get('offers_to_properties')->row_array();
        $this->db->select('title,discount');
        $this->db->where('id', $property['fk_offer_id']);
        $offer_on_property = $this->db->get('offers')->row_array();
        return $offer_on_property;
    }

    public function ajax_delete_properties() { // 
        if ($this->input->post()) {
            //pre($this->input->post('id')); die;
            $this->db->where('id', $this->input->post('id'));
            $this->db->delete('properties');
            echo json_encode(array('status' => true, 'message' => 'Delete successfuly'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Not Deleted'));
        }
    }

    public function user_contact_info() { // ajax form submit on details page
        //pre($this->input->post()); die();
        if ($this->input->post()) {
            if ($this->input->post('name') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter your name'));
                die;
            }

            if ($this->input->post('phone') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter phone'));
                die;
            }
            if ($this->input->post('email') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter email'));
                die;
            }
            if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                echo json_encode(array('status' => false, 'message' => 'Please enter an valide email'));
                die;
            }
            if ($this->input->post('message') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter message'));
                die;
            }
            //pre($this->input->post()); die();
            $this->Properties_model->user_contact_info($this->input->post());
            echo json_encode(array('status' => true, 'message' => 'Thankyou! We will contact you soon'));
            die;
        } else {
            echo json_encode(array('status' => false, 'message' => 'Could Not send Message'));
            die;
        }
    }

    public function emi_calculator() { // ajax form submit on details page
        //pre($this->input->post()); die();
        if ($this->input->post()) {
            if ($this->input->post('property_price') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter Property Price'));
                die;
            }
            if ($this->input->post('deposit') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter Deposit amount'));
                die;
            }
            if ($this->input->post('loan_amount') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter Loan amount'));
                die;
            }
            if ($this->input->post('interest_rate') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter Interest rate'));
                die;
            }
            if ($this->input->post('loan_term') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter Loan term'));
                die;
            }
        } else {
            echo json_encode(array('status' => false, 'message' => 'Could Not Calculate EMI'));
            die;
        }
    }

    public function ajax_properties_filters() {

        $input = $this->input->post();
        echo json_encode(array('status' => true, 'message' => 'ok'));
    }

    function insert_recent_properties($ip, $id) {
        $set_flag = 0;
        $total = 0;
        $insert_data = array(
            "fk_property_id" => $id,
            "user_ip" => $ip
        );
        $insert_data['create_date'] = date('Y-m-d H:i:s');
        $get_recents = $this->db->get('recent_properties')->result_array();
        if (!empty($get_recents)) {
            foreach ($get_recents as $get_recent) {
                if ($get_recent['user_ip'] == $ip) {
                    $this->db->select('COUNT(id) as total');
                    $this->db->where('user_ip', $ip);
                    $user_recents = $this->db->get('recent_properties')->result_array();
                    $total = $user_recents[0]['total'];
                }
                if ($get_recent['user_ip'] == $ip && $get_recent['fk_property_id'] == $id) {
                    $set_flag = 1;
                }
            }
            if ($set_flag != 1 && $total <= 3) {
                $this->db->insert('recent_properties', $insert_data);
            }
            if ($set_flag != 1 && $total == 4) {

                $this->db->select('id as delete_id');
                $this->db->limit(1);
                $this->db->order_by('id', 'asc');
                $this->db->where('user_ip', $ip);
                $get_user_record = $this->db->get('recent_properties')->result_array();
                $delete_id = $get_user_record[0]['delete_id'];

                $this->db->where('id', $delete_id);
                $this->db->where('user_ip', $ip);
                $this->db->delete('recent_properties');

                $this->db->insert('recent_properties', $insert_data);
            }
        } else {
            $this->db->insert('recent_properties', $insert_data);
        }
    }

    public function ajax_sort_properties() {
        
        if ($this->input->post()) { //pre($_POST); die;
            $filter = $this->input->post();
            
            if ($this->input->post('price_min')) {
                $p = explode(' ', $this->input->post('price_min'));
                $p = explode(',', $p[1]);
                $filter['price_min'] = implode('', $p);
            }
            if ($this->input->post('price_max')) {
                $p = explode(' ', $this->input->post('price_max'));
                $p = explode(',', $p[1]);
                $filter['price_max'] = implode('', $p);
            }
        }
        $data['properties'] = $this->Properties_model->get_properties($filter);
        $this->load->view('properties/ajax_sort_properties', $data);
    }
     
    

}



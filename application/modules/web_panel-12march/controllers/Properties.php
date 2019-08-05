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
        $this->load->model('User_model');
        $this->load->helper('cookie');
        $this->load->helper('number_to_short_number');
        $this->load->library('pagination');
        $this->load->library('email');
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
        if ($this->session->userdata('filter')) {
            $filter = $this->session->userdata('filter');
        }
        if ($this->session->userdata('post_data')) {
            $data['serch_inputs'] = $this->session->userdata('post_data');
        }
        if (isset($filter['home_latitude']) && !empty($filter['home_latitude'])) {
            $data['home_latitude'] = $filter['home_latitude'];
            $data['home_longitude'] = $filter['home_longitude'];
            unset($filter['home_latitude']);
            unset($filter['home_longitude']);
        }
        $filter['type'] = 0;
        if ($this->input->get()) {
            $property_type = base64_decode($_GET['gfgd']);
            $filter['property_type'] = $property_type;
        }

        if ($this->input->post()) { //pre($this->input->post()); die;
            $data['serch_inputs'] = $this->input->post();
            $data['keys'] = $this->input->post();
            // pre($data['serch_inputs']); die;
            $keyword = '';
            if ($this->input->post('location_keyword')) {
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
            unset($filter['location_keyword']);
            unset($filter['submit']);
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
        $data['property_types'] = $this->Properties_model->get_property_types();

//        if (isset($data['serch_inputs'])) {
//            
//        } else {
//            $var = $filter;
//            $var['page'] = "for_sale_properties";
//            $config = $this->pagination_html($var);
//            $this->pagination->initialize($config);
//            if ($this->uri->segment(4)) {
//                $page = ($this->uri->segment(4));
//                $page = ($page - 1) * 10;
//            } else {
//                $page = 0;
//            }
//            $data['page'] = $filter["page"] = $page;
//            $filter["per_page"] = $config['per_page'];
//            $str_links = $this->pagination->create_links();
//            $data["links"] = explode('&nbsp;', $str_links);
//            $data["pagination_show"] = 1;
//            //pre($filter); die;
//        }


        $data['properties'] = $this->Properties_model->get_properties($filter);
        //pre($data['properties']); die;
        $data['property_type_count'] = $this->Properties_model->property_type_count();
        $data['type_count']['buy'] = $this->Properties_model->buy_count();
        $data['type_count']['rent'] = $this->Properties_model->rent_count();
        $data['featured'] = $this->Properties_model->featured_property();
        //pre($data['featured']); die;

        if (isset($_COOKIE['ci_session'])) {
            $get_recent_property['user_ip'] = $_COOKIE['ci_session'];
            $data['recent_views'] = $this->Properties_model->recent_views($get_recent_property);
        }

        //pre($data); die;
        $this->load->view('properties/for_sale_properties', $data);
    }

    public function for_rent_properties() {
        $social_auth = social_login_authUrl();
        $data['google_authUrl'] = $social_auth['google_authUrl'];
        $data['facebook_authUrl'] = $social_auth['facebook_authUrl'];
        $data['home_latitude'] = $data['home_longitude'] = "";
        if ($this->session->userdata('filter')) {
            $filter = $this->session->userdata('filter');
        }
        if ($this->session->userdata('post_data')) {
            $data['serch_inputs'] = $this->session->userdata('post_data');
        }
        if (isset($filter['home_latitude']) && !empty($filter['home_latitude'])) {
            $data['home_latitude'] = $filter['home_latitude'];
            $data['home_longitude'] = $filter['home_longitude'];
            unset($filter['home_latitude']);
            unset($filter['home_longitude']);
        }
        $filter['type'] = 1;
        if ($this->input->get()) {
            $property_type = base64_decode($_GET['gfgd']);
            $filter['property_type'] = $property_type;
        }
        if ($this->input->post()) {
            $data['serch_inputs'] = $this->input->post();
            $data['keys'] = $this->input->post();
            $keyword = '';
            if ($this->input->post('location_keyword')) {
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
            unset($filter['location_keyword']);
            unset($filter['submit']);
            $filter['type'] = 1;
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
//        if (isset($data['serch_inputs'])) {
//            
//        } else {
//            $var = $filter;
//            $var['page'] = "for_sale_properties";
//            $config = $this->pagination_html($var);
//            $this->pagination->initialize($config);
//            if ($this->uri->segment(4)) {
//                $page = ($this->uri->segment(4));
//                $page = ($page - 1) * 10;
//            } else {
//                $page = 0;
//            }
//            $data['page'] = $filter["page"] = $page;
//            $filter["per_page"] = $config['per_page'];
//            $str_links = $this->pagination->create_links();
//            $data["links"] = explode('&nbsp;', $str_links);
//            $data["pagination_show"] = 1;
//            //pre($filter); die;
//        }
        $data['properties'] = $this->Properties_model->get_properties($filter);


        $data['property_types'] = $this->Properties_model->get_property_types();

        $data['property_type_count'] = $this->Properties_model->property_type_count();
        $data['type_count']['buy'] = $this->Properties_model->buy_count();
        $data['type_count']['rent'] = $this->Properties_model->rent_count();
        $data['featured'] = $this->Properties_model->featured_property();

        $data['home_latitude'] = $data['home_longitude'] = "";

        //$client_details = json_decode(file_get_contents('https://ipinfo.io/geo'));
        //$get_recent_property['user_ip'] = $client_details->ip;
        if (isset($_COOKIE['ci_session']) && !empty($_COOKIE['ci_session'])) {
            $get_recent_property['user_ip'] = $_COOKIE['ci_session'];
            $data['recent_views'] = $this->Properties_model->recent_views($get_recent_property);
        }

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

        if (isset($_GET['hhg'])) {
            $filter['fk_agent_id'] = base64_decode($_GET['hhg']);
        }
        $prop_id = $filter['id'] = base64_decode($_GET['prjkl']);
        //pre($prop_id); die;
        if (isset($_COOKIE['ci_session'])) {
            $user_unique_value = $_COOKIE['ci_session'];
        }
        $this->insert_recent_properties($user_unique_value, $prop_id);
        //pre($filter); die;
        $list = $this->Properties_model->get_properties($filter);
        //pre($list); die;
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
        } else {
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

    public function user_property_enquiry() { // ajax form submit on details page
        //pre($this->input->post()); die();
        if ($this->input->post()) {
            $inputs = $this->input->post();
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
                echo json_encode(array('status' => false, 'message' => 'Please enter an valid email'));
                die;
            }
            if ($this->input->post('message') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter message'));
                die;
            }
            $property_id = $this->input->post('property_id');
            unset($inputs['property_id']);
            //pre($this->input->post()); die();
            $this->Properties_model->user_contact_info($inputs);

            // Email for Agent/user //
            $prop_id = $property_id;
            $prop_id = base64_encode($prop_id);
            $email_data['sender'] = '';
            $property_url = "https://muscathome.com/index.php/web_panel/Properties/property_details?prjkl=" . $prop_id;
            $filier['id'] = $this->input->post('fk_user_id');
            $user = $this->User_model->get_user($filier);
            $email_data['email'] = $user['email'];
            $email_data['sub'] = 'Enquiry about your property';
            $email_data['msg'] = $this->input->post('message') . "<br><br>Please <a href=" . $property_url . ">click</a> to view property";
            $email_data['sender']['mobile'] = $this->input->post('phone');
            $email_data['sender']['email'] = $this->input->post('email');

            $this->sendmail($email_data);

            echo json_encode(array('status' => true, 'message' => 'Thankyou! We will contact you soon'));
            die;
        } else {
            echo json_encode(array('status' => false, 'message' => 'Could Not send Message'));
            die;
        }
    }

    public function user_contact_info() { // ajax form submit on details page
        //pre($this->input->post()); die();
        if ($this->input->post()) {
            $inputs = $this->input->post();
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
                echo json_encode(array('status' => false, 'message' => 'Please enter an valid email'));
                die;
            }
            if ($this->input->post('message') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter message'));
                die;
            }

            //pre($this->input->post()); die();
            $this->Properties_model->user_contact_info($inputs);

            // Email for Agent/user //
            $email_data['sender'] = '';
            $filier['id'] = $this->input->post('fk_user_id');
            $user = $this->User_model->get_user($filier);
            $email_data['email'] = $user['email'];
            $email_data['sub'] = 'Enquiry';
            $email_data['msg'] = $this->input->post('message');
            $email_data['sender']['mobile'] = $this->input->post('phone');
            $email_data['sender']['email'] = $this->input->post('email');

            $this->sendmail($email_data);

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
            if ($this->input->post('keyword')) {
                $keyword = explode(',', $this->input->post('keyword'));
                $filter['keyword'] = $keyword;
            }

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
//        $var = $filter;
//        $var['page'] = "for_sale_properties";
//        $config = $this->pagination_html($var);
//        $this->pagination->initialize($config);
//        if ($this->uri->segment(4)) {
//            $page = ($this->uri->segment(4));
//            $page = ($page - 1) * 10;
//        } else {
//            $page = 0;
//        }
//        $data['page'] = $filter["page"] = $page;
//        $filter["per_page"] = $config['per_page'];
        //pre($filter); die;
        
       
        $data['properties'] = $this->Properties_model->get_properties($filter);
        //pre($data['properties']); die;
//        $str_links = $this->pagination->create_links();
//        $data["links"] = explode('&nbsp;', $str_links);
        //pre($data['properties']); die;
        $this->load->view('properties/ajax_sort_properties', $data);
    }

    public function record_count($document) { //pre($document); die;
        $prop = $this->Properties_model->get_properties($document);
        $count = count($prop);
        return $count;
    }

    public function pagination_html($document) { //pre($document);die;
        $config = array();
        $config["base_url"] = base_url('index.php/web_panel/Properties/') . $document['page'];
        unset($document['page']);
        $filter['type'] = $document['type'];
        $total_row = $this->record_count($document);
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        //$config['display_pages'] = FALSE;
        $config['use_page_numbers'] = TRUE;
        //$config['num_links'] = 3;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'PREV';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        return $config;
    }

    function sendmail($document) {
        /* Mails for job post */
        $this->email->from(ADMIN_EMAIL, 'Muscat Home');
        $this->email->to($document['email']);
        //$this->email->cc('city@another-example.com');
        $this->email->subject($document['sub']);
        $this->email->message($this->load->view('email/property_enquiry', $document, True));
        $this->email->set_mailtype("html");
        $this->email->send();
    }

}

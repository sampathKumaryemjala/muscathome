<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->model('Home_model');
        $this->load->model('Properties_model');
        $this->load->model('Services_model');
        $this->load->model('User_model');
        $this->load->model('Offer_model');
        $this->load->helper('social_login_helper');
        $this->load->helper('cookie');
        $this->load->helper('custom');
        $this->load->helper('common');
        $this->load->helper('number_to_short_number');

    }

    public function index() {
        //pre($this->session); die;
        delete_expired_offers();

        $social_auth = social_login_authUrl();
        $data['google_authUrl'] = $social_auth['google_authUrl'];
        $data['facebook_authUrl'] = $social_auth['facebook_authUrl'];

        if ($this->input->post('type')) { 
            $post_data = $this->input->post();
            $data['home_latitude'] = $data['home_longitude'] = "";
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
                //pre($decodeaddrs->results[0]->geometry->location->lat);die;
                $filter['location'] = $decodeaddrs->results[0]->address_components[0]->short_name;
                
                if (!empty($decodeaddrs->results)) {
                    //pre($decodeaddrs->results); die;
                    $filter['home_latitude'] = $decodeaddrs->results[0]->geometry->location->lat;
                    $filter['home_longitude'] = $decodeaddrs->results[0]->geometry->location->lng;
                } 
            }
            unset($filter['location_keyword']);unset($filter['type']);
            $filter['keyword'] = $keyword;
            if ($this->input->post('type') == 1) {
                $this->session->set_userdata('filter',$filter);
                $this->session->set_userdata('post_data',$post_data);
                redirect("web_panel/properties/for_sale_properties"); 
            }
            if ($this->input->post('type') == 2) {
                $this->session->set_userdata('filter',$filter);
                $this->session->set_userdata('post_data',$post_data);
                redirect("web_panel/properties/for_rent_properties"); 
            }
        } else {
            $data['properties_sale'] = $this->Properties_model->get_properties(array("type" => 0,"limit"=>9));
            $data['properties_rent'] = $this->Properties_model->get_properties(array("type" => 1,"limit"=>6));
            $data['agents'] = $this->User_model->get_agent();
            $data['property_types'] = $this->Properties_model->get_property_types();
            $offer = array();
            $offer['limit'] = 2;
            $data['offers'] = $this->Offer_model->get_offers($offer);
            //pre($data['agents']); die;
            $this->load->view('home', $data);
        }
    }

    public function terms() {
        $data['language'] = "language";
        $this->load->view('terms',$data);
    }

    public function privacy() {
        $data['language'] = "language";
        $this->load->view('privacy',$data);
    }

    public function about() {
        $data['language'] = "language";
        $this->load->view('about_us',$data);
    }
    
    public function news() {
        $data['language'] = "language";
        $this->load->view('news',$data);
    }
    public function news_details() {
        $data['language'] = "language";
        $this->load->view('single_news',$data);
    }
    
    public function faq() {
        $data['language'] = "language";
        $this->load->view('faq',$data);
    }

    public function change_language() {
        $this->session->set_userdata(["lang" => 0]);
        if ($this->input->post('lang') == 0) {
            $this->session->set_userdata(["lang" => 1]);
        }
        //pre($this->session->userdata); die;
        echo "true";
    }

    public function ajax_subscriber() {
        if ($this->input->post('email') == '') {
            echo json_encode(array('status' => false, 'message' => 'Please enter an email'));
            die;
        }
        if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array('status' => false, 'message' => 'Please enter a valid email'));
            die;
        }

        $this->db->Where('email', $this->input->post('email'));
        $result = $this->db->get('subscriber_user')->row_array();

        if ($result['email'] == $this->input->post('email')) {
            echo json_encode(array('status' => false, 'message' => 'This email already subscribed!'));
            die;
        }
        $insert_data = array(
            'email' => $this->input->post('email'),
            'create_date' => date("Y-m-d h:i:s")
        );

        $this->db->insert('subscriber_user', $insert_data);
        
        // Confirmation Mail for subscriber //
        $subject = "Thankyou For Subscribing";
        $email_data['msg'] = "Thank you for subscribing muscathome.com.";
        $this->email->from(INFO_EMAIL, 'Muscat Home');
        $this->email->to($this->input->post('email'));
        //$this->email->cc($emails);
        $this->email->subject($subject);
        $this->email->message($this->load->view('email/agent_regsitration', $email_data, True));
        $this->email->set_mailtype("html");
        $send = $this->email->send();
        
        
        echo json_encode(array('status' => true, 'message' => 'Registred succesfully!'));
    }

}

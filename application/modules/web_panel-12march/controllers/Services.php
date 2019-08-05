<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->helper('social_login_helper');
        $this->load->model('Properties_model');
        $this->load->helper('cookie');
    }

    public function index() {
//        $filter = [];
//        $data['active_tab'] = 2;
//        if ($this->input->post()) {
//            $filter['type'] = $data['active_tab'] = $this->input->post('tab_change_name');
//        }
//        $data['properties'] = $this->Properties_model->get_properties($filter);

        $this->load->view('services/services', $data);
    }
    
   
    


///////////////////////////////////////////////////////////
    public function for_sale_properties() {
        //echo $this->session->userdata('active_backend_user_id');die;
        
        //pre($this->session); die();
        $social_auth = social_login_authUrl();
        $data['google_authUrl'] = $social_auth['google_authUrl'];
        $data['facebook_authUrl'] = $social_auth['facebook_authUrl'];
        $filter['type'] = 0;
        if ($this->input->post()) {
           
            $filter = $this->input->post();
            $filter['type'] = 0;

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
        $data['cities'] = $this->Properties_model->get_properties_cities();
        $data['states'] = $this->Properties_model->get_properties_states();
        $data['properties'] = $this->Properties_model->get_properties($filter);
        $data['property_types'] = $this->Properties_model->get_property_types();
       // pre($data['properties']); die();
        
        //$data['property_name'] = $this->Properties_model->get_properties($filter);
        //$data['city'] = $this->Properties_model->get_properties($filter);
        //$data['state'] = $this->Properties_model->get_properties($filter);
        $this->load->view('properties/for_sale_properties', $data);
    }

    public function for_rent_properties() {
        $social_auth = social_login_authUrl();
        $data['google_authUrl'] = $social_auth['google_authUrl'];
        $data['facebook_authUrl'] = $social_auth['facebook_authUrl'];
        $filter['type'] = 1;
        if ($this->input->post()) {
            //pre($this->input->post());
            $filter = $this->input->post();
            $filter['type'] = 1;

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
        $this->load->view('properties/for_rent_properties', $data);
    }
    
    
    public function favorite_properties() {
        $filter['fk_user_id']   = $this->session->active_backend_user_id;        
        $data['properties']     = $this->Properties_model->get_properties($filter);       
        $this->load->view('properties/favorite_properties', $data);
    }
    
    public function fav_to_property_ajax() {
        $inputs = $this->input->post();
        //pre($this->input->post()); die();
        unset($inputs['is_fav']);
        if($this->input->post('is_fav')==0){
             $this->Properties_model->fav_to_property($inputs); 
         }else{
             $this->Properties_model->unfav_to_property($inputs); 
         }         
         return true;
    }
    
    public function property_details() {
        
        $filter['id']   = base64_decode($_GET['prjkl']);
        //echo $filter['id']; die();
        //$filter['fk_user_id']   = $this->session->active_backend_user_id;        
        $list = $this->Properties_model->get_properties($filter);  
        $data['property']     = $list[0];
        $this->load->view('properties/property_details', $data);
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
                    echo json_encode(array('status'=>false,'message'=>'Please enter an valide email'));die;
                }
            if ($this->input->post('message') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter message'));
                die;
            }
            //pre($this->input->post()); die();
           $this->Properties_model->user_contact_info($this->input->post()); 
           echo json_encode(array('status' => true, 'message' => 'Thankyou! We will contact you soon'));
                die;
            
         }
            else {
                echo json_encode(array('status' => false, 'message' => 'Could Not send Message'));
                die;
            }
         
        
    }
    
    
    public function emi_calculator() { // ajax form submit on details page
        //pre($this->input->post()); die();
         if ($this->input->post()) {
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
         }
            else {
                echo json_encode(array('status' => false, 'message' => 'Could Not Calculate EMI'));
                die;
            }
         
        
    }
 
    public function order_properties() {
                        
                if ($this->input->post('sort_properties') == 'a_price') {
            $this->Properties_model->get_properties($filter);
            die;
        }
    }
    
    public function ajax_get_subcategory() {

            $result = [];
            $cat = $this->input->post('category');
            //$cat = 2;
            if($cat==1){
                $this->db->where('fk_service_cat_id','1');
                $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
            }
            if($cat==2){
                $this->db->where('fk_service_cat_id','2');
                $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
            }
            if($cat==3){
                $this->db->where('fk_service_cat_id','3');
                $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
            }
            if($cat==4){
                $this->db->where('fk_service_cat_id','4');
                $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
            }
            //pre($result);
        $this->load->view('services/ajax_get_subcategory', $result);
    }

}
/////////////////////////////////////////////////

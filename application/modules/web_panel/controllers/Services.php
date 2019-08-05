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

    

    public function ajax_get_category() {
        $selected_option = $this->input->post('selected_option');
        if($selected_option == 2){
            $this->db->where('id',5);
        }
        if($selected_option == 1){
            $this->db->where_not_in('id',5);
        }
        $ser_category = $this->db->get('re_service_category')->result_array();
        echo '<option value="0" >Select category</option>';
        foreach ($ser_category as $value) {
            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
    }

    public function ajax_get_subcategory() {

        $result = [];
        $cat = $this->input->post('category');
        
        //$cat = 2;
        if ($cat == 1) {
            $this->db->where('fk_service_cat_id', '1');
            $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
        }
        if ($cat == 2) {
            $this->db->where('fk_service_cat_id', '2');
            $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
        }
        if ($cat == 3) {
            $this->db->where('fk_service_cat_id', '3');
            $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
        }
        if ($cat == 4) {
            $this->db->where('fk_service_cat_id', '4');
            $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
        }
        if ($cat == 5) {
            $this->db->where('fk_service_cat_id', '5');
            $result['subcategories'] = $this->db->get('service_sub_category')->result_array();
        }
        //pre($result);
        $this->load->view('services/ajax_get_subcategory', $result);
    }

}

/////////////////////////////////////////////////

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

    function __construct() {


        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Properties_model');
        $this->load->model('Offer_model');
        $this->load->helper('image_upload_helper');
        if (empty($this->session->userdata['backend_user']['id'])) {
            redirect('admin_panel/Admin');
        }
    }

    function create_offer() {
        $document = [];
        $data = array('title' => 'Create offer', 'pageTitle' => 'Create offer');
        if (isset($_GET['kjh']) && !empty($_GET['kjh'])) {
            $data = array('title' => 'Edit Offer', 'pageTitle' => 'Edit Offer');
            $data['edit_offer'] = $this->Offer_model->get_offers(array('id' => $_GET['kjh']));
        }
        if ($this->input->post()) {
            $inputs = $this->input->post();

            //pre($inputs); pre($_FILES);die;
            
            $s_date = implode('-', array_reverse(explode('/', $inputs['start_date'])));
            $s_date_format = explode('-', $s_date);
            $start_date = $s_date_format[0].'-'.$s_date_format[2].'-'.$s_date_format[1];
            $inputs['start_date'] = $start_date;
            
            $e_date = implode('-', array_reverse(explode('/', $inputs['end_date'])));
            $e_date_format = explode('-', $e_date);
            $end_date = $e_date_format[0].'-'.$e_date_format[2].'-'.$e_date_format[1];
            $inputs['end_date'] = $end_date;
            
            if($_FILES['banner_image']['error'][0]== 0){
                $key = $_FILES['banner_image'];
                $path = getcwd().'/uploads/properties/offers/';
                $file_uploaded = upload_multiple_images_for_website($key, $path);
            }
            //pre($file_uploaded); die;
            if (isset($file_uploaded)) {
                $inputs['banner_image'] = $file_uploaded[0];
            }
            //pre($inputs); die;
            $offers = $this->Offer_model->create_offer($inputs);
            if ($offers) {
                redirect('admin_panel/Offers/offers_list');
            }
        }
        $this->load->view('offers/create_offer', $data);
    }

    function offers_list() {
        $document = [];
        $data = array('title' => 'Offers List', 'pageTitle' => 'Offers List');
        if ($this->session->userdata['backend_user']['user_type'] == 2) {
            $document['id'] = $this->session->userdata['backend_user']['id'];
        }
        //pre($document);die;
        if ($_POST) {
            $data['offer_status'] = $document['offer_status'] = $_POST['offer_status'];
        }
        $data['offers'] = $this->Offer_model->get_offers($document);
        //pre($data);die;
        $this->load->view('offers/offers_list', $data);
    }

    function create_promo_code() {
        $data = array('title' => 'Create promocode', 'pageTitle' => 'Create promocode');
        if (isset($_GET['kjh']) && !empty($_GET['kjh'])) {
            $data = array('title' => 'Edit promocode', 'pageTitle' => 'Edit promocode');
            $data['p_code'] = $this->Offer_model->get_promocodes(array('id' => $_GET['kjh']));
        }
        if ($this->input->post()) { //pre($this->input->post()); die;
            $inputs = $this->input->post();
            $inputs['code'] = strtoupper($this->input->post('code'));
            
            if ($get_promo_list['code'] != $this->input->post('code')) {
                $promo = $this->Offer_model->create_promocode($inputs);
                if ($promo) {
                    redirect('admin_panel/Offers/promo_codes_list');
                }
            }
        }
        //pre($data); die;
        $this->load->view('offers/create_promo_code', $data);
    }

    function promo_codes_list() {
        $document = [];
        $data = array('title' => 'Promocodes List', 'pageTitle' => 'Promocodes List');
        if ($this->session->userdata['backend_user']['user_type'] == 2) {
            $document['id'] = $this->session->userdata['backend_user']['id'];
        }
        //pre($document);die;
        $data['promo'] = $this->Offer_model->get_promocodes($document);
        //pre($data);die;
        $this->load->view('offers/promo_codes_list', $data);
    }

    function offer_properties() {
        $document = [];
        $data = array('title' => 'Assign Offer', 'pageTitle' => 'Assign Offer');
        if ($this->session->userdata['backend_user']['user_type'] == 2) {
            $document['id'] = $this->session->userdata['backend_user']['id'];
        }
        $data['offers'] = $this->Offer_model->get_offers($document);
        $document['status'] = 1;
        $properties = $this->Properties_model->get_properties($document);
        if ($properties) {
            foreach ($properties as $property) {
                $property['have_offer'] = 0;
                $have = $this->Properties_model->chech_property_have_any_offer($property);
                if ($have) {
                    $property['have_offer'] = $have['fk_offer_id'];
                }
                $data['properties'][] = $property;
            }
        }

        if ($this->input->post('offer_id')) {
            $data['offer_properties'] = $this->db->get('offers_to_properties')->result_array();
            echo json_encode(array('status' => true, 'message' => 'Offer properties'));
            $this->load->view('offers/offer_to_property', $data);
        }
        //pre($properties);die;
        $this->load->view('offers/offer_to_property', $data);
    }

    function add_offer_to_property_ajax() {
        if ($this->input->post()) {
            if ($this->input->post('fk_offer_id') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please select offer'));
                die;
            }
            if ($this->input->post('fk_property_id') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please select property'));
                die;
            }

            if ($this->input->post('fk_offer_id') == '0') {
                $this->db->Where('fk_property_id', $this->input->post('fk_property_id'));
                $result = $this->db->get('offers_to_properties')->row_array();
                if ($result['fk_property_id'] == $this->input->post('fk_property_id')) {
                    $this->db->Where('fk_offer_id', $result['fk_offer_id']);
                    $this->db->Where('fk_property_id', $result['fk_property_id']);
                    //pre($result['fk_property_id']);die;
                    $result = $this->db->delete('offers_to_properties');
                    echo json_encode(array('status' => true, 'message' => 'Offer removed successfuly'));
                }
            }
            if ($this->input->post('fk_offer_id')) {
                $this->db->Where('fk_property_id', $this->input->post('fk_property_id'));
                $result = $this->db->get('offers_to_properties')->row_array();
                if ($result['fk_property_id'] == $this->input->post('fk_property_id')) {
                    $set = array('fk_offer_id'=>$this->input->post('fk_offer_id'),'fk_property_id'=>$this->input->post('fk_property_id'));
                    $set['create_date'] = date('Y-m-d H:h:s');
                    $this->db->Where('fk_property_id', $this->input->post('fk_property_id'));
                    $result = $this->db->update('offers_to_properties',$set);
                    echo json_encode(array('status' => true, 'message' => 'Offer updated successfuly'));
                } else {
                    $inputs = $this->input->post();
                    $inputs['create_date'] = date('Y-m-d H:h:s');
                    $result = $this->db->insert('offers_to_properties', $inputs);
                    echo json_encode(array('status' => true, 'message' => 'Offer added successfuly'));
                }
            }
        }
    }

    function remove_offer_to_property_ajax() {
        if ($this->input->post()) {
            if ($this->input->post('fk_offer_id') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please select offer'));
                die;
            }
            if ($this->input->post('fk_offer_id') == '0') {
                echo json_encode(array('status' => false, 'message' => 'Please select offer'));
                die;
            }
            if ($this->input->post('fk_property_id') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please select property'));
                die;
            }
            $this->db->Where('fk_offer_id', $this->input->post('fk_offer_id'));
            $this->db->Where('fk_property_id', $this->input->post('fk_property_id'));
            $result = $this->db->delete('offers_to_properties');
            echo json_encode(array('status' => true, 'message' => 'Offer removed successfuly'));
        }
    }

    function get_properties_ajax() {
        //echo("hreloo");
        $document = [];

        $data = array('title' => 'Property List', 'pageTitle' => 'Property List');
        $data['users'] = $this->Properties_model->get_properties($document);
        //$this->load->view('properties/properties_list', $data);
        echo json_encode($data['users']);
    }

    public function change_status() {
        $id = base64_decode($_GET['tyhg']);
        $result = $this->Properties_model->update_property_status(['id' => $id]);
        if ($result) {
            redirect('admin_panel/Properties/get_properties');
        }
    }

    public function offers_delete() {
        if ($_GET['tyhg']) {
            $id = base64_decode($_GET['tyhg']);
            $this->db->where('id', $id);
            $this->db->delete('offers');
        }
        redirect('admin_panel/Offers/offers_list');
    }

    public function promo_codes_delete() {
        if ($_GET['tyhg']) {
            $id = base64_decode($_GET['tyhg']);
            $this->db->where('id', $id);
            $this->db->delete('promo_codes');
        }
        redirect('admin_panel/Offers/promo_codes_list');
    }

    public function ajax_property_list() {
        $this->db->where('properties.id', $this->input->post('id'));
//        $this->db->join('property_images', 'property_images.fk_property_id = properties.id');
        $results['users'] = $this->db->get('properties')->row_array();
        foreach ($results as $result) {
            $this->db->where('fk_property_id', $this->input->post('id'));
            $images = $this->db->get('property_images')->result_array();
            $results['users']['images'] = $images;
        }
        //pre($results);die;

        $this->load->view('properties/ajax_property_list', $results);
    }

    public function ajax_generate_promocode() {
        $word = array_merge(range('0', '9'), range('A', 'Z'));
        shuffle($word);
        $promocode = substr(implode($word), 0, 10);
        $this->db->Where('code', $promocode);
        $get_promo_list = $this->db->get('promo_codes')->row_array();

        if ($get_promo_list['code'] != $promocode) {
            echo json_encode($promocode);
        } else {
            $this->ajax_generate_promocode();
        }
    }

    public function ajax_check_promocode() {

        $this->db->Where('code', $this->input->post('code'));
        $get_promo_list = $this->db->get('promo_codes')->row_array();

        if ($get_promo_list['code'] != $this->input->post('code')) {
            echo json_encode(array('status' => true, 'message' => 'Nice code !'));
            die;
        } else {
            echo json_encode(array('status' => false, 'message' => 'Try onother code !'));
            die;
        }
    }

}

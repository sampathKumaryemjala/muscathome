<?php

//phpinfo(); die;
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('custom');
        $this->load->helper('social_login_helper');
        $this->load->model('Properties_model');
        $this->load->model('User_model');
        $this->load->model('Offer_model');

        $this->load->helper('cookie');
        $this->load->helper('image_upload_helper');
        $this->load->helper('number_to_short_number');
//        if ($this->router->fetch_method() != "index") { //pre($this->session->userdata);
//            if (empty($this->session->userdata['active_user_data'])) { //die('w');
//                redirect('web_panel/Home');
//            }
//        }
    }

    function pre($a) {
        echo "<pre>";
        print_r($a);
    }

    public function latest_offers() {
        $data = array();

        if ($_GET['jyfh']) {
            $id = base64_decode($_GET['jyfh']);
            $this->db->select('offers.*,properties.*,offers_to_properties.*,property_types.name as property_type, properties.id as id');
            $this->db->join('offers_to_properties', 'offers_to_properties.fk_offer_id = offers.id');
            $this->db->join('properties', 'properties.id = offers_to_properties.fk_property_id');
            $this->db->join('property_types', 'property_types.id=properties.property_type');
            $this->db->where('offers.id', $id);
            $offer_properties = $this->db->get('offers')->result_array();
            //pre( $data['offer_properties']); die;
            foreach($offer_properties as $property){
                $this->db->where('property_images.fk_property_id', $property['id']);
                $images= $this->db->get('property_images')->result_array();
                $property['images'] = $images;
                $final[] = $property;
            }
            //pre($final); die;
           $data['offer_properties'] = $final;
        }
        
        $all_offer_properties = $this->db->get('offers_to_properties')->result_array();
        //pre($all_offer_properties); die;
        foreach ($all_offer_properties as $property) {
            $this->db->where('offers.id', $property['fk_offer_id']);
            $offer = $this->db->get('offers')->row_array();
            $this->db->select('properties.*,property_types.*,properties.id as fk_property_id ');
            $this->db->join('property_types', 'property_types.id=properties.property_type');
            $this->db->where('properties.id', $property['fk_property_id']);
            $offer_properties = $this->db->get('properties')->row_array();
            $this->db->where('property_images.fk_property_id', $offer_properties['fk_property_id']);
            $img = $this->db->get('property_images')->result_array();
            $offer_properties['images'] = $img;
            $offer_properties['offer'] = $offer;
            $finale[] = $offer_properties;
        }
        $data['all_offer_properties'] = $finale;
        //pre($data['all_offer_properties']); die;
        if(isset($_COOKIE['ci_session'])){
            $get_recent_property['user_ip'] = $_COOKIE['ci_session'];
        }
        
        $data['recent_views'] = $this->Properties_model->recent_views($get_recent_property);
        //pre($data); die;
        $this->load->view('offers/latest_offers', $data);
    }

    public function all_offers() {
        $data = array();
        $offer = [];
        $data['offers'] = $this->Offer_model->get_offers($offer);
        //pre($data);die;
        $this->load->view('offers/all_offers', $data);
    }

}

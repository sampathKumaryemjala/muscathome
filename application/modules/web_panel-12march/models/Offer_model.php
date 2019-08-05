<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Offer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_offers($document) {
        $final = [];
        if (isset($document['limit'])) {
            $this->db->limit($document['limit']);
        }
        $this->db->order_by('id', 'desc');
        $this->db->where('end_date >', date('Y-m-d'));
        $result = $this->db->get('offers')->result_array();
        //pre($result); die;
        foreach ($result as $offer) {
            //$this->db->select('offers.*,properties.*,offers_to_properties.*,property_types.name as property_type_name');
            $this->db->join('offers', 'offers.id = offers_to_properties.fk_offer_id');
            //$this->db->join('properties', 'properties.id = offers_to_properties.fk_property_id');
            //$this->db->join('property_types', 'property_types.id=properties.property_type');
            $this->db->where('fk_offer_id', $offer['id']);
            $properties = $this->db->get('offers_to_properties')->result_array();
            
            if(!empty($properties)){
                $final[] = $properties;
            }
            
        }
        //pre($final); die;
        return $final;
    }

}

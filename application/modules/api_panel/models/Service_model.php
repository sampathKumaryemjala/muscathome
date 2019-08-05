<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Service_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function service_sub_category($document) { //pre($document);
        $url = base_url().'uploads/services/icons/';
        $this->db->select("service_sub_category.*,CONCAT('$url',icon) as icon");            
        if(isset($document['service_cat_id']) and !empty($document['service_cat_id'])){
            $this->db->where('fk_service_cat_id', $document['service_cat_id']);
        }        
        $result = $this->db->get('service_sub_category')->result_array();
        return $result;
    }
    
    function service_category($document) { //pre($document);
        $final          = array();
        $url = base_url().'uploads/services/icons/';
        $this->db->select("service_category.*,CONCAT('$url',icon) as icon");
        if(isset($document['service_cat_id'])){
            $this->db->where('id', $document['service_cat_id']);
        }
        $services = $this->db->get('service_category')->result_array();
        //echo $this->db->last_query();
        //pre($services);
        foreach($services as $service){
            $subs                       = $this->service_sub_category(array("service_cat_id"=>$service['id']));
            $service['sub_categories']  = $subs;
            $final[]                    = $service;
        }
        return $final;
    }

}

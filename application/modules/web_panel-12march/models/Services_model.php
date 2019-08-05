<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Services_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_subcategory($document) { //pre($document);
        $this->db->select('service_sub_category.id as sub_id, service_sub_category.name as sub_name,service_category.id as cat_id, service_category.name as cat_name, service_category.icon as icon');
        $this->db->where('service_sub_category.id', $document['sub_id']);
        $this->db->join('service_category','service_category.id = service_sub_category.fk_service_cat_id');
        //echo $this->db->last_query(); die()
        $exist = $this->db->get('service_sub_category')->row_array();
        $exist['cat_icon'] = base_url('uploads/services/icons/').$exist['icon'];
        //pre($exist); die;
        return $exist;
    }
    
    function get_subcategories_by_cat_id($document) { //pre($document);
        $this->db->select('service_sub_category.id as sub_id, service_sub_category.name as sub_name,service_category.name as cat_name, service_sub_category.icon as icon');
        $this->db->where('service_sub_category.fk_service_cat_id', $document['cat_id']);
        $this->db->join('service_category','service_category.id = service_sub_category.fk_service_cat_id');
        //echo $this->db->last_query(); die()
        $exist = $this->db->get('service_sub_category')->result_array();
        foreach($exist as $subcat){
            $final['sub_id']  = $subcat['sub_id'];
            $final['cat_name']  = $subcat['cat_name'];
            $final['sub_name']  = $subcat['sub_name'];
            $final['icon'] = base_url('uploads/services/icons/').$subcat['icon'];
            $result[] = $final;
        }
        //pre($result); die;
        
        return $result;
    }
    
}



<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Properties_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_property($document) { //pre($document);
        if (isset($document['property_images'])) {
            $uploaded_images = (array) $document['property_images'];
            unset($document['property_images']);
        }

        $document['create_date'] = date("y-m-d h:i:s");
        $result = $this->db->insert('properties', $document);
        $document['fk_property_id'] = $this->db->insert_id();
        if (isset($uploaded_images)) {
            $insert_images['fk_property_id'] = $document['fk_property_id'];
            foreach ($uploaded_images as $image) {
                $insert_images['image'] = $image;
                $this->db->insert('property_images', $insert_images);
            }
        }

        return $result;
    }

    function insert_property_images($data) {
        foreach ($data['images'] as $image['image']) {
            $image['fk_property_id'] = $data['id'];
            $this->db->insert('property_images', $image);
        }
    }

    function property_create($inputs) {
        //pre($inputs); die;

        if (isset($inputs['id']) && !empty($inputs['id'])) {
            //die('update');
            if ($inputs['latitude'] == '') {
                unset($inputs['latitude']);
                unset($inputs['longitude']);
            }
            $inputs['modify_date'] = date('Y-m-d H:i:s');
            //$inputs['status'] = 1;
            $this->db->where('id', $inputs['id']);
            $result = $this->db->update('properties', $inputs);
        } else {
            //die('new');
            $inputs['create_date'] = date('Y-m-d H:i:s');
            $result = $this->db->insert('properties', $inputs);
        }

        return true;
    }

    function get_property_type_count($document) { //pre($document);
        $this->db->select('count(property_type) as total_type');
        $this->db->where('property_type', $document['id']);
        $properties = $this->db->get('properties')->result_array();
        return $properties;
    }

    function get_property_images($document) { //pre($document);
        $this->db->where('fk_property_id', $document['property_id']);
        $images = $this->db->get('property_images')->result_array();
        return $images;
    }

    function get_property_agent_details($document) { //pre($document); die;
        $this->db->select('users.*,property_agent_details.*,  users.id as id ');
        $this->db->join('property_agent_details', 'property_agent_details.fk_user_id = users.id', 'left');
        $this->db->where('users.id', $document['id']);
        $agent = $this->db->get('users')->row_array();
        //pre($agent);
        return $agent;
    }

    function is_property_fav($document) { //pre($document);
        $this->db->where('fk_user_id', $document['fk_user_id']);
        $this->db->where('fk_property_id', $document['fk_property_id']);
        $exist = $this->db->get('fav_properties')->row_array();
        return $exist;
    }

    function get_properties($document = array()) { //pre($document); die;
        $final = array();
        $this->db->select('properties.*,property_types.id as property_type_id,property_types.name as property_type');
        if (isset($document['keyword']) & !empty($document['keyword'])) {
            $location1 = "";
            if (isset($document['keyword'][1])) {
                $location1 = trim($document['keyword'][1]);
            }
            $location2 = "";
            if (isset($document['keyword'][2])) {
                $location2 = trim($document['keyword'][2]);
            }

            $this->db->group_start()
                    ->LIKE('location', trim($document['keyword'][0]))
                    ->OR_LIKE('location', $location1)
                    ->OR_LIKE('city', trim($document['keyword'][0]))
                    ->OR_LIKE('city', $location1)
                    ->OR_LIKE('city', $location2)
                    ->OR_LIKE('state', $location2)
                    ->OR_LIKE('addresss', trim($document['keyword'][0]))
                    ->LIKE('addresss', trim($document['keyword'][0]))
                    ->group_end();
        }
        
        if (isset($document['limit']) & !empty($document['limit'])) {
            $this->db->limit($document['limit']);
        }
        
        if (isset($document['limit_featured']) & !empty($document['limit_featured'])) {
            //pre($document['limit_featured']); die;
            $this->db->limit($document['limit_featured']);
        }
        if (isset($document['city']) & !empty($document['city'])) {
            $this->db->LIKE('city', $document['city']);
        }
        if (isset($document['state'])) {
            $this->db->LIKE('state', $document['state']);
        }
        if (isset($document['id'])) {
            $this->db->where('properties.id', $document['id']);
        }
        if (isset($document['ids'])) {
            $this->db->where_in('properties.id', $document['ids']);
        }
        if (isset($document['fk_agent_id'])) {
            $this->db->where('properties.fk_agent_id', $document['fk_agent_id']);
        }
        else{
           $this->db->where('status','1'); 
        }
        if (isset($document['type']) and ( $document['type'] == 0 OR $document['type'] == 1)) {
            $this->db->where('type', $document['type']);
        }
        if (isset($document['is_sold']) and ( $document['is_sold'] == 0 OR $document['is_sold'] == 1)) {
            $this->db->where('is_sold', $document['is_sold']);
        }
        if (isset($document['beds']) & !empty($document['beds'])) {
            $this->db->where('beds', $document['beds']);
        }
        if (isset($document['baths']) & !empty($document['baths'])) {
            $this->db->where('baths', $document['baths']);
        }
        if (isset($document['property_type']) & !empty($document['property_type'])) {
            $this->db->where('property_type', $document['property_type']);
        }
        if (isset($document['price_min']) & !empty($document['price_min'])) {
            $price_col = 'properties.price';
            $this->db->where("$price_col > " . $document['price_min']);
        }
        if (isset($document['price_max']) & !empty($document['price_max'])) {
            $price_col = 'properties.price';
            $this->db->where("$price_col < " . $document['price_max']);
        }
        if (isset($document['price_min']) && !empty($document['price_min']) && isset($document['price_max']) && !empty($document['price_max'])) {
            $price_col = 'properties.price';
            $this->db->where("$price_col BETWEEN " . $document['price_min'] . " AND " . $document['price_max'] . "");
        }
        if (isset($document['created_min']) & !empty($document['created_min'])) {
            $created = 'properties.create_date';
            $this->db->where("$created BETWEEN '" . $document['created_min'] . " 00:00:00' AND '" . $document['created_max'] . " 23:59:59'");
        }
        if (isset($document['square_ft_min']) & !empty($document['square_ft_min'])) {
            $square_ft = 'properties.property_size';
            $this->db->where("$square_ft > " . $document['square_ft_min']);
        }
        if (isset($document['square_ft_max']) & !empty($document['square_ft_max'])) {
            $square_ft = 'properties.property_size';
            $this->db->where("$square_ft < " . $document['square_ft_max']);
        }
        if (isset($document['square_ft_min']) && !empty($document['square_ft_min']) && isset($document['square_ft_max']) && !empty($document['square_ft_max'])) {
            $square_ft = 'properties.property_size';
            $this->db->where("$square_ft BETWEEN " . $document['square_ft_min'] . " AND " . $document['square_ft_max'] . "");
        }
        if (isset($document['square_ft_lot_min']) & !empty($document['square_ft_lot_min'])) {
            $square_ft_lot = 'properties.lot';
            $this->db->where("$square_ft_lot BETWEEN " . $document['square_ft_lot_min'] . " AND " . $document['square_ft_lot_max'] . "");
        }
        if (isset($document['fk_user_id']) & !empty($document['fk_user_id'])) {
            $this->db->where('fk_user_id', $document['fk_user_id']);
            $this->db->join('fav_properties', 'fav_properties.fk_property_id=properties.id');
        }
        $this->db->join('property_types', 'property_types.id=properties.property_type');
        if (isset($document['sorted_element']) & !empty($document['sorted_element'])) {
            $this->db->order_by(explode('__', $document['sorted_element'])[0], explode('__', $document['sorted_element'])[1]);
        } else {
            $this->db->order_by('id', 'desc');
        }
        if (isset($document['is_featured'])) { //pre($document['is_featured']); die;
            $this->db->order_by("id", 'desc');
            $this->db->where('is_featured', $document['is_featured']);
        }
        if (isset($document['per_page']) & !empty($document['per_page'])) {
            $this->db->limit($document['per_page'], $document['page'] );
        }
        $properties = $this->db->get('properties')->result_array();

        //echo $this->db->last_query();
        //pre($this->session->userdata); die;
        if ($properties) {
            foreach ($properties as $property) {
                $property['is_fav'] = 0;
                $images = $this->get_property_images(["property_id" => $property['id']]);
                $property['images'] = $images;
                if ($this->session->userdata('active_user_data')) {
                    $exist = $this->is_property_fav(["fk_user_id" => $this->session->userdata('active_user_id'), "fk_property_id" => $property['id']]);
                    if ($exist) {
                        $property['is_fav'] = 1;
                    }
                }
                $agent_detail = $this->get_property_agent_details(["id" => $property['fk_agent_id']]);
                $property['agent_detail'] = $agent_detail;
                $date1 = date('Y-m-d');
                $datee2 = explode(' ', $property['create_date']);
                $date2 = $datee2[0];
                $date1 = date_create($date1);
                $date2 = date_create($date2);

                $interval = $date2->diff($date1);
                //$diff = date_diff($date2, $date1);
                //echo $diff->format("%a days");
                $diffr = $interval->format('%m month, %d days ago');
                $date_diffr = explode(',', $diffr);
                $date_diffrence = $date_diffr[0];
                if ($date_diffrence[0] == 0) {
                    $posted_date = $date_diffr[1];
                } else {
                    $posted_date = $diffr;
                }
                if ($date_diffr[1][1] == 0) {
                    $posted_date = "Recently posted";
                }

                $property['agent_detail']['posted_date'] = $posted_date;
                $final[] = $property;
            }
        }
        //pre ($final); die;
        return $final;
    }

    function get_properties_cities($document = array()) { //pre($document); 
        $this->db->distinct('city');
        if (isset($document['city']) & !empty($document['city'])) {
            //$this->db->where('city', $document['city']);
        }
        $this->db->group_by('city');
        $this->db->select('city');
        $city = $this->db->get('properties')->result_array();
        return $city;
    }

    function get_properties_states($document = array()) { //pre($document); 
        $this->db->distinct('state');
        if (isset($document['state']) & !empty($document['state'])) {
            //$this->db->where('state', $document['state']);
        }
        $this->db->group_by('state');
        $this->db->select('state');
        $state = $this->db->get('properties')->result_array();
        //pre($state); die;
        return $state;
    }

    function get_property_types() {

        $types = $this->db->get('property_types')->result_array();
        //pre($types); die;
//        foreach ($types as $type) {
//        $pro_type = $this->get_property_type_count($type['id']);
//        $types['count'] = $pro_type;
//        }
//        pre($types); die;
        return $types;
    }

    function user_contact_info($document) {
        $document['create_date'] = date('Y-m-d H:i:s');
        $this->db->insert('re_contact_detail', $document);
        //echo $this->db->last_query();
        return true;
    }

    function recent_view_property($document = array()) {

        //$document = 
        $recenitems = array(
            'user_id' => $this->session->userdata['active_user_data']['id'],
            'property_item_id' => $document,
        );

        $final_items = $this->session->set_recent_properties($recenitems);

        return $final_items;
    }

    function get_properties_sale($document = array()) {
        $final = array();
        $document['type'] = 0;
        $this->db->where('type', $document['type']);
        $this->db->limit(6);
        $this->db->order_by('id', 'desc');
        $properties_sale = $this->db->get('properties')->result_array();
        if ($properties_sale) {
            foreach ($properties_sale as $property) {
                $property['is_fav'] = 0;
                $images = $this->get_property_images(["property_id" => $property['id']]);
                $property['images'] = $images;
                if (isset($document['user_id']) and ! empty($document['user_id'])) {
                    $exist = $this->is_property_fav(["fk_user_id" => $document['user_id'], "fk_property_id" => $property['id']]);
                    if ($exist) {
                        $property['is_fav'] = 1;
                    }
                }
                $final[] = $property;
            }
        }
        return $final;
    }

    function get_properties_rent($document = array()) {
        $final = array();
        $document['type'] = 1;
        $this->db->where('type', $document['type']);
        $this->db->limit(6);
        $this->db->order_by('id', 'desc');
        $properties_sale = $this->db->get('properties')->result_array();
        if ($properties_sale) {
            foreach ($properties_sale as $property) {
                $property['is_fav'] = 0;
                $images = $this->get_property_images(["property_id" => $property['id']]);
                $property['images'] = $images;
                if (isset($document['user_id']) and ! empty($document['user_id'])) {
                    $exist = $this->is_property_fav(["fk_user_id" => $document['user_id'], "fk_property_id" => $property['id']]);
                    if ($exist) {
                        $property['is_fav'] = 1;
                    }
                }
                $final[] = $property;
            }
        }
        return $final;
    }

    function buy_count() { //pre($document);
        $this->db->select('count(id) as buy_total');
        $this->db->where('status', 1);
        $this->db->where('type', 0);
        $res = $this->db->get('properties')->row_array();
        if ($res) {
            $final = $res['buy_total'];
        }
        return $final;
    }

    function rent_count() { //pre($document);
        $this->db->select('count(id) as rent_total');
        $this->db->where('status', 1);
        $this->db->where('type', 1);
        $res = $this->db->get('properties')->row_array();
        if ($res) {
            $final = $res['rent_total'];
        }
        return $final;
    }

    function featured_property() { //pre($document);
        $filter['is_featured'] = 1;
        $filter['limit_featured'] = 5;
        $final = $this->get_properties($filter);
        return $final;
    }

    function property_type_count() { //pre($document);
        $p_types = $this->db->get('property_types')->result_array();
        foreach ($p_types as $p_type) {
            $tttl = 0;
            $this->db->select('count(id) as ttl');

            $this->db->where('property_type', $p_type['id']);
            $res = $this->db->get('properties')->row_array();
            if ($res['ttl']) {
                $tttl = $res['ttl'];
            }
            $final[$p_type['name']] = $tttl;
        }
        //pre($final); die;
        return $final;
    }

    function similiar_properties($document) {
        //pre($document);die;
        if (isset($document['id'])) {
            $this->db->where_not_in('properties.id', $document['id']);
        }
        if (isset($document['city']) && !empty($document['city'])) {
            $this->db->where('city', $document['city']);
        }
        if (isset($document['property_type']) && !empty($document['property_type'])) {
            $this->db->where('property_types.name', $document['property_type']);
        }
        $this->db->select('properties.*, property_types.name as property_type');
        $this->db->join('property_types', 'property_types.id = properties.property_type', 'left');
        $this->db->limit(4);
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 1);
        $results = $this->db->get('properties')->result_array();
        foreach ($results as $result) {
            $this->db->where('fk_property_id', $result['id']);
            $images = $this->db->get('property_images')->result_array();
            $results[0]['images'] = $images;
        }
        //pre($results);die;
        return $results;
    }

    function get_fav_properties($document = array()) { //pre($document);
        $final = array();
        $this->db->where('fk_user_id', $document['user_id']);
        $this->db->join('properties', 'properties.id=fav_properties.fk_property_id');
        $properties = $this->db->get('fav_properties')->result_array();
        if ($properties) {
            foreach ($properties as $property) {
                $images = $this->get_property_images(["property_id" => $property['fk_property_id']]);
                $property['images'] = $images;
                $final[] = $property;
            }
        }
        return $final;
    }

    function fav_to_property($document) {
        unset($document['is_fav']);
        $this->db->where('fk_user_id', $document['fk_user_id']);
        $this->db->where('fk_property_id', $document['fk_property_id']);
        $this->db->insert('fav_properties', $document);
        return true;
    }

    function unfav_to_property($document) {
        unset($document['is_fav']);
        $this->db->where('fk_user_id', $document['fk_user_id']);
        $this->db->where('fk_property_id', $document['fk_property_id']);
        $this->db->delete('fav_properties');
        return true;
    }

    function recent_views($document) {
        $final = [];
        if (isset($document['user_ip'])) {
            $this->db->where('user_ip', $document['user_ip']);
        }
        $this->db->order_by('id', 'desc');
        $get_recents = $this->db->get('recent_properties')->result_array();
        foreach ($get_recents as $get_recent) {
            $filter['id'] = $get_recent['fk_property_id'];
            $get_recents['property'] = $this->get_properties($filter);
            $final[] = $get_recents['property'][0];
        }
        return $final;
    }

}

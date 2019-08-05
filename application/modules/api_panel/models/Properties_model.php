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

        if(isset($document['id'])){
            $document['modify_date'] = date("y-m-d h:i:s");
            $this->db->where('id',$document['id']);
            $result = $this->db->update('properties', $document);
            $fk_property_id = $document['id'];
        }else{
            $document['create_date'] = date("y-m-d h:i:s");
            $result = $this->db->insert('properties', $document);
            $fk_property_id = $this->db->insert_id();
            
            $id = $fk_property_id;
            $property_code = "MHP";
            for($i = 0;$i<(7-(strlen((string)$id)));$i++){
                $property_code = $property_code."0";
            }
            $property_code = $property_code.$id;
            $this->db->where('id',$id);
            $this->db->update('properties',array('property_code'=>$property_code));
        }        
        
        if (isset($uploaded_images)) {
            $insert_images['fk_property_id'] = $fk_property_id;
            foreach ($uploaded_images as $image) {
                $insert_images['image'] = $image;
                $this->db->insert('property_images', $insert_images);
            }
        }
        return $result;
    }
    
    

    function get_property_images($document) { //pre($document);
        $final = [];
        $this->db->where('fk_property_id', $document['property_id']);
        $images = $this->db->get('property_images')->result_array();
        if($images){
            foreach ($images as $image) {
               $image['image'] = base_url().'uploads/properties/images/'.$image['image'];
               $final[] = $image;
            }
        }
        return $final;
    }

    function is_property_fav($document) { //pre($document);
        $this->db->where('fk_user_id', $document['fk_user_id']);
        $this->db->where('fk_property_id', $document['fk_property_id']);
        $exist = $this->db->get('fav_properties')->row_array();
        return $exist;
    }

    function get_property_offers($document) { //pre($document);
        $this->db->where('offers_to_properties.fk_property_id', $document['fk_property_id']);
        $this->db->join('offers','offers.id=offers_to_properties.fk_offer_id');
        $offers = $this->db->get('offers_to_properties')->result_array();
        return $offers;
    }

    function get_properties_cities(
        $document = array()) {         
        if(isset($document['city']) & !empty($document['city']) ){            
        //$this->db->where('city', $document['city']);        
        }        
        if(isset($document['status']) ){            
            $this->db->where('properties.status', $document['status']);        
        }        
        $this->db->group_by('city');        
        $properties = $this->db->get('properties')->result_array();                
        return $properties;    
    }    

    function get_properties_states($document = array()) { //pre($document);         
        if(isset($document['state']) & !empty($document['state']) ){            
        //$this->db->where('state', $document['state']);        
        }        $this->db->group_by('state');        
        $properties = $this->db->get('properties')->result_array();
        return $properties;    
    }

    function get_property_types() {         
        $types = $this->db->get('property_types')->result_array();                
        return $types;    
    }

    function get_properties($document = array()) { //pre($document);
        $final = array();
        $this->db->select('properties.*,property_types.id as property_type,property_types.name as property_types_name');
        if(isset($document['id']) & !empty($document['id']) ){
            $this->db->where('properties.id', $document['id']);
        }
        if(isset($document['beds']) & !empty($document['beds']) ){
            $this->db->where('beds', $document['beds']);
        }
        if(isset($document['baths']) & !empty($document['baths']) ){
            $this->db->where('baths', $document['baths']);
        }
        if(isset($document['property_type']) & !empty($document['property_type']) ){
            $this->db->where('property_type', $document['property_type']);
        }
        if(isset($document['price_min']) & !empty($document['price_min']) ){
           $price_col='properties.price';
           $this->db->where("$price_col BETWEEN ".$document['price_min']." AND ".$document['price_max']."");
        }
        if(isset($document['created_min']) & !empty($document['created_min']) ){
           $created='properties.create_date';
           $this->db->where("$created BETWEEN '".$document['created_min']." 00:00:00' AND '".$document['created_max']." 23:59:59'");
        }
        if(isset($document['square_ft_min']) & !empty($document['square_ft_min']) ){
           $square_ft='properties.property_size';
           $this->db->where("$square_ft BETWEEN ".$document['square_ft_min']." AND ".$document['square_ft_max']."");
        }
        if(isset($document['square_ft_lot_min']) & !empty($document['square_ft_lot_min']) ){
           $square_ft_lot='properties.lot';
           $this->db->where("$square_ft_lot BETWEEN ".$document['square_ft_lot_min']." AND ".$document['square_ft_lot_max']."");
        }
        if(isset($document['user_id']) & isset($document['only_fav']) & !empty($document['user_id']) ){           
            $this->db->where('fk_user_id', $document['user_id']);           
            $this->db->join('fav_properties','fav_properties.fk_property_id=properties.id');        
        }
        if(isset($document['fk_agent_id']) & !empty($document['fk_agent_id']) ){           
            $this->db->where('properties.fk_agent_id', $document['fk_agent_id']);  
        }        
        if(isset($document['only_similars']) & isset($document['only_similars']) ){  
            $this->db->where('properties.city', $document['city']);  
            $this->db->where('properties.property_type', $document['property_type_id']);  
        }   
        if (isset($document['keyword'])) { //die('gdf');
            $this->db->group_start()
            ->LIKE('properties.property_name',$document['keyword'])
            ->OR_LIKE('property_types.name',$document['keyword'])
            ->OR_LIKE('properties.city',$document['keyword'])
            ->OR_LIKE('properties.location',$document['keyword'])
            ->OR_LIKE('properties.state',$document['keyword'])
            ->OR_LIKE('properties.addresss',$document['keyword'])
            ->OR_LIKE('properties.description',$document['keyword'])
            ->group_end();
        }
        $this->db->join('property_types','property_types.id = properties.property_type');
        if(isset($document['only_with_offers']) & isset($document['only_with_offers']) ){  
            $this->db->join('offers_to_properties','offers_to_properties.fk_property_id=properties.id');
        } 

        if(!isset($document['including_disapprove'])){ 
            //$this->db->where('properties.status', 1);
        }

        

        //$this->db->join('users','users.id=properties.asigned_agent_id');   // join with assigned agent 

        $properties = $this->db->get('properties')->result_array();
       // echo $this->db->last_query();
        //pre($properties); //die;
        if ($properties) {
            foreach ($properties as $property) {
                $property['offers'] = $this->get_property_offers(array("fk_property_id"=>$property['id']));
                $property['is_fav'] = 0;
                $property['email'] = "info@muscathome.com";
                                    $this->db->where('id', $property['asigned_agent_id']);
                $asigned_agent =    $this->db->get('users')->row_array();
                if($asigned_agent){
                    $property['email'] = $asigned_agent['email'];
                }
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


    function offers_properties($document = array()) { //pre($document);
        $final = array();
        //$this->db->select('properties.*,property_types.name as property_types_name');        
        
        $this->db->join('property_types','property_types.id = properties.property_type');        
        $this->db->join('offers_to_properties','offers_to_properties.fk_property_id=properties.id');
        $properties = $this->db->get('properties')->result_array();

        echo $this->db->last_query();
        pre($properties); die;
        if ($properties) {
            foreach ($properties as $property) {
                $property['offers'] = $this->get_property_offers(array("fk_property_id"=>$property['id']));

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
        $this->db->insert('fav_properties', $document);
        return true;
    }

    function unfav_to_property($document) {
        $this->db->where('fk_user_id', $document['fk_user_id']);
        $this->db->where('fk_property_id', $document['fk_property_id']);
        $this->db->delete('fav_properties');
        return true;
    }

    function delete_property($document) {
        $this->db->where('id', $document['id']);
        $this->db->delete('properties');
        return true;
    }

    function get_property_posting_person($document) {
        $this->db->where('id', $document['id']);
        $this->db->delete('properties');
        return true;
    }



    function get_property_agent_details($document) { //pre($document);
        $this->db->select('users.*,property_agent_details.*,  users.id as id ');
        $this->db->join('property_agent_details', 'property_agent_details.fk_user_id = users.id','left');
        $this->db->where('users.id', $document['id']);
        $agent = $this->db->get('users')->row_array();
        return $agent;
    }

    
    function get_user_details($document) { //pre($document);
        //$this->db->select('users.*,property_agent_details.*,  users.id as id ');
        //$this->db->join('property_agent_details', 'property_agent_details.fk_user_id = users.id','left');
        $this->db->where('users.id', $document['id']);
        $user = $this->db->get('users')->row_array();
        //pre($user);
        return $user;
    }

    function property_posted_by($filter){ //pre($filter);
        $this->db->select("users.id as postded_by,users.user_type,device_type,device_token,properties.*");
        $this->db->where('properties.id', $filter['property_id']);
        $this->db->join('properties','properties.fk_agent_id=users.id');
        $property = $this->db->get('users')->row_array();   
        // pre($user);     
        if($property && $property['user_type']==0){ //die('gdf');
            $property['user']  = $this->get_user_details(["id" => $property['fk_agent_id']]); 
            //pre($user);     
        }else if($property && $property['user_type']==1){
            $property['user']  = $this->get_property_agent_details(["id" => $property['fk_agent_id']]);
        }else{
            //$property['user'] = ""
        }
//pre($property);
        return $property;
    }


}

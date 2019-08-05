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
    
    

    function get_offers() {         
        $offers = $this->db->get('offers')->result_array();                
        return $offers;    
    }

    function get_promo_codes($myarray) {  
	    if(isset($myarray['promo_code']) and !empty($myarray['promo_code'])){
	    	$this->db->where('code',$myarray['promo_code']); 
	    } 
        $offers = $this->db->get('promo_codes')->result_array();                
        return $offers;    
    }

    function get_used_promo_code($myarray) {  
	    if(isset($myarray['fk_code_id']) and !empty($myarray['fk_code_id'])){
	    	$this->db->where('fk_code_id',$myarray['fk_code_id']); 
	    } 
        if(isset($myarray['fk_user_id']) and !empty($myarray['fk_user_id'])){
	    	$this->db->where('fk_user_id',$myarray['fk_user_id']); 
	    } 
        $offers = $this->db->get('promo_codes_used')->result_array();                
        return $offers;    
    }

    
}

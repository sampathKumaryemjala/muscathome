<?php

    function get_user($document) {
        if(isset($document['id']) and !empty($document['id'])){
            $this->db->where('id', $document['id']);
        }
        if(isset($document['g_id']) and !empty($document['g_id'])){
            $this->db->where('g_id', $document['g_id']);
        }
        if(isset($document['fb_id']) and !empty($document['fb_id'])){
            $this->db->where('fb_id', $document['fb_id']);
        }
        if(isset($document['email']) and !empty($document['email'])){
            $this->db->where('email', $document['email']);
        }
        if(isset($document['mobile']) and !empty($document['mobile'])){
            $this->db->where('mobile', $document['mobile']);
        }
        $result = $this->db->get('users')->row_array();
        return ($result) ? $result : false;
    } 
    
    function delete_expired_offers() {
        $CI =& get_instance();
        $CI->db->where('end_date <', date('Y-m-d'));
        $offers = $CI->db->get('offers')->result_array();
        //echo print_r($offers);
        if($offers){
            foreach($offers as $offer){
                $offer_id[]= $offer['id'];
                //echo print_r($offer_id);
            }
            //$this->db->where_in('id', $offer_id);
            //$this->db->delete('offers');
            $CI->db->where_in('fk_offer_id', $offer_id);
            $CI->db->delete('offers_to_properties');
        }
        
    }
   
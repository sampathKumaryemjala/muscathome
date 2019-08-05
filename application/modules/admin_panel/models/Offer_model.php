<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Offer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create_offer($document) { //pre($document); die;
        if (isset($document['id'])) {
            $document['modify_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $document['id']);
            $result = $this->db->update('offers', $document);
            return $result;
        } else {
            $document['create_date'] = date('Y-m-d H:i:s');
            $result = $this->db->insert('offers', $document);
            return $result;
        }
    }

    function get_offers($document) {
        if (isset($document['id'])) {
            $this->db->where('id', $document['id']);
            $result = $this->db->get('offers')->row_array();
            return $result;
        } else {
            if (isset($document['offer_status'])) {
                if ($document['offer_status'] == 2) {
                    $this->db->where('start_date >=', date('Y-m-d'));
                }
                if ($document['offer_status'] == 1) {
                    $this->db->where('end_date <=', date('Y-m-d'));
                }
            }
            $this->db->order_by('id','desc');
            $result = $this->db->get('offers')->result_array();
            return $result;
        }
    }

    function create_promocode($document) {
        if (isset($document['id'])) {
            $document['modify_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $document['id']);
            $result = $this->db->update('promo_codes', $document);
        } else {
            $this->db->Where('code', $document['code']);
            $get_promo_list = $this->db->get('promo_codes')->row_array();
            if ($get_promo_list['code'] != $document['code']) {
            $document['create_date'] = date('Y-m-d H:i:s');
            $result = $this->db->insert('promo_codes', $document);
            }
        }

        return $result;
    }

    function get_promocodes($document) {// pre($document); die;
        if (isset($document['id'])) {
            $this->db->where('id', $document['id']);
            $result = $this->db->get('promo_codes')->row_array();
            //pre($result); die;
            return $result;
        } else {
            $result = $this->db->get('promo_codes')->result_array();
            return $result;
        }
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servent_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get_servent_request($data) {
        $final = [];
        
        if (isset($data['id']) and ! empty($data['id'])) {
            $this->db->where('id', $data['id']);
        }
        if (isset($data['fk_servent_id']) and ! empty($data['fk_servent_id'])) {
            $this->db->where('fk_servent_id', $data['fk_servent_id']);
        }
        if (isset($data['fk_user_id']) and ! empty($data['fk_user_id'])) {
            $this->db->where('fk_user_id', $data['fk_user_id']);
        }
        if (isset($data['status']) and ! empty($data['status'])) {
            $this->db->where('status', $data['status']);
        }
        if (isset($data['service_sub_cat']) and ! empty($data['service_sub_cat'])) {
            $this->db->where('service_sub_cat', $data['service_sub_cat']);
        }
        if (isset($data['group_by']) and ! empty($data['group_by'])) {
            $this->db->group_by(array("service_sub_cat", "fk_user_id"));
        }
        $this->db->order_by('id', 'desc');
        $requests = $this->db->get('servent_request')->result_array();
        foreach ($requests as $request) {
            $this->db->where('id', $request['fk_user_id']);
            $request['user_profile'] = $this->db->get('users')->row_array();

            $this->db->where('id', $request['fk_servent_id']);
            $request['servent_profile'] = $this->db->get('users')->row_array();
            $final[] = $request;
        }
        if (isset($data['id']) and ! empty($data['id'])) {
            return $final[0];
        } else {
            return $final;
        }
    }
    
    
    function change_request_status($data) {
        $status = 0;
        if($data['status'] == 0){
            $status = 1;
        }
        if($data['status'] == 1){
            $status = 2;
        }
        if($data['status'] == 2){
            $status = 0;
        }
        $this->db->where('id', $data['id']);
        $updated = $this->db->update('servent_request', array('status'=>$status));
        return $updated;
    }
    
    function delete_servent_request($data) {
        $this->db->where('id', $data['id']);
        $deleted = $this->db->delete('servent_request');
        return $deleted;
    }

}

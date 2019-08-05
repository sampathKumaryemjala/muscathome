<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Notifications_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_notifications($data) { //pre($data); die;
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
        }
        if (isset($data['fk_user_id'])) {
            $this->db->where('fk_user_id', $data['fk_user_id']);
        }
        if (isset($data['sender_id'])) {
            $this->db->where('sender_id', $data['sender_id']);
        }
        if (isset($data['fk_property_id'])) {
            $this->db->where('fk_property_id', $data['fk_property_id']);
        }
        if (isset($data['fk_job_post_id'])) {
            $this->db->where('fk_job_post_id', $data['fk_job_post_id']);
        }
        if (isset($data['notification_type'])) {
            $this->db->where('notification_type', $data['notification_type']);
        }
        if (isset($data['is_read'])) {
            $this->db->where('is_read', $data['is_read']);
        }
        $this->db->order_by('id','desc');
        $notification_list = $this->db->get('notifications')->result_array();
        //pre($notification_list); die;
        if (isset($data['id']) && !empty($notification_list)) {
            return $notification_list[0];
        } else {
            return $notification_list;
        }
    }
    
    function create_notification($data){
        $data['created'] = time();
        $data['sender_id'] = $this->session->userdata('active_user_data')['id'];
        $this->db->insert('notifications',$data);
        return $this->db->insert_id();
    }
    
    function count_notification($data){
        $this->db->select('count(id) as unread_count');
        $this->db->where('is_read',0);
        $this->db->where('fk_user_id',$data['fk_user_id']);
        $count_notification = $this->db->get('notifications')->result_array();
        return $count_notification[0];
    }
    
    function update_status($data){
        if(isset($data['id'])){
            $this->db->where('id',$data['id']);
        }
        $this->db->where('fk_user_id',$data['fk_user_id']);
        $this->db->update('notifications',array('is_read'=>1));
        return true;
    }
    

}

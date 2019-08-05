<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_user($data) {
        if (isset($data['email']) and ! empty($data['email'])) {
            $this->db->where('email', $data['email']);
        }
        if (isset($data['id']) and ! empty($data['id'])) {
            $this->db->where('id', $data['id']);
        }
        if (isset($data['password']) and ! empty($data['password'])) {
            $this->db->where('password', $data['password']);
        }
        $user = $this->db->get('users')->row_array();
        if ($user) {
            if ($user['user_type'] == 1 or $user['user_type'] == 3) {
                $this->db->where('fk_agent_id', $user['id']);

                $extra = $this->db->get('agent_details')->row_array();

                $user['document'] = $extra['document1'];
                $user['fk_service_cat_id'] = $extra['fk_service_cat_id'];
                $this->db->select('name');
                $this->db->where('id', $user['fk_service_cat_id']);
                $cat_name = $this->db->get('service_category')->row_array();
                $user['fk_service_cat_name'] = $cat_name['name'];

                $user['fk_service_sub_cat_id'] = $extra['fk_service_sub_cat_id'];
                $this->db->select('name');
                $this->db->where('id', $user['fk_service_sub_cat_id']);
                $sub_cat_name = $this->db->get('service_sub_category')->row_array();
                $user['fk_service_sub_cat_name'] = $sub_cat_name['name'];
                //$final = $user;
            }
            if ($user['user_type'] == 3) {
                $this->db->where('fk_user_id', $user['id']);
                $servent = $this->db->get('servent_details')->row_array();
                $user['servent_details'] = $servent;
            }
        }
        return $user;
    }

    function edit_user($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
    }

    function get_agent() {
        $this->db->select('users.*,property_agent_details.*,users.id as id');
        $this->db->limit(4);
        $this->db->join('property_agent_details', 'property_agent_details.fk_user_id  = users.id', 'left');
        $this->db->order_by('users.id', 'desc');
        $this->db->where('status', '1');
        $this->db->where('user_type', '2');
        $agents = $this->db->get('users')->result_array();
        //pre($agents); die;
        return $agents;
    }

}

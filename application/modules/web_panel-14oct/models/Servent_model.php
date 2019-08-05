<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Servent_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_servent($data) { //pre($data); die;
        $final = [];
        if (isset($data['id']) and ! empty($data['id'])) {
            $this->db->where('users.id', $data['id']);
        }
        if (isset($data['self_id']) and ! empty($data['self_id'])) {
            $this->db->where_not_in('users.id', $data['self_id']);
        }
        if (isset($data['fk_service_sub_cat_id']) and ! empty($data['fk_service_sub_cat_id'])) {
            $this->db->where('fk_service_sub_cat_id', $data['fk_service_sub_cat_id']);
        }
        if (isset($data['city']) and ! empty($data['city'])) {
            $this->db->where('servent_details.city', $data['city']);
        }
        if (isset($data['religion']) and ! empty($data['religion'])) {
            $this->db->where('servent_details.religion', $data['religion']);
        }
        if (isset($data['age']) and ! empty($data['age'])) {
            $this->db->where("servent_details.age BETWEEN " . $data['age_min'] . " AND " . $data['age_max'] . "");
        }
        if (isset($data['gender']) and ! empty($data['gender'])) {
            $this->db->where('servent_details.gender', $data['gender']);
        }
        if (isset($data['marital_status']) and ! empty($data['marital_status'])) {
            $this->db->where('servent_details.marital_status', $data['marital_status']);
        }
        if (isset($data['experience']) and ! empty($data['experience'])) {
            $this->db->where("servent_details.experience BETWEEN '" . $data['experience_min'] . "' AND " . $data['experience_max'] . "");
        }
        if (isset($data['expected_salary']) and ! empty($data['expected_salary'])) {
            $this->db->where("servent_details.expected_salary BETWEEN " . $data['expected_salary_min'] . " AND " . $data['expected_salary_max'] . "");
        }
        $this->db->select('users.*,agent_details.*,servent_details.*,users.id as id');
        $this->db->join('agent_details', 'agent_details.fk_agent_id = users.id');
        $this->db->join('servent_details', 'servent_details.fk_user_id = users.id');
        $users = $this->db->get('users')->result_array();
        //echo $this->db->last_query();
        //pre($users); die;
        foreach ($users as $user) {
            //$this->db->select('age,gender,experience,nationality,city,cv_url,video_url');
            $this->db->where('fk_user_id', $user['id']);
            $user['servent_details'] = $this->db->get('servent_details')->row_array();

            $this->db->select('name as cat_name');
            $this->db->where('id', $user['fk_service_cat_id']);
            $cat_name = $this->db->get('service_category')->row_array();
            $user['cat_name'] = $cat_name['cat_name'];

            $this->db->select('name as sub_cat_name');
            $this->db->where('id', $user['fk_service_sub_cat_id']);
            $sub_cat_name = $this->db->get('service_sub_category')->row_array();
            $user['sub_cat_name'] = $sub_cat_name['sub_cat_name'];
            $final[] = $user;
        }
        //pre($final); die;
        if (isset($data['id']) and ! empty($data['id'])) {
            return $final[0];
        } else {
            return $final;
        }
    }

    function send_servent_request($data) {
        if (isset($data['id'])) {
            $data['modify_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $data['id']);
            $updated = $this->db->update('servent_request', $data);
            return $updated;
        } else {
            $data['create_date'] = $data['modify_date'] = date('Y-m-d H:i:s');
            $this->db->insert('servent_request', $data);
            return $this->db->insert_id();
        }
    }

    function delete_servent_request($data) {
        $this->db->where('id', $data['id']);
        $deleted = $this->db->delete('servent_request');
        return $deleted;
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

}

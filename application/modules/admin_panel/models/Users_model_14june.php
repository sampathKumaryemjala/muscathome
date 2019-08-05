<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_user_details($document) { //pre($document); die;
        if ($document['user_type'] == 1 or $document['user_type'] == 3) {
            //$this->db->select('users.*,agent_details.*,id as users.id');
            $this->db->where('fk_agent_id', $document['id']);
            $get_result = $this->db->get('agent_details')->row_array();

            $this->db->select('name as category');
            $this->db->where('service_category.id', $get_result['fk_service_cat_id']);
            $cat = $this->db->get('service_category')->row_array();
            $final[] = $cat;

            $this->db->select('name as sub_category');
            $this->db->where('service_sub_category.id', $get_result['fk_service_sub_cat_id']);
            $subcat = $this->db->get('re_service_sub_category')->row_array();
            $final[] = $subcat;
            
            $final[] = $get_result;

            return $final;
        }
        if ($document['user_type'] == 2) {
            //$this->db->select('users.*,property_agent_details.*,id as users.id');
            $this->db->where('fk_user_id', $document['id']);
            $get_result = $this->db->get('property_agent_details')->row_array();
            return $get_result;
        }
    }

    function get_users($document) { //pre($document); die;
        $final = array();
        if (isset($document['id']) && !empty($document['id'])) {
            $this->db->where('id', $document['id']);
        }
        if (isset($document['user_type'])) {
            $this->db->where('user_type', $document['user_type']);
        }
        $this->db->order_by('id', 'desc');
        $users = $this->db->get('users')->result_array();
        if ($users) {
            foreach ($users as $user) {
                $user['details'] = $this->get_user_details(array("id" => $user['id'], "user_type" => $user['user_type']));
                //pre($user['details']); die;
                $final[] = $user;
            }
        }
        //pre($final); die;
        return $final;
    }

    function get_agents($document) {
        if (isset($document['user_type'])) {
            $this->db->where('user_type', $document['user_type']);
        }
        if (isset($document['id'])) {
            $this->db->where('users.id', $document['id']);
        }
        $this->db->select('users.*,property_agent_details.*,users.id as id');
        $this->db->order_by('users.id', 'desc');
        $this->db->join('property_agent_details', 'property_agent_details.fk_user_id = users.id', 'left');
        return $this->db->get('users')->result_array();
    }

    function get_user_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }

    function update_user_status($data) {
        $id = $data['id'];
        $status = 1;
        $result = $this->get_users(array("id" => $id));
        if ($result[0]['status'] == '1') {
            $status = 0;
        }
        $this->db->where('id', $id);
        $this->db->update('users', array('status' => $status));
        // echo $this->db->last_query(); die;
        return true;
    }

    function add_agent($user, $agent) { //pre($user);pre($agent); die;
        if (isset($user['id']) && !empty($user['id'])) {
            $user['modify_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $user['id']);
            $this->db->update('users', $user);

            $this->db->where('fk_user_id', $user['id']);
            $this->db->update('property_agent_details', $agent);
        } else {
            $user['user_type'] = 2;
            $user['create_date'] = date('Y-m-d H:i:s');
            $this->db->insert('users', $user);
            echo $this->db->last_query();
            $agent['fk_user_id'] = $this->db->insert_id();
            $this->db->insert('property_agent_details', $agent);
            echo $this->db->last_query();
        }
        //die();
        return true;
    }

    function get_contact_queries() {
        $this->db->where_not_in('subject', '');
        $this->db->where('fk_user_id', 0);
        $this->db->order_by('id', 'desc');
        return $this->db->get('contact_detail')->result_array();
    }

    function count_users() {
        $this->db->select('count(id) as total');
        $this->db->where('user_type', 0);
        $total_users = $this->db->get('users')->row_array();
        $final['total_users'] = $total_users['total'];

        $this->db->select('count(id) as blocked');
        $this->db->where('user_type', 0);
        $this->db->where('status', 0);
        $blocked_users = $this->db->get('users')->row_array();
        $final['blocked_users'] = $blocked_users['blocked'];

        $this->db->select('count(id) as active');
        $this->db->where('user_type', 0);
        $this->db->where('status', 1);
        $active_users = $this->db->get('users')->row_array();
        $final['active_users'] = $active_users['active'];

        return $final;
    }

    function count_providers() {
        $this->db->select('count(id) as total');
        $this->db->where('user_type', 1);
        $total_users = $this->db->get('users')->row_array();
        $final['total_provider'] = $total_users['total'];

        $this->db->select('count(id) as blocked');
        $this->db->where('user_type', 1);
        $this->db->where('status', 0);
        $blocked_users = $this->db->get('users')->row_array();
        $final['blocked_provider'] = $blocked_users['blocked'];

        $this->db->select('count(id) as active');
        $this->db->where('user_type', 1);
        $this->db->where('status', 1);
        $active_users = $this->db->get('users')->row_array();
        $final['active_provider'] = $active_users['active'];

        return $final;
    }

    function count_property_agent() {
        $this->db->select('count(id) as total');
        $this->db->where('user_type', 2);
        $total_users = $this->db->get('users')->row_array();
        $final['total_provider'] = $total_users['total'];

        $this->db->select('count(id) as blocked');
        $this->db->where('user_type', 2);
        $this->db->where('status', 0);
        $blocked_users = $this->db->get('users')->row_array();
        $final['blocked_provider'] = $blocked_users['blocked'];

        $this->db->select('count(id) as active');
        $this->db->where('user_type', 2);
        $this->db->where('status', 1);
        $active_users = $this->db->get('users')->row_array();
        $final['active_provider'] = $active_users['active'];

        return $final;
    }

    function count_property($document) {
        $this->db->select('count(id) as total');
        if (isset($document['id']) && !empty($document['id'])) {
            $this->db->where('fk_agent_id', $document['id']);
        }
        $total_users = $this->db->get('properties')->row_array();
        $final['total'] = $total_users['total'];

        $this->db->select('count(id) as pending');
        $this->db->where('status', 0);
        if (isset($document['id']) && !empty($document['id'])) {
            $this->db->where('fk_agent_id', $document['id']);
        }
        $blocked_users = $this->db->get('properties')->row_array();
        $final['pending'] = $blocked_users['pending'];

        $this->db->select('count(id) as active');
        $this->db->where('status', 1);
        if (isset($document['id']) && !empty($document['id'])) {
            $this->db->where('fk_agent_id', $document['id']);
        }
        $active_users = $this->db->get('properties')->row_array();
        $final['active'] = $active_users['active'];

        return $final;
    }

    function count_property_sale_type($document) {
        $this->db->select('count(id) as buy');
        $this->db->where('type', 0);
        if (isset($document['id']) && !empty($document['id'])) {
            $this->db->where('fk_agent_id', $document['id']);
        }
        $blocked_users = $this->db->get('properties')->row_array();
        $final['buy'] = $blocked_users['buy'];

        $this->db->select('count(id) as rent');
        $this->db->where('type', 1);
        if (isset($document['id']) && !empty($document['id'])) {
            $this->db->where('fk_agent_id', $document['id']);
        }
        $active_users = $this->db->get('properties')->row_array();
        $final['rent'] = $active_users['rent'];

        return $final;
    }
    
    
    function count_requests($document) {
        $this->db->select('count(id) as total');
        $total_users = $this->db->get('servent_request')->row_array();
        $final['total_request'] = $total_users['total'];

        $this->db->select('count(id) as pending');
        $this->db->where('status', 0);
        $pending_request = $this->db->get('servent_request')->row_array();
        $final['pending_request'] = $pending_request['pending'];

        $this->db->select('count(id) as active');
        $this->db->where('status', 1);
        $active_request = $this->db->get('servent_request')->row_array();
        $final['active_request'] = $active_request['active'];
        
        $this->db->select('count(id) as rejected');
        $this->db->where('status', 2);
        $rejected_request = $this->db->get('servent_request')->row_array();
        $final['reject_request'] = $rejected_request['rejected'];

        return $final;
    }
    
    
    
    function get_doc($document){
        
        $provider = $this->get_users($document);
        return $provider;
    }

}

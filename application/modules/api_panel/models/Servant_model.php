<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Servant_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_servents($data) { //pre($data); die;

        $final = [];
        $this->db->select('users.*,agent_details.*,servent_details.*,users.id as id,service_sub_category.name as service_sub_category_name');
        if (isset($data['id']) and ! empty($data['id'])) {
            $this->db->where('users.id', $data['id']);
        }
        if (isset($data['self_id']) and ! empty($data['self_id'])) {
            $this->db->where_not_in('users.id', $data['self_id']);
        }
        if (isset($data['fk_service_cat_id']) and ! empty($data['fk_service_cat_id'])) {
            $this->db->where('agent_details.fk_service_cat_id', $data['fk_service_cat_id']);
        }
        if (isset($data['fk_service_sub_cat_id']) and ! empty($data['fk_service_sub_cat_id'])) {
            $this->db->where('agent_details.fk_service_sub_cat_id', $data['fk_service_sub_cat_id']);
        }
        if (isset($data['city']) and ! empty($data['city'])) {
            $this->db->where('servent_details.city', $data['city']);
        }
        if (isset($data['religion']) and ! empty($data['religion'])) {
            $this->db->where('servent_details.religion', $data['religion']);
        }
        if (isset($data['age_min']) and ! empty($data['age_min']) && isset($data['age_max']) and ! empty($data['age_max'])) {
            $this->db->where("servent_details.age BETWEEN " . $data['age_min'] . " AND " . $data['age_max'] . "");
        }
        if (isset($data['gender']) and ! empty($data['gender'])) {
            $this->db->where('servent_details.gender', $data['gender']);
        }
        if (isset($data['marital_status']) and ! empty($data['marital_status'])) {
            $this->db->where('servent_details.marital_status', $data['marital_status']);
        }
        if (isset($data['experience_min']) && isset($data['experience_max']) && !empty($data['experience_max'])) {
            $this->db->where("servent_details.experience BETWEEN  '" . $data['experience_min'] . "' AND " . $data['experience_max'] . "");
        }        
        if (isset($data['expected_salary_min']) && !empty($data['expected_salary_min']) && isset($data['expected_salary_max']) and ! empty($data['expected_salary_max'])) {
            $this->db->where("servent_details.expected_salary BETWEEN " . $data['expected_salary_min'] . " AND " . $data['expected_salary_max'] . "");
        }
        $this->db->join('agent_details', 'agent_details.fk_agent_id = users.id');
        $this->db->join('service_sub_category', 'service_sub_category.id = agent_details.fk_service_sub_cat_id');
        $this->db->join('servent_details', 'servent_details.fk_user_id = users.id');
        $users = $this->db->get('users')->result_array(); //pre($users);
        if($users){
            foreach($users as $user){
                if (!empty($user['profile_image'])) {
                    if (strpos($user['profile_image'], 'http') === false) {
                        $user['profile_image'] = base_url() . 'uploads/profile_images/' . $user['profile_image'];
                    }
                } else {
                    $user['profile_image'] = base_url() . 'uploads/profile_images/default.png';
                }

            
                $user['already_requested']  = 0;
                $user['already_requested_status']  = "";
                if(isset($data['user_id'])){
                    $query                      = "Select status from re_servent_request where fk_user_id='".$data['user_id']."' AND fk_servent_id = '".$user['fk_user_id']."'";
                    $already                    = $this->db->query($query)->row();//pre($already);
                    if($already){
                        $user['already_requested']  = 1;
                        $user['already_requested_status']  = $already->status;
                    }
                    
                }

                $final[] = $user;
            }
        }
        return $final;    
    }




    function servant_employer($data) { //pre($data); die;

        $final = [];
        //$this->db->select('users.*,agent_details.*,servent_details.*,users.id as id,service_sub_category.name as service_sub_category_name');
        $this->db->where('servent_request.status',1);
        
        if (isset($data['fk_servent_id']) and ! empty($data['fk_servent_id'])) {
            $this->db->where('servent_request.fk_servent_id', $data['fk_servent_id']);
        }
        //$this->db->join('users', 'users.id = servent_request.fk_user_id');
        $final = $this->db->get('servent_request')->row_array(); //pre($users); 
        
       //echo $this->db->last_query();
        //$this->db->join('agent_details', 'agent_details.fk_agent_id = users.id');
        //$this->db->join('service_sub_category', 'service_sub_category.id = agent_details.fk_service_sub_cat_id');
        //$this->db->join('servent_details', 'servent_details.fk_user_id = users.id');
        //$users = $this->db->get('users')->result_array(); //pre($users);       
        return $final;    
    }
}

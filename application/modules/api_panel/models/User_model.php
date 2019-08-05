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

    function get_user($document) { //pre($document);
        if (isset($document['id']) and ! empty($document['id'])) {
            $this->db->where('id', $document['id']);
        }
        if (isset($document['g_id']) and ! empty($document['g_id'])) {
            $this->db->where('g_id', $document['g_id']);
        }
        if (isset($document['fb_id']) and ! empty($document['fb_id'])) {
            $this->db->where('fb_id', $document['fb_id']);
        }
        if (isset($document['email']) and ! empty($document['email'])) {
            $this->db->where('email', $document['email']);
        }
        if (isset($document['mobile']) and ! empty($document['mobile'])) {
            $this->db->where('mobile', $document['mobile']);
        }
        if (isset($document['user_type']) and ! empty($document['user_type'])) {
            $this->db->where('user_type', $document['user_type']);
        }
        if (isset($document['device_token']) and ! empty($document['device_token'])) {
            $this->db->where('device_token', $document['device_token']);
        }
        $user = $this->db->get('users')->row_array();
        if ($user) {
            $user['job_ratings'] = "";
            $user['ratings'] = $this->user_ratings(["user_id" => $user['id']]);
            if (isset($document['job_post_id'])) {
                $user['job_ratings'] = $this->user_ratings(["user_id" => $user['id'], "job_post_id" => $document['job_post_id']]);
            }
            if (isset($document['job_request_id'])) {
                $user['job_ratings'] = $this->user_ratings(["user_id" => $user['id'], "job_request_id" => $document['job_request_id']]);
            }
            if (!empty($user['profile_image'])) {
                if (strpos($user['profile_image'], 'http') === false) {
                    $user['profile_image'] = base_url() . 'uploads/profile_images/' . $user['profile_image'];
                }
            } else {
                $user['profile_image'] = base_url() . 'uploads/profile_images/default.png';
            }
            if ($user['user_type'] == 1 or $user['user_type'] == 3) {
                $this->db->select('agent_details.fk_service_sub_cat_id,agent_details.fk_service_cat_id,service_category.name as category_name,service_sub_category.name as sub_category_name ');
                $this->db->where('fk_agent_id', $user['id']);
                $this->db->join('service_sub_category', 'service_sub_category.id=agent_details.fk_service_sub_cat_id');
                $this->db->join('service_category', 'service_category.id=service_sub_category.fk_service_cat_id');
                $provider = $this->db->get('agent_details')->row_array();

                $user['fk_service_sub_cat_id'] = $provider['fk_service_sub_cat_id'];
                $user['fk_service_cat_id'] = $provider['fk_service_cat_id'];
                $user['category_name'] = $provider['category_name'];
                $user['sub_category_name'] = $provider['sub_category_name'];
            }
            //$user['servent_profile'] = "";
            if ($user['user_type'] == 3) {
                $this->db->where('fk_user_id', $user['id']);
                $user['servent_profile'] = $this->db->get('servent_details')->row_array();
                //pre($user['servent_profile']); die;
                if (empty($user['servent_profile'])) {
                    $user['servent_profile']['id'] = "";
                    $user['servent_profile']['fk_user_id'] = "";
                    $user['servent_profile']['age'] = "";
                    $user['servent_profile']['gender'] = "";
                    $user['servent_profile']['marital_status'] = "";
                    $user['servent_profile']['experience'] = "";
                    $user['servent_profile']['highest_degree'] = "";
                    $user['servent_profile']['current_org'] = "";
                    $user['servent_profile']['occupation'] = "";
                    $user['servent_profile']['expected_salary'] = "";
                    $user['servent_profile']['nationality'] = "";
                    $user['servent_profile']['city'] = "";
                    $user['servent_profile']['cv_url'] = "";
                    $user['servent_profile']['video_url'] = "";
                    $user['servent_profile']['about_servent'] = "";
                    $user['servent_profile']['religion'] = "";
                }
            }
        }
        return ($user) ? $user : false;
    }

    function get_providers($document) { //pre($document);
        $final_providers = array();
        //$this->db->select("users.*,agent_details.agent_details,users.id as id");
        if (isset($document['id']) and ! empty($document['id'])) {
            $this->db->where('id', $document['id']);
        }
        if (isset($document['g_id']) and ! empty($document['g_id'])) {
            $this->db->where('g_id', $document['g_id']);
        }
        if (isset($document['fb_id']) and ! empty($document['fb_id'])) {
            $this->db->where('fb_id', $document['fb_id']);
        }
        if (isset($document['email']) and ! empty($document['email'])) {
            $this->db->where('email', $document['email']);
        }
        if (isset($document['mobile']) and ! empty($document['mobile'])) {
            $this->db->where('mobile', $document['mobile']);
        }
        if (isset($document['device_token']) and ! empty($document['device_token'])) {
            $this->db->where('device_token', $document['device_token']);
        }
        if (isset($document['service_sub_cat_id']) and ! empty($document['service_sub_cat_id'])) {
            $this->db->where('fk_service_sub_cat_id', $document['service_sub_cat_id']);
        }
        //$this->db->join('agent_details','agent_details.fk_agent_id=users.id');
        $this->db->join('agent_details', 'agent_details.fk_agent_id=users.id');
        $providers = $this->db->get('users')->result_array();
        if ($providers) {
            foreach ($providers as $provider) {
                $provider['job_ratings'] = "";
                $provider['ratings'] = $this->user_ratings(["user_id" => $provider['id']]);
                if (isset($document['job_post_id'])) {
                    $provider['job_ratings'] = $this->user_ratings(["user_id" => $provider['id'], "job_post_id" => $document['job_post_id']]);
                }
                if (isset($document['job_request_id'])) {
                    $provider['job_ratings'] = $this->user_ratings(["user_id" => $provider['id'], "job_request_id" => $document['job_request_id']]);
                }
                if (!empty($provider['profile_image'])) {
                    if (strpos($provider['profile_image'], 'http') === false) {
                        $provider['profile_image'] = base_url() . 'uploads/profile_images/' . $provider['profile_image'];
                    }
                } else {
                    $provider['profile_image'] = base_url() . 'uploads/profile_images/default.png';
                }
                $final_providers[] = $provider;
            }
        }
        return $final_providers;
    }

    function user_ratings($document) {
        $this->db->select('AVG(ratings) as rating');
        if (isset($document['job_post_id'])) {
            $this->db->where('fk_job_post_id', $document['job_post_id']);
        }
        if (isset($document['job_request_id'])) {
            $this->db->where('fk_job_request_id', $document['job_request_id']);
        }
        $this->db->where('to_id', $document['user_id']);
        $ratings = $this->db->get('ratings')->row_array();
        return (!empty($ratings['rating'])) ? $ratings['rating'] : "";
    }

    function insert_agent_details($document) {
        $this->db->insert('agent_details', $document);
        $agent['id'] = $this->db->insert_id();
        return $user;
    }

    function update_agent_details($document) { //pre($document);
        $this->db->where('fk_agent_id', $document['fk_agent_id']);
        $this->db->update('agent_details', $document);
        return true;
    }

    function user_sign_up($document) { //pre($document); 
        if ($document['user_type'] == 1 or $document['user_type'] == 3) {
            $agent['fk_service_cat_id'] = $document['fk_service_cat_id'];
            $agent['fk_service_sub_cat_id'] = $document['fk_service_sub_cat_id'];
            unset($document['fk_service_cat_id'], $document['fk_service_sub_cat_id']);
            $document['status'] = 2;
        }
        if ($document['user_type'] == 0) {
            $document['status'] = 1;
        }
        //pre($document); die;
        $document['create_date'] = date('Y-m-d H:i:s');
        $this->db->insert('users', $document);
        $user['id'] = $this->db->insert_id();
        if ($document['user_type'] == 1 or $document['user_type'] == 3) {
            $agent['fk_agent_id'] = $user['id'];
            $this->db->insert('agent_details', $agent);
        }
        $user = $this->get_user($user);
        return $user;
    }

    function edit_user($document) {
        //$document['create_date'] = date('Y-m-d H:i:s');
        $document['modify_date'] = date('Y-m-d H:i:s');
        if (isset($document['id'])) {
            $this->db->where('id', $document['id']);
        }
        return $this->db->update('users', $document);
        //return $user;
    }

    function create_servant_profile($document) { //pre($document); die;
        //$id = $this->db->query("Select id from re_servent_details where `fk_user_id` = $document[fk_user_id]")->row()->id;
        $this->db->where('fk_user_id', $document['fk_user_id']);
        $result = $this->db->get('servent_details')->row_array();
        if ($result) {
            $this->db->where('fk_user_id', $document['fk_user_id']);
            return $this->db->update('servent_details', $document);
        } else {
            return $this->db->insert('servent_details', $document);
        }
        //return $user;
    }

    function get_servent($document) {
        $this->db->select('users.*,agent_details.*, users.id as id');
        $this->db->where('agent_details.fk_service_sub_cat_id', $document['fk_service_sub_cat_id']);
        $this->db->join('agent_details', 'agent_details.fk_agent_id =  users.id');
        $this->db->join('servent_details', 'servent_details.fk_user_id =  agent_details.fk_agent_id', "left");
        $servents = $this->db->get('users')->result_array();
        //pre($servents); die; 
        foreach ($servents as $servent) {
            $filter['id'] = $servent['id'];
            $result[] = $this->get_user($filter);
        }
        return $result;
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Job_post_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function post_a_job_main_details($document) {
        $result = $this->db->insert('job_posts', $document);
    }

    function get_promo_code($document) {
        $user_id = $this->session->userdata['active_user_data']['id'];
        $this->db->where('code', $document['code']);
        $result = $this->db->get('promo_codes')->row_array();

        $this->db->select('no_of_used as code_used');
        $this->db->where('fk_code_id', $result['id']);
        $this->db->where('fk_user_id', $user_id);
        $code_used = $this->db->get('promo_codes_used')->row_array();
        $result['code_used'] = $code_used['code_used'];
        //pre($result); die;
        return $result;
    }

    function apply_promo_code($document) {
        //pre($document['no_of_used']); die;
        if ($document['no_of_used'] > 0) {
            $code_used = $document['no_of_used'] + 1;
            $this->db->where('fk_user_id', $document['fk_user_id']);
            $this->db->where('fk_code_id', $document['fk_code_id']);
            $this->db->update('promo_codes_used', array('no_of_used' => $code_used));
        } else {
            $document['no_of_used'] = 1;
            $this->db->insert('promo_codes_used', $document);
        }
    }

    function post_a_job($document) {//pre($document);die;
        if (isset($document['check_promocode'])) {
            if ($document['check_promocode'] == 1) {
                $promocode = $document['promocode']; //fetching promo code id by form
                unset($document['check_promocode'], $document['promocode']);
            }
        }
        $main['fk_user_id'] = $document['fk_user_id'];
        $main['fk_service_cat_id'] = $document['fk_service_cat_id'];
        $main['fk_service_sub_cat_id'] = $document['fk_service_sub_cat_id'];
        $main['mobile'] = $document['mobile'];
        $main['create_date'] = date('Y-m-d H:i:s');
        $main['is_approved'] = 1;
        //pre($document);pre($main);die;
        $inserted = $this->post_a_job_main_details($main);
        $result['fk_job_post_id'] = $sub_data['fk_job_post_id'] = $this->db->insert_id();
        

        if (isset($promocode)) {
            $promo_code_id = $this->get_promo_code(["code" => $promocode]);
            $inserted_promo_data = array(
                'fk_code_id' => $promo_code_id['id'],
                'fk_user_id' => $main['fk_user_id'],
                'fk_job_post_id' => $sub_data['fk_job_post_id'],
                'no_of_used' => $promo_code_id['code_used'],
                'create_date' => date('Y-m-d H:i:s')
            );
            $inserted = $this->apply_promo_code($inserted_promo_data);
        }

        if ($document['fk_service_cat_id'] == 1) {
            $keys = ["title", "description", "workforce", "dated", "timed", "budget", "address", "latitude", "longitude", "self_material"];
            foreach ($document as $key => $d) {
                if (in_array($key, $keys)) {
                    $sub_data[$key] = $document[$key];
                }
            }
            //pre($sub_data); die;
            $result = $this->db->insert('job_household', $sub_data);
        }
        if ($document['fk_service_cat_id'] == 2) {
            $keys = ["title", "description", "dated", "workforce", "timed", "budget", "address", "latitude", "longitude", "self_material"];
            foreach ($document as $key => $d) {
                if (in_array($key, $keys)) {
                    $sub_data[$key] = $document[$key];
                }
            }
            //pre($sub_data); die;
            $result = $this->db->insert('job_outdoor', $sub_data);
        }
        if ($document['fk_service_cat_id'] == 3) {
            $keys = ["title", "description", "dated", "workforce", 'gender_priority', "timed", "budget", "address", "latitude", "longitude", "self_material"];
            foreach ($document as $key => $d) {
                if (in_array($key, $keys)) {
                    $sub_data[$key] = $document[$key];
                }
            }
            $result = $this->db->insert('job_personal', $sub_data);
        }
        if ($document['fk_service_cat_id'] == 4) {
            $keys = ["items", "source", "destination", "budget", "timed", "dated", "is_assist", "is_insured", "self_material", "source_latitude", "source_longitude", "dest_latitude", "dest_longitude"];
            foreach ($document as $key => $d) {
                if (in_array($key, $keys)) {
                    $sub_data[$key] = $document[$key];
                }
            }
            //pre($sub_data);die;
            $result = $this->db->insert('job_transport', $sub_data);
        }
    }

    function get_subcategories_by_cat_id($document) { //pre($document);
        $this->db->select('service_sub_category.id as sub_id, service_sub_category.name as sub_name,service_category.name as cat_name');
        $this->db->where('service_sub_category.fk_service_cat_id', $document['cat_id']);
        $this->db->join('service_category', 'service_category.id = service_sub_category.fk_service_cat_id');
        //echo $this->db->last_query(); die()
        $exist = $this->db->get('service_sub_category')->result_array();
        //pre($exist); die;
        return $exist;
    }

    function get_user_job_post_details($filters) {
        if(isset($filters['fk_provider_id'])){
        $this->db->where('fk_provider_id', $filters['fk_provider_id']);
        }
        $this->db->where('fk_job_post_id', $filters['job_id']);
        $lists = $this->db->get($filters['table'])->row_array();
        return $lists;
    }

    function get_user_job_posts($filters) { //pre($document);  
        $final = array();
        if(isset($filters['fk_provider_id'])){
            $this->db->select('job_posts.*,job_request.fk_provider_id,service_category.name as cate_name,service_sub_category.name as sub_cat_name,');
        }else{
           $this->db->select('job_posts.*,service_category.name as cate_name,service_sub_category.name as sub_cat_name,'); 
        }
        
        if (isset($filters['is_approved'])) {
            $this->db->where('job_posts.is_approved', $filters['is_approved']);
        }
        if (isset($filters['fk_job_post_id'])) {
            $this->db->where('job_posts.id', $filters['fk_job_post_id']);
        }
        if (isset($filters['status'])) {
            $this->db->where('job_posts.status', $filters['status']);
        }
        if (isset($filters['user_id'])) {
            $this->db->where('fk_user_id', $filters['user_id']);
        }
        
        if (isset($filters['fk_service_cat_id'])) {
            $this->db->where('job_posts.fk_service_cat_id', $filters['fk_service_cat_id']);
        }
        if (isset($filters['fk_service_sub_cat_id'])) {
            $this->db->where('job_posts.fk_service_sub_cat_id', $filters['fk_service_sub_cat_id']);
        }
        if(isset($filters['fk_provider_id'])){
            $this->db->where('job_request.fk_provider_id', $filters['fk_provider_id']);
        }
        
        $this->db->join('service_sub_category', 'service_sub_category.id=job_posts.fk_service_cat_id');
        $this->db->join('service_category', 'service_category.id=job_posts.fk_service_cat_id');
        if(isset($filters['fk_provider_id'])){
            $this->db->join('job_request', 'job_request.fk_job_post_id=job_posts.id');
        }
        $this->db->order_by('id', 'desc');
        $lists = $this->db->get('job_posts')->result_array();
        //pre($lists); die;
        //pre($result['fk_job_post_id']); die;
       if ($lists) {
            $tables = array("", "job_household", "job_outdoor", "job_personal", "job_transport");
            foreach ($lists as $list) {
                $list['post_images'] = [];
                $this->db->select('image');
                $this->db->where('fk_job_post_id', $list['id']);
                $list['post_images'] = $this->db->get('job_post_images')->result_array();
               
                //0-pending, 1-accepted, 2-completed, 3- rejected                
                $details['table'] = $tables[$list['fk_service_cat_id']];
                $details['job_id'] = $list['id'];
                
                $list['title'] = $list['dated'] = $list['description'] = "";
                
                $l = $this->get_user_job_post_details($details);
                
                $list['address'] = $list['items'] = $list['is_insured'] = $list['workforce'] = $list['latitude'] = $list['longitude'] = $list['source'] = $list['destination'] = "";
                $list['source_latitude'] = $list['source_latitude'] = $list['source_longitude'] = $list['dest_latitude'] = $list['dest_longitude'] = "";
                $list['title'] = $l['title'];
                $list['description'] = $l['description'];
                $list['budget'] = $l['budget'];
                $list['self_material'] = $l['self_material'];
                $list['dated'] = $l['dated'];
                $list['timed'] = $l['timed'];
                if ($list['fk_service_cat_id'] == 4) {
                    $list['source'] = $l['source'];
                    $list['destination'] = $l['destination'];
                    $list['source_latitude'] = $l['source_latitude'];
                    $list['source_longitude'] = $l['source_longitude'];
                    $list['dest_latitude'] = $l['dest_latitude'];
                    $list['dest_longitude'] = $l['dest_longitude'];
                } else {
                    $list['address'] = $l['address'];
                    $list['workforce'] = $l['workforce'];
                    $list['latitude'] = $l['latitude'];
                    $list['longitude'] = $l['longitude'];
                }
                
                $final[] = $list;
            }
        }
        //pre($final); die;
        return $final;
    }

    function user_posts($document) { //pre($document); die;
        $final = array();
        //$this->db->select('job_posts.*');
        if (isset($document['status'])) {
            $this->db->where('job_posts.status', $document['status']);
            if (isset($document['service_cat_id'])) {
                $this->db->where('job_posts.fk_service_cat_id', $document['service_cat_id']);
                $this->db->where('job_posts.fk_service_sub_cat_id', $document['service_sub_cat_id']);
            }
        }
        if (isset($document['fk_job_post_id'])) {
            $this->db->where('job_posts.id', $document['fk_job_post_id']);
            //$this->db->where('job_posts.fk_job_post_id', $document['fk_job_post_id']);
        }
        if (isset($document['where_in'])) {
            $this->db->where_in('job_posts.status', $document['where_in']);
        }
        if (isset($document['user_id'])) {
            $this->db->where('job_posts.fk_user_id', $document['user_id']);
        }
        $this->db->order_by('id', 'desc');
        $results = $this->db->get('job_posts')->result_array();
        //pre($results);die;
        if ($results) {
            foreach ($results as $result) {//pre($results); die();
                $tables = [" ", "job_household", "job_outdoor", "job_personal", "job_transport"];

                $table = $tables[$result['fk_service_cat_id']];
                //pre($table);die;
                $this->db->where('fk_job_post_id', $result['id']);
                $res = $this->db->get($table)->row_array();

                //pre($res); die;
                if ($res) {
                    foreach ($res as $k => $r) {
                        //pre($k); //die;
                        $result[$k] = $res[$k];
                        //pre($result); 
                    }
                }
                //pre($res); die;
                if ($this->session->userdata('active_user_data')['user_type'] == 0) {
                    $this->db->select('job_request.*,users.*,job_request.id as id,job_request.create_date as posted_date');
                    $this->db->where('fk_job_post_id', $result['fk_job_post_id']);
                    $this->db->join('users', 'users.id = job_request.fk_provider_id');
                    $request = $this->db->get('job_request')->result_array();
                    //echo $this->db->last_query();
                    $result['providers'] = $request;
                    //pre($request);die;
                }
                //pre($result['fk_job_post_id']); die;
                $this->db->where('fk_job_post_id', $result['fk_job_post_id']);
                $result['images'] = $this->db->get('job_post_images')->result_array();
                $final[] = $result;
                //pre($result['images']);die;
            }
            //pre($result['images']);die;
            return $final;
        }
    }

    function provider_request($document) { //pre($document);
//        if($document['fk_service_cat_id']==1){
//        $this->db->where('fk_job_post_id', $document['fk_job_post_id']);
//        pre($exist); die;
//        }
//        $this->db->join('agent_details', 'agent_details.fk_agent_id = users.id');
//        $exist = $this->db->get('users')->result_array();
        //pre($document);die;
        $this->db->where('fk_job_post_id', 1);
        $exist = $this->db->get('job_request')->result_array();
        return $exist;
    }

    function job_detail($document) { //pre($document);
        if ($document['fk_service_cat_id'] == 1) {
            $this->db->where('fk_job_post_id', $document['fk_job_post_id']);
            $exist = $this->db->get('job_household')->result_array();
            //pre($exist); die;
            return $exist;
        }
        if ($document['fk_service_cat_id'] == 2) {
            $this->db->where('fk_job_post_id', $document['fk_job_post_id']);
            $exist = $this->db->get('job_outdoor')->result_array();
            //pre($exist); die;
            return $exist;
        }
        if ($document['fk_service_cat_id'] == 3) {
            $this->db->where('fk_job_post_id', $document['fk_job_post_id']);
            $exist = $this->db->get('job_personal')->result_array();
            //pre($exist); die;
            return $exist;
        }
        if ($document['fk_service_cat_id'] == 4) {
            $this->db->where('fk_job_post_id', $document['fk_job_post_id']);
            $exist = $this->db->get('job_transport')->result_array();
            //pre($exist); die;
            return $exist;
        }
    }
    
    
    function check_payment_status($document){
        if(isset($document['fk_provider_id'])){
            $this->db->where('fk_provider_id',$document['fk_provider_id']);
        }
        if(isset($document['fk_customer_id'])){
            $this->db->where('fk_customer_id',$document['fk_customer_id']);
        }
        if(isset($document['fk_job_post_id'])){
            $this->db->where('fk_job_post_id',$document['fk_job_post_id']);
        }
        $result = $this->db->get('payment_details')->row_array();
        return $result;

    }

}

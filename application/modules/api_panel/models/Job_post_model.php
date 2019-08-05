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

    function job_request_by_provider($document) {
        $document['create_date'] = date('Y-m-d');
        $result = $this->db->insert('job_request', $document);
        return true;
    }

    function update_job_request($document) {
        if (isset($document['final_price']) && !empty($document['final_price'])) { //die('dsfjb');
            $this->db->where('id', $document['id']);
            $job_request = $this->db->get('job_request')->row_array();

            $this->db->where('id', $job_request['fk_job_post_id']);
            $result = $this->db->update('job_posts', array("status" => 1));

            $document['provider_status'] = 0;
            $document['status'] = 1;

            $this->db->where('id', $job_request['fk_customer_id']);
            $customer = $this->db->get('users')->row_array();
            //echo $this->db->last_query();pre($customer); //die('dsfde');

            $push_data['title'] = "push_type_12_title";
            $push_data['message'] = "push_type_12_message";
            $push_data['push_type'] = "1012";
            $push_data['key'] = "value";
            $push_data['data'] = $push_data;
            generatePush($customer['device_type'], $customer['device_token'], $push_data);
        }
        $this->db->where('id', $document['id']);
        $result = $this->db->update('job_request', $document);
        return true;
    }

    function insert_job_details($document) {
        if ($document['service_cat_id'] == 1) {
            $table = "job_household";
        } else if ($document['service_cat_id'] == 2) {
            $table = "job_outdoor";
        } else if ($document['service_cat_id'] == 3) {
            $table = "job_personal";
        } else if ($document['service_cat_id'] == 4) {
            $table = "job_transport";
        }
        //$document['fk_job_post_id'] = $document['service_cat_id'];
        unset($document['user_id'], $document['service_cat_id'], $document['service_sub_cat_id'], $document['create_date'], $document['mobile']);
        $result = $this->db->insert($table, $document);
        return true;
    }

    function job_post($document) { //pre($document);        
        /* if (isset($document['job_post_images'])) {            
          $_FILES['job_post_images'] = file_upload(array("key" => "job_post_images", "path" => "/var/www/html/real_estate/job_post_images/",));
          $data['image'] = $document['job_post_images'];
          $data['fk_job_post_id'] = $document['fk_job_post_id'];
          $data['create_date'] = date("y-m-d h:i:s");
          $this->db->insert('job_post_images', $data);
          unset($document['job_post_images']);
          } */
        if (isset($document['promo_code']) and ! empty($document['promo_code'])) {
            $promo_code = $document['promo_code'];
            $no_of_used = $document['no_of_used'];
            unset($document['promo_code'], $document['no_of_used']);
        }
        if (isset($document['job_post_images'])) {
            $uploaded_images = (array) $document['job_post_images'];
            unset($document['job_post_images']);
        }
        $main['fk_user_id'] = $document['user_id'];
        $main['fk_service_cat_id'] = $document['service_cat_id'];
        $main['fk_service_sub_cat_id'] = $document['service_sub_cat_id'];
        $main['create_date'] = date("y-m-d h:i:s");
        $main['mobile'] = $document['mobile'];
        $result = $this->db->insert('job_posts', $main);
        $document['fk_job_post_id'] = $this->db->insert_id();
        $this->insert_job_details($document);
        //$this->insert_job_images($images);
        if (isset($promo_code)) {
            $promo['fk_code_id'] = $promo_code;
            $promo['fk_user_id'] = $document['user_id'];
            $promo['fk_job_post_id'] = $document['fk_job_post_id'];
            $promo['no_of_used'] = $no_of_used;
            $promo['create_date'] = time();
            $this->db->insert('promo_codes_used', $insert_images);
        }

        if (isset($uploaded_images)) {
            $insert_images['fk_job_post_id'] = $document['fk_job_post_id'];
            $insert_images['create_date'] = date("Y-m-d H:i:s");
            foreach ($uploaded_images as $image) {
                $insert_images['image'] = $image;
                $this->db->insert('job_post_images', $insert_images);
            }
        }
        /*
          if (isset($uploaded_images)) {
          $insert_images['fk_job_post_id']    = $document['fk_job_post_id'];
          $insert_images['create_date']       = date("Y-m-d H:i:s");
          $path                               = base_url()."uploads/job_posts/";
          $images                             = upload_multiple_images_for_app($uploaded_images,$path);
          foreach ($images as $image) {
          $insert_images['image'] = $image;
          $this->db->insert('job_post_images', $insert_images);
          }
          } */
        return $result;
    }

    function get_user_job_post_details($filters) {
        $this->db->where('fk_job_post_id', $filters['job_id']);
        $lists = $this->db->get($filters['table'])->row_array();
        return $lists;
    }

    function get_all_request_for_a_job_post($filters) {
        $final = array();
        $url = base_url('uploads/profile_images/');
        $this->db->select('job_request.*,users.name,users.mobile,profile_image,agent_details.fk_service_cat_id,agent_details.fk_service_sub_cat_id,service_category.name as service_cat_name,service_sub_category.name as service_sub_cat_name');
        if (isset($filters['with_final_provider']) && !empty($filters['with_final_provider'])) {
            $this->db->where_in('job_request.status', [5, 2, 1]);
        }
        $this->db->where('job_request.fk_job_post_id', $filters['fk_job_post_id']);
        $this->db->join('users', 'users.id = job_request.fk_provider_id');
        $this->db->join('agent_details', 'users.id = agent_details.fk_agent_id');
        $this->db->join('service_category', 'service_category.id = agent_details.fk_service_cat_id');
        $this->db->join('service_sub_category', 'service_sub_category.id = agent_details.fk_service_sub_cat_id');
        $requested = $this->db->get('job_request')->result_array();
        if ($requested) { //pre($requested);
            foreach ($requested as $request) {
                $request['is_completed'] = 0;
                $request['is_payment'] = 0;
                $request['is_rating'] = 0;
                $request['txn_id'] = "";
                $request['amount'] = "";
                $request['tip'] = "";
                $request['total_amount'] = "";
                if ($request['status'] == 2) {
                    $request['is_completed'] = 1;
                    $this->db->where('fk_job_request_id', $request['id']);
                    $paymnt = $this->db->get('payment_details')->row_array();
                    if ($paymnt) {
                        $request['is_payment'] = 1;
                        $request['txn_id'] = $paymnt['txn_id'];
                        $request['amount'] = $paymnt['amount'];
                        $request['tip'] = $paymnt['tip'];
                        $request['total_amount'] = $paymnt['total_amount'];
                    }
                    $rated = $this->db->get('ratings')->row_array();
                    if ($rated) {
                        $request['is_rating'] = 1;
                    }
                }


                if (!empty($request['profile_image'])) {
                    $request['profile_image'] = $url . $request['profile_image'];
                }
                $request['job_ratings'] = "";
                $request['ratings'] = $this->user_ratings(["user_id" => $request['fk_provider_id']]);
                //if(isset($document['fk_job_post_id'])){
                $request['job_ratings'] = $this->user_ratings(["user_id" => $request['fk_provider_id'], "job_request_id" => $request['id']]);
                //}               
                $final[] = $request;
            }
        }
        //pre($request);
        return $final;
    }

    function is_post_requested_by_provider($filters) {
        $this->db->where('job_request.fk_job_post_id', $filters['fk_job_post_id']);
        $this->db->where('job_request.fk_provider_id', $filters['fk_provider_id']);
        $requested = $this->db->get('job_request')->row_array();
        return $requested;
    }

    function get_user_job_posts($filters) { //pre($document);  
        $final = array();
        $this->db->select('job_posts.*,service_category.name as cate_name,service_sub_category.name as sub_cat_name,users.name,users.profile_image');
        if (isset($filters['fk_job_post_id'])) {
            $this->db->where('job_posts.id', $filters['fk_job_post_id']);
        }
        if (isset($filters['status'])) {
            $this->db->where('status', $filters['status']);
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
        $this->db->join('service_sub_category', 'service_sub_category.id=job_posts.fk_service_cat_id');
        $this->db->join('service_category', 'service_category.id=job_posts.fk_service_cat_id');
        $this->db->join('users', 'users.id=job_posts.fk_user_id');
        $this->db->order_by('job_posts.id', 'desc');
        $lists = $this->db->get('job_posts')->result_array();
        if ($lists) {
            //pre($lists);
            $tables = array("", "job_household", "job_outdoor", "job_personal", "job_transport");
            foreach ($lists as $list) {
                //$list['customer']       = $list['fk_user_id'];
                //0-pending, 1-accepted, 2-completed, 3- rejected                
                $details['table'] = $tables[$list['fk_service_cat_id']];
                $details['job_id'] = $list['id'];
                $list['title'] = $list['dated'] = $list['description'] = "";
                $list['post_images'] = [];
                $l = $this->get_user_job_post_details($details); //pre($l);
                if ($l) {
                    $list['address'] = $list['workforce'] = $list['latitude'] = $list['longitude'] = $list['source'] = $list['destination'] = "";
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
                }
                $list['is_payment'] = 0;
                $list['txn_id'] = "";
                $list['amount'] = "";
                $list['tip'] = "";
                $list['total_amount'] = "";
                $payment = $this->get_payment_details(array("job_post_id" => $list['id']));
                if ($payment) {
                    $list['is_payment'] = 1;
                    $list['txn_id'] = $payment['txn_id'];
                    $list['amount'] = $payment['amount'];
                    $list['tip'] = $payment['tip'];
                    $list['total_amount'] = $payment['total_amount'];
                }
                if (!empty($list['profile_image'])) {
                    $list['profile_image'] = base_url() . 'uploads/profile_images/' . $list['profile_image'];
                }
                $images = [];
                //$url = base_url() . "uploads/job_posts/";
                $this->db->select("image");
                $this->db->where('fk_job_post_id', $details['job_id']);
                $imgs = $this->db->get('job_post_images')->result_array();
                if ($imgs) {
                    
                    foreach ($imgs as $image) {
                        $images[] = base_url() . "uploads/job_posts/".$image['image'];
                    }
                    $list['post_images'] = $images;
                }
                $final[] = $list;
            }
        }
        return $final;
    }

    function get_payment_details($filters) {
        if (isset($filters['job_request_id'])) {
            $this->db->where('fk_job_request_id', $filters['job_request_id']);
        }
        if (isset($filters['job_post_id'])) {
            $this->db->where('fk_job_post_id', $filters['job_post_id']);
        }
        $payment = $this->db->get('payment_details')->row_array();
        return $payment;
    }

    function get_provider_job_requests($filters) { //pre($document);  
        $final = array();
        if (isset($filters['user_id'])) {
            $this->db->where('fk_user_id', $filters['user_id']);
        }
        if (isset($filters['fk_service_cat_id'])) {
            //$this->db->where('re_job_posts.fk_service_cat_id',$filters['fk_service_cat_id']);
        }
        if (isset($filters['fk_service_sub_cat_id'])) {
            //$this->db->where('re_job_posts.fk_service_sub_cat_id',$filters['fk_service_sub_cat_id']);
        }
        $this->db->join('job_posts', 'job_posts.id=job_request.fk_job_post_id');
        $this->db->join('service_sub_category', 'service_sub_category.id=job_posts.fk_service_cat_id');
        $this->db->join('service_category', 'service_category.id=job_posts.fk_service_cat_id');
        $lists = $this->db->get('job_request')->result_array();
        if ($lists) {
            $tables = array("", "job_household", "job_household", "job_household", "job_household");
            foreach ($lists as $list) {
                $details['table'] = $tables[$list['fk_service_cat_id']];
                $details['job_id'] = $list['id'];
                $list['title'] = $list['dated'] = $list['description'] = "";
                $list['post_images'] = [];
                $l = $this->get_user_job_post_details($details);
                //pre($l);
                if ($l) {
                    $list['title'] = $l['title'];
                    $list['dated'] = $l['dated'];
                    $list['description'] = $l['description'];
                }
                $final[] = $list;
            }
        }
        return $final;
    }

    function get_request_data($input) { //pre($input);
        if(isset($input['id'])){
            $this->db->where('id', $input['id']);
        }
        if(isset($input['job_request_id'])){
            $this->db->where('id', $input['job_request_id']);
        }
        $job_request = $this->db->get('job_request')->row_array();

        return $job_request;
    }


    function response_to_request($filters) { //pre($filters);
        $this->db->where('id', $filters['job_request_id']);
        $job_request = $this->db->get('job_request')->row_array();
        // pre($job_request);
        if ($filters['status'] == 1 && !empty($job_request['final_price'])) {
            $request_update = array("customer_status" => $filters['status'], "status" => $filters['status'], "final_price" => "", "quotation" => $job_request['final_price']);
        } else {
            $request_update = array("customer_status" => $filters['status'], "status" => $filters['status']);
        }

        $this->db->where('id', $filters['job_request_id']);
        $result = $this->db->update('job_request', $request_update);

        $this->db->where('id', $job_request['fk_job_post_id']);
        $this->db->update('job_posts', array("status" => $filters['status']));
        // payment 
        $return = array("fk_job_post_id" => $job_request['fk_job_post_id'], "fk_job_request_id" => $job_request['id'], "fk_customer_id" => $job_request['fk_customer_id'], "fk_provider_id" => $job_request['fk_provider_id']);
        if ($filters['status'] == 2) {
            $payment = $return;
            $payment['tip'] = $filters['tip'];
            $payment['amount'] = $filters['amount'];
            $payment['total_amount'] = $filters['total_amount'];
            $payment['txn_id'] = 'MH00' . $job_request['id'];
            $payment['create_date'] = time();
            $result = $this->db->insert('payment_details', $payment);
        }
        return $return;
    }

    function provider_response_to_request($filters) { //pre($filters);
        $this->db->where('id', $filters['job_request_id']);
        $job_request = $this->db->get('job_request')->row_array();
        $request_update = array("provider_status" => $filters['status']);
        if ($filters['status'] == 5) {
            $request_update = array("provider_status" => 5, "status" => 5);
            $this->db->where('id', $job_request['fk_job_post_id']);
            $this->db->update('job_posts', array("status" => 5));
        }
        $this->db->where('id', $filters['job_request_id']);
        $result = $this->db->update('job_request', $request_update);
        $return = array("fk_job_post_id" => $job_request['fk_job_post_id'], "fk_job_request_id" => $filters['job_request_id'], "fk_customer_id" => $job_request['fk_customer_id'], "fk_provider_id" => $job_request['fk_provider_id']);
        return $return;
    }

    function service_rating($ratings) {
        $ratings['create_date'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('ratings', $ratings);
        return $result;
    }

    function get_service_reviews($ratings) {
        $this->db->select('ratings.*,users.name as from_name');
        if (isset($ratings['user_id']) & !empty($ratings['user_id'])) {
            $this->db->where('to_id', $ratings['user_id']);
        }
        $this->db->join('users', 'users.id=ratings.from_id');
        $result = $this->db->get('ratings')->result_array();
        //$this->db->where('id',$ratings['user_id']);
        //$result['user']=$this->db->get('users')->result_array();

        return $result;
    }

    function get_servent_request($document) {
         $this->db->select('users.*,agent_details.*,servent_details.*,users.id as id,service_sub_category.name as service_sub_category_name,servent_request.status');
        
        if (isset($document['id']) && !empty($document['id'])) {
            $this->db->where('servent_request.id', $document['id']);
        }
        if (isset($document['user_id']) && !empty($document['user_id'])) {
            $this->db->where('servent_request.fk_user_id', $document['user_id']);
        }
        if (isset($document['servent_id']) && !empty($document['servent_id'])) {
            $this->db->where('status', 1);
            $this->db->where('servent_request.fk_servent_id', $document['servent_id']);
        }
        if (isset($document['status'])) {
            $this->db->where('servent_request.status', $document['status']);
        } 

        $this->db->join('users', 'users.id = servent_request.fk_servent_id');
        $this->db->join('servent_details', 'servent_details.fk_user_id = users.id');
        $this->db->join('agent_details', 'agent_details.fk_agent_id = servent_details.fk_user_id');
        $this->db->join('service_sub_category', 'service_sub_category.id = agent_details.fk_service_sub_cat_id');
        $results = $this->db->get('servent_request')->result_array();
        return $results;
        
    }
    
    function create_request_for_servent($document) {
        $document['create_date'] = $document['modify_date'] = date('Y-m-d H:i:s');
        $this->db->insert('servent_request',$document);
        return $this->db->insert_id();
    }
    
    function delete_servent_request_by_user($document) { //pre($document);
        $this->db->where('id', $document['id']);
        $this->db->delete('servent_request');
        return true;
    }
    
    
    

}

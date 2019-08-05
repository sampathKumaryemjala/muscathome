<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Payment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_payments($document) {
        $final =  array();
        //$this->db->select('AVG(ratings) as rating');
        if(isset($document['fk_customer_id'])){
            $this->db->where('fk_customer_id', $document['fk_customer_id']);
        }
        if(isset($document['fk_provider_id'])){
            $this->db->where('fk_provider_id', $document['fk_provider_id']);
        }
        if(isset($document['fk_job_post_id'])){
            $this->db->where('fk_job_post_id', $document['fk_job_post_id']);
        }
        if(isset($document['fk_job_request_id'])){
            $this->db->where('fk_job_request_id', $document['fk_job_request_id']);
        }
        $payments = $this->db->get('payment_details')->result_array();  
        if($payments){ //pre($payments);
            foreach($payments as $payment){ //pre($payment);
                $payment['customer']    = $this->User_model->get_user(array("id"=>$payment['fk_customer_id']));
                $payment['provider']    = $this->User_model->get_user(array("id"=>$payment['fk_provider_id']));
                $jobs         = $this->Job_post_model->get_user_job_posts(array("fk_job_post_id"=>$payment['fk_job_post_id']));
                $payment['job'] = $jobs[0];
                $payment['job_request'] = $this->Job_post_model->is_post_requested_by_provider(array("fk_job_post_id"=>$payment['fk_job_post_id'],"fk_provider_id"=>$payment['fk_provider_id']));
                $final[] = $payment;
            }
        }
        return $final;
    }
    

}

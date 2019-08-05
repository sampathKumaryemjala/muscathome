<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Enquiry_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function insert_general_enquiry($insert) { //pre($insert); die;
        if($insert) {
            $input['create_date'] = time();
            $result = $this->db->insert('contact_detail',$insert);
            //echo $this->db->last_query()."<br>";
        }
        return $result;
    }

}

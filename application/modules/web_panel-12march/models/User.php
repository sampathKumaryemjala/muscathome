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
        
        if(isset($data['id']) and !empty($data['id'])){
            $this->db->where('id',$data['id']);
        }
        if(isset($data['email']) and !empty($data['email'])){
            $this->db->where('email',$data['email']);
        }
        if(isset($data['password']) and !empty($data['password'])){
            $this->db->where('password',$data['password']);
        }        
        $user = $this->db->get('users')->row_array();
        return $user;
    }

    function edit_user($data) {
        $this->db->where('id',$data['id']);
        $this->db->update('users',$data);
        
    }

}

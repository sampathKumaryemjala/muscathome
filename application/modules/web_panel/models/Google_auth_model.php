<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Google_auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();   
    }

public function checkUser($array){
	
        
        $this->db->from('re_users');
        $this->db->where('email',$array['email']);
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        //
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            		/*$this->db->where('email',$prevResult['email']);
            $update = $this->db->update('re_users',array('email'=>$prevResult['email']));*/
            $userID = $prevResult;
        }else{
            //$data['created'] = date("Y-m-d H:i:s");
            //$data['modified'] = date("Y-m-d H:i:s");
			$insert_data = array(
                'name' => $array['name'],
                'email' => $array['email'],
                'login_type' => $array['login_type'],
                'g_id' => $array['g_id'],
                'user_type' => $array['user_type'],
                'profile_image' => $array['profile_image'],
                'create_date' => $array['create_date']
			);
			$this->db->insert('re_users', $insert_data);
            $insert_id = array();
            $insert_id['fk_user_id'] = $this->db->insert_id();
            $this->db->insert('re_user_details' , $insert_id);

            //get record of inserted record//
            $this->db->where('email',$insert_data['email']);
            $userID  = $this->db->get('re_users')->row();
         }

        return $userID?$userID:FALSE;
    }

}
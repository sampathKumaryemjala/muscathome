<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Home_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();   
    }

	  
	function get_user($userId)
	{
		//$data=$this->db->get_where('users',array('userId'=>$userId));
		//return $data->row_array();
	}

}
 
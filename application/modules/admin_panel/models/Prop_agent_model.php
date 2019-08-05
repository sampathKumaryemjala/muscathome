<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prop_agent_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
      //  $data['user_type'] = 2;
      //  $data['not_entire_text']=1;
      //  $data['property_size']=$data['property_size'].' '.$data['property_unit'];
      //  unset($data['property_unit']);
      //  pre($data);die;
      //  pre($data); die;
        //pre($data); die;
        $data['country_code'] ='+'.$data['country_code'];
        //pre($data);die;
	$result = $this->db->insert('users', $data);
        return $result;
    }

    function get_agents_list($document) {
        $this->db->where('user_type', '2');
        $result = $this->db->get('users')->result_array();
         //pre($result); die;
//  echo $this->db->last_query(); die;
        return $result ;
        
    }

}

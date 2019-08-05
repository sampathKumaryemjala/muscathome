<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provider_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function get_agents_list($document)
    {
       $this->db->join('users', 'users.id = agent_details.fk_agent_id');
       $data['user_type']=1;
        $this->db->where('user_type', '1');
       $result = $this->db->get('agent_details')->result_array();
       //echo $this->db->last_query(); die;
       return $result ;
    }

}

<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Service_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
 
 function get_service_category($document) {
        
        //$this->db->where('subjects.schoolId', $document['schoolId']);
        //$this->db->where('user_type',0);
       // $this->db->order_by('id','desc');
        return $this->db->get('service_Category')->result_array();
    }
}

<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Query_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
function get_properties($document) {
        return $this->db->get('contact_detail')->result_array();
    }
}
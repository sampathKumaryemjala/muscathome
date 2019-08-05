<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertisement_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_advertisements(){
        $result = $this->db->get('advertisements')->result_array();        
        return $result;
    }
    
    
    function delete_advertisement($data) {  //pre($data); die;      
        //if (isset($data['id'])) {
        $this->db->where('id', $data['id']);
        //}
        $result = $this->db->delete('properties');
        return $result;
        }
    
    function advertisement_create($data){
			echo("advertismnt model");
	//$data['user_type'] = 2;
	$data['not_entire_text']=1;
	$data['property_size']=$data['property_size'].' '.$data['property_unit'];
	unset($data['property_unit']);
	//pre($data);die;
		$this->db->insert('properties',$data);
        }	
    
}

	
    

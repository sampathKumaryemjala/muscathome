<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 
    
//    function upload_files($document) { //pre($document);
//        $uploaded = [];
//        $files = $_FILES[$document['key']];
//        for ($i = 0; $i < count($files['name']); $i++) {
//            if ($files['error'][$i] == 0) {
//                $file_name = time() . trim(basename($_FILES[$document['key']]["name"][$i]));
//                $target_file = $_SERVER['DOCUMENT_ROOT'] .'/real_estate/uploads/property_images/'. $file_name;
//                if (move_uploaded_file($_FILES[$document['key']]["tmp_name"][$i], $target_file)) {
//                    $uploaded[] = $file_name;
//                }
//            }
//        } ;
//        return $uploaded;
//    } 
//    
//    function insert_property_images($data){
//        $image['fk_property_id']=$data['id'];
//        foreach ($data['images'] as $image['image']) {
//            $this->db->insert('property_images',$image);
//        }
//    }
//
//    function update_property_status($data){
//        if(isset($data['id'])){
//            $id=$data['id'];
//            $result=$this->get_properties_by_id($id);
//            if($result['status']=='0'){
//                $insert['status']='1';
//                $insert['id']=$result['id'];
//                $this->db->where('id',$insert['id']);
//                $this->db->update('properties',$insert);
//            }
//            if($result['status']=='1'){
//                $insert['status']='0';
//                $insert['id']=$result['id'];
//                $this->db->where('id',$id);
//                $this->db->update('properties',$insert);
//            }
//            return true;
//        }
//    }
    
    function get_categories() {
        
        return $this->db->get('service_category')->result_array();
  
    }
    
    function get_subcategories($document) {
        if($document['id'])
        {
            $this->db->where('id',$document['id']);
        }
        
       $subcategories = $this->db->get('service_sub_category')->row_array();
       return $subcategories ;
  
    }
    

    function delete_subcat($data){        
        if (isset($data['id'])) {
        $this->db->where('id', $data['id']);
        }
        $result = $this->db->delete('service_sub_category');
        return $result;
    }
}

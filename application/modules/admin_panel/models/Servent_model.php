<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Servent_model extends CI_Model {
function __construct() {
parent::__construct();
}
function get_servent_request($data) {
  $final = [];
  if (isset($data['id']) and ! empty($data['id'])) {
  $this->db->where('id', $data['id']);
  }
  if (isset($data['fk_servent_id']) and ! empty($data['fk_servent_id'])) {
  $this->db->where('fk_servent_id', $data['fk_servent_id']);
  }
  if (isset($data['fk_user_id']) and ! empty($data['fk_user_id'])) {
  $this->db->where('fk_user_id', $data['fk_user_id']);
  }
  if (isset($data['status']) and ! empty($data['status'])) {
  $this->db->where('status', $data['status']);
  }
  if (isset($data['service_sub_cat']) and ! empty($data['service_sub_cat'])) {
  $this->db->where('service_sub_cat', $data['service_sub_cat']);
  }
  if (isset($data['group_by']) and ! empty($data['group_by'])) {
  $this->db->group_by(array("service_sub_cat", "fk_user_id"));
  }
  $this->db->order_by('id', 'desc');
  $requests = $this->db->get('servent_request')->result_array();
  foreach ($requests as $request) {
  $this->db->where('id', $request['fk_user_id']);
  $request['user_profile'] = $this->db->get('users')->row_array();
  $this->db->where('id', $request['fk_servent_id']);
  $request['servent_profile'] = $this->db->get('users')->row_array();
  $final[] = $request;
  }
  if (isset($data['id']) and ! empty($data['id'])) {
  return $final[0];
  } else {
  return $final;
  }
}
function change_request_status($data) {
  $status = 0;
  if($data['status'] == 0){
  $status = 1;
  }
  if($data['status'] == 1){
  $status = 2;
  }
  if($data['status'] == 2){
  $status = 0;
  }
  $this->db->where('id', $data['id']);
  $updated = $this->db->update('servent_request', array('status'=>$status));
  return $updated;
  }
  function delete_servent_request($data) {
  $this->db->where('id', $data['id']);
  $deleted = $this->db->delete('servent_request');
  return $deleted;
}

// get countries /
function getCountries()
{
  $this->db->select('id, country_name,country_code');
  $this->db->from('countries');
  //   $this->db->where('roleId !=', 1);
  $query = $this->db->get();
  
  return $query->result();
}


function getCity()
{
  $this->db->select('id, name');
  $this->db->from('cities');
  //   $this->db->where('roleId !=', 1);
  $query = $this->db->get();
  return $query->result();
}


function getServant()
{
  $this->db->select('id, name,fk_service_cat_id,');
  $this->db->from('service_sub_category');
    $this->db->where('fk_service_cat_id =', 5);
  $query = $this->db->get();
  
  return $query->result();
}
function getServantFromUserId($userId) {
  $this->db->select("*");
  $this->db->from("servent_details");
}



function add_servant($data,$cv_url,$image_url ){

  $result_country = explode('|', $data['country_code']);
  $result_city = explode('|', $data['city_id']);
  $data['create_date']=date('Y-m-d H:i:s');
  $user_data = elements(array('name','email','mobile','create_date'),$data);
  $user_data['country_code']=$result_country['1'];
  $user_data['user_type']='3';
  $user_data['status']='1';

  $this->db->insert('users',$user_data);

  $user_id = $this->db->insert_id();

  $servent_data = elements(array('gender','marital_status','experience','highest_degree','city_id','city','about_servent','cv_url','religion','current_org','age','expected_salary','nationality','commission'),$data);

  $servent_data['cv_url']=$cv_url;
  // $servent_data['video_url']=$video_url;
    $servent_data['image_url']=$image_url;
  $servent_data['city']=$result_city['0']  ;
  $servent_data['fk_user_id']=$user_id ;
  $servent_data['country_id']=$result_country['0'] ;
  $servent_data['country']=$result_country['2'];
  $servent_data['city']=$result_city['1'];

  $this->db->insert('servent_details',$servent_data);
  $data['fk_service_cat_id']='5';
  // $data['document1']=$cv_url;
  $cat_data = elements(array('fk_service_cat_id','fk_service_sub_cat_id'),$data);
  $cat_data['fk_agent_id']="$user_id";

  $this->db->insert('agent_details',$cat_data);
  return true;
  }

  //update servent form


  function update($id,$update){

    
  
      $this->db->where('fk_user_id', $id);
     
      $this->db->update('re_servent_details', $update);
       
      
      }
      function update_user_data($id,$user_data){

    
  
        $this->db->where('id', $id);
       
        $this->db->update('re_users', $user_data);
         
        
        }
}





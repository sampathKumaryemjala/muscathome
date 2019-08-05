<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Properties_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function upload_files($document) {
        pre($document);
        $uploaded = [];
        $files = $_FILES[$document['key']];
        for ($i = 0; $i < count($files['name']); $i++) {
            pre($files['name']);
            die;
            if ($files['error'][$i] == 0) {
                $file_name = time() . trim(basename($_FILES[$document['key']]["name"][$i]));
                $target_file = $_SERVER['DOCUMENT_ROOT'] . '/real_estate/uploads/properties/images/' . $file_name;
                if (move_uploaded_file($_FILES[$document['key']]["tmp_name"][$i], $target_file)) {
                    $uploaded[] = $file_name;
                }
            }
        };
        return $uploaded;
    }

    function get_property_images($document) { //pre($document);
        $this->db->where('fk_property_id', $document['property_id']);
        $images = $this->db->get('property_images')->result_array();
        return $images;
    }

    function get_property_agent_details($document) { //pre($document);
        $this->db->select('users.*,property_agent_details.*,  users.id as id ');
        $this->db->join('property_agent_details', 'property_agent_details.fk_user_id = users.id', 'left');
        $this->db->where('users.id', $document['id']);
        $agent = $this->db->get('users')->row_array();
        return $agent;
    }

    function get_user_details($document) { //pre($document);
        //$this->db->select('users.*,property_agent_details.*,  users.id as id ');
        //$this->db->join('property_agent_details', 'property_agent_details.fk_user_id = users.id','left');
        $this->db->where('users.id', $document['id']);
        $user = $this->db->get('users')->row_array();
        return $user;
    }

    function get_user($filter) {
        $this->db->where('users.id', $filter['id']);
        $user = $this->db->get('users')->row_array();
        if ($user && $user['user_type'] == 0) {
            $user = $this->get_user_details(["id" => $filter['id']]);
        } else if ($user && $user['user_type'] == 0) {
            $user = $this->get_property_agent_details(["id" => $filter['id']]);
        }
        return $user;
    }

    function get_properties($document) { //pre($document); die;
        $final = [];
        if (isset($document['property_id'])) {
            $this->db->where('id', $document['property_id']);
        }
        if (isset($document['agent_id'])) {
            $this->db->where('fk_agent_id', $document['agent_id']);
        }
        if (isset($document['status'])) {
            $this->db->where('status', $document['status']);
        }
        $this->db->order_by('id', 'desc');
        $properties = $this->db->get('properties')->result_array();
        if ($properties) {
            foreach ($properties as $property) {
                $property['images'] = $this->get_property_images(["property_id" => $property['id']]);

                $agent_detail = $this->get_user(["id" => $property['asigned_agent_id']]); //fk_agent_id
                $property['agent_detail'] = $agent_detail;
                $date1 = date('Y-m-d');
                $datee2 = explode(' ', $property['create_date']);
                $date2 = $datee2[0];
                $date1 = date_create($date1);
                $date2 = date_create($date2);
                $diff = date_diff($date2, $date1);
                //echo $diff->format("%a days");
                $property['agent_detail']['posted_date'] = $diff->format("%a Days ago");
                $final[] = $property;
            }
        }
        return $final;
    }

    function chech_property_have_any_offer($myarray) {
        $this->db->where('fk_property_id', $myarray['id']);
        return $this->db->get('offers_to_properties')->row_array();
    }

    function get_properties_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('properties')->row_array();
    }

    function property_create($inputs) {
        //pre($inputs); die;

        if (isset($inputs['id'])) {
            $user['modify_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $inputs['id']);
            $result = $this->db->update('properties', $inputs);
        } else {
            $inputs['create_date'] = date('Y-m-d H:i:s');
            $result = $this->db->insert('properties', $inputs);
        }

        return true;
    }

    function insert_property_images($data) {
        foreach ($data['images'] as $image['image']) {
            $image['fk_property_id'] = $data['id'];
            $this->db->insert('property_images', $image);
        }
    }

    function update_property($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('properties', $data);
        //echo $this->db->last_query();
        return true;
    }

    function delete_advertisement($data) {
        //if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
        //}
        $result = $this->db->delete('properties');
        return $result;
    }

    public function record_count() {
        return $this->db->count_all("properties");
    }

    public function fetch_data($limit, $id) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $id);
//        if(isset($data['agent_id']) && !empty($data['agent_id'])){
//            $this->db->where('asigned_agent_id',$data['agent_id']);
//        }
        if (isset($this->session->userdata['backend_user']['user_type']) && ($this->session->userdata['backend_user']['user_type'] == 2)) {
            $this->db->where('asigned_agent_id',$this->session->userdata['backend_user']['id']);
        }
        $this->db->select('properties.*, property_types.name as property_type_name ');
        $this->db->join("property_types", "property_types.id = properties.property_type");
        $query = $this->db->get("properties")->result_array();
        //pre($query); die;
        if ($query) {
            foreach ($query as $row) {
                $this->db->where('id', $row['fk_agent_id']);
                $row['agent_details'] = $this->db->get("users")->row_array();
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}

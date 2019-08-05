<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends CI_Controller {

    function __construct() {


        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Properties_model');
        $this->load->model('Advertisement_model');
        $this->load->helper('image_upload_helper');
        $this->load->library('email');
        $this->load->helper('push_helper');
		$this->load->library('pagination');

        if (empty($this->session->userdata['backend_user']['id'])) {
            redirect('admin_panel/Admin');
        }
    }

    function get_properties() {
        // echo("hreloo");
        $document = [];
        // pre($this->session->userdata['backend_user']['id']);die;
       // pre($this->session->userdata['backend_user']['id']);die;
        
        $data = array('title' => 'Property List', 'pageTitle' => 'Property List');
        if ($this->session->userdata['backend_user']['user_type'] == 2) {
            $document['agent_id'] = $this->session->userdata['backend_user']['id'];
        }
        //pre($document);die;
        $data['users'] = $this->Properties_model->get_properties($document);
        //pre($data);die;
        $this->load->view('properties/properties_list', $data);
        
    }

    function get_properties_ajax() {
        //echo("hreloo");
        $document = [];

        $data = array('title' => 'Property List', 'pageTitle' => 'Property List');
        $data['users'] = $this->Properties_model->get_properties($document);
        //$this->load->view('properties/properties_list', $data);
        echo json_encode($data['users']);
    }

    public function create() {
        $data = array();
        $data = array('title' => 'Add Properties');
        if ($this->input->post()) {
            //pre($this->input->post()); die;
            $inputs = $this->input->post();
            $inputs['fk_agent_id'] = $this->session->userdata['backend_user']['id'];
            $inputs['property_contact_no'] = $this->input->post('country_code') . ' ' . $this->input->post('contact_number');
            unset($inputs['country_code'], $inputs['contact_number']);
            if($this->input->post('is_featured')){
                    $inputs['is_featured'] = 1;
                }

            if ($this->input->post('location')) {
                //pre($this->input->post('location'));die;
                $location = $this->input->post('location');
                $journalName = str_replace(' ', '+', $location);
                $get_location = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $journalName . "&key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q";
                $lat_long = file_get_contents($get_location);
                $add = json_decode($lat_long);
                //pre($add->results[0]);die;
                $count = count($add->results[0]->address_components);
                $inputs['location'] = $add->results[0]->address_components[0]->long_name;

                for ($i = 0; $i < $count; $i++) {
                    if ($add->results[0]->address_components[$i]->types[0] == 'country') {

                        $inputs['country'] = $add->results[0]->address_components[$i]->long_name;
                    }

                    if ($add->results[0]->address_components[$i]->types[0] == 'administrative_area_level_1') {
                        $inputs['state'] = $add->results[0]->address_components[$i]->long_name;
                    }

                    if ($add->results[0]->address_components[$i]->types[0] == 'administrative_area_level_2') {
                        $inputs['city'] = $add->results[0]->address_components[$i]->short_name;
                    }
                }
                $inputs['latitude'] = $add->results[0]->geometry->location->lat;
                $inputs['longitude'] = $add->results[0]->geometry->location->lng;
                
                }
                $inputs['status'] = 1;
                $key = $_FILES['property_images'];
                //$setpath = explode('/', site_url());
                //$new_path = $setpath[3];
                //$path = $_SERVER['DOCUMENT_ROOT'] . "/" . $new_path . '/uploads/properties/images/';
                $path = getcwd(). '/uploads/properties/images/';
                //pre($inputs); die;
                $this->Properties_model->property_create($inputs);
                $file_uploaded = upload_multiple_images_for_app($key, $path);
                if ($file_uploaded) {
                    $this->Properties_model->insert_property_images(['id' => $this->db->insert_id(), 'images' => $file_uploaded]);
               
            }
            redirect(base_url() . 'index.php/admin_panel/Properties/get_properties');
        }

        if ($this->input->get('kjh')) {
            $data = array('title' => 'Edit Properties');
            $id = $this->input->get('kjh');
            $data['properties'] = $this->Properties_model->get_properties_by_id($id);
            
                $data['properties']['country_code'] = explode(' ', $data['properties']['property_contact_no'])[0];
                
                $contact = explode(' ', $data['properties']['property_contact_no']);
                if(!empty($contact[1])){
                    $data['properties']['contact_number'] = $contact[1];
                }
                else{
                    $data['properties']['contact_number'] = '';
                }
                
            //pre($data['properties']); die;
        }
        $data['country_code'] = $this->get_country_code_list();
        $this->load->view('properties/properties_create', $data);
    }

    function get_country_code_list() {
        $this->db->select('country_name, country_code');
        $country_code = $this->db->get('re_countries')->result_array();
        return $country_code;
    }
    
    
    public function change_sold_status_ajax() {
        $id = base64_decode($_GET['id']);
        $property = $this->Properties_model->get_properties(['property_id' => $id]);
        $btntype = "btn-success";
        $btntext = "Sold";
        $status =1;
        $msg = "Your property has been sold";
        $subject            = 'Property Sold';
	$response = '<a class="btn '. $btntype .' btn-xs">'. $btntext .'</a>';
            
        if($property[0]['is_sold']==1){
            $btntype = "btn-warning";
            $btntext = "UnSold";
            $status =0;
            $response = '<a class="btn '. $btntype .' btn-xs">'. $btntext .'</a>';
            $subject            = 'Property Listing';
            $msg = "You have listed your property";
        }
        $result = $this->Properties_model->update_property(['id' => $id,"is_sold"=>$status]);
        $email_data['msg']  = $msg; 
        //$this->email->from(ADMIN_EMAIL, 'Muscat Home');
        $this->email->to($property[0]['agent_detail']['email']);
        $this->email->subject($subject);
        $this->email->message($this->load->view('email/agent_regsitration', $email_data, True));
        $this->email->set_mailtype("html");
        //$this->email->send(); 

        $push_data['push_type']     = '1001';
        $push_data['title']         = $subject;
        $push_data['message']       = $msg;
        $push_data['key']           = "value";
        //generatePush($property[0]['agent_detail']['device_type'],$property[0]['agent_detail']['device_token'],$push_data);       
        if ($result) {
            echo $response;
        }
    }


    public function change_status_ajax() {
        $id = base64_decode($_GET['id']);
        $property = $this->Properties_model->get_properties(['property_id' => $id]);
        $status =1;
        $btn_type = "btn-success";
        $btn_text = "Approved";
        $response = '<a class="btn '. $btn_type .' btn-xs">'. $btn_text .'</a>';
        $msg = "Your property is live on website";
        $subject            = 'Property Listing Approved';
	    
        if($property[0]['status']==1){
            $status =0;
            $btn_type = "btn-danger";
            $btn_text = "Pending";
            $response = '<a class="btn '. $btn_type .' btn-xs">'. $btn_text .'</a>';
            $subject            = 'Property Listing blocked';
            $msg = "Your property is blocked on website";
        }
        $result = $this->Properties_model->update_property(['id' => $id,"status"=>$status]);
        $email_data['msg']  = $msg; 
        //$this->email->from(ADMIN_EMAIL, 'Muscat Home');
        $this->email->to($property[0]['agent_detail']['email']);
        $this->email->subject($subject);
        $this->email->message($this->load->view('email/agent_regsitration', $email_data, True));
        $this->email->set_mailtype("html");
        //$this->email->send(); 

        $push_data['push_type']     = '1001';
        $push_data['title']         = $subject;
        $push_data['message']       = $msg;
        $push_data['key']           = "value";
        //generatePush($property[0]['agent_detail']['device_type'],$property[0]['agent_detail']['device_token'],$push_data);       
        if ($result) {
            echo $response;
            //redirect('admin_panel/Properties/get_properties');
        }
    }

    public function delete() {
        $obj = new Advertisement_model;
        $obj->delete_advertisement(array("id" => base64_decode($_GET['tyhg'])));
        redirect('admin_panel/Properties/get_properties');
    }

    public function ajax_property_list() {
        $this->db->where('properties.id', $this->input->post('id'));
//        $this->db->join('property_images', 'property_images.fk_property_id = properties.id');
        $results['users'] = $this->db->get('properties')->row_array();
        foreach ($results as $result) {
            $this->db->where('fk_property_id', $this->input->post('id'));
            $images = $this->db->get('property_images')->result_array();
            $results['users']['images'] = $images;
        }
        //pre($results);die;

        $this->load->view('properties/ajax_property_list', $results);
    }

	
	
	
	
	
	
	
	
	
	
		function pro_list(){
$config = array();
$config["base_url"] = base_url() . "index.php/admin_panel/Properties/pro_list";
$total_row = $this->Properties_model->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 10;
//$config['display_pages'] = FALSE;
$config['use_page_numbers'] = TRUE;
//$config['num_links'] = 3;
$config["full_tag_open"] = '<ul class="pagination">';
$config["full_tag_close"] = '</ul>';	
$config["first_link"] = "&laquo;";
$config["first_tag_open"] = "<li>";
$config["first_tag_close"] = "</li>";
$config["last_link"] = "&raquo;";
$config["last_tag_open"] = "<li>";
$config["last_tag_close"] = "</li>";
$config['next_link'] = 'NEXT';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '<li>';
$config['prev_link'] = 'PREV';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '<li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';




$this->pagination->initialize($config);
if($this->uri->segment(4)){
$page = ($this->uri->segment(4)) ;
 $page=($page-1)*10;
}
else{
$page = 0;
}
$data['page']=$page;
$data["users"] = $this->Properties_model->fetch_data($config["per_page"], $page);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );
$this->load->view("properties/pagination_view", $data);
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servents extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('array');
        $this->load->helper('html');
        $this->load->helper('image_upload_helper');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Users_model');
        $this->load->model('Servent_model');
        $this->load->model('Notifications_model');
        // $this->form_validation->CI = & $this;
        if (empty($this->session->userdata['backend_user']['id'])) {
            redirect('admin_panel/Admin');
        }
    }
    public function index() {


        $document = array("user_type" => 3);
        $data = array('title' => 'Servents List', 'pageTitle' => 'Servents List');
        $data['users'] = $this->Users_model->get_users($document);
        // pre($data['users']); die;
        $this->load->view('provider/list_providers', $data);
        
    }

   
     
    public function view_requests() {
        $data = array('title' => 'Request List', 'pageTitle' => 'Request List');
        $document = [];
        $document['group_by'] = 1;
        $data['requests'] = $this->Servent_model->get_servent_request($document);
        // pre($data['requests']); die;
        $this->load->view('servents/view_requests', $data);
    }
    public function assign_servent_to_user() {
        $data = array('title' => 'User Request List', 'pageTitle' => 'User Request List');
        $document = [];
        if (isset($_GET['tyhg']) && isset($_GET['adfd'])) {
            $document['fk_user_id'] = base64_decode($_GET['tyhg']);
            $request_type = base64_decode($_GET['adfd']);
            $document['service_sub_cat'] = ucfirst($request_type);
            $data['requests'] = $this->Servent_model->get_servent_request($document);
            $this->load->view('servents/assign_servent', $data);
        } else {
            redirect('admin_panel/Servents/view_requests');
        }
    }
    public function ajax_update_servent_request_status() {
        $get_request['id'] = $data['id'] = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $update = $this->Servent_model->change_request_status($data);
        $request_detail = $this->Servent_model->get_servent_request($get_request);
        if ($data['status'] == 0) {
            $n_data['sender_id'] = 0;
            $n_data['fk_user_id'] = $request_detail['fk_user_id'];
            $n_data['notification_type'] = 8;
            $n_data['description'] = $n_data['title'] = "Congratulation! " . ucfirst($request_detail['servent_profile']['name']) . " is assigned to you for " . ucfirst($request_detail['service_sub_cat']) . " request";
            $this->Notifications_model->create_notification($n_data);
            // Notification for servant //
            $n_data['sender_id'] = 0;
            $n_data['fk_user_id'] = $request_detail['fk_servent_id'];
            $n_data['notification_type'] = 8;
            $n_data['description'] = $n_data['title'] = "Congratulation! " . ucfirst($request_detail['user_profile']['name']) . " has requested you for " . ucfirst($request_detail['service_sub_cat']) . " service";
            $this->Notifications_model->create_notification($n_data);
        }
        if ($data['status'] == 1) {
            // Notification for user //
            $n_data['sender_id'] = 0;
            $n_data['fk_user_id'] = $request_detail['fk_user_id'];
            $n_data['notification_type'] = 8;
            $n_data['description'] = $n_data['title'] = "Sorry for inconvinence! we could not assign " . ucfirst($request_detail['servent_profile']['name']) . " to you for " . ucfirst($request_detail['service_sub_cat']) . " request";
            $this->Notifications_model->create_notification($n_data);
        }
        $this->db->where('id', $data['id']);
        $request = $this->db->get('servent_request')->row_array();
        if ($request['status'] == 0) {
            $status = 'Pending';
            $status_color = 'btn-warning';
        }
        if ($request['status'] == 1) {
            $status = 'Active';
            $status_color = 'btn-success';
        }
        if ($request['status'] == 2) {
            $status = 'Rejected';
            $status_color = 'btn-danger';
        }
        echo '<a href="javascript:void()" onclick="change_request_status(' . $request['id'] . ',' . $request['status'] . ')" class="btn btn-round btn-xs ' . $status_color . ' request_status">' . $status . '</a>';
    }
    public function servent_delete() {
        $id = base64_decode($_GET['tyhg']);
        if (isset($id)) {
            $this->db->where('id', $id);
            $result = $this->db->delete('servent_request');
        }
        if ($result) {
            redirect('admin_panel/Servents/assign_servent_to_user');
        }
    } 
    public function add_servant() {
     
        
       $data['countries'] = $this->Servent_model->getCountries();

        $data['city'] = $this->Servent_model->getCity();
        $data['subcategory'] = $this->Servent_model->getServant();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('experience' , 'experience' , 'required|integer');

        if ($this->input->post()) {
            if($this->form_validation->run() === true ) {            
                $path = './uploads/';
                $cv_url = $this->do_upload("cv_url", $path);
                // $path = './uploads/videos/';
                // $video_url = $this->do_upload("video_url", $path);
                $path = './uploads/profile_images/';
                $image_url = $this->do_upload("image_url", $path);
                $this->Servent_model->add_servant($this->input->post(), $cv_url,$image_url);
            
                redirect(site_url('admin_panel/servents/'));
            } 
        }
      
        $this->load->helper('combo_box_helper');
        $this->load->view('servents/add_servant', $data);

    
    }

    //update the servent form 

    public function update_servant() {
        
        $this->load->helper('combo_box_helper');

        $id = $_GET['id'];
        $data['countries'] = $this->Servent_model->getCountries();
        $data['city'] = $this->Servent_model->getCity();
        $data['subcategory'] = $this->Servent_model->getServant();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('experience' , 'experience' , 'required|integer');
        
      $update=array(

        
        'age'=>$this->input->post('age'),
        'gender'=>$this->input->post('gender'),
        'marital_status'=>$this->input->post('marital_status'),
        'experience'=>$this->input->post('experience'),
        'religion'=>$this->input->post('religion'),
        'highest_degree'=>$this->input->post('highest_degree'),
        'current_org'=>$this->input->post('current_org'),
        'nationality'=>$this->input->post('nationality'),
        'commission'=>$this->input->post('commission'),
        'expected_salary'=>$this->input->post('expected_salary'),
        'about_servent'=>$this->input->post('about_servent'),
      );
      $user_data=array(
        'name'=>$this->input->post('name'),
        'email'=>$this->input->post('email'),
        'mobile'=>$this->input->post('mobile'),
         
      );
      
      $update_user_data=$this->Servent_model->update_user_data($id,$user_data);
      $update_details=$this->Servent_model->update($id,$update);
      
      echo "<script> alert('Updated Successfully.');</script>";
            redirect('admin_panel/Providers/edit_servant?id='.$id,'refresh');

      
       
    }

   


// this is to upload a picture
    function do_upload($key, $path) {
        $config['upload_path']="./uploads/profile_images/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

         move_uploaded_file($_FILES[$key]['tmp_name'], $path . '/' . $_FILES[$key]['name']);

        return $_FILES[$key]['name'];
      
    }


    // function do_upload_video() {
    //     $config['upload_path'] = './uploads/videos/';
    //     $config['allowed_types'] = 'mp4|mp3';
    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('video_url')) {
    //         $error = array('error' => $this->upload->display_errors());
    //     } else {
    //         $data = array('upload_data' => $this->upload->data());
    //         $datav = $data['upload_data'];
    //         return $datav['file_name'];
    //     }
    // }
    
    public function set_servant_rules() {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('age', 'age', 'trim|required');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
        $this->form_validation->set_rules('marital_status', 'Marital status', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');
        $this->form_validation->set_rules('religion', 'religion', 'trim|required');
        $this->form_validation->set_rules('highest_degree', 'highest degree', 'trim|required');
        $this->form_validation->set_rules('current_org', 'current organisation', 'trim|required');
        $this->form_validation->set_rules('country_code', 'Country', 'trim|required');
        $this->form_validation->set_rules('city_idcity_id', 'city', 'trim|required');
        $this->form_validation->set_rules('Category', 'Category', 'trim|required');
        $this->form_validation->set_rules('experience', 'Experience', 'trim|required');
        $this->form_validation->set_rules('fk_service_sub_cat_id', 'SUBCATEGORY ', 'trim|required');
        $this->form_validation->set_rules('expected_salary', 'expected salary', 'trim|required');
        $this->form_validation->set_rules('about_servent', 'about servent', 'trim|required');
        $this->form_validation->set_rules('cv_url', 'cv url', 'trim|required');
        $this->form_validation->set_rules('video_url', 'video url', 'trim|required');
        $this->form_validation->set_rules('image_url', 'video image_url', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

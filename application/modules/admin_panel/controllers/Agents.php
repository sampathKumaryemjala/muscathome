<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->model('Users_model');
        $this->load->helper('image_upload_helper');
        $this->load->library('email');
        $this->load->helper('push_helper');
        //$this->form_validation->CI = & $this;
        if (empty($this->session->userdata['backend_user']['id'])) { 
               redirect('admin_panel/Admin');
        }
    }

    public function index() {
        $document = [];
        $data = array('title' => 'Agents List', 'pageTitle' => 'Agents List');
        $filter['user_type'] = 2;
        $data['users'] = $this->Users_model->get_agents($filter);
        $this->load->view('agents/list_agents', $data);
    }

    public function add_agent() {
        $document = [];
        $data = array('title' => 'Add Agent', 'pageTitle' => 'Add Agent');

        if ($this->input->post()) {
            $inputs = $this->input->post();

            if ($inputs['password'] == $inputs['c_password']) {
                $password = $this->input->post('password');
            }
            $key = $_FILES['ad_image'];
            //$setpath = explode('/', site_url());
            //$new_path = $setpath[3];
            //$path = $_SERVER['DOCUMENT_ROOT'] . "/" . $new_path . '/uploads/profile_images/';
            $path = getcwd().'/uploads/profile_images/';

            $file_uploaded = upload_multiple_images_for_website($key, $path);
            //pre($file_uploaded[0]); die;
            
            $user_colomns = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($password),
                'mobile' => $this->input->post('mobile'),
                'profile_image' => $file_uploaded[0],
                'address' => $this->input->post('address'),
                'status' => 1
            );
            //$this->db->insert('users', $user_colomns);


            $agents_colomns = array(
                'company_name' => $this->input->post('company_name'),
                'agent_position' => $this->input->post('agent_position'),
                'about_agent' => $this->input->post('about_agent'),
                'office_number' => $this->input->post('office_number'),
                'fax_number' => $this->input->post('fax_number'),
                'facebook_link' => $this->input->post('facebook_link'),
                'linkedin_link' => $this->input->post('linkedin_link'),
                'pinterest_link' => $this->input->post('pinterest_link'),
            );
            $this->Users_model->add_agent($user_colomns, $agents_colomns);
            
            $email_data['email'] = $this->input->post('email');
            $email_data['password'] = $this->input->post('password');
            $email_data['portal_link'] = base_url('index.php/admin_panel/Admin');
            
            /*Mail for Property agent*/
            ########################
            $this->email->from(ADMIN_EMAIL, 'Muscat Home');
            $this->email->to($this->input->post('email'));
            //$this->email->cc('city@another-example.com');
            $this->email->subject('Registration details');
            $this->email->message($this->load->view('email/agent_regsitration', $email_data, True));
            $this->email->set_mailtype("html");
            $this->email->send();
            
            /*Push Notification for Property agent*/
            ########################
            //generatePush($agent_detail['device_type'],$agent_detail['device_token'],$msg);
            
            
            redirect('admin_panel/Agents');
        }
        if ($this->input->get('kjh')) {
            $data = array('title' => 'Edit Agent', 'pageTitle' => 'Edit Agent');
            $id = $_GET['kjh'];
            $filter['user_type'] = 2;
            $filter['id'] = $id;
            $agent = $this->Users_model->get_agents($filter);
            $data['agents'] = $agent[0];
            //pre( $data['agents']);die;
        }
        $this->load->view('agents/add_agent', $data);
    }

    public function change_agent_status() {
        $id = base64_decode($_GET['tyhg']);
        //pre($id);die;
        $result = $this->Users_model->update_user_status(['id' => $id]);
        if ($result) {
            redirect('admin_panel/Agents');
        }
    }

    public function agent_delete() {
        $id = base64_decode($_GET['tyhg']);
        if (isset($id)) {
            $this->db->where('id', $id);
            $result = $this->db->delete('users');
            $this->db->where('fk_user_id', $id);
            $result = $this->db->delete('property_agent_details');
        }
        if ($result) {
            redirect('admin_panel/Agents');
        }
    }
    
   

}



            

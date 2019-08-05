<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Providers extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->library('session');
        $this
            ->load
            ->library('form_validation', 'uploads');
        $this
            ->load
            ->helper(array(
            'form',
            'url'
        ));
        $this
            ->load
            ->helper('html');
        $this
            ->load
            ->helper('common_helper');
        $this
            ->load
            ->helper('custom_helper');
        $this
            ->load
            ->model('Users_model');
        //$this->form_validation->CI = & $this;
        if (empty($this
            ->session
            ->userdata['backend_user']['id']))
        {
            redirect('admin_panel/Admin');
        }
    }
    public function index()
    {
        $document = [];
        $data = array(
            'title' => 'Service Providers List',
            'pageTitle' => 'Service Providers List'
        );
        $data['users'] = $this
            ->Users_model
            ->get_users($document);
        $this
            ->load
            ->view('users/users_list', $data);
    }
    public function ajax_get_user()
    {
        $this
            ->db
            ->where('properties.id', $this
            ->input
            ->post('id'));
        $this
            ->db
            ->join('property_images', 'property_images.fk_property_id = properties.id');
        $result['users'] = $this
            ->db
            ->get('properties')
            ->row_array();
        //pre($result);die;
        $this
            ->load
            ->view('properties/ajax_user_list', $result);
    }
    public function view_documents()
    {
        $data = array(
            'title' => 'Service Providers Document',
            'pageTitle' => 'Service Providers List'
        );
        $id = $_GET['id'];
        $filter['id'] = $id;
        $data['provider'] = $this
            ->Users_model
            ->get_doc($filter);
        //pre($data);
        $this
            ->load
            ->view('provider/view_documents', $data);
        //        if () {
        //            redirect('admin_panel/provider/view_documents');
        //        }
        
    }
    public function view_video()
    {
        $data = array(
            'title' => 'Service Providers Document',
            'pageTitle' => 'Service Providers List'
        );
        $id = $_GET['id'];
        $filter['id'] = $id;
        $data['provider'] = $this
            ->Users_model
            ->get_video($filter);
        //pre($data);
        $this
            ->load
            ->view('provider/view_video', $data);
        //-------------------link------------------------
        // http://192.168.0.110/project_folder/muscat_home/index.php/admin_panel/providers/view_video?id=494
        
    }
    public function change_user_status()
    {
        $id = base64_decode($_GET['tyhg']);
        //pre($id);die;
        $result = $this
            ->Users_model
            ->update_user_status(['id' => $id]);
        if ($result)
        {
            redirect('admin_panel/Users');
        }
    }
    public function provider_delete()
    {
        $id = base64_decode($_GET['tyhg']);
        if (isset($id))
        {
            $this
                ->db
                ->where('fk_agent_id', $id);
            $result = $this
                ->db
                ->delete('agent_details');
            $this
                ->db
                ->where('id', $id);
            $result = $this
                ->db
                ->delete('users');
        }
        if ($result)
        {
            //  redirect('admin_panel/Users/service_providers');
            redirect('admin_panel/Servents');
        }
    }
    public function view_profile() 
    {   
     
         $data = array('title' => 'Servant  Profile', 'pageTitle' => 'Servant  Profile');
        $id = $_GET['id'];
        $filter['id'] = $id;
        $data['servent_detail'] = $this->Users_model->get_servant_profile($filter['id']);
       
        $this
            ->load
            ->view('provider/view_servant_profile', $data);
        //        if () {
        //            redirect('admin_panel/provider/view_documents');
        //        }
         
    }

     // edit functionality
     public function edit_servant() {

        $this->load->model('Servent_model');
        $this->load->helper('combo_box_helper');   
        
        
        
        $data = array('title' => 'Servant  Profile', 'pageTitle' => 'Servant  Profile');
     
        $id = $_GET['id'];
        $filter['id'] = $id;
        $data= $this->Users_model->get_servant_profile($filter['id']);
        $data['countries'] = $this->Servent_model->getCountries();

        $data['city'] = $this->Servent_model->getCity();
        $data['subcategory'] = $this->Servent_model->getServant();
        //print_r($data);exit;
     
        $this
            ->load
            ->view('servents/edit_servant', $data);
     
   
    //    $this->load->view('servents/edit_servant');

   }
   

}


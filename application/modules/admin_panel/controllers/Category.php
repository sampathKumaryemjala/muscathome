<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct() {


        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->helper('image_upload_helper');
        $this->load->model('Properties_model');
        $this->load->model('Category_model');

        //$this->form_validation->CI = & $this;
        if ($this->router->fetch_method() != "index") {//pre($this->session->userdata['backend']['id']);
            if (empty($this->session->userdata['backend_user']['id'])) {
                redirect('admin_panel/Admin');
            }
        }
    }

    public function edit_cat() {
        
        if ($this->input->get('cszeda')) {
            $id = $this->input->get('cszeda');
            //pre($id);die;
            $result = array('title' => 'Edit Category', 'pageTitle' => 'Edit Category');
            $result['categories'] = $this->db->get_where('service_category',['id'=>$id])->row_array();
            //pre($result);//die;
            if ($this->input->post()) {

                $insert = $this->input->post();
                //pre($insert);pre($_FILES); die;
                $insert['modify_date'] = date('y-m-d h:i:s');

                if ($_FILES['icon_image']['error'][0] == 0) {
                    $key = $_FILES['icon_image'];
                    $path = getcwd() . '/uploads/services/icons/';
                    $file_uploaded = upload_multiple_images_for_website($key, $path);
                    $insert['icon'] = $file_uploaded[0];
                }
                //pre($insert);die;
                $this->db->where('id', $insert['id']);
                $this->db->update('re_service_category', $insert);
                redirect('admin_panel/Category/list_category');
            }
            //pre($result);die;
            $this->load->view('category/add_category', $result);
        }
        //redirect('admin_panel/Category/list_category');
    }

    function list_category() {
        //echo("hreloo");
        $document = [];

        $data = array('title' => 'Category List', 'pageTitle' => 'Category List');
        $data['category'] = $this->db->get('service_category')->result_array();
        $this->load->view('category/list_category', $data);
    }

    function list_subcategory() {
        //echo("hreloo");
        $document = [];

        $data = array('title' => 'SubCategory List', 'pageTitle' => 'SubCategory List');
        $this->db->select('service_sub_category.*, service_sub_category.id as id,'
                . ' service_category.name as catname,'
                . ' service_sub_category.name as subcatname,'
                . 'service_sub_category.create_date as date');
        $this->db->join('service_category', 'service_category.id = service_sub_category.fk_service_cat_id');
        $data['subcategories'] = $this->db->get('service_sub_category')->result_array();
        //pre($data);die;
        $this->load->view('category/list_subcategory', $data);
    }

    function add_subcategory() {
        //echo("hreloo");
        $document = [];

        $data = array('title' => 'Add SubCategory', 'pageTitle' => 'Add SubCategory');
        $data['categories'] = $this->db->get('service_category')->result_array();
        if ($this->input->post()) {

            $insert = $this->input->post();
            //pre($insert); 
            if (isset($_FILES['icon_image']) && ($_FILES['icon_image']['error'][0] == 0)) {
                $key = $_FILES['icon_image'];
                $path = getcwd() . '/uploads/services/icons/';
                //pre($key);pre($path);die;
                $file_uploaded = upload_multiple_images_for_website($key, $path);
                $insert['icon'] = $file_uploaded[0];
            }

            //pre($file_uploaded[0]); die;
            $insert['create_date'] = $insert['modify_date'] = date('y-m-d h:i:s');
            //pre($insert);die;
            $this->db->insert('service_sub_category', $insert);
            redirect('admin_panel/Category/list_subcategory');
        }
        $this->load->view('category/add_subcategory', $data);
    }

    public function delete_subcat() {
        $id = base64_decode($_GET['tyhg']);
        //pre($id);die;
        $result = $this->Category_model->delete_subcat(['id' => $id]);
        if ($result) {
            redirect('admin_panel/Category/list_subcategory');
        }
    }

    public function edit_subcat() {
        $id = base64_decode($_GET['kjh']);
        //pre($id);die;
        $result = array('title' => 'Add SubCategory', 'pageTitle' => 'Add SubCategory');
        $result['editsubcat'] = $this->Category_model->get_subcategories(['id' => $id]);
        $result['categories'] = $this->db->get('service_category')->result_array();
        if ($this->input->post()) {

            $insert = $this->input->post();
            //pre($insert);pre($_FILES); die;
            $insert['modify_date'] = date('y-m-d h:i:s');

            if ($_FILES['icon_image']['error'][0] == 0) {
                $key = $_FILES['icon_image'];
                $path = getcwd() . '/uploads/services/icons/';
                $file_uploaded = upload_multiple_images_for_website($key, $path);
                $insert['icon'] = $file_uploaded[0];
            }
            //pre($insert);die;
            $this->db->where('id', $insert['id']);
            $this->db->update('service_sub_category', $insert);
            redirect('admin_panel/Category/list_subcategory');
        }

        //pre($result);die;
        $this->load->view('category/add_subcategory', $result);
    }

    function get_properties_ajax() {
        //echo("hreloo");
        $document = [];

        $data = array('title' => 'Users List', 'pageTitle' => 'Users List');
        $data['users'] = $this->Properties_model->get_properties($document);
        //$this->load->view('properties/properties_list', $data);
        echo json_encode($data['users']);
    }

    public function change_status() {
        $id = base64_decode($_GET['tyhg']);
        $result = $this->Properties_model->update_property_status(['id' => $id]);
        if ($result) {
            redirect('admin_panel/Properties/get_properties');
        }
    }

    public function delete() {
        $obj = new Advertisement_model;
        $obj->delete_advertisement(array("id" => base64_decode($_GET['tyhg'])));
        redirect('admin_panel/Properties/get_properties');
    }

}

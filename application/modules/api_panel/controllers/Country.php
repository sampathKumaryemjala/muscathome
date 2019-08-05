<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Country_model');
        $this->load->helper('custom');
        //$this->load->helper('custom');
    }

    /*
     * Modified By      :Amit Kumar
     * Modified Date    :07-June,16
     */

    public function index() {
        $message = "No service category";
        $obj = new Country_model;
        //$services     = $this->Country_model->country();
        $services = $obj->country();
        if ($services) {
            $isSuccess = true;
            $message = "Service category list displayed";
            $data = $services;
        }
        echo json_encode(array("isSuccess" => $isSuccess, "message" => $message, "Result" => $data));
    }

    public function get_city_list() {
        $input = check_inputs();
        $message = "City list could not be displayed";
        $isSuccess = false;
        $data = [];
        $this->db->order_by('name', 'asc');
        $this->db->where('country_id', $input['country_id']);
        $city_lists = $this->db->get('cities')->result_array();
        if ($city_lists) {
            $isSuccess = true;
            $message = "City list displayed successfully";
            $data = $city_lists;
        }
        echo json_encode(array("isSuccess" => $isSuccess, "message" => $message, "Result" => $data));
    }

}

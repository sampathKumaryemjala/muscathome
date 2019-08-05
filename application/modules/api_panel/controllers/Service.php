<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MX_Controller {
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
        $this->load->model('Service_model');
        $this->load->helper('custom');
    }

    /*
     * Modified By      :Amit Kumar
     * Modified Date    :10-Jan,18
     */

    public function service_category() {
        $document   = check_inputs(); 
        //pre($document);
        $isSuccess      = false;
        $message        = "Invalid Input";
        $data           = array();
        //if ($_POST) { //input -> 
            $obj        = new Service_model;  
            //$documents  = $_POST;
            $message    = "No service category";
            $services     = $obj->service_category($document);
            if ($services) {
                $isSuccess = true;
                $message = "Service category list displayed";
                $data = $services;
            }
        //}
        echo json_encode(array("isSuccess" => $isSuccess, "message" => $message, "Result" => $data));
    }

}

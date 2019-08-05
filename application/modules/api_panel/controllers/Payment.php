<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MX_Controller {

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
        $this->load->model('Payment_model');
        $this->load->model('Job_post_model');
        $this->load->model('User_model');
        $this->load->helper('custom');
        $this->load->helper('image_upload_helper');
    }

    /*
     * Modified By      :Amit Kumar
     * Modified Date    :07-June,16
     */

    
   
    public function history() {     
        $inputs = check_inputs();
        $status = false;
        $obj = new Payment_model;
        $message = "Try again";
        $history = $obj->get_payments($inputs);
        if ($history) { 
            $status = true;
            $message = "Success";
        }
        return_data($status, $message, $history);
        //create_log_file();
    }
}

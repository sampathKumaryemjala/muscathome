<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends MX_Controller {

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
        $this->load->model('User_model');
        $this->load->model('Enquiry_model');
        $this->load->library('email');
        $this->load->helper('custom_helper');
    }

    /*
     * Modified By      :Harish Kumar
     * Modified Date    :26-Oct,17
     */

    public function general_enquiry() { //insert general quiries
        $input = check_inputs();
        $obj = new Enquiry_model;
        $status = false;
        $message = "No data";
        if ($input) {
            $result = $obj->insert_general_enquiry($input);
            
            $this->email->from($result['email'], $result['name']);
            $this->email->to('harish88kumar@yahoo.co.in');
            $this->email->subject($result['subject']);
            $this->email->message($result['message']);
            $this->email->send();
            
            $status = true;
            $message = "Enquiry posted successfully";
        }
        return_data($status, $message, $result);
        //create_log_file();
    }

}

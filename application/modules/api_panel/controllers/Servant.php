<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servant extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('custom');
        $this->load->model('Servant_model');
        $this->load->model('User_model');
    }

     public function servant_list() {
        $filter = check_inputs();
        $status = false;
        $message = "Servent does not exist!";
        $data = $this->Servant_model->get_servents($filter);                    
        if ($data) {
            $status = true;
            $message = "Servemt list displayed successfully.";
        }
        return_data($status, $message, $data);
    }


    public function servant_employer() { 
        $filter         = check_inputs();
        $status         = false;
        $message        = "Servent does not exist!";
        $data           = $this->Servant_model->servant_employer($filter);                    
        if ($data) {//pre($data);
            $data       = $this->User_model->get_user(array("id"=>$data['fk_user_id']));
            $status     = true;
            $message    = "Servemt list displayed successfully.";
        }
        return_data($status, $message, $data);
    }


}

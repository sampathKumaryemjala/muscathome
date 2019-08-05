<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        //$this->load->model('Home_model');
        $this->load->helper('cookie');
        //$this->load->library('Facebook');        
    }

    public function transaction_history() {

        $this->load->view('job_post/transaction_history');
    }
  

}

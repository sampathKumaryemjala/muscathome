<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        //$this->load->model('Home_model');
        $this->load->helper('cookie');
        $this->load->helper('image_upload_helper');
        $this->load->library('email');
        //$this->load->library('Facebook');        
    }

    public function index($document) {
        
        $upload = upload_multiple_images_for_app($document['files'], $document['path']);
    }

   

}

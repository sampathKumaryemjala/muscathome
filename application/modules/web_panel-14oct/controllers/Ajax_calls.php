<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_calls extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        //$this->load->model('Home_model');
        $this->load->helper('cookie');
        //$this->load->library('Facebook');        
    }

    function map_data(){
        $latLong = $_REQUEST['latlong'];
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latLong."&sensor=true&key=AIzaSyDjp0p-3O8ScQv8G_NFF8wbLuKCVQE8ybQ";
        $details = file_get_contents($url);
        $details = json_decode($details, true);
        echo $details['results'][0]['formatted_address']; die;
    }
    
}

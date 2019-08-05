<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Country_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function country($document=[]) { // 	id 	country_code 	country_name
        $top        = [ ["id"=>1,"countryCode"=>"OM","country_code"=>"+968","country_name"=>"OMAN"],
                        ["id"=>1,"countryCcode"=>"US","country_code"=>"+1","country_name"=>"United States"],
                        ["id"=>1,"countryCode"=>"CA","country_code"=>"+1","country_name"=>"Canada"],
                        ["id"=>1,"countryCode"=>"JP","country_code"=>"+81","country_name"=>"Japan"],
                        ["id"=>1,"countryCode"=>"AU","country_code"=>"+61","country_name"=>"Australia"]
                    ]; 
        $country['top'] = $top;
        
        $alls = $this->db->get('countries')->result_array();
        foreach($alls as $all){
            $all['country_code'] = '+'.$all['country_code'];
            $fin[] = $all;
        }
        $country['all'] = $fin;
        return $country;
    }

}

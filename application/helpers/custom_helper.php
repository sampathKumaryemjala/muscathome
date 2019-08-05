<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('pre')) {

    function pre($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

}
if (!function_exists('is_json')) {

    function is_json($string, $return_data = false) {
        $data = json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
    }

}




if (!function_exists('check_inputs')) {
    function check_inputs() { //mobile and message.
        $json = file_get_contents('php://input');
        if ($json) {
            return ((array)json_decode($json));
        } else if ($_POST) {
            return $_POST;
        } else {
           // echo json_encode(array("isSuccess" => false, "message" => "Invalid Input", "Result" => array()));
        }
    }
}




if (!function_exists('create_log_file')) {
    function create_log_file($data) { //mobile and message.  
        $log = "Time: " . date('Y-m-d, H:i:s') . PHP_EOL;
        $log = $log . "url: " . base_url($data['url']) . PHP_EOL;
        $log = $log . "Request " . json_encode($data['request']) . PHP_EOL;
        $log = $log . "Responce " . json_encode(array("Result" => $data['response'])) . PHP_EOL . PHP_EOL;
        file_put_contents('logs/'.$data['url'].'.txt', $log, FILE_APPEND);
    }

}

if (!function_exists('return_data')) {
    function return_data($status=false,$mesage="",$result=array()) { //mobile and message.         
        echo json_encode(array("isSuccess" => $status, "message" => $mesage, "Result" => $result));
        die;
    }
}

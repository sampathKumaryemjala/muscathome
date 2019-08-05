<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('send_sms')) {

    function send_sms($data) { //pre($data); die;
        $user               = "Muscathome"; //your username
        $password           = "NadineLamis2"; //your password

        //if(strpos($data['mobile'],"968")){
            //$data['mobile'] = str_replace("968","",$data['mobile']);
        //}

        if(strpos($data['mobile'],"+968")==0 && strlen($data['mobile'])>12){// die('123');
            $data['mobile'] = substr($data['mobile'], 4);  
            //pre($data);
            //str_replace("968968","968",$data['mobile']); 
        }else if(strpos($data['mobile'],"968")==0 && strlen($data['mobile'])>11){// die('123');

            $data['mobile'] = substr($data['mobile'], 3);  
            //pre($data);
            //str_replace("968968","968",$data['mobile']); 
        }
       

        $mobilenumbers      = $data['mobile'];
        $message            = $data['message'];
        $senderid           = "Muscat"; //Your senderid
        $messagetype        = "N"; //Type Of Your Message
        $DReports           = "N"; //Delivery Reports
        $url                = "https://www.smscountry.com/SMSCwebservice_Bulk.aspx";
        $message            = urlencode($message);
        $ch                 = curl_init();
        if (!$ch) {
            die("Couldn't initialize a cURL handle");
        }
        $ret                = curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
        $ret                = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $curlresponse = curl_exec($ch); 
       // echo $ret;echo $curlresponse;
        if (curl_errno($ch))
            echo 'curl error : ' . curl_error($ch);
        if (empty($ret)) {
            die(curl_error($ch));
            curl_close($ch); 
        } else {
            $info = curl_getinfo($ch);
            curl_close($ch); 
        }
    }

}






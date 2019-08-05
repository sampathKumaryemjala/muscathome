<?php

function send_fcm_push($registatoin_id, $message) {
    $url = "https://fcm.googleapis.com/fcm/send";
    $serverKey = 'AIzaSyA3mozkUySY5d-kmBEWlmsUh3fBxkvQ_ug';
    $title = "Muscat home notifications";
    $body = $message['message'];
    //$notification       = $message;
    $notification = array('title' => $title, 'text' => $body, 'sound' => 'default', 'badge' => '1');
    $notification = array_merge($notification, $message);
    $arrayToSend = array('to' => $registatoin_id, 'notification' => $notification, 'priority' => 'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key=' . $serverKey;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($headers)
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    $response = curl_exec($ch);
    //pre($response); die;
    curl_close($ch);


    // $ch                 = curl_init();
    //curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //Send the request
    //curl_exec($ch);
    //die('wo');
    //Close request
    //if ($response === FALSE) {
    //die('FCM Send Error: ' . curl_error($ch));
    //}
    //curl_close($ch);
    //return true;
}

function sendAndroidPush($registatoin_id, $message) {
    //pre($registatoin_id); pre($message);
    $url = 'https://fcm.googleapis.com/fcm/send';
    $headers = array(
        'Content-Type: application/json',
        'Authorization: key = AIzaSyA3mozkUySY5d-kmBEWlmsUh3fBxkvQ_ug'
    );
    $Bundle = array(
        "to" => trim($registatoin_id),
        'data' => array(
            'body' => $message,
        )
        
    );


    //$Bundle = array("to" => trim($registatoin_id), 'data' => array('body' => $message));
    //echo(json_encode($Bundle));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($headers)
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Bundle));
    $response = curl_exec($ch);
    //pre($response); die;
    curl_close($ch);
}

function sendIphonePush($deviceToken, $push_data, $badge = 0, $check = 0, $version = "") {
    // return true;
    //pre($push_data); die;
    //$apnsHost = 'gateway.sandbox.push.apple.com';      //development phase
    $apnsHost = 'gateway.push.apple.com';            //distribution phase   $apnsPort = '2195'; 
    $apnsPort = '2195';                                // put .pem file on root 
    //$apnsCert = 'ios_certificates/dev.pem';                            //certificate pem file
    $apnsCert = 'ios_certificates/dist.pem';                            //certificate pem file
    //$apnsCert = 'ck1.pem';
    $passPhrase = '1234';                            //cetificate password
    $streamContext = stream_context_create();
    stream_context_set_option($streamContext, 'ssl', 'local_cert', $apnsCert);
    $apnsConnection = stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 60, STREAM_CLIENT_CONNECT, $streamContext);
    if ($apnsConnection == false) {
        //echo "Failed to connect {$error} {$errorString}\n";
        //print "Failed to connect {$error} {$errorString}\n";
        //error_log($error.chr(13), 3, "/mnt/srv/MOOVWORKER/push-errors.log");
        return;
    } else {
        ///echo "Connection successful";    
        //error_log('Connection successful', 3, "/mnt/srv/MOOVWORKER/push-errors.log");
    }
    //$message = $push_data;
    //$message = (array)(json_decode($push_data));
    if (is_array($push_data) && array_key_exists('message', $push_data)) {
        $title = $push_data['message'];
    } else {
        $title = $push_data;
    }
    $payload['aps'] = array(
        'alert' => $title,
        'push_data' => $push_data,
        'badge' => 1,
        'sound' => 'default',
    );
    $payload = json_encode($payload);
    try {
        if ($push_data != "") {
            $apnsMessage = chr(0) . pack("n", 32) . pack('H*', str_replace(' ', '', $deviceToken)) . pack("n", strlen($payload)) . $payload;
            $fwrite = fwrite($apnsConnection, $apnsMessage);
            if ($fwrite) {
                //error_log($fwrite.chr(13), 3, "/mnt/srv/MOOVWORKER/push-errors.log");
                return true;
            } else {
                return false;
            }
        }
    } catch (Exception $e) {
        //echo 'Caught exception: '.  $e->getMessage(). "\n";
        //error_log($e->getMessage().chr(13), 3, "/mnt/srv/MOOVWORKER/push-errors.log");
    }
}

function generatePush($deviceType, $deviceToken, $message) { //echo $deviceType.' and '.$deviceToken;
//print_r($message); die;
//die('working');
    if ($deviceType == '0') {
        //send_fcm_push($deviceToken, $message);
        sendAndroidPush($deviceToken, $message);
    } else if ($deviceType == '1') {
        sendIphonePush($deviceToken, $message);
    } else {
        /*
         * do nothing
         */
    }
}

function sendIonicPush($registatoin_ids, $message, $key) {
    $to = $from = 0;
    if (isset($message['to'])and ! empty($message['to'])) {
        $to = $message['to'];
    }
    if (isset($message['from'])and ! empty($message['from'])) {
        $from = $message['from'];
    }
    if (!isset($message['title']) OR empty($message['title'])) {
        $message['title'] = "New Boom App Notification Received";
    }

    $registatoin_ids = trim($registatoin_ids);
    $vars = json_encode(array(
        "to" => $registatoin_ids,
        "priority" => 'high',
        "notification" => array('body' => $message, "title" => "Boom App", 'sound' => 'default')
            )
    );
    $headers = array
        (
        'Content-Type: application/json',
        'Authorization: key=AIzaSyAEVyTBljIBGbSfiDMk33aqG3ScNJehu84'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    $result = curl_exec($ch);
    curl_close($ch);
//echo $result;die;
}

?>

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('upload_image_base64')) {

    function upload_image_base64($array) {
        $data = str_replace(" ", "+", $array['image']);
        $data = base64_decode($data);
        $im = imagecreatefromstring($data);
        $fileName = $array['file_name']; //rand(111, 999).time() . ".png";
        $imageName = $array['path'] . $fileName;
        if ($im !== false) {
            imagepng($im, $imageName);
            imagedestroy($im);
        } else {
            echo 'An error occurred.';
        }
        return $fileName;
    }

}
if (!function_exists('upload_files')) {

    function upload_files($document) {
        $uploaded = [];
        $files = $_FILES[$document['key']];
        for ($i = 0; $i < count($files['name']); $i++) {
            
            if ($files['error'][$i] == 0) {
                $file_name = time() . trim(basename($_FILES[$document['key']]["name"][$i]));
                $target_file = $document['path'] . $file_name;
                if (move_uploaded_file($_FILES[$document['key']]["tmp_name"][$i], $target_file)) {
                    $uploaded[] = $file_name;
                }
            }
        } 
        //pre($uploaded); die;
        return $uploaded;
    }
}



if (!function_exists('upload_compress_image')) {

    function upload_compress_image($details) { //pre($details);    
        $key = $details['key'];
        $return['error'] = "please select any other image"; //pre($_FILES[$key]);
        //$image          = $_FILES[$key]["name"];
        if ($_FILES[$key]['error'] == 0) {
            $uploadedfile = $_FILES[$key]['tmp_name'];
            $filename = stripslashes($_FILES[$key]['name']);
            $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            //$extension  = getExtension($filename);
            $extension = strtolower($extension);
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
                $return['error'] = "Unknown Image extension";
            } else {
                $size = filesize($uploadedfile);
                if ($extension == "jpg" || $extension == "jpeg") {
                    $src = @imagecreatefromjpeg($uploadedfile);
                    if (!$src) {
                        $src = imagecreatefromstring(file_get_contents($uploadedfile));
                    }
                } else if ($extension == "png") {
                    $src = @imagecreatefrompng($uploadedfile);
                } else {
                    $src = @imagecreatefromgif($uploadedfile);
                }

                list($width, $height) = getimagesize($uploadedfile);

                $newwidth = 300;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);

                $newwidth1 = 300;
                $newheight1 = ($height / $width) * $newwidth1;
                $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
                $image_name = time() . '.' . $extension;
                $filename = $details['path'] . "/" . $image_name;
                $filename1 = $details['path'] . "/small_" . $image_name;

                imagejpeg($tmp, $filename, 100);
                imagejpeg($tmp1, $filename1, 100);

                imagedestroy($src);
                imagedestroy($tmp);
                imagedestroy($tmp1);
                $return['error'] = 0;
                $return['file_name'] = $image_name;
            }
        }
        return $return;
    }

if (!function_exists('upload_compress_multiple_images')) {

        function upload_compress_multiple_images($details) { //pre($details);    
            $return = array();
            $key = $details['key'];
            $cnt = count($_FILES[$key]['name']);
            for ($i = 0; $i < $cnt; $i++) {
                if ($_FILES[$key]['error'][$i] == 0) {
                    $uploadedfile = $_FILES[$key]['tmp_name'][$i];
                    $filename = stripslashes($_FILES[$key]['name'][$i]);
                    $extension = pathinfo($_FILES[$key]['name'][$i], PATHINFO_EXTENSION);
                    //$extension  = getExtension($filename);
                    $extension = strtolower($extension);
                    if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
                        //$return['error'] = "Unknown Image extension";
                    } else {
                        $size = filesize($uploadedfile);
                        if ($extension == "jpg" || $extension == "jpeg") {
                            $src = @imagecreatefromjpeg($uploadedfile);
                            if (!$src) {
                                $src = imagecreatefromstring(file_get_contents($uploadedfile));
                            }
                        } else if ($extension == "png") {
                            $src = @imagecreatefrompng($uploadedfile);
                        } else {
                            $src = @imagecreatefromgif($uploadedfile);
                        }
                        list($width, $height) = getimagesize($uploadedfile);
                        $newwidth = 400;
                        $newheight = ($height / $width) * $newwidth;
                        $tmp = imagecreatetruecolor($newwidth, $newheight);
                        $newwidth1 = 150;
                        $newheight1 = ($height / $width) * $newwidth1;
                        $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);
                        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                        imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
                        $image_name = $filename; //time() . '.' . $extension;
                        $filename = $details['path'] . "/" . $image_name;
                        $filename1 = $details['path'] . "/small_" . $image_name;

                        imagejpeg($tmp, $filename, 100);
                        imagedestroy($src);
                        imagedestroy($tmp);
                        imagedestroy($tmp1);
                        $return[$i]['real_name'] = explode('.', $_FILES[$key]['name'][$i])[0];
                        $return[$i]['file_name'] = $image_name;
                    }
                }
            }
            return $return;
        }

    }

    if (!function_exists('upload_multiple_images_for_app')) {
        function upload_multiple_images_for_app($files,$path) {// pre($files); pre($path);  die;
            $uploaded = [];
            for ($i = 0; $i < count($files['name']); $i++) {
                if ($files['error'][$i] == 0) {
                    $res = explode('.',$files['name'][$i]);
                    $file_name = rand(111, 999).time().'.'.end($res); 
                    //$file_name = time().'.jpg'; //pre($file_name); 
                    $target_file = $path . $file_name; //pre($target_file); 
                    if (move_uploaded_file($files["tmp_name"][$i], $target_file)) {
                    }
                    $uploaded[] = $file_name;
                }
            } 
            //pre($uploaded); die;
            return $uploaded;
        }
    }
    
    if (!function_exists('upload_multiple_images_for_website')) {
        function upload_multiple_images_for_website($files,$path) { //pre($files); pre($path);  die;
            $uploaded = [];
            for ($i = 0; $i < count($files['name']); $i++) {
                if ($files['error'][$i] == 0) {
                    $res = explode('.',$files['name'][$i]);
                    $file_name = rand(111, 999).time().'.'.end($res); 
                   // $file_name = time().$files['name'][$i]; //pre($file_name); 
                    $target_file = $path . $file_name; //pre($target_file); 
                    if (move_uploaded_file($files["tmp_name"][$i], $target_file)) {
                    }
                    $uploaded[] = $file_name;
                }
            } 
            //pre($uploaded); die;
            return $uploaded;
        }
    }
    
    
    
}

    




        
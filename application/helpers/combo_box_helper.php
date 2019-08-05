<?php

if(!function_exists('show_combo')) {
    function show_combo($options , $class="" , $id="" , $name="" , $required="" , $selectedValue = null)
    {
        $html = "";
        $html.='<select class="'.$class.'" id="'.$id.'" name="'.$name.'" '.$required.'>\n'; 
        foreach($options as $key => $option) {
            $html .= '<option '.($key==$selectedValue? "selected" : "" ).' value='.$key.'>'.$option.'</option>';
        }
        $html.='</select>';
        return $html;
    }
}
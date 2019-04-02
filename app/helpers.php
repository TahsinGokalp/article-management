<?php

function getGravatar($email, $s = 100, $d = 'mp', $r = 'g', $img = false, $atts = [])
{
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="'.$url.'"';
        foreach ($atts as $key => $val) {
            $url .= ' '.$key.'="'.$val.'"';
        }
        $url .= ' />';
    }

    return $url;
}

function getConstantsAndReturnSelected($class,$selected){
    $reflection = new \ReflectionClass($class);
    $constants = $reflection->getConstants();
    if(isset($constants['CREATED_AT'])){
        unset($constants['CREATED_AT']);
    }
    if(isset($constants['UPDATED_AT'])){
        unset($constants['UPDATED_AT']);
    }
    foreach($constants as $v){
        if($v['id'] == $selected){
            return $v['text'];
        }
    }
    return NULL;
}

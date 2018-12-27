<?php

if (!function_exists('dateToMySQL')) {
    function dateToMySQL($date){
        $campos = explode("/",$date);
        return date("Y-m-d", strtotime($campos[2]."/".$campos[1]."/".$campos[0]));
    }
}


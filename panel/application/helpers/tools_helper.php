<?php

function convertToSEO($text){

    $turkce = array("Ç","ç","ı","İ","Ş","ş","ö","Ö","ü","Ü","Ğ","ğ",".",",","'","?","!","*"," ","=","_","(",")");
    $convert    = array("c","c","i","i","s","s","o","o","u","u","g","g","-","-","-","-","-","-","-","-","-","-","-");

    return strtolower(str_replace($turkce,$convert,$text));

}


?>
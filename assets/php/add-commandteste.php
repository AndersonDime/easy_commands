<?php
require 'conect.php';
include_once("../services/products-service.php");

$nmesa = 1;


$listm = mysql_getdata("SELECT * FROM mesas WHERE numero='$nmesa'");

foreach ($listm as $value){
    echo $value["id"]; 
    echo $value["numero"]; 
    echo $value["preferencia"]; 
    echo $value["status"]; 
    
}
print_r($listm);

?>
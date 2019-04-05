<?php
$inputId = $_POST["userId"];
$inputPass = $_POST["userPass"];

function mysql_validate($script){

    $user = 0;
    $con = mysqli_connect("localhost",$inputId,$inputPass,"easycomands") or die(mysqli_connect_error());
    
    
    $value = mysqli_query($con,$script) or die();
    
    if(){

    }
    
    
    return $user;
    
    }


?>
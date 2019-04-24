<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$sec = $_POST["sector"];

$valid = mysql_getdata("SELECT * FROM setores WHERE nome='$sec'");

if(count($valid)==0){
    $show = mysql_insert("INSERT INTO setores VALUES(DEFAULT, '{$sec}')");

if ($show > 0) {
    //sleep(3);
    header('Location: ?page=new-sectors&success=1');
}

}else{
    header('Location: ?page=new-sectors&fail=1');
}


?>
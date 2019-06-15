<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_GET["id"];

echo $id;


$valid = mysql_getdata("SELECT * FROM pedidos WHERE id = '$id' ");


if(count($valid)>0){
$alter = mysql_insert("UPDATE pedidos SET status = 2 WHERE id = '$id'");



if ($alter > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=list-production&success=1';</script>"; exit;
}else{
    echo "<script type='text/javascript'>window.top.location='?page=list-production&fail=1';</script>"; exit;
}
}


?>
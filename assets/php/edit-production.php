<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_POST["id"];

$stat = $_POST["stats"];


$valid = mysql_getdata("SELECT * FROM pedidos WHERE status='$stat' AND id != '$id' ");


if(count($valid)==0){
$alter = mysql_insert("UPDATE pedidos SET status='$stat' WHERE id = '$id'");

if ($alter > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=list-production&success=1';</script>"; exit;
}

}else{
    echo "<script type='text/javascript'>window.top.location='?page=alter-production&fail=1&id=$id';</script>"; exit;
}
?>
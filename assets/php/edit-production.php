<?php

include_once("../services/products-service.php");

$id = $_POST["id"];

$stat = $_POST["stats"];


$valid = mysql_getdata("SELECT * FROM comandas WHERE status='$stat' AND id != '$id' ");


if(count($valid)==0){
$alter = mysql_insert("UPDATE comandas SET status='$stat' WHERE id = '$id'");
echo $alter;
}

?>
<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_GET["id"];


$delet = mysql_delete("DELETE FROM produtos WHERE id = $id");


if ($delet == -1) {
    echo "<script type='text/javascript'>window.top.location='?page=list-products&fail=1';</script>"; exit;
} elseif ($delet > 0) {
    echo "<script type='text/javascript'>window.top.location='?page=list-products&success=2';</script>"; exit;
}

?>
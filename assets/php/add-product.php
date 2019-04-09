<?php
include_once("../services/products-service.php");

$name = $_POST["product"];

$cat = $_POST["category"];

$valor = $_POST["price"];


$show = mysql_insert("INSERT INTO produtos VALUES(DEFAULT, '{$name}', '{$cat}', '{$valor}')");

if ($show > 0) {
    sleep(3);
    header('Location: ../../index.php');
}

?>
<?php
include_once("../assets/services/products-service.php");

$id = $_GET["id"];


$delet = mysql_delete("DELETE FROM produtos WHERE id = $id");


if ($delet > 0) {
    header('Location: list-products.php');
}

?>
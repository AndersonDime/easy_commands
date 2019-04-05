<?php
include_once("../services/products-service.php");

$nome = $_POST["produto"];

$cp = $_POST["cp"];

$valor = $_POST["preco"];

$armazenar = mysql_insert("INSERT INTO produtos VALUES(DEFAULT, '{$nome}', '{$cp}', '{$valor}')");

if ($armazenar > 0) {
    header('Location: ../../index.php');
}

?>
<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$numberTable = mysql_getData("SELECT TOP 1 numero FROM mesas ORDER BY numero DESC") + 1;

mysql_insert("INSERT INTO produtos VALUES(DEFAULT, '{$numberTable}', '{0}', '{0}'");
?>
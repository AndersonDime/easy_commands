<?php
include_once("../services/table-service.php");

$ArraynumberTable = mysql_getdata("SELECT numero FROM mesas ORDER BY numero DESC LIMIT 1 ");
/* $numberTable = $ArraynumberTable[0]; */
$numberTable = $ArraynumberTable[0]['numero'] + 1;

mysql_insert("INSERT INTO mesas VALUES(DEFAULT, '{$numberTable}', '{0}', '{0}')");


header("Location: ../../index.php?page=list-table");
exit;
?>
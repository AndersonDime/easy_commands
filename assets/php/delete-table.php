<?php
include_once("./assets/services/table-service.php");

$id = $_GET["id"];

$delet = mysql_delete("DELETE FROM mesas WHERE id = $id");


if ($delet > 0) {
    echo "<script type='text/javascript'>window.top.location='?page=list-table&fail=1';</script>"; exit;
}

header("Location: ../../index.php?page=list-table");
exit;
?>
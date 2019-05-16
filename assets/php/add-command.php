<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$produto_id = $_POST["id"];
echo $produto_id;
$cat = $_POST["productQtd"];

$commandStatus = "1";

$commandNumber = 1;

$valid = mysql_getdata("SELECT * FROM produtos WHERE nome='$name'");

if(count($valid)==0){
    $show = mysql_insert("INSERT INTO pedidos_has_produtos VALUES('$pedidos_id', '{$produto_id}', '{$quantidade}', {$status})");

if ($show > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=new-product&success=1';</script>"; exit;
}

}else{
    echo "<script type='text/javascript'>window.top.location='?page=new-product&fail=1';</script>"; exit;
}
?>
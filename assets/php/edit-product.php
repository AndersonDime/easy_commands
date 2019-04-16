<?php
include_once("assets/services/products-service.php");

$id = $_POST["id"];

$name = $_POST["product"];

$cat = $_POST["category"];

$price = $_POST["price"];

$newprice = str_replace(",", ".",$price);

$valid = mysql_getdata("SELECT * FROM produtos WHERE nome='$name'");


if(count($valid)==0){
$alter = mysql_insert("UPDATE produtos SET nome='$name',categoria_produtos_id='$cat', preco='$newprice' WHERE id = $id");

if ($alter > 0) {
    //sleep(3);
    header('Location: ?page=list-products');
}

}else{
    header('Location: ?page=alter-products&fail=1');
}




?>
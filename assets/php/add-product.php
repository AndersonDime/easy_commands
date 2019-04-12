<?php
include_once("assets/services/products-service.php");

$message = "Produto ja existe dentro do banco de dados";

$name = $_POST["product"];

$cat = $_POST["category"];

$price = $_POST["price"];

$newprice = str_replace(",", ".",$price);

$valid = mysql_getdata("SELECT * FROM produtos WHERE nome='$name'");

if(count($valid)==0){
    $show = mysql_insert("INSERT INTO produtos VALUES(DEFAULT, '{$name}', '{$cat}', {$newprice})");

if ($show > 0) {
    //sleep(3);
    header('Location: ?page=home-page');
}

}else{
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: ?page=new-product&msg=1');
}


?>
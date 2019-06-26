<?php
include_once("../services/products-service.php");
$id_comanda = $_POST["idComanda"];


$list_commands = mysql_getdata("SELECT * FROM comandas WHERE id = '$id_comanda'");
$id_comanda_banco = $list_commands[0]['id'];
$id_mesa = $list_commands[0]["mesas_id"];
$mesa = mysql_getdata("SELECT numero FROM mesas WHERE id = '$id_mesa'");
$mesa_numero = $mesa[0]["numero"];
    if($id_comanda == $id_comanda_banco){
       $alter_num_mesa = mysql_update("UPDATE comandas SET hist_mesa_numero = '$mesa_numero' WHERE id = '$id_comanda_banco' ");
       $alter_id_mesa = mysql_update("UPDATE comandas SET mesas_id = null WHERE id = '$id_comanda_banco' ");
       $alter_status = mysql_update("UPDATE comandas SET `status` = 1 WHERE id = '$id_comanda_banco' ");
    }


?>
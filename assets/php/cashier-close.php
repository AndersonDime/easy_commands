<?php
include_once("../services/products-service.php");
$id_comanda = $_POST["idComanda"];

$list_commands = mysql_getdata("SELECT mesas.id as id_mesa, mesas.status as status_mesa,
comandas.status as status_comanda from mesas 
inner join comandas ON comandas.mesas_id = mesas.id
INNER JOIN pedidos ON pedidos.comandas_id = comandas.id");

?>
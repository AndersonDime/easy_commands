<?php
require 'conect.php';
include_once("assets/services/products-service.php");
$list_commands = mysql_getdata("SELECT mesas.numero as numero_mesa, mesas.id as id_mesa, mesas.status as status_mesa,
comandas.id as id_comanda, comandas.status as status_comanda, pedidos.quantidade as quantidade_pedido,
produtos.nome as nome_produto, produtos.preco as preco_produto from mesas 
inner join comandas ON comandas.mesas_id = mesas.id
INNER JOIN pedidos ON pedidos.comandas_id = comandas.id
INNER JOIN produtos ON produtos.id = pedidos.produtos_id");

function open_table($id_comanda){
    foreach($list_commands as $key => $value){
        if($_POST["idComanda"] == $value["id_comanda"]){
        echo '<td>'.$value["nome_produto"];.'</td>';
        echo '<td id="price">'.$value["preco_produto"].'</td>';
        echo '<td>'.$value["quantidade_pedido"].'</td>';
        echo '<td><i class=" fas fa-trash-alt order-delete"></i> </td>';
        }
    }
} 

?>
<?php
function open_table($id_comanda){
    include_once("../services/products-service.php");
    require 'conect.php';
    $list_commands = mysql_getdata("SELECT mesas.numero as numero_mesa, mesas.id as id_mesa, mesas.status as status_mesa,
    comandas.id as id_comanda, comandas.status as status_comanda, pedidos.id as id_pedidos, pedidos.quantidade as quantidade_pedido,
    produtos.nome as nome_produto, produtos.preco as preco_produto from mesas 
    inner join comandas ON comandas.mesas_id = mesas.id
    INNER JOIN pedidos ON pedidos.comandas_id = comandas.id
    INNER JOIN produtos ON produtos.id = pedidos.produtos_id");

    foreach($list_commands as $key => $value){
        $newprice = str_replace(".", ",",$value["preco_produto"]);
        if($_POST["idComanda"] == $value["id_comanda"]){
            echo '<tr>
            <td>'.$value["nome_produto"].'</td> 
            <td pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$">'.$newprice.'</td>
            <td>'.$value["quantidade_pedido"].'</td>
            <td><i class=" fas fa-trash-alt order-delete" onclick="deleteOrder()"></i> </td>
            </tr>';
        }
    }
}
$idComanda = $_POST["idComanda"];
open_table($idComanda);
?>
<?php
    require 'conect.php';
    include_once("../services/products-service.php");


    $list = mysql_getdata("SELECT p.nome AS 'product_name',php.id AS 'idPedido', php.status AS 'pedido_status', php.quantidade AS 'product_qtd', php.observacoes AS 'product_obs', com.status AS 'order_status', com.hora AS 'order_time', com.mesas_id AS 'order_table_number', m.id AS 'order_table_id', com.id as command_id FROM produtos AS p
    INNER JOIN pedidos AS php ON p.id = php.produtos_id
    INNER JOIN comandas AS com ON php.comandas_id = com.id
    INNER JOIN mesas AS m ON m.id = com.mesas_id WHERE php.status=0 ORDER BY order_time ASC");

    foreach ($list as $key => $value ){
        echo '
        <tr id="' .$value["command_id"].'">
            <td style="width: 10%"> '.$value["order_table_number"].'</td>
            <td style="width: 10%"> '.$value["order_time"].'</td>
            <td style="width: 10%"> ' .$value["product_qtd"].' x</td>
            <td style="width: 10%"> ' .$value["product_name"].'</td>
            <td style="width: 50%">  '.$value["product_obs"].'</td>
            <td style="width: 10%">  <a class="btn btn-sm" href="?page=edit-production&id='.$value["idPedido"].'" id="edit"> <i class="fas fa-check text-success new-icon"></i>
            </a> 
            </td>
        </tr>
        ';

    }

?>
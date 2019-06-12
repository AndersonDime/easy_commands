<?php
require 'conect.php';
date_default_timezone_set('America/Sao_Paulo'); 
include_once("../services/products-service.php");

$numeroMesa = $_POST["numero_mesa"];
$product_qtd = $_POST["product_qtd"];
$product_id = $_POST["product_id"];
$observation = $_POST["observation"];

function list_products($numeroMesa,$comanda_id, $mesas_id, $product_id){
    $orderInformation = mysql_getdata("SELECT * FROM comandas WHERE mesas_id = '$mesas_id'"); 
    $orderInformationCard = mysql_getdata("SELECT ped.quantidade as quantidade, prod.nome as nome, ped.observacoes as observacoes from pedidos as ped
    inner join produtos as prod on ped.produtos_id = prod.id 
    where ped.comandas_id = '$comanda_id'");  
    foreach($orderInformationCard as $value){
        echo '<li class="list-group-item">'.$value['quantidade']."x  ".$value['nome']."  ".$value['observacoes'].'</li>';
    }
}

list_products();
//Consulta o BD procurando o ID correspondente ao numero da mesa
$idMesa = "SELECT id FROM mesas WHERE numero = '$numeroMesa'";
//Armazena os dados da consulta acima
$result_id = mysqli_query($con, $idMesa) or die(mysqli_error());
//Pega o valor de linhas afetadas - 0 ou 1
$id_found = mysqli_affected_rows($con);
//Se encontrou alguma linha retorna 1 e entra no if
if($id_found == 1){
    //Pega os dados para tratamento, da array que armazena os dados da consulta
    $data_mesa = mysqli_fetch_array($result_id);
    $mesas_id = $data_mesa["0"]; 
    $pedido = "SELECT * FROM comandas WHERE mesas_id = '$mesas_id'";
    $result_idPedido = mysqli_query($con,$pedido) or die(mysqli_error());
    $id_foundPedido = mysqli_affected_rows($con);

    if($id_foundPedido == 1){
        $data_pedido = mysqli_fetch_array($result_idPedido);
        $comanda_id = $data_pedido[0];
        $registerProductInOrder = mysql_insert("INSERT INTO pedidos values (DEFAULT, '{$product_qtd}', '0', '{$observation}', '{$comanda_id}', '{$product_id}')");
        list_products($numeroMesa,$comanda_id, $mesas_id, $product_id);
    }else{
        //Codigo que cria pedido
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s', time());
        $createCommand = mysql_insert("INSERT INTO comandas values (DEFAULT, '{$dataAtual}', '{$horaAtual}', '0', '{$mesas_id}')");
        $data_pedido = mysqli_fetch_array($result_idPedido);
        $comanda_id = $data_pedido[0];
        $registerProductInOrder = mysql_insert("INSERT INTO pedidos values (DEFAULT, '{$product_qtd}', '0', '{$observation}', '{$comanda_id}', '{$product_id}')");
        echo "<script type='text/javascript'>alert('Pedido Cadastrado');</script>";
    }
    
}else{
    //Codigo que retorna mensagem que nao achou o id da mesa
}



if(count($idMesa) > 0){

}else{
    echo "<script type='text/javascript'>alert('Usuario ja cadastrado.);</script>";
    header('Location: ../../index.php?page=user-register&fail=1');

}

?>

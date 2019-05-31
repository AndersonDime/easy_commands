<?php
require 'conect.php';
date_default_timezone_set('America/Sao_Paulo'); 
include_once("../services/products-service.php");

$numeroMesa = $_POST["numero_mesa"];
$product_qtd = $_POST["product_qtd"];
$product_name = $_POST["product_name"];

$descPedido = "teste";

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
    foreach ($data_mesa as $value){
        $mesa_id = $value["0"]; 
    }
    $pedido = "SELECT * FROM pedidos WHERE mesa = '$mesa_id'";
    $result_idPedido = mysqli_query($con,$pedido) or die(mysqli_error());
    $id_foundPedido = mysqli_affected_rows($con);

    if($id_foundPedido == 1){
        $data_pedido = mysqli_fetch_array($result_idPedido);


    }else{
        //Codigo que cria pedido
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s', time());
        $createCommand = mysql_insert("INSERT INTO pedidos values (DEFAULT, '{$mesa_id}', '{$dataAtual}', '{$horaAtual}', '0', '{$descPedido}')");
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


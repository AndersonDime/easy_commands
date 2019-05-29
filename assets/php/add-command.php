<?php
require 'conect.php';
include_once("../services/table-service.php");

$numeroMesa = 1;

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
 
    $pedido = "SELECT * FROM pedidos WHERE mesa = '$data_mesa[id]'";
    $result_idPedido = mysqli_query($con,$pedido) or die(mysqli_error($con));
    $id_foundPedido = mysqli_affected_rows($con);

    if($id_foundPedido == 1){

    }else{
        date_default_timezone_set('America/Sao_Paulo'); 
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s', time());

        //Codigo que cria pedido
        
        $data_pedido = mysqli_fetch_array($result_idPedido);
        foreach ($data_pedido as $value){
            $pedido_id = $value["id"];
        }
        $createCommand = mysql_insert("INSERT INTO pedidos values (DEFAULT, '{$pedido_id}', '{$dataAtual}', '{$horaAtual}')");
    }
    
}else{
    //Codigo que retorna mensagem que nao achou o id da mesa
}



if(count($idMesa) > 0){

}else{
    echo "<script type='text/javascript'>alert('Usuario ja cadastrado.);</script>";
    header('Location: ../../index.php?page=user-register&fail=1');

}

 print_r($idMesa);
?>


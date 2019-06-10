<?php
require 'conect.php';
date_default_timezone_set('America/Sao_Paulo'); 
include_once("../services/products-service.php");

$numeroMesa = $_POST["numero_mesa"];
$product_qtd = $_POST["product_qtd"];
$product_id = $_POST["product_id"];
$observation = $_POST["observation"];

$descPedido = "teste";

function list_products(){
    $tableInformation = mysql_getdata("SELECT * FROM mesas WHERE numero = '$numeroMesa'");
    foreach($tableInformation as $value){
        $mesa_Id = $value["0"];
    }
    $orderInformation = mysql_getdata("SELECT * FROM comandas WHERE mesa_id = '$mesa_Id'"); 
    $orderInformationCard = mysql_getdata("SELECT * FROM comandas WHERE pedidos_id = '$pedido_id'");   
    foreach($orderInformationCard as $value){
    $nomeProduto = mysql_getdata("SELECT * FROM produtos WHERE id = '$product_id'");            
    echo '<li> '.$nomeProduto["nome"].'</li>';
    echo '</li>'.$value["quantidade"].'</li>'; 
}

//Consulta o BD procurando o ID correspondente ao numero da mesa
$idMesa = "SELECT id FROM mesas WHERE numero = '$numeroMesa'";

//Armazena os dados da consulta acima
$result_id = mysqli_query($con, $idMesa) or die(mysqli_error());
//Pega o valor de linhas afetadas - 0 ou 1
$id_found = mysqli_affected_rows($con);
}
//Se encontrou alguma linha retorna 1 e entra no if
if($id_found == 1){
    //Pega os dados para tratamento, da array que armazena os dados da consulta
    $data_mesa = mysqli_fetch_array($result_id);
    foreach ($data_mesa as $value){
        $mesa_id = $value["0"]; 
    }
    $pedido = "SELECT * FROM comandas WHERE mesa = '$mesa_id'";
    $result_idPedido = mysqli_query($con,$pedido) or die(mysqli_error());
    $id_foundPedido = mysqli_affected_rows($con);

    if($id_foundPedido == 1){
        $data_pedido = mysqli_fetch_array($result_idPedido);
        $pedido_id = $data_pedido[0];
        $registerProductInOrder = mysql_insert("INSERT INTO comandas values (DEFAULT,'{$pedido_id}', '{$product_id}', '{$product_qtd}', '0', '{$observation}')");
        list_products();
    }else{
        //Codigo que cria pedido
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s', time());
        $createCommand = mysql_insert("INSERT INTO comandas values (DEFAULT, '{$mesa_id}', '{$dataAtual}', '{$horaAtual}', '0', '{$descPedido}')");
        $data_pedido = mysqli_fetch_array($result_idPedido);
        $pedido_id = $data_pedido[0];
        $registerProductInOrder = mysql_insert("INSERT INTO comandas values (DEFAULT, '{$pedido_id}', '{$product_id}', '{$product_qtd}', '0', '{$observation}')");
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


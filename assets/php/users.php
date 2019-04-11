<?php
//Conecta com o banco
require "conect.php";
session_start();

//Pega usuario e senha criptografando
$inputId = isset($_POST["userId"]) ? addslashes(trim($_POST["userId"])) : FALSE;
$inputPass = isset($_POST["userPass"]) ? (trim($_POST["userPass"])) : FALSE;

//Verifica se foi digitado algo
if(!$inputId || !$inputPass){
    login_mensage(); 
    exit;
}
//Consulta o banco, caso $result_id for diferente de vazio ganha 1 como login valido
$validate = "SELECT id, usuario, nivel_de_permissao, senha, email, setores_id FROM usuarios 
WHERE usuario = '$inputId'";
$result_id = mysqli_query($con,$validate) or die(mysqli_error($con));
$total = mysqli_affected_rows($con);
if($total == 1){
    //Pega os dados do usuario para passar pra sessao
    $data = mysqli_fetch_array($result_id);

    //Verifica senha, caso ok passa pra sessao as informacoes    
    if(!strcmp($inputPass, $data["senha"])){
        $_SESSION["userId"] = $data["id"];
        $_SESSION["userUsername"] = stripslashes($data["usuario"]);
        $_SESSION["userPermission-Level"] = $data["nivel_de_permissao"];
        header("Location: ../../index.php");
        exit;
    //Senha invalida
    }else{
        pass_mensage();
        exit;
    //Login inexistente 
    }
}
else{
    login_mensage(); 
    exit; 
}
?>
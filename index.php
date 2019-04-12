<?php 
session_start();
$get = isset($_GET['page'])? $_GET['page']:'';

include 'template/header.php';

?>

<div class="container-fluid">

<?php

	switch ($get) {
        case 'listar-produtos';
            include 'template/navbar.php'; 
            include 'pages/listar-orcamentos.php';
            break;
        case 'new-product';
            include 'template/navbar.php'; 
            include 'pages/new-product.php';
            break;
        case 'list-table';
            include 'template/navbar.php'; 
            include 'pages/list-table.php';
        case 'home-page';
            include 'template/navbar.php'; 
            include 'pages/home.php';
            break;
        case 'delete-products';
            include 'template/navbar.php'; 
            include 'pages/delete-products.php';
            break;
        case 'list-products';
            include 'template/navbar.php'; 
            include 'pages/list-products.php';
            break;
        default:
            include 'pages/login.php';
    }

//Conecta com o banco
require "assets/php/conect.php";
//Pega usuario e senha criptografando
$inputId = isset($_POST["userId"]) ? addslashes(trim($_POST["userId"])) : FALSE;
$inputPass = isset($_POST["userPass"]) ? (trim($_POST["userPass"])) : FALSE;

//Verifica se foi digitado algo
if(!$inputId || !$inputPass){
    //  login_mensage(); 
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
        header("Location: index.php?page=home-page");  
       
        exit;
    //Senha invalida
    }else{
        unset ($_SESSION['userId']);
        unset ($_SESSION['userPass']);
        exit;
    //Login inexistente 
    }
}
else{
    unset ($_SESSION['userId']);
    unset ($_SESSION['userPass']);
    exit; 
}


?>

</div>

<?php include 'template/footer.php' ?>
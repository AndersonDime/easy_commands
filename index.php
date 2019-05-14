
<?php
session_start();
$get = isset($_GET['page'])? $_GET['page']:'';

include 'template/header.php';
include 'template/navbar.php';
?>

<?php
	switch ($get) {
        case 'listar-produtos':
            include 'pages/listar-orcamentos.php';
            break;
        case 'new-product':      
            include 'pages/new-product.php';
            break;
        case 'list-table': 
            include 'pages/list-table.php';
        case 'home-page':     
            include 'pages/home.php';
            break;
        case 'delete-products':     
            include 'pages/delete-products.php';
            break;
        case 'list-products':     
            include 'pages/list-products.php';
            break;
        case 'alter-products':     
            include 'pages/alter-products.php';
            break;
        case 'user-register':     
            include 'pages/user-register.php';
            break;
        case 'add-product':     
            include 'assets/php/add-product.php';
            break;
        case 'edit-product':     
            include 'assets/php/edit-product.php';
            break;
        case 'new-sectors':     
            include 'pages/new-sectors.php';
            break;
        case 'list-sectors':     
            include 'pages/list-sectors.php';
            break;
        case 'add-sector':     
            include 'assets/php/add-sector.php';
            break;
        case 'alter-sectors':     
            include 'pages/alter-sectors.php';
            break;
        case 'edit-sectors':     
            include 'assets/php/edit-sectors.php';
            break;
        case 'delete-sectors':      
            include 'pages/delete-sectors.php';
        case 'new-command':      
            include 'pages/new-command.php';
            break;
        default:
            include 'pages/login.php';
    }

//Conecta com o banco
require "assets/php/conect.php";
//Pega usuario e senha criptografando
$inputId = isset($_POST["userId"]) ? addslashes(trim($_POST["userId"])) : FALSE;
$inputPass = isset($_POST["userPass"]) ? (trim($_POST["userPass"])) : FALSE;
if(isset($_POST["userId"]) && isset($_POST["userPass"])){

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
        $_SESSION["sessionId"] = session_id();
        $_SESSION["userId"] = $data["id"];
        $_SESSION["userUsername"] = stripslashes($data["usuario"]);
        $_SESSION["userPermission-Level"] = $data["nivel_de_permissao"];
        echo "<script type='text/javascript'>window.top.location='index.php?page=home-page';</script>";
        exit;
    //Senha invalida
    }else{
        ?>
    <script>
        $.notify("Login ou senha incorretos.", { position:"top center", className: 'error' } );
    </script>
    <?php
    unset ($_SESSION['userId']);
    unset ($_SESSION['userPass']);
    exit; 
    }
//Login inexistente 
}else{
    if($total == 0){
    ?>
    <script>
        $.notify("Login inexistente.", { position:"top center", className: 'error' } );
    </script>
    <?php
    unset ($_SESSION['userId']);
    unset ($_SESSION['userPass']);
    exit; 
    }
}
}
?>  

<?php include 'template/footer.php' ?>
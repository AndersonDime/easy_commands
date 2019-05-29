
<?php
session_start();
$get = isset($_GET['page'])? $_GET['page']:'';

include 'template/header.php';
?>

<?php
	switch ($get) {
        case 'listar-produtos':
            include 'template/navbar.php';
            include 'pages/listar-orcamentos.php';
            break;
        case 'list-production':
            include 'template/navbar.php';
            include 'pages/pages-productions/list-production.php';
            break;
        case 'new-product':      
            include 'template/navbar.php';
            include 'pages/pages-products/new-product.php';
            break;
        case 'new-category': 
            include 'template/navbar.php';     
            include 'pages/pages-categorys/new-category.php';
            break;
        case 'list-table':
            include 'template/navbar.php'; 
            include 'pages/list-table.php';
            break;
        case 'home-page':     
            include 'template/navbar.php';
            include 'pages/list-table.php';
            break;
        case 'delete-products':     
            include 'template/navbar.php';
            include 'pages/pages-products/delete-products.php';
            break;
        case 'cashier':     
            include 'template/navbar.php';
            include 'pages/cashier.php';
            break;
        case 'delete-categorys':
            include 'template/navbar.php';     
            include 'pages/pages-categorys/delete-categorys.php';
            break;
        case 'list-products':
            include 'template/navbar.php';     
            include 'pages/pages-products/list-products.php';
            break;
        case 'list-categorys':
            include 'template/navbar.php';     
            include 'pages/pages-categorys/list-categorys.php';
            break;
        case 'alter-products':
            include 'template/navbar.php';     
            include 'pages/pages-products/alter-products.php';
            break;
        case 'alter-categorys':
            include 'template/navbar.php';     
            include 'pages/pages-categorys/alter-categorys.php';
            break;
        case 'alter-productions':
            include 'template/navbar.php';     
            include 'pages/pages-productions/alter-productions.php';
            break;
        case 'user-register':
            include 'template/navbar.php';     
            include 'pages/user-register.php';
            break;
        case 'add-product':     
            include 'template/navbar.php';
            include 'assets/php/add-product.php';
            break;
        case 'add-category':
            include 'template/navbar.php';     
            include 'assets/php/add-category.php';
            break;
        case 'edit-product':
            include 'template/navbar.php';     
            include 'assets/php/edit-product.php';
            break;
        case 'edit-production':
            include 'template/navbar.php';     
            include 'assets/php/edit-production.php';
            break;
        case 'new-sectors':     
            include 'template/navbar.php';
            include 'pages/pages-sectors/new-sectors.php';
            break;
        case 'list-sectors':
            include 'template/navbar.php';     
            include 'pages/pages-sectors/list-sectors.php';
            break;
        case 'add-sector':     
            include 'assets/php/add-sector.php';
            include 'template/navbar.php';
            break;
        case 'alter-sectors':
            include 'template/navbar.php';     
            include 'pages/pages-sectors/alter-sectors.php';
            break;
        case 'edit-sectors':
            include 'template/navbar.php';     
            include 'assets/php/edit-sectors.php';
            break;
        case 'edit-category':
            include 'template/navbar.php';     
            include 'assets/php/edit-category.php';
            break;
        case 'delete-sectors': 
            include 'template/navbar.php';     
            include 'pages/pages-sectors/delete-sectors.php';
        case 'delete-table': 
            include 'template/navbar.php';     
            include 'assets/php/delete-table.php';
        case 'new-command':  
            include 'template/navbar.php';    
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
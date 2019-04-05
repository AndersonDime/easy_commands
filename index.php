<?php 

$get = isset($_GET['pagina'])? $_GET['pagina']:'';

include 'template/header.php';
include 'template/navbar.php';

?>

<div class="container">

<?php

	switch ($get) {
        case 'listar-produtos':
            include 'pages/listar-orcamentos.php';
            break;
        case 'cadproduto';
            include 'pages/cadastro-produtos.php';
            break;
        default:
            include 'pages/login.php';
    }
?>

</div>

<?php include 'template/footer.php' ?>
<?php 

$get = isset($_GET['pages'])? $_GET['pages']:'';

include 'template/header.php';
include 'template/navbar.php';

?>

<div class="container">

<?php

	switch ($get) {
        case 'listar-produtos';
            include 'pages/listar-orcamentos.php';
            break;
        case 'new-product';
            include 'pages/new-product.php';
            break;
        case 'list-table';
            include 'pages/list-table.php';
        case 'home-page';
            include 'pages/index.php';
            break;
        default:
            include 'pages/home.php';
    }
?>

</div>

<?php include 'template/footer.php' ?>
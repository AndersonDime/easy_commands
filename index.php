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
        default:
            include 'pages/home.php';
    }
?>

</div>

<?php include 'template/footer.php' ?>
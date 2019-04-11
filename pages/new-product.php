<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easy Commands</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/global.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/login.css">
</head>
<body class="bg-white txt-black">
<?php
include_once("../assets/services/products-service.php");

$categ = mysql_getdata("SELECT * FROM categorias");

?>

<link rel="stylesheet" type="text-css" href="assets/css/cadastro-produtos.css">

<form action="../assets/php/add-product.php" method="post">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <div class="card transparencia">
                <div class="card-header bg-dark txt-white">Cadastro de Itens</div>
                    <div class="card-body">
                    <div class="form-group">
                        <label>Nome do produto</label>
                        <input type="text" class="form-control" id="product" name="product" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Categoria do produto</label>
                        <select class="form-control" name="category">
                            <?php 
                            foreach ($categ as $value){
                            ?>

                            <option value="<?php echo $value["id"];?>"> <?php echo $value["nome_categoria"]; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input  type="text" class="form-control" id="valor" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" name="price" required>
                    </div>
                    <input type="submit" class="btn btn-blue" value="Cadastrar">
                </div>
            </div>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>

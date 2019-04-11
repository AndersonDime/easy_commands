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

$list = mysql_getdata("SELECT * FROM produtos INNER JOIN categorias ON produtos.categoria_produtos_id = categorias.id");

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-6">
            <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>                    
                </tr>
            </thead>
                <?php 
                    foreach ($list as  $key =>$value){
                ?>
            <tbody>
                <tr>
                    <th><?php echo $value["id"];?> </th>
                    <td><?php echo $value["nome"]; ?></td>
                    <td><?php echo $value["preco"]; ?></td>
                    <td><?php echo $value["nome_categoria"]; ?></td>
                    <td>  <a href="?pages=delete&id=<?php echo $value["id"] ?> " > 
                    <button type="button" class="btn btn-sm btn-info">Editar</button> 
                    </a> </td>
                    <td> <button type="button" class="btn btn-sm btn-danger">Excluir</button> </td>               
                </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
        </div>
        </div>
        <div class="col-sm-12 col-md-3"></div>
    </div>
</div>
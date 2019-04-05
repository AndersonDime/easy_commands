<?php
include_once("assets/php/produtos.php")
?>

<link rel="stylesheet" type="text-css" href="assets/css/cadastro-produtos.css">

<form action="cadastrar.php" method="post">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <div class="card transparencia">
                <div class="card-header bg-primary">Cadastro de Itens</div>
                    <div class="card-body">
                    <div class="form-group">
                        <label>Nome do produto</label>
                        <input type="text" class="form-control" id="product" name="produto">
                        
                    </div>
                    <div class="form-group">
                        <label>Categoria do produto</label>
                        <input type="text" class="form-control" id="categorias" name="catp" placeholder="Bebidas = 1 Pizza = 2 Sobremesa = 3">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>
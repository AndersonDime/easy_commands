<?php
include_once("assets/services/products-service.php");

$categ = mysql_getdata("SELECT * FROM categorias");

?>

<link rel="stylesheet" type="text-css" href="assets/css/cadastro-produtos.css">

<form action="assets/php/add-product.php" method="post">
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

                            <option value="<?php echo $value["id"];?>"> <?php echo $value["nome"]; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input  type="text" class="form-control" id="valor" name="price" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
            </div>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>

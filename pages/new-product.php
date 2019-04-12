<?php
include_once("assets/services/products-service.php");

$categ = mysql_getdata("SELECT * FROM categorias");

$msg= isset($_GET["msg"]) ? $_GET["msg"] : "";

?>

<link rel="stylesheet" type="text-css" href="assets/css/cadastro-produtos.css">

<form action="?page=add-product" method="post">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <div class="card transparencia">
                <div class="card-header bg-dark txt-white">Cadastro de Itens</div>
                    <div class="card-body">
                    <div class="form-group">
                        <label>Nome do produto</label>
                        <input type="text" class="form-control" id="prod" name="product" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Categoria do produto</label>
                        <select class="form-control" name="category">
                            <?php 
                            foreach ($categ as $value){
                            ?>

                            <option value="<?php echo $value["id_categoria"];?>"> <?php echo $value["nome_categoria"]; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input  type="text" class="form-control" id="valor" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" name="price" required>
                    </div>
                    <input type="submit" class="btn btn-blue" value="Cadastrar">

                            <?php
                            if (!empty($msg)){

                                echo $msg;

                            }
                            ?>

                </div>
            </div>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>

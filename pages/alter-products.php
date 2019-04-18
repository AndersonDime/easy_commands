<?php
require 'assets/services/session-validate.php';
$ident =  $_GET["id"];

include_once("assets/services/products-service.php");

$categ = mysql_getdata("SELECT * FROM categorias");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>


<form action="?page=edit-product" method="post">
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

                         <input type="hidden" name="id" value="<?php echo $ident?>">
                        
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
                    <input type="submit" class="btn btn-blue" value="Atualizar">

                </div>
            </div>
            <?php
					//se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success):
                    ?>
                    <div class="alert alert-success validation-box" role="alert">
                        <strong>Sucesso!</strong>
                            Item Alterado
                    </div>
                    <?php endif; ?>

                     <?php
					// se houver erro no formulario mostra essa mensagem:
                    if ($fail):
                    ?>
                    <div class="alert alert-danger validation-box" role="alert">
                        <strong>Erro!</strong>
                        Erro para Alterar informações do item
                    </div>
                    <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>

<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");
require 'assets/services/session-validate.php';
$categ = mysql_getdata("SELECT * FROM categorias");
$prod = mysql_getdata("SELECT * FROM produtos");

$numero_mesa = $_GET["numero"];

?>
<div class="list-tables-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
            <br>
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="text-center">Cadastrar Pedido - Mesa <?php echo $numero_mesa; ?></h4>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="productCtg">Categoria</label>
    
                                <select class="form-control" name="productCtg" id="productCtg">
                                    <option value="#" selected disabled>Selecione uma categoria</option>
                                <?php foreach ($categ as $value){ ?>
                                    <option value="<?php echo $value["id"];?>"> 
                                        <?php echo $value["nome"]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product">Produto</label>
                                <select class="form-control" name="product" id="product">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productQtd">Quantidade</label>
                                <input class="form-control" type="number" id="productQtd" name="productQtd">
                            </div>
                            <div class="form-group">
                                <label for="observacoes">Observações</label>
                                <textarea class="form-control" id="observacoes" name="observacoes" maxlength="100">
                                </textarea>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input  class="btn btn-dark" type="reset" value="Limpar">
                        <Button type="button" onclick="addOrder(<?php echo $numero_mesa; ?>)" class="btn btn-warning" >Adicionar</Button>
                    </div>
                </div>
            </div>
            <div class="col">
                <br>
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-warning ">Preview da Comanda</h4>
                    </div>
                    <div class="card-body">
                        <ul id="comanda" class="list-group list-group-flush">
                            
                         </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input id="numeroMesa" type="number" value="<?php echo $numero_mesa; ?>" style="display: none;">

<script src="./assets/javascript/new-command.js">


</script>
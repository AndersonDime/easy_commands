<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");
require 'assets/services/session-validate.php';

$categ = mysql_getdata("SELECT * FROM categorias");
$prod = mysql_getdata("SELECT * FROM produtos");

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
        <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Cadastrar Pedido</h4>
                </div>
                <div class="card-body">
                    <form action="../assets/php/add-command.php&produto_id=<?php echo $row['id']?>" method="post">
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
                        <input  class="btn btn-danger" type="reset" value="Cancelar">
                        <input type="submit" class="btn btn-blue" value="Adicionar">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Preview da Comanda</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $('#productCtg').on('change',function(){
        var productCtgId = $(this).val();
        if(productCtgId){
            $.ajax({
                type:'POST',
                url:'./assets/php/ajax-product-select.php',
                data:'categoria_produtos_id=' + productCtgId,
                success:function(html){
                    $('#product').html(html);
                }
            }); 
        }else{
            $('#produto').html('<option value="">Select country first</option>');
        }
    });
});
</script>
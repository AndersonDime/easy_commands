<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");
require 'assets/services/session-validate.php';
$categ = mysql_getdata("SELECT * FROM categorias");
$prod = mysql_getdata("SELECT * FROM produtos");

$numero_mesa = $_GET["numero"];

?>

<div class="container-fluid">
    <div class="row">
    <div class="col">
        <h3>Mesa <?php echo $numero_mesa; ?></h3>
    </div>
    </div>
    <div class="row">
        <div class="col">
        <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Cadastrar Pedido</h4>
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
                        <input  class="btn btn-danger" onclick="cancel()" type="reset" value="Cancelar">
                        <Button type="button" onclick="addOrder()"class="btn btn-primary" >Adicionar</Button>
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
                    <ul id="comanda" class="list-group list-group-flush">
                        
                     </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function cancel(){
        window.top.location='?page=list-table';
    }
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#productCtg').on('change',function(){
        var productCtgId = $(this).val();
        if(productCtgId){
            $.ajax({
                type:'POST',    
                url:'./assets/php/ajax-product-select.php',
                data:'categorias_id=' + productCtgId,
                success:function(html){
                    $('#product').html(html);
                }
            }); 
        }else{
            $('#produto').html('<option value="">Select country first</option>');
        }
    });
});
function deleteOrder(idPedidos){
    $.ajax({
        type:'POST',
        url:'./assets/php/delete-command.php',
        data:{
            id_pedidos: idPedidos
        },
        success:function(html){
            $('#comanda').html(html);
        }
    });
}
function addOrder(){
    numeroMesa = <?php echo $numero_mesa; ?>;
    $.ajax({
        type:'POST',
        url:'./assets/php/add-command.php',
        data: { 
            numero_mesa: numeroMesa,
            product_qtd: $('#productQtd').val(),
            product_id: $('#product').val(),
            observation: $('#observacoes').val()
        },
        success:function(html){
            $('#comanda').html(html);
        }
    }); 
}


function listOrder(){
    numeroMesa = <?php echo $numero_mesa; ?>;
    $.ajax({
        type:'POST',
        url:'./assets/php/list-command.php',
        data: { 
            numero_mesa: numeroMesa,
        },
        success:function(html){
            $('#comanda').html(html);
        }
    }); 
}

listOrder();
</script>
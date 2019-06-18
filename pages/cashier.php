<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");
$select = mysql_getdata("SELECT * FROM categorias");
$list_commands = mysql_getdata("SELECT mesas.numero as numero_mesa, mesas.id as id_mesa, mesas.status as status_mesa,
comandas.id as id_comanda, comandas.status as status_comanda, pedidos.quantidade as quantidade_pedido,
produtos.nome as nome_produto, produtos.preco as preco_produto from mesas 
inner join comandas ON comandas.mesas_id = mesas.id
INNER JOIN pedidos ON pedidos.comandas_id = comandas.id
INNER JOIN produtos ON produtos.id = pedidos.produtos_id");

$list_mesa = mysql_getdata("SELECT * from mesas inner join comandas on comandas.mesas_id = mesas.id where comandas.status = 0");
?>

<script>
  calculator();
</script>
<div class="container">
    <div class="row">   
        <div class="col-sm-4">
        <br>
            <div class="card transparencia">
                <div class="card-header text-center bg-dark txt-white">Lista de mesas</div>
                <div class="card-header bg-dark">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th style="text-align: center;"scope="col">Mesa</th>                   
                        </tr>
                    </thead>

                    <tbody>
                        <?php                         
                            foreach ($list_mesa as  $key =>$value){
                        ?>
                            <tr>
                                <td><button style="width: -webkit-fill-available;"class="btn btn-sm btn-info" onclick="open_table(<?php echo $value['id_comanda']?>);" ><?php echo 'MESA '.$value["numero"]; ?></button></td>            
                            </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
    <div class=".col-6 col-md-2"></div>
    <div class="col-sm-12 col-md-6">
    <br>
        <div class="card transparencia">
            <div class="card-header text-center bg-dark txt-white"><h3>PEDIDO</h3></div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Excluir</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>          
                        </tr>
                    </tbody>
                </table>
                <div class="card-header">
                    <h2 style="display: inline-block;">TOTAL:</h2>
                    <h4 style="display: inline-block;"><?php echo "foda"; ?></h4>
                </div>
            </div>        
        </div>
    </div>
</div>
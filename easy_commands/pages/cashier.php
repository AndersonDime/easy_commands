<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");
$select = mysql_getdata("SELECT * FROM categorias");
$list = mysql_getdata("SELECT produtos.id AS 'idProduto', produtos.nome AS 'nomeProduto', produtos.categoria_produtos_id, produtos.preco, categorias.id AS 'idCategoria', categorias.nome AS 'nomeCategoria', categorias.setores_id  FROM produtos INNER JOIN categorias ON produtos.categoria_produtos_id = categorias.id");
?>
<script>
  calculator();
</script>
<div class="container">
    <div class="row">   
        <div class="col-sm-4">
        <br>
            <div class="card transparencia">
                <div class="card-header text-center bg-dark txt-white">Adicionar Itens</div>
                <div class="card-header bg-dark">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Categoria</div>
                        </div>
                        <select id="category" class="form-control" name="inputProduct">
                        <?php foreach($select as $key =>$value){?>
                            
                        <option value="<?php echo $value["id"] ?>"><?php echo $value["nome"] ?></option>
                        <?php $categoriaId == $value["id"]; }
                        ?>
                    </select>
                    <i class="fas fa-search" <button style="cursor: pointer; margin-left: 10px; top: 10px; position: relative;" onclick = "search();"></button></i>
                    </div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Add</th>                    
                        </tr>
                    </thead>
                        <?php                         
                        foreach ($list as  $key =>$value){
                            if(//$qualquer == 
                                $value["idCategoria"]){
                            $newprice = str_replace(".", ",",$value["preco"]);
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $value["nomeProduto"]; ?></td>
                            <td><?php echo $newprice; ?></td>
                            <td>  <a class="btn btn-sm btn-info"> 
                            +
                            </a> </td>             
                        </tr>
                        <?php
                            }
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
                            <th scope="col">Add</th>                    
                        </tr>
                    </thead>
                        <?php                         
                        foreach ($list as  $key =>$value){
                            if($value["idCategoria"]){
                            $newprice = str_replace(".", ",",$value["preco"]);
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $value["nomeProduto"]; ?></td>
                            <td id="price"><?php echo $newprice; ?></td>
                            <td><?php echo $newprice; ?></td>
                            <td><a class="btn btn-sm btn-info">+</a> </td>             
                        </tr>
                        <?php
                            }
                        }
                        
                        ?>
                    </tbody>
                </table>
                <div class="card-header">
                    <h2 style="display: inline-block;">TOTAL:</h2>
                    <h4 style="display: inline-block;"><?php echo $totalprice; ?></h4>
                </div>
            </div>        
        </div>
    </div>
</div>
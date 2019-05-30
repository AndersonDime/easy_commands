<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT produtos.id AS 'idProduto', produtos.nome AS 'nomeProduto', produtos.categoria_produtos_id, produtos.preco, categorias.id AS 'idCategoria', categorias.nome AS 'nomeCategoria', categorias.setores_id  FROM produtos INNER JOIN categorias ON produtos.categoria_produtos_id = categorias.id");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-6">
            <br>
            <table class="table table-dark">
                <thead>
                    <a class="btn-black btn-block card-header text-center" > <h4> Lista de Produtos </h4> </a>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>                    
                    </tr>
                </thead>
                    <?php 
                        foreach ($list as  $key =>$value){
                        $newprice = str_replace(".", ",",$value["preco"]);
                    ?>
                <tbody>
                    <tr>
                        <th><?php echo $value["idProduto"];?> </th>
                        <td><?php echo $value["nomeProduto"]; ?></td>
                        <td>  <a class="btn btn-sm btn-info" href="?page=alter-products&id=<?php echo $value["idProduto"] ?>&cat=<?php echo $value["idCategoria"] ?> "> 
                            Editar
                        </a> </td>
                        <td> 
                            <a class="btn btn-sm btn-danger" href="?page=delete-products&id=<?php echo $value["idProduto"] ?> ">
                                Excluir
                            </a> 
                        </td>               
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
                <?php
                        //se orçamento foi inserido com sucesso mostra essa mensagem:
                        if ($success):
                        ?>
                        <script>
                            $.notify( "Alterado com sucesso", { position:"top center", className: 'success' } );
                        </script>
                        <?php endif; ?>

                        <?php
                        // se houver erro no formulario mostra essa mensagem:
                        if ($fail):
                        ?>
                        <script>
                            $.notify( "Excluido com sucesso", { position:"top center" } );
                        </script>
                        <?php endif; ?>
                    
        </div>
        <div class="col-md-1">
            <a class="btn btn-info add-table" href="?page=new-product">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
</div>
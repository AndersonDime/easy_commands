<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT produtos.id AS 'idProduto', produtos.nome AS 'nomeProduto', produtos.categorias_id, categorias.id AS 'idCategoria' FROM produtos INNER JOIN categorias ON produtos.categorias_id  =  categorias.id");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="container-fluid list-products-page">
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-6">
        <br>
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-warning text-center">
                    Lista de Produtos
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($list as  $key =>$value){
                        ?>
                        <tr>
                            <td><?php echo $value["idProduto"];?> </td>
                            <td><?php echo $value["nomeProduto"];?></td>
                            <td>  <a class="btn btn-sm btn-info" href="?page=alter-products&id=<?php echo $value["idProduto"];?>&cat=<?php echo $value["idCategoria"]; ?> "> 
                                Editar
                            </a> </td>
                            <td> 
                                <a class="btn btn-sm btn-danger" href="?page=delete-products&id=<?php echo $value["idProduto"]; ?> ">
                                    Excluir
                                </a> 
                            </td>               
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
            //se orçamento foi inserido com sucesso mostra essa mensagem:
            if ($success):
        ?>

            <script>
                $.notify( "Alterado com sucesso", { position:"top center", className: 'success' } );
            </script>

        <?php 
            endif; 
        
            // se houver erro no formulario mostra essa mensagem:
            if ($fail):
        ?>

            <script>
               $('#errorHint').html('Senha incorreta. Tente novamente ou clique em "Esqueceu a senha?" para redefini-la.');
            </script>
    
        <?php endif; ?>
                    
        </div>
        <div class="col-md-1">
            <a class="btn-dark add-table" href="?page=new-product">
                <i class="text-warning fas fa-plus"></i>
            </a>
        </div>
    </div>
</div>
<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT categorias.id AS 'idCategoria', categorias.nome AS 'nomeCategoria', categorias.setores_id, setores.id AS 'idSetor', setores.nome AS 'nomeSetor' FROM categorias INNER JOIN setores ON categorias.setores_id = setores.id");


$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-6">
            <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Setor da categoria</th>                   
                </tr>
            </thead>
            <?php 
                foreach ($list as  $key =>$value){
            ?>
            <tbody>
                <tr>
                    <th><?php echo $value["idCategoria"];?></th>
                    <td><?php echo $value["nomeCategoria"];?></td>
                    <td><?php echo $value["nomeSetor"];?></td>
                    <td> <a class="btn btn-sm btn-info" href="?page=alter-categorys&id=<?php echo $value["idCategoria"] ?>&sect=<?php echo $value["idSetor"] ?> " >Editar</a> </td>
                    <td> <a class="btn btn-sm btn-danger" href="?page=delete-categorys&id=<?php echo $value["idCategoria"] ?>">Excluir</a> </td>               
                </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
                <a class="btn btn-info" href="?page=new-category" > Nova Categoria + </a>
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
        <div class="col-sm-12 col-md-3"></div>
    </div>
</div>
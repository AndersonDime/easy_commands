<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT * FROM setores");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-6">
            <table class="table table-dark">
            <thead>
                <a class="btn-black btn-block" > Lista de Setores </a>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Setor</th>                   
                </tr>
            </thead>
            <?php 
                foreach ($list as  $key =>$value){
            ?>
            <tbody>
                <tr>
                    <th><?php echo $value["id"];?></th>
                    <td><?php echo $value["nome"]; ?></td>
                    <td>  <a class="btn btn-sm btn-info" href="?page=alter-sectors&id=<?php echo $value["id"] ?>" >Editar</a> </td>
                    <td> <a class="btn btn-sm btn-danger" href="?page=delete-sectors&id=<?php echo $value["id"] ?>">Excluir</a> </td>               
                </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
                <a class="btn btn-info" href="?page=new-sectors" > Novo Setor + </a>
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
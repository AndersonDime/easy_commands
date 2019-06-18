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
        <br>
            <table class="table table-dark">
            <thead>
                <a class="btn-black btn-block card-header text-center" > <h4> Lista de Setores </h4> </a>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Setor</th>                   
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($list as  $key =>$value){
                ?>
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
                <?php
                    //se orçamento foi inserido com sucesso mostra essa mensagem:
                if ($success == 1):
                ?>
                <script>
                    $.notify( "Alterado com sucesso", { position:"top center", className: 'success' } );
                </script>
                <?php endif; ?>


                <?php
                    //se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success == 2):
                ?>
                <script>
                    $.notify( "Excluído com sucesso", { position:"top center", className: 'success' } );
                </script>
                <?php endif; ?>

                <?php
                    // se houver erro no formulario mostra essa mensagem:
                if ($fail==1):
                ?>
                <script>
                    $.notify( "Existe um produto...", { position:"top center" } );
                </script>
                <?php endif; ?>
                
        </div>
        <div class="col-md-1">
            <a class="btn btn-info add-table" href="?page=new-sectors" >               
                <i class="fas fa-plus"></i>
            </a>


        </div>
    </div>
</div>
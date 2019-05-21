<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT * FROM pedidos");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

$teste = 0;

$msg = "";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-6">
            <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Mesa</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Status</th>                    
                </tr>
            </thead>
                <?php 
                    foreach ($list as  $key =>$value){
                    $teste = $value["status"];
                ?>
            <tbody>
                <tr>
                    <th><?php echo $value["id"];?> </th>
                    <td><?php echo $value["mesa"]; ?></td>
                    <td><?php echo $value["data"]; ?></td>
                    <td><?php echo $value["hora"]; ?></td>
                    <?php 
                    if ($teste == 0){
                      $msg =  "Disponivel"; 
                    }else if ($teste == 1){
                      $msg = "Em produção";
                    }else{
                      $msg = "Finalizada";
                    }
                    ?>
                    <td><?php echo $msg; ?></td>
                    <td>  <a class="btn btn-sm btn-info" href="?page=alter-productions&id=<?php echo $value["id"] ?>&stats=<?php echo $value["status"] ?> "> 
                        Editar Status
                    </a> </td>
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
        </div>
        <div class="col-sm-12 col-md-3"></div>
    </div>
</div>
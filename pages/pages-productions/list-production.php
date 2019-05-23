<?php
    require 'assets/services/session-validate.php';
    include_once("assets/services/products-service.php");

    $list = mysql_getdata("SELECT * FROM pedidos");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "";

    $msg = "";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-2"></div>
        <div class="col-sm-12 col-md-8">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Mesa</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Detalhes</th>                   
                    </tr>
                </thead>
                    <?php 
                        foreach ($list as  $key =>$value){
                    ?>
                <tbody>
                    <tr>
                        <td><?php echo $value["mesa"]; ?></td>
                        <td><?php echo $value["data"]; ?></td>
                        <td><?php echo $value["hora"]; ?></td>
                        <?php 
                            if ($value["status"] == 0){
                                $msg =  "Disponivel"; 
                            }else if ($value["status"] == 1){
                                $msg = "Em produção";
                            }else{
                                $msg = "Finalizado";
                            }
                        ?>
                        <td>
                                <select style="width: 100%;" class="form-control" name="stats">
                                <option value="0" <?php echo ($value["status"] == 0) ? "selected" : ""; ?>> Disponivel </option>
                                <option value="1" <?php echo ($value["status"] == 1) ? "selected" : ""; ?>> Em produção </option>
                                <option value="2" <?php echo ($value["status"] == 2) ? "selected" : ""; ?>> Finalizado </option>
                        </td>
                        <td>  <a class="btn btn-sm btn-info" href="?page=alter-productions&id=<?php echo $value["id"] ?>&stats=<?php echo $value["status"] ?> "> 
                            Editar Status
                        </a> </td>
                        <td>
                            <a class="btn btn-sm btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Detalhes do pedido
                            </a>
                        </td>

                    </tr>
                    <?php
                        }
                    ?>
                    </select>
                </tbody>
            </table>
        
            <?php
                //se orçamento foi inserido com sucesso mostra essa mensagem:
                if ($success):
            ?>
                <script>
                    $.notify( "Alterado com sucesso", { position:"top center", className: 'success' } );
                </script>
            <?php 
                endif; 
            ?>
            <?php
                // se houver erro no formulario mostra essa mensagem:
                if ($fail):
            ?>
            <script>
                $.notify( "Excluido com sucesso", { position:"top center" } );
            </script>
            <?php 
                endif; 
            ?>
                
        </div>
        <div class="col-sm-12 col-md-2">
            <?php 
                foreach ($list as  $key =>$value){
            ?>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <a> <?php echo $value["detalhes"]; ?> </a>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
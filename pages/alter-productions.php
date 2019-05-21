<?php
    require 'assets/services/session-validate.php';
    $ident =  $_GET["id"];
    $selstats = $_GET["stats"];

    include_once("assets/services/products-service.php");

    $categ = mysql_getdata("SELECT * FROM pedidos WHERE id='$ident'");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<form action="?page=edit-production" method="post">
    <div class="container-fluid">
        <div class="row">        
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                    <div class="card transparencia">
                        <div class="card-header bg-dark txt-white">
                            <?php 
                                foreach ($categ as $value){
                            ?>
                            Mesa: [<?php echo $value["mesa"]; ?>]
                        </div>
                        <div class="card-body">


  
                            <div class="form-group">
                                <label>Status do pedido</label>
                                <?php  echo $selstats; ?>
                            <select class="form-control" name="stats">
                            <option value="0" <?php echo ($value["status"] == 0) ? "selected" : ""; ?>> Disponivel </option>
                            <option value="1" <?php echo ($value["status"] == 1) ? "selected" : ""; ?>> Em produção </option>
                            <option value="2" <?php echo ($value["status"] == 2) ? "selected" : ""; ?>> Finalizado </option>
                            </select>
                            <?php 
                                } 
                            ?>
                                <input type="hidden" name="id" value="<?php echo $ident?>">
                            </div>                                        
                            <input type="submit" class="btn btn-blue" value="Atualizar">

                        </div>
                    </div>
                <?php
                    //se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success):
                ?>
                <script>
                    $.notify( "Alterado setor com sucesso", { position:"top center", className: 'success' } );
                </script>
                <?php 
                    endif; 
                ?>

                <?php
                    // se houver erro no formulario mostra essa mensagem:
                    if ($fail):
                ?>
                <script>
                    $.notify( "Falha ao editar setor", { position:"top center" } );
                </script>
                <?php 
                    endif; 
                ?>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>

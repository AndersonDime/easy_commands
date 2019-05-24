<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$categ = mysql_getdata("SELECT * FROM setores");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>


<form action="?page=add-sector" method="post">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <div class="card transparencia">
                <div class="card-header bg-dark txt-white">Cadastro De Setor</div>
                    <div class="card-body">
                    <div class="form-group">
                        <label>Nome do Setor</label>
                    <input type="text" class="form-control" id="sec" name="sector" required>
                    </div>
                        
                    <input type="submit" class="btn btn-blue" value="Cadastrar">

                </div>
            </div>
            <?php
					//se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success):
                    ?>
                    <script>
                        $.notify( "Cadastrado com sucesso", { position:"top center", className: 'success' } );
                    </script>
                    <?php endif; ?>

                     <?php
					// se houver erro no formulario mostra essa mensagem:
                    if ($fail):
                    ?>
                    <script>
                        $.notify( "Erro ao cadastrar o item", { position:"top center" } );
                    </script>
                    <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>

<?php
    require 'assets/services/session-validate.php';
    $ident =  $_GET["id"];

    include_once("assets/services/products-service.php");

    $categ = mysql_getdata("SELECT * FROM categorias WHERE id='$ident'");
    $sec = mysql_getdata("SELECT * FROM setores");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>


<form action="?page=edit-category" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <div class="card transparencia">
                    <div class="card-header bg-dark txt-white">
                        Alteração de Categoria
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nome da categoria</label>
                            <?php foreach($categ as $value){
                                
                            ?>
                            <input type="text" class="form-control" id="cat" name="cate" value="<?php echo $value["nome"]; ?>" required>
                            <?php }?>
                            <input type="hidden" name="id" value="<?php echo $ident?>">
                        
                        </div>
                        <div class="form-group">
                            <label>Setor da Categoria</label>
                            <select class="form-control" name="sector">
                            <?php 
                                foreach ($sec as $value){
                            ?>

                            <option value="<?php echo $value["id"];?>"> 
                                <?php echo $value["nome"]; ?>
                            </option>

                            <?php 
                                } 
                            ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                    </div>
                </div>
                <?php
                    //se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success):
                ?>
                <script>
                    $.notify( "Atualizado Categoria com sucesso", { position:"top center", className: 'success' } );
                </script>
                <?php 
                    endif; 
                ?>

                <?php
                    // se houver erro no formulario mostra essa mensagem:
                    if ($fail):
                ?>
                <script>
                    $.notify( "Falha para atualizar categoria", { position:"top center" } );
                </script>
                <?php 
                    endif; 
                ?>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</form>

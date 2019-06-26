<?php
    require 'assets/services/session-validate.php';
    $ident =  $_GET["id"];
    $selcat = $_GET["cat"];

    include_once("assets/services/products-service.php");
    $prodName = mysql_getdata("SELECT nome,preco FROM produtos WHERE id='$ident'");
    $categ = mysql_getdata("SELECT * FROM categorias");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="list-products-page">
    <form action="?page=edit-product" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-4"></div>
                <div class="col-sm-12 col-md-4">
                <br>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-warning text-center"> Alteração de Itens </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nome do produto</label>
                                <?php foreach($prodName as $value){
                                    
                                ?>
                                <input type="text" class="form-control" id="prod" name="product" value="<?php echo $value["nome"]; ?>" required>
                                <?php }?>
                                <input type="hidden" name="id" value="<?php echo $ident?>">
                            
                            </div>
                            <div class="form-group">
                                <label>Categoria do produto</label>
                                <select class="form-control" name="category">
                                <?php 
                                    foreach ($categ as $value){
                                ?>

                                <option value="<?php echo $value["id"];?>" <?php echo ($value["id"] == $selcat) ? "selected" : ""; ?> > 
                                    <?php echo $value["nome"]; ?>
                                </option>

                                <?php 
                                    } 
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Preço</label>
                                <?php foreach($prodName as $value){
                                $newprice = str_replace(".", ",",$value["preco"]);  
                                ?>
                                <input  type="text" class="form-control" id="valor" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" name="price" value="<?php echo $newprice; ?>" required>
                                <small id="errorHint" style="color: red;"><span style="color: white">.</span></small>
                                <?php
                                } 
                                ?>
                            </div>
                            <input type="submit" class="btn btn-warning" value="Atualizar">
                        </div>
                    </div>
                    <?php
                        //se orçamento foi inserido com sucesso mostra essa mensagem:
                        if ($success):
                    ?>
                    <script>
                        $.notify( "Atualizado item com sucesso", { position:"top center", className: 'success' } );
                    </script>
                    <?php 
                        endif; 
                    ?>

                    <?php
                        // se houver erro no formulario mostra essa mensagem:
                        if ($fail):
                    ?>
                    <script>
                        $('#errorHint').html('Falha ao editar produto, Verifique se digitou o mesmo nome do produto');
                    </script>
                    <?php 
                        endif; 
                    ?>
                </div>
                <div class="col-sm-12 col-md-4"></div>
            </div>
        </div>
    </form>
</div>

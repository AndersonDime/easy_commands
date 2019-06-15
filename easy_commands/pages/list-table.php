<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT * FROM mesas order by numero");

?>

<br>
<div class="container list-table">
    <div class="row">
        <div class="col-md-11">
            <div class="row">
                <?php 
                    foreach ($list as  $key =>$value){     
                ?>
                <div class="col-xs-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mesa #
                            <form  style="display: inline-block;" id="formNumero" method="post" action="../assets/php/edit-table.php">
                                <input type="number" class="numeroMesa" id="numeroMesa<?php echo $value['numero']; ?>" value="<?php echo $value['numero']; ?>" onfocusout="saveNumber(<?php echo $value['numero']; ?>, <?php echo $value['id']; ?> )" disabled required>
                            </form>

                            <?php 

                                if($value["status"] == 0){
                            ?>
                            <span class="badge badge-primary txt-white">Disponível</span>
                            <?php
                                }else if($value["status"] == 1){
                            ?>
                            <span class="badge badge-secondary txt-white">Ocupada</span>
                            <?php
                                }else if($value["status"] == 2){
                            ?>
                            <span class="badge badge-warning txt-white">Resevada</span>
                            <?php }else{ ?>
                            <span class="badge badge-danger txt-white">Indisponível</span>                  
                            <?php } ?>
                            <a href="?page=delete-table&id=<?php echo $value["id"] ?>" class="card-icon"><i class="fas fa-trash-alt"></i></a>
                            <a onclick="editarMesa(<?php echo $value['numero']; ?>)" href="#" class="card-icon"><i class="fas fa-pen"></i></a>
                            </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="?page=new-command&numero=<?php echo $value['numero'] ?>" class="btn btn-block btn-dark">Fazer Pedido <i class="fas fa-plus"></i>
                            </a>
                            
                        </div>
                    </div>
                </div> 
                <?php 
                    }
                ?>
            </div>            
        </div>

        <div class="col-md-1">
            <a  class="add-table" href="./assets/php/add-table.php">
               <i class="fas fa-plus"></i>
            </a>
        </div>

    </div>
</div>

<script>

function editarMesa(numero){

   var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", false).focus();
}

/* function saveNumber(numero, id){
   var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", true);

    $.ajax(
        type:'POST',
        url:'./assets/php/edit-table.php',
        data: {numero_mesa: $(campo).val(), id: id;}
        ,success:function(html){
            $('#product').html(html);
        }
    )
} */

function saveNumber(numero, id){
    var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", true);

    $.ajax({
    method: "POST",
    url: "./assets/php/edit-table.php",
    data: { mesa_numero: $(campo).val(), mesa_id: id}
    })
    .done(function( msg ) {
        alert( "Data Saved: " + msg );
    });
}
</script>
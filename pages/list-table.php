<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

?>

<div class="list-tables-page">
    <br>
    <div class="container-fluid list-table">
        <div class="row">
            <div class="col-md-11">
                <div class="row" id="cardsRow">
                    <?php 
                        foreach ($list as  $key =>$value){     
                    ?>
                    <div class="col-xs-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Mesa #
                                <form  style="display: inline-block;" id="formNumero" method="post" action="../assets/php/edit-table.php">
                                    <input type="number" class="numeroMesa" id="numeroMesa<?php echo $value['numero']; ?>" value="<?php echo $value['numero']; ?>" onfocusout="saveNumber(<?php echo $value['numero']; ?>, <?php echo $value['id']; ?> )" disabled required>
                                </form>
    
                                <button onClick="deleteTable(<?php echo $value['id'] ?>)" class="card-icon">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <a onclick="editarMesa(<?php echo $value['numero']; ?>)" href="#" class="card-icon"><i class="fas fa-pen"></i></a>
                                </h5>
                                <p class="card-text">
                                    Preferência da mesa: 
                                    <?php
                                        $pref = "";
                                        if($value['preferencia'] == 0){
                                            $pref = "<b class='text-danger'>Salgado</b>";
                                        }else{
                                            $pref = "<b class='text-danger'>Doce</b>";
                                        }

                                        echo $pref;
                                    ?>
                                </p>
                                <a href="?page=new-command&numero=<?php echo $value['numero'] ?>" class="btn btn-dark">Pedido <i class="fas fa-bars"></i>
                                </a>
                                <button onclick="changePref(<?php echo $value['preferencia'] ?>, <?php echo $value['numero'] ?>);" class="btn btn-warning text-white">
                                    Preferencia <i class="fas fa-pizza-slice"></i>
                                </button>
                                
                            </div>
                        </div>
                    </div> 
                    <?php 
                        }
                    ?>
                </div>            
            </div>
    
            <div class="col-md-1">
                <button  class="add-table bg-warning" onclick="addTable()">
                   <i class="fas fa-plus"></i>
                </button>
            </div>
    
        </div>
    </div>
</div>

<script src="./assets/javascript/list-table.js">


</script>
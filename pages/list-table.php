<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT * FROM mesas order by numero");

?>

<br>
<div class="container list-table">
    <div class="row">
        <div class="col">
            <form action="./assets/php/add-table.php" method="post">
                <input type="submit" class="btn btn-primary" value="Nova Mesa">
            </form>
        </div>
        <br>
        <br>
    </div>
    <div class="row">
        <?php 
            foreach ($list as  $key =>$value){     
        ?>
        <div class="col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mesa #<?php echo $value["numero"]; ?> 
                    <?php 
                        if($value["status"] == 0){
                    ?>
                    <span class="badge badge-primary txt-white">Disponivel</span>
                    <?php
                        }else if($value["status"] == 1){
                    ?>
                    <span class="badge badge-secondary txt-white">Ocupada</span>
                    <?php
                        }else if($value["status"] == 2){
                    ?>
                    <span class="badge badge-warning txt-white">Reservada</span>
                    <?php }else{ ?>
                    <span class="badge badge-danger txt-white">Indisponivel</span>                  
                    <?php } ?>
                    <a href="?page=delete-table&id=<?php echo $value["id"] ?>" class="btn float-right btn-danger">X</a>
                    </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="?page=new-product" class="btn btn-black">Detalhes</a>
                    <a href="?page=new-command" class="btn btn-success">Fazer Pedido</a>
                    
                </div>
            </div>
        </div> 
        <?php 
            }
        ?>
    </div>
</div>
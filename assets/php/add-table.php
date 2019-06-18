<?php
include_once("../services/table-service.php");

$ArraynumberTable = mysql_getdata("SELECT numero FROM mesas ORDER BY numero DESC LIMIT 1 ");
/* $numberTable = $ArraynumberTable[0]; */
$numberTable = $ArraynumberTable[0]['numero'] + 1;

mysql_insert("INSERT INTO mesas VALUES(DEFAULT, '{$numberTable}',0, 0)");

$listTable =  mysql_getdata("SELECT * FROM mesas ORDER BY numero");

$numberTable= isset($_GET["numberTable"]) ? $_GET["NumberTable"] : "";

$ArraynumberTable= isset($_GET["ArraynumberTable"]) ? $_GET["ArrayNumberTable"] : "";

foreach ($listTable as $key => $value) {
    # code...
echo '
    <div class="col-xs-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mesa #
                <form  style="display: inline-block;" id="formNumero" method="post" action="../assets/php/edit-table.php">
                    <input type="number" class="numeroMesa" id="numeroMesa'.$value["numero"].'" value="'.$value["numero"].'" onfocusout="saveNumber('.$value["numero"].', '.$value["id"].')" disabled required>
                </form>

                <button onClick="deleteTable('.$value['id'].')" class="card-icon">
                    <i class="fas fa-trash-alt"></i>
                </button>
                <a onclick="editarMesa('.$value["numero"].')" href="#" class="card-icon"><i class="fas fa-pen"></i></a>
                </h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                <a href="?page=new-command&numero='.$value["numero"].'" class="btn btn-dark">Pedido <i class="fas fa-bars"></i>
                </a>
                <a href="?page=new-command&numero='.$value["numero"].'" class="btn btn-warning text-white">Preferencia <i class="fas fa-pizza-slice"></i>
                </a>
                
            </div>
        </div>
    </div> 
';
}

/* <div class="col-xs-6 col-md-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mesa #
            <form  style="display: inline-block;" id="formNumero" method="post" action="../assets/php/edit-table.php">
                <input type="number" class="numeroMesa" id="numeroMesa'.$listTable['numero'].'" value="'.$listTable['numero'].'" onfocusout="saveNumber('.$listTable['numero'].','.$listTable['id'].')" disabled required>
            </form>

            <?php  
                if($value["status"] == 0){
            ?>
            <span class="badge badge-info txt-white">Disponível</span>
            <?php
                }else if($listTable["status"] == 1){
            ?>
            <span class="badge badge-secondary txt-white">Ocupada</span>
            <?php
                }else if($listTable["status"] == 2){
            ?>
            <span class="badge badge-warning txt-white">Resevada</span>
            <?php
                }else
                {
            ?>
            <span class="badge badge-danger txt-white">Indisponível</span>                  
            <?php
            } 
            ?>
            <a href="?page=delete-table&id='.$listTable["id"].'" class="card-icon"><i class="fas fa-trash-alt"></i></a>
            <a onclick="editarMesa('.$listTable['numero'].')" href="#" class="card-icon"><i class="fas fa-pen"></i></a>
            </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
            <a href="?page=new-command&numero='.$listTable['numero'].'" class="btn btn-dark">Pedido <i class="fas fa-bars"></i>
            </a>
            <a href="?page=new-command&numero='.$listTable['numero'].'" class="btn btn-warning text-white">Preferencia <i class="fas fa-pizza-slice"></i>
            </a>
            
        </div>
    </div>
</div>  */

?>
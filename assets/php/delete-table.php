<?php
include_once("../services/products-service.php");

$id = $_POST["id"];

$delet = mysql_delete("DELETE FROM mesas WHERE id = $id");

$listTable =  mysql_getdata("SELECT * FROM mesas ORDER BY numero");

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
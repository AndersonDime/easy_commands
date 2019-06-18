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
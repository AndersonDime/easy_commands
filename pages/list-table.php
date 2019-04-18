<?php 
require 'assets/services/session-validate.php';
    $get = isset($_GET['page'])? $_GET['page']:'';

?>

<br>
<div class="container list-table">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mesa #1 <span class="badge badge-success txt-white">Disponivel</span></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="?page=new-product" class="btn btn-black">Detalhes</a>
                </div>
            </div>
        </div>        
    </div>

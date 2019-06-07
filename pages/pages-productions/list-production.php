<?php
    require 'assets/services/session-validate.php';
    include_once("assets/services/products-service.php");

    $list = mysql_getdata("SELECT * FROM pedidos");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "";
?>
<script> 
    $(document).ready(function(){

        $("#edit").click(function(e){

            debugger;

             $.ajax({
                url : "assets/php/edit-production.php",
                type : 'post',
                data : {
                    id : this.parentElement.parentElement.id,
                    stats :$("#stats_"+this.parentElement.parentElement.id).val()
                }
            })
            .done(function(msg){
                debugger;
                //$("#resultado").html(msg);
                if(msg > 0){
                    $.notify( "Alterado o Status com sucesso", { position:"top center", className: 'success' } );
                }
                else{

                    $.notify( "Falha ao alterar o Status", { position:"top center" } );
                }
                
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            }); 

        })

        
        
    })

</script>

<div class="production-page">
    <div class="container-fluid">
        <div class="row">
            <?php 
                    foreach ($list as  $key =>$value){
                        ?>
                        <div class="col-md-4">
                        <div class="card comanda-detalhes">
                            <div class="tape-a"></div>
                            <div class="tape-b"></div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="text-left text-danger text-bold"><?php echo '#'.$value["mesa"]; ?></h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-right text-danger">
                                            <?php echo $value["hora"]; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <!-- PRODUTOS VEM AQUI-->
                                <a> <?php echo $value["detalhes"]; ?> </a>
                            </div>
                            <div class="card-footer text-center text-secondary">
                                <div class="row">
                                    <div class="col">
                                        <a href="#"><i class="fa fa-clock"></i></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><i class="fa fa-play"></i></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><i class="fa fa-concierge-bell"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                <?php
                    }
                ?>
        </div>
    </div>
</div>
<?php
    require 'assets/services/session-validate.php';
    include_once("assets/services/products-service.php");

    $list = mysql_getdata("SELECT p.nome AS 'product_name', php.quantidade AS 'product_qtd', php.observacoes AS 'product_obs', com.status AS 'order_status', com.hora AS 'order_time', com.mesas_id AS 'order_table_number', m.id AS 'order_table_id', com.id as command_id FROM produtos AS p
    INNER JOIN pedidos AS php ON p.id = php.produtos_id
    INNER JOIN comandas AS com ON php.comandas_id = com.id
    INNER JOIN mesas AS m ON m.id = com.mesas_id");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "";
?>
<script> 
    $(document).ready(function(){

        $(".edit").click(function(e){

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
            <div class="col-sm-12 col-md-2"></div>
            <div class="col-sm-12 col-md-8">
            <br>   
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-light text-center">
                            Lista de Produção
                        </h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Mesa</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Observação</th>
                                <th scope="col">Confirma</th>                   
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php 
                                foreach ($list as  $key =>$value){
                            ?>
                            <tr id="<?php echo $value["command_id"] ?>">
                                <td style="width: 10%"><?php echo $value["order_table_number"]; ?></td>
                                <td style="width: 10%"><?php echo $value["order_time"]; ?></td>
                                <td style="width: 10%"><?php echo $value["product_qtd"]; ?> x</td>
                                <td style="width: 10%"><?php echo $value["product_name"]; ?></td>
                                <!--  id="stats_<?php echo $value["id"] ?>" -->
                                <td style="width: 50%"> <?php echo $value["product_obs"]; ?></td>

                                <td style="width: 10%">  <a class="btn btn-sm" id="edit"> <i class="fas fa-check text-success new-icon"></i>
                                </a> 
                                </td>

        
                            </tr>
                            <?php
                                }
                            ?>                    
                        </tbody>
                    </table>
                </div>     
            
                <?php
                    //se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success):
                ?>
                    <script>
                        $.notify( "Alterado com sucesso", { position:"top center", className: 'success' } );
                    </script>
                <?php 
                    endif; 
                ?>
                <?php
                    // se houver erro no formulario mostra essa mensagem:
                    if ($fail):
                ?>
                <script>
                    $.notify( "Excluido com sucesso", { position:"top center" } );
                </script>
                <?php 
                    endif; 
                ?>
                    
            </div>
            <div class="col-sm-12 col-md-2">
                <?php 
                    foreach ($list as  $key =>$value){
                ?>
                    <div class="collapse" id="collapseExample">
                        <div class="card comanda-detalhes">
                            <div class="tape-a"></div>
                            <div class="tape-b"></div>
                            <a> <?php echo $value["product_obs"]; ?> </a>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
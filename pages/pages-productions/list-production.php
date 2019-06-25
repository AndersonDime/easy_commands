<?php
    require 'assets/services/session-validate.php';
    include_once("assets/services/products-service.php");

    $list = mysql_getdata("SELECT p.nome AS 'product_name',php.id AS 'idPedido', php.status AS 'pedido_status', php.quantidade AS 'product_qtd', php.observacoes AS 'product_obs', com.status AS 'order_status', com.hora AS 'order_time', com.mesas_id AS 'order_table_number', m.id AS 'order_table_id', com.id as command_id FROM produtos AS p
    INNER JOIN pedidos AS php ON p.id = php.produtos_id
    INNER JOIN comandas AS com ON php.comandas_id = com.id
    INNER JOIN mesas AS m ON m.id = com.mesas_id");

    $sector = mysql_getdata("SELECT * FROM setores where id != 4 order by nome");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "";
?>

<div class="stats bg-danger text-center text-white" id="listT" style="transition: 0.5s;">

</div>

<div class="production-page">
    <div class="container-fluid">
    <br>
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1"></div>
            <div class="col">
                <br>   
                <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="text-light text-center">
                            Lista de Produção
                        </h4> 
                    </div>
                    <div class="col">
                        <select class="form-control" id="filtroSetores"> 
                            <?php foreach($sector as  $key => $value){ ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["nome"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                </div>
                <div class="card roll">                    
                    <table class="table table-striped " >
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
                        <tbody class="text-center" id="tbody">
                   
                        </tbody>
                    </table>
                </div>     
            
                <?php
                    //se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success):
                ?>
                    <script>
                        $.notify( "Pedido Enviado com Sucesso", { position:"top center", className: 'success' } );
                    </script>
                <?php 
                    endif; 
                ?>
                <?php
                    // se houver erro no formulario mostra essa mensagem:
                    if ($fail):
                ?>
                <script>
                    $.notify( "Falha ao enviar pedido", { position:"top center" } );
                </script>
                <?php 
                    endif; 
                ?>
                    
            </div>
            <div class="col-xs-12 col-sm-2 col-md-4 col-lg-1"></div>
            </div>
        </div>
    </div>
</div>

<script> 
    $(document).ready(function(){

        $(".edit").click(function(e){

             $.ajax({
                url : "assets/php/edit-production.php",
                type : 'post',
                data : {
                    id : this.parentElement.parentElement.id,
                    stats :$("#stats_"+this.parentElement.parentElement.id).val()
                }
            })
            .done(function(msg){
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

    
function listOrders(){
    var sectorValue = $("#filtroSetores").val();
    $.ajax({
        type:'POST',
        url:'./assets/php/list-order.php',
        data: {sector_value: sectorValue},
        success:function(html){
            $('#tbody').html(html);
        }
    }); 
}

var refreshId = setInterval(function(){ listOrders(); }, 1000);

function listTypes(){
    $.ajax({
        type:'POST',
        url:'./assets/php/list-types.php',
        success:function(html){
            $('#listT').html(html);
        }
    }); 
}

var refreshId = setInterval(function(){ listTypes(); }, 1000);

</script>

<style>
    .stats{
        animation-duration: 1.1s;
        animation-name: statsAnimation;
        animation-timing-function: ease;
        height: fit-content;
    }

    @keyframes statsAnimation{
        0%   {height: 0px}
        25%  {height: 24px}
        100% {height: 24px}
    }
</style>
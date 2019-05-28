<?php
    require 'assets/services/session-validate.php';
    include_once("assets/services/products-service.php");

    $list = mysql_getdata("SELECT * FROM pedidos");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "";




?>
<style>
#retangulo1{
	width: 20px;
	/* quadrados são retangulos com width = height  */
	height: 20px;
	background-color: #FF0000;
    
}

#retangulo2{
	width: 20px;
	/* quadrados são retangulos com width = height  */
	height: 20px;
	background-color: #FFFF00;
}

#retangulo3{
	width: 20px;
	/* quadrados são retangulos com width = height  */
	height: 20px;
	background-color: #7CFC00;
}

</style>
<script> 
    $(document).ready(function(){

        $("#edit").click(function(e){

            debugger;

             $.ajax({
                url : "assets/php/edit-production.php",
                type : 'post',
                data : {
                    id : e.target.parentElement.parentElement.id,
                    stats :$("#stats_"+e.target.parentElement.parentElement.id).val()
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

</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-2"></div>
        <div class="col-sm-12 col-md-8">
        <br>        
            <table class="table table-dark">
                <thead>
                <a class="btn-black btn-block card-header text-center" > <h4> Lista de Produção </h4> </a>
                    <tr>
                        <th scope="col">Mesa</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Teste</th>
                        <th scope="col">Detalhes</th>                   
                    </tr>
                </thead>
                    <?php 
                        foreach ($list as  $key =>$value){
                    ?>
                <tbody class="text-center">
                    <tr id="<?php echo $value["id"] ?>">
                        <td><?php echo $value["mesa"]; ?></td>
                        <td><?php echo $value["data"]; ?></td>
                        <td><?php echo $value["hora"]; ?></td>
                        <td>
                                <select style="width: 100%;" class="form-control" id="stats_<?php echo $value["id"] ?>" name="stats">
                                <option value="0" <?php echo ($value["status"] == 0) ? "selected" : ""; ?>> Disponivel</option>
                                <option value="1" <?php echo ($value["status"] == 1) ? "selected" : ""; ?>> Em produção</option>
                                <option value="2" <?php echo ($value["status"] == 2) ? "selected" : ""; ?>> Finalizado</option>
                        </td>
                        <td>  <a class="btn btn-sm btn-info" id="edit"> <i class="fas fa-pencil-alt"></i>
                        </a> 
                        </td>
                        <?php if($value["status"] == 0){
                        ?>
                        <td>
                            <div id="retangulo1"></div>
                        </td>
                        <?php }?>
                        <?php if($value["status"] == 1){
                        ?>
                        <td>
                            <div id="retangulo2"></div>
                        </td>
                        <?php }?>
                        <?php if($value["status"] == 2){
                        ?>
                        <td>
                            <div id="retangulo3"></div>
                        </td>
                        <?php }?>
                        <td>
                            <a class="btn btn-sm btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Detalhes do pedido
                            </a>
                        </td>

                    </tr>
                    <?php
                        }
                    ?>
                    </select>
                </tbody>
            </table>
        
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
                    <div class="card card-body">
                        <a> <?php echo $value["detalhes"]; ?> </a>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
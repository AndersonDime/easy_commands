<?php
include_once("../services/table-service.php");

    $list = mysql_getdata("SELECT * FROM mesas order by numero");

    foreach ($list as  $key =>$value){  
        echo ' 
            <div class="col-xs-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mesa #
                        <form  style="display: inline-block;" id="formNumero" method="post" action="../assets/php/edit-table.php">
                            <input type="number" class="numeroMesa" id="numeroMesa'.$value['numero'].'" value="'.$value['numero'].'" onfocusout="saveNumber('.$value['numero'].', '.$value['id'].' )" disabled required>
                        </form>

                        <button onClick="deleteTable(.'$value['id'].')" class="card-icon">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <a onclick="editarMesa('.$value['numero'].')" href="#" class="card-icon"><i class="fas fa-pen"></i></a>
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
        '
    }


?>
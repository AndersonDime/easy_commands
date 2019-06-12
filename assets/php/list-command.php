<?php
function listagem($numeroMesa){
    require 'conect.php';    
    $mesa = mysql_getdata("SELECT * FROM mesas WHERE numero = '$numeroMesa'");
    $idMesa = $mesa[0]['id'];
    $id_comanda = "SELECT id FROM comandas WHERE mesas_id = '$idMesa'";
    $result_id_comanda = mysqli_query($con, $id_comanda) or die(mysqli_error());
    $id_found = mysqli_affected_rows($con);
    if($id_found !== 0){
        $data_comanda = mysqli_fetch_array($result_id_comanda);
        $id_comanda = $data_comanda[0];
        $orderInformation = mysql_getdata("SELECT * FROM comandas WHERE mesas_id = '$idMesa'"); 
        $orderInformationCard = mysql_getdata("SELECT ped.quantidade as quantidade, prod.nome as nome, ped.observacoes as observacoes from pedidos as ped
        inner join produtos as prod on ped.produtos_id = prod.id 
        where ped.comandas_id = '$id_comanda'");  
        foreach($orderInformationCard as $value){
            echo '<script>
            $("comanda").html(
                <li class="list-group-item">'.$value['quantidade']."x  ".$value['nome']."  ".$value['observacoes'].'</li>
            )
          </script>' ;
        }
    }else{
        echo '<script>
                console.log(document.getElementById("comanda"));
                // innerHtml = "Não existe comanda ativa para a mesa no momento!";
              </script>';
    }
}   

?>
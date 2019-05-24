
<?php
include_once("../services/products-service.php");

$numeroMesa = $_GET["numero_mesa"];

$idMesa = mysql_getdata("SELECT id FROM mesas WHERE numero = '$numeroMesa");
$result_id = mysqli_query($con,$validate) or die(mysqli_error($con));
$total = mysqli_affected_rows($con);
if($total == 1){
    //Pega os dados do usuario para passar pra sessao
    $data = mysqli_fetch_array($result_id);

if(count($idMesa) > 0){

}else{
    echo "<script type='text/javascript'>alert('Usuario ja cadastrado.);</script>";
    header('Location: ../../index.php?page=user-register&fail=1');

}

 print_r($idMesa);
?>


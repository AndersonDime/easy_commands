<pre>
<?php

function mysql_mostrar($script){

$con = mysqli_connect("localhost","root","root","easycomands") or die(mysqli_connect_error());


$valor = mysqli_query($con,$script) or die();

$orcamento = array();

while($linha = mysqli_fetch_array($valor, MYSQLI_ASSOC)){
    array_push($orcamento , $linha);
   
}


return $orcamento;

}


function mysql_insert($script){

    $con = mysqli_connect("localhost","root","root","easycomands") or die(mysqli_connect_error());
    echo $script;
    $dados = mysqli_query($con, $script) or die(mysqli_error());

    $afetada = mysqli_affected_rows($con);
    
    echo $afetada;
    
    mysqli_close($con);

    return $afetada;

}


function mysql_update($script){

    $con = mysqli_connect("localhost","root","root","easycomands") or die(mysqli_connect_error());

    $dados = mysqli_query($con, $script) or die(mysqli_error());

    $atualizou = mysqli_affected_rows($con);
    
    echo $atualizou;
    
    mysqli_close($con);

    return $atualizou;
}


function mysql_delete($script){

    $con = mysqli_connect("localhost","root","root","easycomands") or die(mysqli_connect_error());

    $dados = mysqli_query($con, $script) or die(mysqli_error());

    $deletou = mysqli_affected_rows($con);
    
    echo $deletou;
    
    mysqli_close($con);

    return $deletou;
}
?>
</pre>
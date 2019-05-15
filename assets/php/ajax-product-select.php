<?php
//Include the database configuration file
$con = mysqli_connect("localhost","root","root","easycomands") or die(mysqli_connect_error());

echo $_POST["categoria_produtos_id"];
if(!empty($_POST["categoria_produtos_id"])){

    //Fetch all state data
    $query = mysqli_query($con,"SELECT * FROM produtos WHERE categoria_produtos_id = ".$_POST['categoria_produtos_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Selecione o Produto</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
        }
    }else{
        echo '<option value="">Nenhum produto disponível</option>';
    }
}
?>
function mensage(){

    alert("Cadastrado com sucesso");

}
function search(){
    window.top.location="./assets/php/cashier-search.php";
}
function closeComand(){
    id_comanda = document.getElementById("fecha_comanda").value;
    $.ajax({
        method: "POST",
        url: "./assets/php/cashier-close.php",
        data: {idComanda : id_comanda}
        ,success:function(html){
            $('#product').html(html);
        }
    })
}
function mensage(){

    alert("Cadastrado com sucesso");

}
function search(){
    window.top.location="./assets/php/cashier-search.php";
}
function calculator(){
    var valor1 = parseFloat(document.getElementById("price"));
    var valor2 = 1;
    valor1 = valor1 + valor2;
    valor1.toString();
    console.log(valor1);
}
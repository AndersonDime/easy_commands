function open_table(id_comanda){
    botao = document.getElementById("fecha_comanda").nodeValue = id_comanda;
    $.ajax({
        type: 'POST',
        url: './assets/php/cashier-command.php',
        data: {
            idComanda: id_comanda
        },
        success: function (html) {
            $('#comanda').html(html);
        }
    });
}
function deleteOrder() {
    $.ajax({
        type: 'POST',
        url: './assets/php/delete-cashier.php',
        data: {
            id_pedidos: idPedidos,
            id_comanda: idComanda   
        },
        success: function (html) {
            $('#comanda').html(html);
        }
    });
}
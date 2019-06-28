function cancel() {
    window.top.location = '?page=list-table';
}

$(document).ready(function () {
    $('#productCtg').on('change', function () {
        var productCtgId = $(this).val();
        if (productCtgId) {
            $.ajax({
                type: 'POST',
                url: 'pages/pages-tables/controller/ajax-product-select.php',
                data: 'categorias_id=' + productCtgId,
                success: function (html) {
                    $('#product').html(html);
                }
            });
        } else {
            $('#produto').html('<option value="">Selecione uma categoria</option>');
        }
    });

    $('#product').on('change',function(){
        $('#submitOrder').prop("disabled", false);
    })
});
function deleteOrder(idPedidos) {
    $.ajax({
        type: 'POST',
        url: './assets/php/delete-command.php',
        data: {
            id_pedidos: idPedidos
        },
        success: function (html) {
            $('#comanda').html(html);
        }
    });
}
function addOrder(numeroMesa) {
    $.ajax({
        type: 'POST',
        url: 'pages/pages-tables/controller/add-command.php',
        data: {
            numero_mesa: numeroMesa,
            product_qtd: $('#productQtd').val(),
            product_id: $('#product').val(),
            observation: $('#observacoes').val()
        },
        success: function (html) {
            $('#comanda').html(html);
            $('#product').val("");
            $('#product').prop("disabled", "true");
            $('#productCtg').val("");
            $('#productQtd').val("");
            $('#observacoes').val("");
        }
    });
}


function listOrder() {
    numero = $("#numeroMesa").val();
    $.ajax({
        type: 'POST',
        url: './assets/php/list-command.php',
        data: {
            numero_mesa: numero,
        },
        success: function (html) {
            $('#comanda').html(html);
        }
    });
}

function enableSubmit(){
    $(submitOrder).prop("disabled", false);
}


listOrder();
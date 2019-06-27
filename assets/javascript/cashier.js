function closeComand(valorTotal){
    valorTotal = $('#valorTotal').val();
    alert(valorTotal);
    id_comanda = document.getElementById("fecha_comanda").value;
    $.ajax({
        method: "POST",
        url: "./assets/php/cashier-close.php",
        data: {idComanda : id_comanda, valorTotal : valorTotal}
        ,success:function(html){
            alert(html);
            refreshTable();
            $('#comanda').html(
                "<tr><td colspan='4'>Nenhuma comanda aberta no momento.</td></tr>"
            )
        }
    })
}
function refreshTable(){
    $.ajax({
        method: "POST",
        url: "./assets/php/cashier-list.php",
        success:function(html){
            $('#lista').html(html);
        }
    })
}
function open_table(id_comanda){
    botao = document.getElementById("fecha_comanda").value = id_comanda;
    botao2 = document.getElementById("fecha_comanda");
    $(botao2).prop("disabled", false).focus();
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
function function_confirm_cashier(msg, sim, nao) {
    $('#vaiFikaTudoPreto').show();
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text("Deseja realmente fechar a comanda?");
    confirmBox.find(".yes,.no").unbind().click(function() {
       confirmBox.hide();
    });
    function sim(){
    $('#vaiFikaTudoPreto').hide();        
        closeComand();
        close;
    }
    function nao(){
    $('#vaiFikaTudoPreto').hide();        
    }
    confirmBox.find(".yes").click(sim);
    confirmBox.find(".no").click(nao);
    confirmBox.show();
 }
refreshTable();
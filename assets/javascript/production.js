function refresh_production(id_pedido){
    debugger;
    $.ajax({
        url : "assets/php/edit-production.php",
        type : 'POST',
        data : {idPedido: id_pedido},
    })
    .done(function(msg){
        //$("#resultado").html(msg);
        if(msg > 0){
            $.notify( "Alterado o Status com sucesso", { position:"top center", className: 'success' } );
        }
        else{

            $.notify( "Pedido Finalizado !", { position:"top center", className: 'success' } );
        }
})
}
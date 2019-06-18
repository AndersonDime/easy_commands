function editarMesa(numero) {

    var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", false).focus();
}

/* function saveNumber(numero, id){
var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", true);

    $.ajax(
        type:'POST',
        url:'./assets/php/edit-table.php',
        data: {numero_mesa: $(campo).val(), id: id;}
        ,success:function(html){
            $('#product').html(html);
        }
    )
} */

function saveNumber(numero, id) {
    var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", true);

    $.ajax({
        method: "POST",
        url: "./assets/php/edit-table.php",
        data: { mesa_numero: $(campo).val(), mesa_id: id }
    })
        .done(function (msg) {
            alert("Data Saved: " + msg);
    });
}

function addTable(){
    $.ajax({
        method: "POST",
        url: "assets/php/add-table.php",
        success: function () {
            refreshTable();
        }
    })
}

function deleteTable(idMesa){
    $.ajax({
        method: "POST",
        url: "assets/php/delete-table.php",
        data: {id: idMesa},
        success: function () {
            refreshTable();
        }
    })
}

function refreshTable(){
    $.ajax({
        method: "POST",
        url: "assets/php/refresh-table.php",
        success: function (html) {
            $('#cardsRow').html(html);
        }
    })
}

function changePref(pref,numero){
    
    if(pref == 0){
        prefChange = 1
    }else{
        prefChange = 0;
    }
    $.ajax({
        type: 'POST',
        url: './assets/php/alter-table-pref.php',
        data: 
            {pref: prefChange, numero_mesa: numero},
        success: function () {
            refreshTable();
        }
    });  
    
}

refreshTable();



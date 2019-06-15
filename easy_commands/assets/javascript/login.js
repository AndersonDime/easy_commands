function functionConfirm(msg, sim, nao) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text("Deseja Realmente Sair?");
    confirmBox.find(".yes,.no").unbind().click(function() {
       confirmBox.hide();
    });
    function sim(){
        window.location.replace("assets/php/logout.php");
        close;
    }
    function nao(){

    }
    confirmBox.find(".yes").click(sim);
    confirmBox.find(".no").click(nao);
    confirmBox.show();
 }

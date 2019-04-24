function functionConfirm(msg, myYes, myNo) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function() {
       confirmBox.hide();
    });
    confirmBox.find(".yes").click(myYes);
    confirmBox.find(".no").click(myNo);
    confirmBox.show();
 }

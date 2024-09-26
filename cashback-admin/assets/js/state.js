var siteUrl = $("#siteUrl").val();

$(document).on('click','#authenticateState',function() {
	if(authenticateState()){		
		var frm = $("#state-frm").serialize();
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:frm,
			async: false,
			success:function(result){
				if (result.indexOf("1") > -1) {
					$("#msgstate").html("state alaready exist.");
					$("#msgstate").show();
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"state/");
				}else if (result.indexOf("3") > -1) {
					$("#msgstate").html("Please try again later.");
					$("#msgstate").show();
				}	
			}
		});
	}
});
function authenticateState(){
	var valid = true;
	var state = $("input[name='state']").val();

    $(".message").html("&nbsp;");
    $(".message").hide();
    $(".message").css("color", "red");
    if (state.length == 0) {
        valid = false;
        $("#msgstate").html("Enter state");
        $("#msgstate").show();
    }
    return valid;
}

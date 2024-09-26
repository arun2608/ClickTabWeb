var siteUrl = $("#siteUrl").val();

$(document).on('click','#authenticateCity',function() {
	if(authenticateCity()){		
		var frm = $("#city-frm").serialize();
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:frm,
			async: false,
			success:function(result){
				if (result.indexOf("1") > -1) {
					$("#msgcity").html("city already exist.");
					$("#msgcity").show();
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+'city/');
				}else if (result.indexOf("2") > -1) {
					$("#msgcity").html("Please try again later.");
					$("#msgcity").show();
				}	
			}
		});
	}
});
function authenticateCity(){
	var valid = true;
    var state = $("select[name='state']").val();
	var city = $("input[name='city']").val();

    $(".message").html("&nbsp;");
    $(".message").hide();
    $(".message").css("color", "red");
    if (state == 0) {
        valid = false;
        $("#msgstate").html("Select state");
        $("#msgstate").show();
    }if (city.length == 0) {
        valid = false;
        $("#msgcity").html("Enter city");
        $("#msgcity").show();
    }
    return valid;
}

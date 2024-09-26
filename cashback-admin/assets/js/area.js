var siteUrl = $("#siteUrl").val();

$(document).on('click','#authenticateArea',function() {
	if(authenticateArea()){		
		var frm = $("#area-frm").serialize();
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:frm,
			async: false,
			success:function(result){
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+'area/');
				}else if (result.indexOf("2") > -1) {
					$("#msgarea").html("Please try again later.");
					$("#msgarea").show();
				}	
			}
		});
	}
});
function authenticateArea(){
	var valid = true;
    var state = $("select[name='state']").val();
	var city = $("select[name='city']").val();
	var area = $("input[name='area']").val();

    $(".message").html("&nbsp;");
    $(".message").hide();
    $(".message").css("color", "red");
    if (state == 0) {
        valid = false;
        $("#msgstate").html("Select state");
        $("#msgstate").show();
    }if (city == 0) {
        valid = false;
        $("#msgcity").html("Select city");
        $("#msgcity").show();
    }if (area.length == 0) {
        valid = false;
        $("#msgarea").html("Enter area");
        $("#msgarea").show();
    }
    return valid;
}

function findCity(obj){
	var state = obj.value;
	$.ajax({
		url: siteUrl+'city-list.php',
		type:'GET',
		data:'state='+state,
		async: false,
		success:function(result){
			$("#city-data").html(result);
		}	
	});
}

function checkPrice(price) {
	var regex = /^[0-9]+$/;
	return regex.test(price);
}
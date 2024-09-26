$(document).bind('keypress', function(e) {
	if(e.keyCode==13){
		$('.isValidLogin').trigger('click');
	}
});
$(document).ready(function() {
	var siteUrl=$("#siteUrl").val();
	$(".isValidLogin").click(function(e) {
		if (isValidLogin()) {
			var username = $("input[name='username']").val();
			var password = $("input[name='password']").val();
			var actionType = "sitelogin";
			$.ajax({
				url: siteUrl+'controller/login.php',
				type:'GET',
				data:'actionType='+actionType+'&username='+username+'&password='+password,
				success:function(result){
					if (result.indexOf("exist") > -1) {
						window.location.replace(siteUrl);
					}else if (result.indexOf("fail") > -1) {
						$(".validmsg").html("Invalid Username & Password.");
						$(".validmsg").css("color","red");
					}
				}
			});
		}
	});

});

function isValidLogin() {
	var valid = true;
	var username = $("input[name='username']").val();
	var password = $("input[name='password']").val();
	$("input[name='username']").css("border-color","#777");
	$("input[name='password']").css("border-color","#777");
	if (username.length == 0) {
		valid = false;
		$("input[name='username']").css("border-color","red");
	}
	if (password.length == 0) {
		valid = false;
		$("input[name='password']").css("border-color","red");
	}
	return valid;
}

function isEmailValidate(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}
function checkcontactnumber(mobile) {
	var contactRegexStr = /^\d{10}$/;
	var isvalid = contactRegexStr.test(mobile);

	return isvalid;
}
function checkpin(pincode) {
	var contactRegexStr = /^\d{6}$/;
	var isvalid = contactRegexStr.test(pincode);

	return isvalid;
}
function isValid(password) {
	var reg = /^[^%\s]{6,}$/;
	var reg2 = /[a-zA-Z]/;
	var reg3 = /[0-9]/;
	return reg.test(password) && reg2.test(password) && reg3.test(password);
}
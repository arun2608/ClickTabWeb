var base_url = $("#siteUrl").val();
$(document).on('click', '#submit', function() {
	if (isValidateShare()) {
		var frm = $("#frm").serialize();
		$.ajax({
			url : base_url + 'controller/AdminController.php',
			type : 'POST',
			data : frm,
			success : function(result) {
				$("#share-msg").css("color", "red");
				if (result.indexOf("alreadyExist") > -1) {
					$("#share-msg").html("share-capital already exist");
				} else if (result.indexOf("done") > -1) {
					window.location.replace(base_url + "share-capital/share-capital");
				}
			}
		});
	}
});

function isValidateShare() {
	var valid = true;
	var comapny = $("select[name='company_type']").val();
	var state = $("select[name='state']").val();
	var capital = $("input[name='capital']").val();
	var charges = $("input[name='charges']").val();
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (comapny.length == 0) {
		valid = false;
		$("#msgcompany").html("* Please enter company type");
		$("#msgcompany").show();
	}
	if (state.length == 0) {
		valid = false;
		$("#msgstate").html("* Please enter state");
		$("#msgstate").show();
	}
	if (capital.length == 0) {
		valid = false;
		$("#msgcapital").html("* Please enter share capital");
		$("#msgcapital").show();
	}
	if (charges.length == 0) {
		valid = false;
		$("#msgcharges").html("* Please enter charges");
		$("#msgcharges").show();
	}
	return valid;
}

$(document).on('click', '#submitAbout', function() {
	if (isValidateAbout()) {
		var frm = $("#frm").serialize();
		$.ajax({
			url : base_url + 'controller/AdminController.php',
			type : 'POST',
			data : frm,
			success : function(result) {
				$("#share-msg").css("color", "red");
				if (result.indexOf("done") > -1) {
					window.location.replace(base_url + "about/about");
				}
			}
		});
	}
});

function isValidateAbout() {
	var valid = true;
	var heading = $("input[name='heading']").val();
	var subheading = $("input[name='subheading']").val();
	var history = $("textarea[name='history']").val();
	var mission = $("textarea[name='mission']").val();
	var vision = $("textarea[name='vision']").val();
	var description = $("textarea[name='description']").val();
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (heading.length == 0) {
		valid = false;
		$("#msgheading").html("* Please enter heading");
		$("#msgheading").show();
	}
	if (subheading.length == 0) {
		valid = false;
		$("#msgsubheading").html("* Please enter subheading");
		$("#msgsubheading").show();
	}
	if (history.length == 0) {
		valid = false;
		$("#msghistory").html("* Please enter share capital");
		$("#msghistory").show();
	}
	
	if (mission.length == 0) {
		valid = false;
		$("#msgmission").html("* Please enter mission");
		$("#msgmission").show();
	}
	
	if (vision.length == 0) {
		valid = false;
		$("#msgvision").html("* Please enter vision");
		$("#msgvision").show();
	}
	
	if (description.length == 0) {
		valid = false;
		$("#msgdescription").html("* Please enter description");
		$("#msgdescription").show();
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
	var isvalid = contactRegexStr.test(pin);
	return isvalid;
}
function isValid(password) {
	var reg = /^[^%\s]{6,}$/;
	var reg2 = /[a-zA-Z]/;
	var reg3 = /[0-9]/;
	return reg.test(password) && reg2.test(password) && reg3.test(password);
}
function checkQty(qty) {
	var regex = /^[0-9]+$/;
	return regex.test(qty);
}
function checkPrice(price) {
	var regex = /^[0-9]+$/;
	return regex.test(price);
}
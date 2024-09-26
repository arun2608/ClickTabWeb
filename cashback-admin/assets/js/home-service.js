var siteUrl=$("#siteUrl").val();

$(document).on('click','#authenticatePincode',function() {		
	if(authenticatePincode()){
		$("#pageloaddiv").fadeIn();
		var frm = $("#frm").serialize();		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:frm,
			async: false,
			success:function(result){			
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					$("#validate-msg").html("Already exist.");
					$("#validate-msg").css("color","red");
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"site/pincode-list");
				}else if (result.indexOf("3") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticatePincode() {
	var valid = true;
	var pincode = $("input[name='pincode']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (pincode.length == 0 || checkPincode(pincode) == false) {
		valid = false;
		$("#msgpincode").html("Enter 6 digit pincode");
		$("#msgpincode").show();
	}
	return valid;
}


$(document).on('click','#authenticateScheduling',function() {		
	if(authenticateScheduling()){
		$("#pageloaddiv").fadeIn();
		var frm = $("#frm").serialize();		
		console.log(siteUrl+'controller/AdminController.php');
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:frm,
			success:function(result){		
			    console.log(result);
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/scheduling-list");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			} 
		});
	}
});

function authenticateScheduling() {
	var valid = true;
	var delivery_date = $("input[name='delivery_date']").val();
	var delivery_time = $("input[name='delivery_time']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "12px");
	if (delivery_date.length == 0) {
		valid = false;
		$("#msgdelivery_date").html("Select delivery date");
		$("#msgdelivery_date").show();
	}if (delivery_time.length == 0) {
		valid = false;
		$("#msgdelivery_time").html("Enter delivery time");
		$("#msgdelivery_time").show();
	}
	return valid;
}


$(document).on('click','#authenticateHomeDelayPopup',function() {		
	$("#pageloaddiv").fadeIn();
	var id = $("input[name='id']").val();
	var action_type = $("input[name='action_type']").val();
	var file_1 = $('#file_1').prop("files")[0];
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("input[name='heading_3']").val();
	var heading_4 = $("textarea[name='heading_4']").val();
	var heading_5 = $("textarea[name='heading_5']").val();
	var link = $("input[name='link']").val();
					  
	var formData = new FormData();
	formData.append('action_type', action_type);
	formData.append('id', id);
	formData.append('file_1', file_1);
	formData.append('heading_1', heading_1);
	formData.append('heading_2', heading_2);
	formData.append('heading_3', heading_3);
	formData.append('heading_4', heading_4);
	formData.append('heading_5', heading_4);
	formData.append('link', link);
			
	$.ajax({
		url: siteUrl+'controller/AdminController.php',
		type:'POST',
		data:formData,
		contentType: false,
		processData: false,
		async: false,
		success:function(result){
			$("#pageloaddiv").fadeOut();
			if (result.indexOf("1") > -1) {
				window.location.replace(siteUrl+"site/home-delay-popup");
			}else if (result.indexOf("2") > -1) {
				$("#validate-msg").html("Please try again later.");
				$("#validate-msg").css("color","red");
			}
		}
	});	
});

$(document).on('click','#authenticateService',function() {		
	if(authenticateService()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("input[name='heading_3']").val();
		var link = $("input[name='link']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('file_1', file_1);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('link', link);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/home-popular-service");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateService() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("input[name='heading_3']").val();
	var link = $("input[name='link']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter service name.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter heading.");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter heading (On mouse hover.)");
		$("#msgheading_3").show();
	}if (link.length == 0) {
		valid = false;
		$("#msglink").html("Enter link");
		$("#msglink").show();
	}
	return valid;
}


/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#authenticateHowItWork',function() {		
	if(authenticateHowItWork()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("textarea[name='heading_2']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('file_1', file_1);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/how-it-work");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateHowItWork() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("textarea[name='heading_2']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter content.");
		$("#msgheading_2").show();
	}
	return valid;
}
/*----------------------------------------------------------------------------------------*/

$(document).on('click','#authenticateHomeService',function() {		
	if(authenticateHomeService()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("select[name='heading_3']").val();
		var heading_4 = $("input[name='heading_4']").val();
		var heading_5 = $("select[name='heading_5']").val();
		var heading_6 = $("input[name='heading_6']").val();
		var heading_7 = $("select[name='heading_7']").val();		
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('file_1', file_1);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		formData.append('heading_5', heading_5);
		formData.append('heading_6', heading_6);
		formData.append('heading_7', heading_7);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/home-service");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateHomeService() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("select[name='heading_3']").val();
	
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter heading.");
		$("#msgheading_2").show();
	}if (heading_3 == 0) {
		valid = false;
		$("#msgheading_3").html("Enter Link");
		$("#msgheading_3").show();
	}
	return valid;
}

/*-----------------------------------------------------------------*/

$(document).on('click','#authenticateWhyChooseUs',function() {		
	if(authenticateWhyChooseUs()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("textarea[name='heading_2']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('file_1', file_1);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/why-choose-us");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateWhyChooseUs() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("textarea[name='heading_2']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter content.");
		$("#msgheading_2").show();
	}
	return valid;
}


/*----------------------------------------------------------------------------------------*/

$(document).on('click','#authenticateBlog',function() {		
	if(authenticateBlog()){
		$("#pageloaddiv").fadeIn();
		
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var service_type = $("select[name='service_type']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("textarea[name='heading_3']").val();
		var heading_4 = CKEDITOR.instances['editor'].getData();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('file_1', file_1);
		formData.append('service_type', service_type);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					$("#validate-msg").html("Already exist.");
					$("#validate-msg").css("color","red");
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"site/blog-list");
				}else if (result.indexOf("3") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateBlog() {
	var valid = true;
	var file_1 = $("#file_1").val();
	var service_type = $("select[name='service_type']").val();
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("textarea[name='heading_3']").val();
	var heading_4 = CKEDITOR.instances['editor'].getData();
	var title = $("textarea[name='title']").val();
	var meta_keyword = $("textarea[name='meta_keyword']").val();
	var meta_description = $("textarea[name='meta_description']").val();
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if(service_type!=3 && service_type!=4){
	if (file_1.length == 0) {
		valid = false;
		$("#msgfile_1").html("Choose file");
		$("#msgfile_1").show();
	}}if (service_type == 0) {
		valid = false;
		$("#msgservice_type").html("Select type");
		$("#msgservice_type").show();
	}if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter name.");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter short description.");
		$("#msgheading_3").show();
	}if (heading_4.length == 0) {
		valid = false;
		$("#msgheading_4").html("Enter description.");
		$("#msgheading_4").show();
	}if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Enter meta keyword.");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Enter meta description.");
		$("#msgmeta_description").show();
	}
	return valid;
}


$(document).on('click','#authenticateUpdateBlog',function() {		
	if(authenticateUpdateBlog()){
		$("#pageloaddiv").fadeIn();
		
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var service_type = $("select[name='service_type']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("textarea[name='heading_3']").val();
		var heading_4 = CKEDITOR.instances['editor'].getData();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);		
		formData.append('file_1', file_1);
		formData.append('service_type', service_type);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){				
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					$("#validate-msg").html("Already exist.");
					$("#validate-msg").css("color","red");
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"site/blog-list");
				}else if (result.indexOf("3") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateUpdateBlog() {
	var valid = true;
	var service_type = $("select[name='service_type']").val();
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("textarea[name='heading_3']").val();
	var heading_4 = CKEDITOR.instances['editor'].getData();
	var title = $("textarea[name='title']").val();
	var meta_keyword = $("textarea[name='meta_keyword']").val();
	var meta_description = $("textarea[name='meta_description']").val();
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (service_type == 0) {
		valid = false;
		$("#msgservice_type").html("Select type");
		$("#msgservice_type").show();
	}if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter name.");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter short description.");
		$("#msgheading_3").show();
	}if (heading_4.length == 0) {
		valid = false;
		$("#msgheading_4").html("Enter description.");
		$("#msgheading_4").show();
	}if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Enter meta keyword.");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Enter meta description.");
		$("#msgmeta_description").show();
	}
	return valid;
}


/*----------------------------------------------------------------------------------------*/

$(document).on('click','#authenticateUpdateTestimonial',function() {		
	if(authenticateUpdateTestimonial()){
		$("#pageloaddiv").fadeIn();
		
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("textarea[name='heading_3']").val();
		var heading_4 = $("input[name='heading_4']").val();		
					  
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);		
		formData.append('file_1', file_1);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){				
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/testimonial");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateUpdateTestimonial() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("textarea[name='heading_3']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter name.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter designation.");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter content.");
		$("#msgheading_3").show();
	}
	return valid;
}

/*----------------------------------------------------------------------------------------------*/

$(document).on('click','#authenticatePage',function() {		
	if(authenticatePage()){
		$("#pageloaddiv").fadeIn();
		
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = CKEDITOR.instances['editor'].getData();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);		
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){				
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					$("#validate-msg").html("already exist");
					$("#validate-msg").css("color","red");
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"site/pages");
				}else if (result.indexOf("3") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticatePage() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = CKEDITOR.instances['editor'].getData();
	var title = $("textarea[name='title']").val();
	var meta_keyword = $("textarea[name='meta_keyword']").val();
	var meta_description = $("textarea[name='meta_description']").val();
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter name.");
		$("#msgheading_2").show();
	}if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Enter meta keyword.");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Enter meta description.");
		$("#msgmeta_description").show();
	}
	return valid;
}


/*-------------------------------------------------------------------------------------------------*/

$(document).on('click','#UpdateFooterService',function() {		
	if(authenticateFooterService()){
		$("#pageloaddiv").fadeIn();
		
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("input[name='heading_3']").val();
		var heading_4 = $("input[name='heading_4']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);		
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){				
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/footer-service");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateFooterService() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("input[name='heading_3']").val();
	var heading_4 = $("input[name='heading_4']").val();
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter service.");
		$("#msgheading_1").show();
	}
	
	return valid;
}



$(document).on('click','#UpdateFooterLink',function() {		
	if(authenticateFooterLink()){
		$("#pageloaddiv").fadeIn();
		
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var service_type = $("input[name='service_type']").val();
		if(service_type==1 || service_type==2 || service_type==3){
			var link = $("select[name='link']").val();
		}else if(service_type==4){
			var link = $("input[name='link']").val();		
		}
					  
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);		
		formData.append('heading_1', heading_1);
		formData.append('link', link);

		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){				
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/footer-service-list");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateFooterLink() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var service_type = $("input[name='service_type']").val();
	if(service_type==1 || service_type==2 || service_type==3){
		var link = $("select[name='link']").val();
	}else if(service_type==4){
		var link = $("input[name='link']").val();		
	}
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter service.");
		$("#msgheading_1").show();
	}
	if(service_type==1 || service_type==2 || service_type==3){
		if (link == 0) {
			valid = false;
			$("#msglink").html("Select link.");
			$("#msglink").show();
		}
	}else if(service_type==4){
		if (link.length == 0) {
			valid = false;
			$("#msglink").html("Enter link.");
			$("#msglink").show();
		}
	}		
	return valid;
}


/*----------------------------------------------------------------------------------*/

$(document).on('click','#UpdateBecomeAssociate',function() {		
	if(UpdateBecomeAssociate()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var file_2 = $('#file_2').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();	
		var heading_3 = CKEDITOR.instances['editor'].getData();
		var heading_4 = $("input[name='heading_4']").val();
		var heading_5 = $("textarea[name='heading_5']").val();
		var heading_6 = $("textarea[name='heading_6']").val();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
					  
		var formData = new FormData();
		formData.append('id', id);		
		formData.append('action_type', action_type);		
		formData.append('file_1', file_1);
		formData.append('file_2', file_2);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		formData.append('heading_5', heading_5);
		formData.append('heading_6', heading_6);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/become-an-associate");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateBecomeAssociate() {
	var valid = true;
	
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();	
	var heading_3 = CKEDITOR.instances['editor'].getData();
	var heading_4 = $("input[name='heading_4']").val();
	var heading_5 = $("textarea[name='heading_5']").val();
	var heading_6 = $("textarea[name='heading_6']").val();
	var title = $("textarea[name='title']").val();
	var meta_keyword = $("textarea[name='meta_keyword']").val();
	var meta_description = $("textarea[name='meta_description']").val();
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter heading.");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter description.");
		$("#msgheading_3").show();
	}if (heading_4.length == 0) {
		valid = false;
		$("#msgheading_4").html("Enter heading.");
		$("#msgheading_4").show();
	}if (heading_5.length == 0) {
		valid = false;
		$("#msgheading_5").html("Enter heading.");
		$("#msgheading_5").show();
	}if (heading_6.length == 0) {
		valid = false;
		$("#msgheading_6").html("Enter heading.");
		$("#msgheading_6").show();
	}if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Enter meta keyword.");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Enter meta description.");
		$("#msgmeta_description").show();
	}
	return valid;
}

/*----------------------------------------------------------------------------------*/

$(document).on('click','#UpdateTrending',function() {		
	if(UpdateTrending()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();	
		var heading_3 = $("input[name='heading_3']").val();	
		var heading_4 = $("input[name='heading_4']").val();	
		var heading_5 = $("input[name='heading_5']").val();	
		var heading_6 = $("input[name='heading_6']").val();	
		var heading_7 = $("input[name='heading_7']").val();	
		var heading_8 = $("input[name='heading_8']").val();
					  
		var formData = new FormData();
		formData.append('id', id);		
		formData.append('action_type', action_type);		
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		formData.append('heading_5', heading_5);
		formData.append('heading_6', heading_6);
		formData.append('heading_7', heading_7);
		formData.append('heading_8', heading_8);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/trending");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateTrending() {
	var valid = true;
	
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();	
	var heading_3 = $("input[name='heading_3']").val();	
	var heading_4 = $("input[name='heading_4']").val();	
	var heading_5 = $("input[name='heading_5']").val();	
	var heading_6 = $("input[name='heading_6']").val();	
	var heading_7 = $("input[name='heading_7']").val();	
	var heading_8 = $("input[name='heading_8']").val();	
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter link.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter heading.");
		$("#msgheading_2").show();
	}
	return valid;
}


/*----------------------------------------------------------------------------------*/

$(document).on('click','#UpdateReferEarn',function() {		
	if(UpdateReferEarn()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var file_2 = $('#file_2').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();	
		var heading_3 = CKEDITOR.instances['editor'].getData();
		var heading_4 = $("input[name='heading_4']").val();
		var heading_5 = $("textarea[name='heading_5']").val();
		var heading_6 = $("textarea[name='heading_6']").val();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
					  
		var formData = new FormData();
		formData.append('id', id);		
		formData.append('action_type', action_type);		
		formData.append('file_1', file_1);
		formData.append('file_2', file_2);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		formData.append('heading_5', heading_5);
		formData.append('heading_6', heading_6);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/refer-an-earn");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateReferEarn() {
	var valid = true;
	
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();	
	var heading_3 = CKEDITOR.instances['editor'].getData();
	var heading_4 = $("input[name='heading_4']").val();
	var heading_5 = $("textarea[name='heading_5']").val();
	var heading_6 = $("textarea[name='heading_6']").val();
	var title = $("textarea[name='title']").val();
	var meta_keyword = $("textarea[name='meta_keyword']").val();
	var meta_description = $("textarea[name='meta_description']").val();
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter heading.");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter description.");
		$("#msgheading_3").show();
	}if (heading_4.length == 0) {
		valid = false;
		$("#msgheading_4").html("Enter heading.");
		$("#msgheading_4").show();
	}if (heading_5.length == 0) {
		valid = false;
		$("#msgheading_5").html("Enter heading.");
		$("#msgheading_5").show();
	}if (heading_6.length == 0) {
		valid = false;
		$("#msgheading_6").html("Enter heading.");
		$("#msgheading_6").show();
	}if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Enter meta keyword.");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Enter meta description.");
		$("#msgmeta_description").show();
	}
	return valid;
}


/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#authenticateHighlight',function() {		
	if(authenticateHighlight()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/highlight");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateHighlight() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter content.");
		$("#msgheading_2").show();
	}
	return valid;
}


/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#UpdateLatestNews',function() {		
	if(UpdateLatestNews()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var heading_1 = $("textarea[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/latest-news");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateLatestNews() {
	var valid = true;
	var heading_1 = $("textarea[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter link.");
		$("#msgheading_2").show();
	}
	return valid;
}

/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#UpdateWorkVideo',function() {		
	if(UpdateWorkVideo()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var heading_1 = $("input[name='heading_1']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading_1', heading_1);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/work-video");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateWorkVideo() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter video link.");
		$("#msgheading_1").show();
	}
	return valid;
}

/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#UpdateTrustedPartner',function() {		
	if(UpdateTrustedPartner()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('file_1', file_1);
		formData.append('heading_1', heading_1);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/trusted-partner");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateTrustedPartner() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading.");
		$("#msgheading_1").show();
	}
	return valid;
}


function findSubcat(obj){
	var category = obj.value;
	$.ajax({
		url: siteUrl+'findSubcatByCat.php',
		type:'GET',
		data:'category='+category,
		success:function(result){
			$("#subcat-data").html(result);
		}
	});
}

function findService(obj){
    var category = $("select[name='heading_1']").val();
	var subcat = obj.value;
	$.ajax({
		url: siteUrl+'findServiceBySubcat.php',
		type:'GET',
		data:'category='+category+'&subcat='+subcat,
		success:function(result){
			$("#service-data").html(result);
		}
	});
}
function findAssociateService(obj){
	var category = $("select[name='heading_1']").val();
	var subcat = $("select[name='heading_2']").val();
	var service = obj.value;
	$.ajax({
		url: siteUrl+'findAssociateServicetByService.php',
		type:'GET',
		data:'category='+category+'&subcat='+subcat+'&service='+service,
		success:function(result){
			$("#associate-service").html(result);
		}
	});
}


/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#UpdateCartService',function() {		
	if(UpdateCartService()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var heading_1 = $("select[name='heading_1']").val();
		var heading_2 = $("select[name='heading_2']").val();
		var heading_3 = $("select[name='heading_3']").val();
		var heading_4 = $("select[name='heading_4']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/value-added-service");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateCartService() {
	var valid = true;
	var heading_1 = $("select[name='heading_1']").val();
	var heading_2 = $("select[name='heading_2']").val();
	var heading_3 = $("select[name='heading_3']").val();
	var heading_4 = $("select[name='heading_4']").val();	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Select service");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Select service");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Select service");
		$("#msgheading_3").show();
	}if (heading_4.length == 0) {
		valid = false;
		$("#msgheading_4").html("Select service");
		$("#msgheading_4").show();
	}
	return valid;
}


/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#UpdateSiteMainCategory',function() {		
	if(UpdateSiteMainCategory()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var heading_1 = $("input[name='heading_1']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading_1', heading_1);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/site-menu");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateSiteMainCategory() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Select service");
		$("#msgheading_1").show();
	}
	return valid;
}


/*-----------------------------------------------------------------------------------------------------*/

$(document).on('click','#UpdateHomeAbout',function() {		
	if(UpdateHomeAbout()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("textarea[name='heading_3']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/home-about");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateHomeAbout() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("textarea[name='heading_3']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading 1.");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter heading 2.");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter content.");
		$("#msgheading_3").show();
	}
	return valid;
}

$(document).on('click','#authenticateTitleKeyword',function() {		
	if(authenticateTitleKeyword()){
		$("#pageloaddiv").fadeIn();
		
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
					  
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);		
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){				
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/page-title");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateTitleKeyword() {
	var valid = true;
	var title = $("textarea[name='title']").val();
	var meta_keyword = $("textarea[name='meta_keyword']").val();
	var meta_description = $("textarea[name='meta_description']").val();
	

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Enter meta keyword.");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Enter meta description.");
		$("#msgmeta_description").show();
	}
	return valid;
}

function findAssociateByService_1(obj){
	var service = obj.value;
	$.ajax({
		url: siteUrl+'findAssociateByService.php',
		type:'GET',
		data:'service='+service,
		success:function(result){
			$("#associate-service-1").html(result);
		}
	});
}

function findAssociateByService_2(obj){
	var service = obj.value;
	$.ajax({
		url: siteUrl+'findAssociateByService.php',
		type:'GET',
		data:'service='+service,
		success:function(result){
			$("#associate-service-2").html(result);
		}
	});
}

function findAssociateByService_3(obj){
	var service = obj.value;
	$.ajax({
		url: siteUrl+'findAssociateByService.php',
		type:'GET',
		data:'service='+service,
		success:function(result){
			$("#associate-service-3").html(result);
		}
	});
}

$(document).on('click','#authenticateFrequentlyBoughtTogether',function() {		
	if(authenticateFrequentlyBoughtTogether()){
		$("#pageloaddiv").fadeIn();		
		var frm = $("#frm").serialize();			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:frm,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					$("#validate-msg").html("Already exist.");
					$("#validate-msg").css("color","red");
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"site/frequently-bought-together-list");
				}else if (result.indexOf("3") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function authenticateFrequentlyBoughtTogether() {
	var valid = true;
	var heading_1 = $("select[name='heading_1']").val();
	var heading_2 = $("select[name='heading_2']").val();
	var heading_3 = $("select[name='heading_3']").val();
	
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1 == 0) {
		valid = false;
		$("#msgheading_1").html("Select service.");
		$("#msgheading_1").show();
	}if (heading_2 == 0) {
		valid = false;
		$("#msgheading_2").html("Select service.");
		$("#msgheading_2").show();
	}if (heading_3 == 0) {
		valid = false;
		$("#msgheading_3").html("Select service.");
		$("#msgheading_3").show();
	}
	return valid;
}


$(document).on('click','#UpdateWhyChooseUs',function() {		
	if(UpdateWhyChooseUs()){
		$("#pageloaddiv").fadeIn();
		var id = $("input[name='id']").val();
		var action_type = $("input[name='action_type']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var heading_1 = $("input[name='heading_1']").val();
		var heading_2 = $("input[name='heading_2']").val();
		var heading_3 = $("textarea[name='heading_3']").val();
		var heading_4 = $("input[name='heading_4']").val();
		var heading_5 = $("input[name='heading_5']").val();
		var heading_6 = $("input[name='heading_6']").val();
		var heading_7 = $("input[name='heading_7']").val();
		var heading_8 = $("input[name='heading_8']").val();
		var heading_11 = $("input[name='heading_11']").val();		
		
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('file_1', file_1);
		formData.append('heading_1', heading_1);
		formData.append('heading_2', heading_2);
		formData.append('heading_3', heading_3);
		formData.append('heading_4', heading_4);
		formData.append('heading_5', heading_5);
		formData.append('heading_6', heading_6);
		formData.append('heading_7', heading_7);
		formData.append('heading_8', heading_8);
		formData.append('heading_11', heading_11);
			
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#pageloaddiv").fadeOut();
				if (result.indexOf("1") > -1) {
					window.location.replace(siteUrl+"site/why-choose-us");
				}else if (result.indexOf("2") > -1) {
					$("#validate-msg").html("Please try again later.");
					$("#validate-msg").css("color","red");
				}
			}
		});
	}
});

function UpdateWhyChooseUs() {
	var valid = true;
	var heading_1 = $("input[name='heading_1']").val();
	var heading_2 = $("input[name='heading_2']").val();
	var heading_3 = $("textarea[name='heading_3']").val();
	var heading_4 = $("input[name='heading_4']").val();
	var heading_5 = $("input[name='heading_5']").val();
	var heading_6 = $("input[name='heading_6']").val();
	var heading_7 = $("input[name='heading_7']").val();
	var heading_8 = $("input[name='heading_8']").val();
	var heading_11 = $("input[name='heading_11']").val();
	
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	$(".message").css("font-size", "10px");
	if (heading_1.length == 0) {
		valid = false;
		$("#msgheading_1").html("Enter heading");
		$("#msgheading_1").show();
	}if (heading_2.length == 0) {
		valid = false;
		$("#msgheading_2").html("Enter sub heading");
		$("#msgheading_2").show();
	}if (heading_3.length == 0) {
		valid = false;
		$("#msgheading_3").html("Enter content.");
		$("#msgheading_3").show();
	}if (heading_4.length == 0) {
		valid = false;
		$("#msgheading_4").html("Enter icon");
		$("#msgheading_4").show();
	}if (heading_5.length == 0) {
		valid = false;
		$("#msgheading_5").html("Enter heading");
		$("#msgheading_5").show();
	}if (heading_6.length == 0) {
		valid = false;
		$("#msgheading_6").html("Enter icon");
		$("#msgheading_6").show();
	}if (heading_7.length == 0) {
		valid = false;
		$("#msgheading_7").html("Enter heading");
		$("#msgheading_7").show();
	}if (heading_8.length == 0) {
		valid = false;
		$("#msgheading_8").html("Enter icon");
		$("#msgheading_8").show();
	}if (heading_11.length == 0) {
		valid = false;
		$("#msgheading_11").html("Enter heading.");
		$("#msgheading_11").show();
	}
	return valid;
}

function checkPincode(pincode) {
	var contactRegexStr = /^\d{6}$/;
	var isvalid = contactRegexStr.test(pincode);
	return isvalid;
}
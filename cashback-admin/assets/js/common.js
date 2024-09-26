var siteUrl = $("#siteUrl").val();

$(document).on('click', '#authenticateBrand', function() {
	if (authenticateBrand()) {
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();		
		var brand = $("input[name='brand']").val();	
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
		var file_1 =  $('#file_1').prop("files")[0];
		var file_2 =  $('#file_2').prop("files")[0];

		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);
		formData.append('brand', brand);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		formData.append('file_1', file_1);
		formData.append('file_2', file_2);
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "product/brand-list");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});

function authenticateBrand() {
	var valid = true;
	var brand = $("input[name='brand']").val();

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (brand.length == 0) {
		valid = false;
		$("#msgbrand").html("Enter brand");
		$("#msgbrand").show();
	}
	return valid;
}



$(document).on('click', '#authenticateCategory', function() {
	if (authenticateCategory()) {
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();		
		var type = $("input[name='type']").val();		
		var category = $("input[name='category']").val();		
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
		var file_1 =  $('#file_1').prop("files")[0];
		var file_2 =  $('#file_2').prop("files")[0];
		
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);
		formData.append('type', type);
		formData.append('category', category);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		formData.append('file_1', file_1);
		formData.append('file_2', file_2);

		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "product/category-list");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});

function authenticateCategory() {
	var valid = true;
	var category = $("input[name='category']").val();

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (category.length == 0) {
		valid = false;
		$("#msgcategory").html("Enter category");
		$("#msgcategory").show();
	}
	return valid;
}


$(document).on('click', '#authenticateSubcat', function() {
	if (authenticateSubcat()) {
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();		
		var category = $("select[name='category']").val();				
		var subcat = $("input[name='subcat']").val();		
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
		var file_1 =  $('#file_1').prop("files")[0];
		var file_2 =  $('#file_2').prop("files")[0];
		
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);
		formData.append('category', category);
		formData.append('subcat', subcat);		
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		formData.append('file_1', file_1);
		formData.append('file_2', file_2);

		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "product/subcat-list");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});

function authenticateSubcat() {
	var valid = true;
	var category = $("select[name='category']").val();
	var subcat = $("input[name='subcat']").val();

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (category == 0) {
		valid = false;
		$("#msgcategory").html("Select category");
		$("#msgcategory").show();
	}if (subcat.length == 0) {
		valid = false;
		$("#msgsubcat").html("Enter subcat");
		$("#msgsubcat").show();
	}
	return valid;
}


$(document).on('click', '.authenticateProduct', function() {
	if (authenticateProduct()) {
		
		var action_type = $("input[name='action_type']").val();
		var name = $("input[name='name']").val();
		var type = $("select[name='type']").val();
		var bond = $("input[name='bond']").val();
		var rank = $("input[name='rank']").val();
		var fee = $("input[name='fee']").val();
		var location = $("select[name='location']").val();
		var city = $("select[name='city']").val();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
		var short_description = $("textarea[name='short_description']").val();
		var description = CKEDITOR.instances['editor'].getData();
		
		  
				  
		
		var file_1 =  $('#file_1').prop("files")[0];

	
		
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('name', name);
		formData.append('type', type);
		formData.append('bond', bond);
		formData.append('rank', rank);
		formData.append('fee', fee);
		formData.append('location', location);
		formData.append('city', city);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		formData.append('short_description', short_description);
		formData.append('description', description);
		
		formData.append('file_1', file_1);
		for (var i = 0; i < $('#file_2').get(0).files.length; ++i) {
			formData.append('file_2[]', $('#file_2').get(0).files[i]);
		}
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("College already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"college/");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});


$(document).on('click', '.authenticateUpdateProduct', function() {
	if (authenticateProduct()) {
		
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var name = $("input[name='name']").val();
		var type = $("select[name='type']").val();
		var bond = $("input[name='bond']").val();
		var rank = $("input[name='rank']").val();
		var fee = $("input[name='fee']").val();
		var location = $("select[name='location']").val();
		var city = $("select[name='city']").val();
		var title = $("textarea[name='title']").val();
		var meta_keyword = $("textarea[name='meta_keyword']").val();
		var meta_description = $("textarea[name='meta_description']").val();
		var short_description = $("textarea[name='short_description']").val();
		var description = CKEDITOR.instances['editor'].getData();
		var file_1 =  $('#file_1').prop("files")[0];
		
		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('name', name);
		formData.append('type', type);
		formData.append('bond', bond);
		formData.append('rank', rank);
		formData.append('fee', fee);
		formData.append('location', location);
		formData.append('city', city);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		
		formData.append('short_description', short_description);
		formData.append('description', description);
		
		formData.append('file_1', file_1);
		for (var i = 0; i < $('#file_2').get(0).files.length; ++i) {
			formData.append('file_2[]', $('#file_2').get(0).files[i]);
		}
		
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
				
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("College already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+"college/");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});


function authenticateProduct() {
	var valid = true;
	var name = $("input[name='name']").val();
	var type = $("select[name='type']").val();
	var bond = $("input[name='bond']").val();
	var rank = $("input[name='rank']").val();
	var title = $("textarea[name='title']").val();
	var meta_keyword = $("textarea[name='meta_keyword']").val();
	var meta_description = $("textarea[name='meta_description']").val();
		
	var short_description = $("textarea[name='short_description']").val();
	var description = CKEDITOR.instances['editor'].getData();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (name == 0) {
		valid = false;
		$("#msgname").html("Please enter name");
		$("#msgname").show();
	}
	if (type == 0) {
		valid = false;
		$("#msgtype").html("Please select type");
		$("#msgtype").show();
	}
	if (bond == 0) {
		valid = false;
		$("#msgbond").html("Please enter bond");
		$("#msgbond").show();
	}
	if (rank == 0) {
		valid = false;
		$("#msgrank").html("Please enter rank");
		$("#msgrank").show();
	}
	if (meta_keyword == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Please enter meta keyword");
		$("#msgmeta_keyword").show();
	}if (meta_description == 0) {
		valid = false;
		$("#msgmeta_description").html("Please enter meta description");
		$("#msgmeta_description").show();
	}if (description.length == 0) {
		valid = false;
		$("#msgdescription").html("Please enter description");
		$("#msgdescription").show();
	}if (short_description.length == 0) {
		valid = false;
		$("#msgshort_description").html("Enter short description");
		$("#msgshort_description").show();
	}
	
	return valid;
}

$(document).on('click','#authenticateBlog', function() {
	if (authenticateBlog()) {
		var action_type = $("input[name='action_type']").val();
		var heading = $("input[name='heading']").val();
		var blog_date = $("input[name='blog_date']").val();
		var name = $("input[name='name']").val();	
		var short_description = $("textarea[name='short_description']").val();	
		var file_1 = $('#file_1').prop("files")[0];
		var title = $("input[name='title']").val();
		var meta_keyword = $("input[name='meta_keyword']").val();
		var meta_description = $("input[name='meta_description']").val();
		var description = CKEDITOR.instances['editor'].getData();

		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('heading', heading);
		formData.append('blog_date', blog_date);
		formData.append('name', name);
		formData.append('short_description', short_description);
		formData.append('image', file_1);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		formData.append('description', description);

		$.ajax({
			url : siteUrl + 'controller/AdminController.php',
			type : 'POST',
			data : formData,
			async: false,
			contentType: false,
            processData: false,
			success : function(result) {
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("Blog already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "blog/");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});


$(document).on('click','#authenticateUpdateBlog', function() {
	if (authenticateBlog()) {
		var action_type = $("input[name='action_type']").val();		
		var id = $("input[name='id']").val();
		var heading = $("input[name='heading']").val();
		var blog_date = $("input[name='blog_date']").val();
		var name = $("input[name='name']").val();	
		var short_description = $("textarea[name='short_description']").val();	
		var file_1 = $('#file_1').prop("files")[0];
		var title = $("input[name='title']").val();
		var meta_keyword = $("input[name='meta_keyword']").val();
		var meta_description = $("input[name='meta_description']").val();
		var description = CKEDITOR.instances['editor'].getData();

		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading', heading);
		formData.append('blog_date', blog_date);
		formData.append('name', name);
		formData.append('short_description', short_description);
		formData.append('image', file_1);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		formData.append('description', description);

		$.ajax({
			url : siteUrl + 'controller/AdminController.php',
			type : 'POST',
			data : formData,
			async: false,
			contentType: false,
            processData: false,
			success : function(result) {
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("Blog already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "blog/");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});
function authenticateBlog() {
	var valid = true;
	var heading = $("input[name='heading']").val();
	var name = $("input[name='name']").val();
	var short_description = $("textarea[name='short_description']").val();
	var title = $("input[name='title']").val();
	var meta_keyword = $("input[name='meta_keyword']").val();
	var meta_description = $("input[name='meta_description']").val();
	var description = CKEDITOR.instances['editor'].getData();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (heading.length == 0) {
		valid = false;
		$("#msgheading").html("Enter heading");
		$("#msgheading").show();
	}if (name.length == 0) {
		valid = false;
		$("#msgname").html("Enter name.");
		$("#msgname").show();
	}if (short_description.length == 0) {
		valid = false;
		$("#msgshort_description").html("Enter short description.");
		$("#msgshort_description").show();
	}if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Please enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Please enter meta keyword");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Please enter meta description");
		$("#msgmeta_description").show();
	}if (description.length == 0) {
		valid = false;
		$("#msgdescription").html("Please enter description");
		$("#msgdescription").show();
	}
	return valid;
}

$(document).on('click','#authenticateLegalDocument', function() {
	if (authenticateLegalDocument()) {
		var action_type = $("input[name='action_type']").val();
		var heading = $("input[name='heading']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var file_2 = $('#file_2').prop("files")[0];
		var title = $("input[name='title']").val();
		var meta_keyword = $("input[name='meta_keyword']").val();
		var meta_description = $("input[name='meta_description']").val();
		var description = $("textarea[name='description']").val();

		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('heading', heading);
		formData.append('word_file', file_1);
		formData.append('pdf_file', file_2);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		formData.append('description', description);

		$.ajax({
			url : siteUrl + 'controller/AdminController.php',
			type : 'POST',
			data : formData,
			async: false,
			contentType: false,
            processData: false,
			success : function(result) {
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("Document already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "document/");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});


$(document).on('click','#authenticateUpdateLegalDocument', function() {
	if (authenticateLegalDocument()) {
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();
		var heading = $("input[name='heading']").val();
		var file_1 = $('#file_1').prop("files")[0];
		var file_2 = $('#file_2').prop("files")[0];
		var title = $("input[name='title']").val();
		var meta_keyword = $("input[name='meta_keyword']").val();
		var meta_description = $("input[name='meta_description']").val();
		var description = $("textarea[name='description']").val();

		var formData = new FormData();
		formData.append('action_type', action_type);
		formData.append('id', id);
		formData.append('heading', heading);
		formData.append('word_file', file_1);
		formData.append('pdf_file', file_2);
		formData.append('title', title);
		formData.append('meta_keyword', meta_keyword);
		formData.append('meta_description', meta_description);
		formData.append('description', description);

		$.ajax({
			url : siteUrl + 'controller/AdminController.php',
			type : 'POST',
			data : formData,
			async: false,
			contentType: false,
            processData: false,
			success : function(result) {
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("Document already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "document/");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});
function authenticateLegalDocument() {
	var valid = true;
	var heading = $("input[name='heading']").val();
	var title = $("input[name='title']").val();
	var meta_keyword = $("input[name='meta_keyword']").val();
	var meta_description = $("input[name='meta_description']").val();
	var description = $("textarea[name='description']").val();

	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (heading.length == 0) {
		valid = false;
		$("#msgheading").html("Enter heading");
		$("#msgheading").show();
	}if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Please enter title.");
		$("#msgtitle").show();
	}if (meta_keyword.length == 0) {
		valid = false;
		$("#msgmeta_keyword").html("Please enter meta keyword");
		$("#msgmeta_keyword").show();
	}if (meta_description.length == 0) {
		valid = false;
		$("#msgmeta_description").html("Please enter meta description");
		$("#msgmeta_description").show();
	}if (description.length == 0) {
		valid = false;
		$("#msgdescription").html("Please enter description");
		$("#msgdescription").show();
	}
	return valid;
}

$(document).on('click','#authenticateAbout', function() {
	var valid = true;
	var heading = $("input[name='heading']").val();
	var subheading = $("input[name='subheading']").val();
	var abouthistory = CKEDITOR.instances['editor'].getData();
	var mission = CKEDITOR.instances['editor-1'].getData();
	var vision = CKEDITOR.instances['editor-2'].getData();
	var description = $("textarea[name='description']").val();
	
	var title = $("input[name='title']").val();
	var metaTag = $("input[name='metaTag']").val();
	var metaDescription = $("input[name='metaDescription']").val();
	
	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (heading.length == 0) {
		valid = false;
		$("#msgheading").html("Please enter heading");
		$("#msgheading").show();
	}
	if (subheading.length == 0) {
		valid = false;
		$("#msgsubHeading").html("Please enter subheading");
		$("#msgsubHeading").show();
	}
	if (abouthistory.length == 0) {
		valid = false;
		$("#msghistory").html("Please enter history");
		$("#msghistory").show();
	}
	
	if (mission.length == 0) {
		valid = false;
		$("#msgmission").html("Please enter mission");
		$("#msgmission").show();
	}
	
	if (vision.length == 0) {
		valid = false;
		$("#msgvision").html("Please enter vision");
		$("#msgvision").show();
	}
	
	if (description.length == 0) {
		valid = false;
		$("#msgdescription").html("Please enter description");
		$("#msgdescription").show();
	}
	if (title.length == 0) {
		valid = false;
		$("#msgtitle").html("Please enter title");
		$("#msgtitle").show();
	}
	if (metaTag.length == 0) {
		valid = false;
		$("#msgmetatag").html("Please enter meta tag");
		$("#msgmetatag").show();
	}
	if (metaDescription.length == 0) {
		valid = false;
		$("#msgmetaDecription").html("Please enter meta description");
		$("#msgmetaDecription").show();
	}
	return valid;
});


$(document).on('click', '#authenticateShareCapital', function() {
	if (authenticateShareCapital()) {
		var frm = $(".frm").serialize();
		$.ajax({
			url : siteUrl + 'controller/AdminController.php',
			type : 'POST',
			data : frm,
			async: false,
			success : function(result) {
				$("#product-msg").css("color", "red");
				if (result.indexOf("1") > -1) {
					$("#product-msg").html("share capital already exist");
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl + "share-capital/");
				} else if (result.indexOf("3") > -1) {
					$("#product-msg").html("Please try again later");
				}
			}
		});
	}
});

function authenticateShareCapital() {
	var valid = true;
	var company_type = $("select[name='company_type']").val();
	var city = $("select[name='city']").val();
	var share_capital = $("input[name='share_capital']").val();
	var charges = $("input[name='charges']").val();

	$(".message").html("&nbsp;");
	$(".message").hide();
	$(".message").css("color", "red");
	if (company_type == 0) {
		valid = false;
		$("#msgcompany_type").html("Select company type");
		$("#msgcompany_type").show();
	}if (city == 0) {
		valid = false;
		$("#msgcity").html("Select city");
		$("#msgcity").show();
	}if (share_capital.length == 0) {
		valid = false;
		$("#msgshare_capital").html("Enter share capital");
		$("#msgshare_capital").show();
	}if (charges.length == 0) {
		valid = false;
		$("#msgcharges").html("Enter charges");
		$("#msgcharges").show();
	}
	return valid;
}




function findCity(obj){
	var location = obj.value;
	//alert(location);
	$.ajax({
		url : siteUrl + 'find-city.php',
		type : 'GET',
		data : 'location='+location,
		async: false,
		success : function(result) {
			$("#city-data").html(result);			
		}
	});
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
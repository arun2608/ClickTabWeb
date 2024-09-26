var siteUrl = $("#siteUrl").val();

$(document).on('click','#authenticateCoupon',function() {
	if(authenticateCoupon()){	
		var action_type = $("input[name='action_type']").val();
		var id = $("input[name='id']").val();		
		var type = $("select[name='type']").val();
		var category = $("select[name='category']").val();
		var store = $("select[name='store']").val();
		var offer_type = $("select[name='offer_type']").val();
		var coupon_heading = $("input[name='coupon_heading']").val();
		var coupon_excerpt = $("textarea[name='coupon_excerpt']").val();
		var coupon_code = $("input[name='coupon_code']").val();
		var coupon_price = $("input[name='coupon_price']").val();
		var mrp = $("input[name='mrp']").val();
		var cashback_amt = $("input[name='cashback_amt']").val();
		var order_amount = $("input[name='order_amount']").val();
		var coupon_user = $("select[name='coupon_user']").val();
		var coupon_start_date = $("input[name='coupon_start_date']").val();
		var coupon_end_date = $("input[name='coupon_end_date']").val();
		var comp_link = $("input[name='comp_link']").val();
		var searching_keywords = [];
		$("input[name='searching_keywords[]']").each(function() {
			searching_keywords.push($(this).val());
		});
        var content1 = CKEDITOR.instances['editor'].getData();
        var content2 = CKEDITOR.instances['editor1'].getData();
        var content3 = CKEDITOR.instances['editor2'].getData();
		var link = $("input[name='link']").val();
		var image = $("input[name='image']").val();
		var handpicked,top20,offer,verified;
		if($("input[name='handpicked']").is(':checked')){
			handpicked=1;
		} else {
			handpicked=0;
		}
		if($("input[name='top20']").is(':checked')){
			top20=1;
		} else {
			top20=0;
		}
		if($("input[name='offer']").is(':checked')){
			offer=1;
		} else {
			offer=0;
		}
		if($("input[name='verified']").is(':checked')){
			verified=1;
		} else {
			verified=0;
		}
		var formData = new FormData();
		formData.append('action_type', action_type);		
		formData.append('id', id);
		formData.append('type', type);
		formData.append('category', category);
		formData.append('store', store);
		formData.append('coupon_heading', coupon_heading);
		formData.append('coupon_excerpt', coupon_excerpt);
		formData.append('coupon_code', coupon_code);
		formData.append('coupon_price', coupon_price);
		formData.append('cashback_amt', cashback_amt);
		formData.append('mrp', mrp);
		formData.append('order_amount', order_amount);
		formData.append('coupon_user', coupon_user);
		formData.append('coupon_start_date', coupon_start_date);
		formData.append('coupon_end_date', coupon_end_date);
		formData.append('comp_link', comp_link);
		formData.append('searching_keywords', searching_keywords);
		formData.append('content1', content1);	
		formData.append('content2', content2);	
		formData.append('content3', content3);	
		formData.append('link', link);	
		formData.append('offer_type', offer_type);	
		formData.append('handpicked', handpicked);	
		formData.append('offer', offer);	
		formData.append('top20', top20);	
		formData.append('verified', verified);	
		formData.append('image', image);
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:formData,
			contentType: false,
			processData: false,
			async: false,
			success:function(result){
			   // console.log(result);
				if (result.indexOf("1") > -1) {
					$("#msgcoupon_code").html("Coupon already exist");
					$("#msgcoupon_code").show();
				} else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+'coupon/');
				} else if (result.indexOf("3") > -1) {
					$("#msgcoupon_code").html("Please try again later.");
					$("#msgcoupon_code").show();
				}	
			}
		});
	}
});
function authenticateCoupon(){
	var valid = true;
	var coupon_heading = $("input[name='coupon_heading']").val();
	var coupon_code = $("input[name='coupon_code']").val();
	// var order_amount = $("input[name='order_amount']").val();
	// var coupon_start_date = $("input[name='coupon_start_date']").val();
	// var coupon_end_date = $("input[name='coupon_end_date']").val();
	var coupon_price = $("input[name='coupon_price']").val();
	// var coupon_user = $("select[name='coupon_user']").val();
    $(".message").html("&nbsp;");
    $(".message").hide();
    $(".message").css("color", "red");
// 	if (coupon_code.length == 0 || validateCoupon(coupon_code) == false) {
// 		valid = false;
// 		$("#msgcoupon_code").html("Enter valid coupon code");
// 		$("#msgcoupon_code").show();
// 	}
	// if (coupon_start_date.length == 0) {
	// 	valid = false;
	// 	$("#msgcoupon_start_date").html("Enter start date");
	// 	$("#msgcoupon_start_date").show();
	// }
	// if (coupon_end_date.length == 0) {
	// 	valid = false;
	// 	$("#msgcoupon_end_date").html("Enter end date");
	// 	$("#msgcoupon_end_date").show();
	// }
	

	// if (order_amount.length == 0 || checkPrice(order_amount) == false) {
	// 	valid = false;
	// 	$("#msgorder_amount").html("Enter order amount");
	// 	$("#msgorder_amount").show();
	// }
        

    if (coupon_heading.length == 0 ) {
        valid = false;
        $("#msgcoupon_heading").html("Enter valid coupon heading");
        $("#msgcoupon_heading").show();
    }
    // if (coupon_price.length == 0 || checkPrice(coupon_price) == false) {
    //     valid = false;
    //     $("#msgcoupon_price").html("Enter coupon price");
    //     $("#msgcoupon_price").show();
    // }

    // if (coupon_user == 0) {
    //     valid = false;
    //     $("#msgcoupon_user").html("Select coupon users");
    //     $("#msgcoupon_user").show();
    // }
    

    return valid;
}

function findCoupon(obj){
	var coupon_type = obj.value;
	if(coupon_type==2){
		$("#coupon_service").show();
	}else{
		$("#coupon_service").hide();
		$("select[name='service']").val("");
	}
}

function findStore(obj){
	
	$.ajax({
		url : siteUrl + 'find-store.php',
		type : 'GET',
		data : 'category='+obj,
		async: false,
		success : function(result) {
			$("#store-data").html(result);			
		}
	});
}

function validateCoupon(coupon_code) {
	var regex = /^[A-Za-z0-9]+$/;
	return regex.test(coupon_code);
}


function checkPrice(price) {
	var regex = /^[0-9]+$/;
	return regex.test(price);
}
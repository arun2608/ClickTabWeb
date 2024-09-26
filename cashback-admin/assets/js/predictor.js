var siteUrl = $("#siteUrl").val();

$(document).on('click','#authenticateCoupon',function() {
	if(authenticateCoupon()){		
		var frm = $("#coupon-frm").serialize();
		$.ajax({
			url: siteUrl+'controller/AdminController.php',
			type:'POST',
			data:frm,
			async: false,
			success:function(result){
				if (result.indexOf("1") > -1) {
					$("#msgcoupon_code").html("coupon already exist");
					$("#msgcoupon_code").show();
				}else if (result.indexOf("2") > -1) {
					window.location.replace(siteUrl+'coupon/');
				}else if (result.indexOf("3") > -1) {
					$("#msgcoupon_code").html("Please try again later.");
					$("#msgcoupon_code").show();
				}	
			}
		});
	}
});

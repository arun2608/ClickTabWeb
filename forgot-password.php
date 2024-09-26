<?php 
include "admin-lib.php";
include "header.php";?>
<section class="breadcrumb-sec"> 
<div class="container">		  
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
  </ol>
</nav>		  
</div>
</section>

<section class="login-sec pt-60 pb-60">
  <div class="login-card"><div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12"> 
        <div class="login-img">
          <img src="<?=$baseUrl?>images/contact/1.webp" alt="login">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <div class="main">
          <div class="form_wrapper" id="thank-msg">
              
            
            <div class="tile">
              <h4 class="login">Forgot Password</h4>
            </div>
            <div class="form_wrap">
              <div class="form_fild login_form">
              <form id="loginForm" method="POST">
                <div class="input_group">
                  <input type="text" name="forgot_email" class="input" placeholder="Email Address" />
                  <span class="message" id="msgforgot_email"></span>
                </div>

                <button  type="button" class="btn" id="authenticateResetPassword">Forgot Password</button>
               </form>

              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div></div>
<input type="hidden" id="siteUrl" value="<?php echo $baseUrl; ?>">
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php include "footer.php"; ?>
</body>
</html>
<script>
var siteUrl = $("#siteUrl").val();


$(document).on('click', '#authenticateResetPassword', function () {
    if (authenticateResetPassword()) {
        var forgot_email = $("input[name='forgot_email']").val();
        var formData = new FormData();
        formData.append('forgot_email', forgot_email);
        formData.append('action_type', 'forgot-password');

        $.ajax({
            url: siteUrl + 'controller/UserController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.indexOf("1") > -1) {
                   $("#thank-msg").html("<div class='success_message'><h1>Thank you</h1><br><h3>Your Reset password code is sent on your Email ID. Please check your Inbox </h3></div>");
                } else if (result.indexOf("2") > -1) {
                    $("#msgforgot_email").show();
                    $("#msgforgot_email").html("Please try again later.");
                }
            },
        });
    }
});


function authenticateResetPassword() {
    var valid = true;
    var forgot_email = $("input[name='forgot_email']").val();
    
    $(".message").html("&nbsp;");
    $(".message").css("font-size", "13px");
    $(".message").css("color", "red").hide();
    
   
    if (forgot_email.length == 0 || !emailValidate2(forgot_email)) {
        valid = false;
        $("#msgforgot_email").html("Enter a valid email").show();
    }
    
    return valid;
}




function emailValidate2(login_email) {
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/;
    return pattern.test(login_email);
}



function emailValidate(email) {
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/;
    return pattern.test(email);
}


function checkcontactnumber(mobile) {
	var contactRegexStr = /^\d{10}$/;
	var isvalid = contactRegexStr.test(mobile);

	return isvalid;
}

</script>

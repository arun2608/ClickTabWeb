<?php
include "admin-lib.php";
include "header.php";
error_reporting(0); 
?>
<section class="breadcrumb-sec"> 
    <div class="container">		  
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
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
              <h4 class="login">Reset Password</h4>
            </div>
            <div class="form_wrap">
              <div class="form_fild login_form">
                  <span id="msg_error"></span>
                  
                  <form id="forgotPassword" method="POST">
            <div class="input_group">
        
                <input type="text" name="forgot_email" class="input" placeholder="Email Address" />
                <span class="message" id="msg_forgot_email"></span>
            </div>  

            <div class="input_group">
                <input type="text" name="reset_code" class="input" placeholder="Reset Code" />
                <span class="message" id="msg_reset_code"></span>
            </div>

            <div class="input_group">
                <input type="password" name="new_password" class="input" placeholder="New Password" />
                <span class="message" id="msg_new_password"></span>
            </div>

            <button type="button" class="btn forgotPassword" >Reset Password</button>
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


<?php include "footer.php"; ?>
</body>
</html>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
<script>
var siteUrl = $("#siteUrl").val();
$(document).on('click', '.forgotPassword', function () {
    if (forgotPassword()) {
        var forgot_email = $("input[name='forgot_email']").val().trim();
        var new_password = $("input[name='new_password']").val().trim();
        var reset_code = $("input[name='reset_code']").val().trim();
        var formData = new FormData();
        formData.append('forgot_email', forgot_email);
        formData.append('new_password', new_password);
        formData.append('reset_code', reset_code);
        formData.append('action_type', 'reset-password'); 
        
        $.ajax({
            url: siteUrl+'controller/UserController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                // console.log(result);
                if (result.indexOf("1") > -1) {
                    $("#msg_error").html("You password successfully changed");
                } else if (result.indexOf("2") > -1) {
                    $("#msg_reset_code").html("Please try again later");
                } else if (result.indexOf("3") > -1) {
                    $("#msg_reset_code").html("Code not match");
                } else if (result.indexOf("4") > -1) {
                    $("#msg_forgot_email").html("Invalid email id");
                }
            }
            
        });
    }
});

function forgotPassword() {
    var valid = true;
    var forgot_email = $("input[name='forgot_email']").val().trim();
    var new_password = $("input[name='new_password']").val().trim();
    var reset_code = $("input[name='reset_code']").val().trim();

    $(".message").html("&nbsp;");
    $(".message").css("font-size", "13px");
    $(".message").css("color", "red").hide();

    if (forgot_email.length == 0 || !emailValidate(forgot_email)) {
        valid = false;
        $("#msg_forgot_email").html("Enter a valid email").show();
    }
    if (reset_code.length == 0) {
        valid = false;
        $("#msg_reset_code").html("Enter reset code").show();
    }
    if (new_password.length == 0) {
        valid = false;
        $("#msg_new_password").html("Enter new password").show();
    }

    return valid;
}

function emailValidate(email) {
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/i; // Added case-insensitive flag
    return pattern.test(email);
}
</script>
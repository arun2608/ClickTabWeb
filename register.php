<?php 
include "admin-lib.php";
include "header.php";?>
<section class="breadcrumb-sec"> 
<div class="container">		  
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Register</li>
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
              
            <input type="radio" class="radio" name="radio" id="login" <?=(empty($_REQUEST['refer_code']))?"checked":""?> />
            <input type="radio" class="radio" name="radio" id="signup" <?=(!empty($_REQUEST['refer_code']))?"checked":""?> />
            <div class="tile">
              <h4 class="login">Login to clicktabweb </h4>
              <h4 class="signup">Signup to clicktabweb </h4>
            </div>
            <label class="tab login_tab" for="login"> Login </label>
            <label class="tab signup_tab" for="signup"> Signup </label>
            <span class="shape"></span>
            <div class="form_wrap">
              <div class="form_fild login_form">
              <form id="loginForm" method="POST">
                <div class="input_group">
                <span class="message" id="msg_error2"></span>

                  <input type="text" name="login_email" class="input" placeholder="Email Address" />
                  <span class="message" id="msg_login_email"></span>
                </div>
                <div class="input_group">
                  <input type="password" name="login_password" class="input" placeholder="Password" />
                  <span class="message" id="msg_login_password"></span>
                </div>
                <a href="<?=$baseUrl?>forgot-password" class="forgot">Forgot password?</a>
                <button  type="button" class="btn authenticateLoginUser"  value="Login" > login</button>
               </form>
                <div class="not_mem">
                  <label for="signup">Not a member? <span> Signup now</span></label>
                </div>
              </div>
              <div class="form_fild signup_form">
                <form id="registerForm" method="POST">
                <input type="hidden" name="action_type" value="register-user">
                <span class="message" id="msg_error"></span>
                  <div class="input_group">
                    <input type="text" name="name" class="input" placeholder="Enter Name" />
                    <span class="message" id="msg_name"></span>
                  </div>

                  <div class="input_group">
                    <input type="text" name="mobile" class="input" placeholder="Enter Mobile No" />
                    <span class="message" id="msg_mobile"></span>
                  </div>

                  <div class="input_group">
                    <input type="text" name="referral_code" class="input" placeholder="Enter referral code" <?=(!empty($_REQUEST['refer_code']))?"readonly":""?> value="<?=$_REQUEST['refer_code']?>" />
                    <span class="message" id="msg_referral_code"></span>
                  </div>

                  <div class="input_group">
                    <input type="text" class="input" name="email" placeholder="Email Address" />
                    <span class="message" id="msg_email"></span>
                  </div>
                  <div class="input_group">
                    <input type="password" name="password" class="input" placeholder="Password" />
                    <span class="message" id="msg_password"></span>
                  </div>
                  <button type="button" class="btn authenticateRegisterUser">Submit</button>
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
$(document).on('click', '.authenticateRegisterUser', function () {
    if (authenticateRegisterUser()) {
        var name = $("input[name='name']").val().trim();
        var email = $("input[name='email']").val().trim();
        var password = $("input[name='password']").val().trim();
        var mobile = $("input[name='mobile']").val().trim();
        var referral_code = $("input[name='referral_code']").val().trim();
     
        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('mobile', mobile);
        formData.append('referral_code', referral_code);
        formData.append('action_type', 'register-user');

        $.ajax({
            url: siteUrl + 'controller/UserController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                $("#msg_error").show();
                if (result.indexOf("1") > -1) {
                    $("#msg_error").html("You are already registered, please log in.");
                } else if (result.indexOf("2") > -1) {
                    $("#thank-msg").html("<div class='success_message'><h2>Thank you</h2><h6 >Your account has been created. Please check you mail to verify your account. </h6></div>");
                } else {
                    $("#msg_error").html("Registration failed. Please try again.");
                }
            },
            error: function (xhr, status, error) {
                // Handle any errors from the AJAX request
                $("#msg_error").show();
                $("#msg_error").html("An error occurred: " + error);
            }
        });
    }
});

function authenticateRegisterUser() {
    var valid = true;
    var name = $("input[name='name']").val();
    var email = $("input[name='email']").val();
    var password = $("input[name='password']").val();
    var mobile = $("input[name='mobile']").val();
    $(".message").html("&nbsp;");
    $(".message").css("font-size", "13px");
    $(".message").css("color", "red").hide();
    
    if (name.length == 0) {
        valid = false;
        $("#msg_name").html("Enter name").show();
    }
    if (email.length == 0 || !emailValidate(email)) {
        valid = false;
        $("#msg_email").html("Enter a valid email").show();
    }

    if (mobile.length == 0 || !checkcontactnumber(mobile)) {
        valid = false;
        $("#msg_mobile").html("Enter a valid Mobile No").show();
    }
    if (password.length == 0) {
        valid = false;
        $("#msg_password").html("Enter password").show();
    }
    return valid;
}

$(document).on('click', '.authenticateLoginUser', function () {
    if (authenticateLoginUser()) {
        var login_email = $("input[name='login_email']").val();
        var login_password = $("input[name='login_password']").val();
        var formData = new FormData();
        formData.append('login_email', login_email);
        formData.append('login_password', login_password);
        formData.append('action_type', 'authenticate-user');

        $.ajax({
            url: siteUrl + 'controller/UserController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.indexOf("1") > -1) {
                    $("#msg_error2").show();
                    $("#msg_error2").html("Login successfully");
                    setTimeout(function() {
                        window.location.href = siteUrl+'dashboard.php';
                    }, 2000);
                } else if (result.indexOf("2") > -1) {
                    $("#msg_error2").show();
                    $("#msg_error2").html("It seems that the credentials you provided do not match our records. Please check your email and password, and try again.");
                } else if (result.indexOf("3") > -1) {
                    $("#msg_error2").show();
                    $("#msg_error2").html("Your account has not been activated yet. Please contact the administrator.");
                }
            },
        });
    }
});


function authenticateLoginUser() {
    var valid = true;
    var login_email = $("input[name='login_email']").val();
    var login_password = $("input[name='login_password']").val();
    
    $(".message").html("&nbsp;");
    $(".message").css("font-size", "13px");
    $(".message").css("color", "red").hide();
    
   
    if (login_email.length == 0 || !emailValidate2(login_email)) {
        valid = false;
        $("#msg_login_email").html("Enter a valid email").show();
    }
    if (login_password.length == 0) {
        valid = false;
        $("#msg_login_password").html("Enter password").show();
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

<?php
include "admin-lib.php";
include "header.php";

$userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
?>
<section class="breadcrumb-sec">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Refer & Earn</li>
      </ol>
    </nav>
  </div>
</section>
<section class="login-sec pt-60 pb-60">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="login-img"> <img src="images/contact/1.webp" alt="login"> </div>
      </div>
      <div class="col-lg-5 col-md-6 col-12 offset-lg-1">
        <div class="main">
          <div class="form_wrapper">
            <input type="radio" class="radio" name="radio" id="login" checked />
            <input type="radio" class="radio" name="radio" id="signup" />
            <h4 class="login">Refer & Earn </h4>
            <!-- <h4 class="signup">Signup </h4> --> 
            <!-- <label class="tab login_tab" for="login"> Refer & Earn </label> --> 
            <!-- <label class="tab signup_tab" for="signup"> Signup </label> --> 
            <!-- <span class="shape"></span> -->
            <div class="form_wrap">
              <div class="form_fild login_form">
                <form id="loginForm" method="POST">
                  <div class="input_group"> <span class="message" id="msg_error2"></span>
                    <input type="text" name="login_email" id="myInput" class="input" value="<?=$baseUrl?>register/<?=$userdata->MyReferralCode?>" />
                    <span class="message" id="msg_login_email"></span> </div>
                  <button  type="button" class="btn mt-2"  value="Copy Link" onclick="return copyIt();" > COPY LINK</button>
                </form>
                <h4 class="login text-center">Invite Your Friends </h4>
                <?php if(!empty($_SESSION['contact_message'])){ ?>
                  <p style="color:red"><?=$_SESSION['contact_message']?></p>
                  <?php }  unset($_SESSION['contact_message']); ?>
                <form action="<?=$baseUrl?>controller/CommonController.php?action_type=send-invitation" method="POST">
                  <div class="input_group"> <span class="message" id="msg_error2"></span>
                   <input type="hidden" name="invite_link" value="<?=$baseUrl?>register/<?=$userdata->MyReferralCode?>" />
                   <input type="hidden" name="refer_code" value="<?=$userdata->MyReferralCode?>" />
                   <input type="hidden" name="sub_id" value="<?=$userdata->Code?>">
                    <input type="hidden" name="user_id" value="<?=$userdata->Id?>">
                    <input type="text" name="invite_email" required class="input" placeholder="Enter your Friend Email ID" />
                    <span class="message" id="msg_login_email"></span> </div>
                  <button  type="submit" class="btn mt-2"  value="Login" >SEND INVITATION</button>
                </form>
                <!--<h4 class="login mt-5">Share Link With Your Friends </h4>-->
                <!--<div class="d-flex align-items-center justify-content-center bg-dark py-3 rounded">-->
                <!--  <div class="social-icons">-->
                <!--    <ul class="mb-0">-->
                <!--      <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>-->
                <!--      <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
                <!--      <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>-->
                <!--      <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>-->
                <!--    </ul>-->
                <!--  </div>-->
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="siteUrl" value="<?php echo $baseUrl; ?>">
</section>
<?php include "footer.php"; ?>
</body></html><script>
var siteUrl = $("#siteUrl").val();
function copyIt() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}

</script>
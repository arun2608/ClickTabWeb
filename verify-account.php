<?php
include "admin-lib.php";
include "header.php";

$status = $_REQUEST['status'];

?>
<div class="clearfix"></div>

<div class="clearfix"></div>
<section class="about pt-60 pb-60">
  <div class="container">
    <div class="col-lg-12 align-items-center justify-content-center">
        <div class='success_message'>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>
          <?php 
            if($status==1){?>
          <h1>Congratulations!</h1><br><h3 >We are excited to inform you that your account has been successfully activated! You can  <a href="<?php echo $baseUrl."register";?>">click here</a> to continue.</h3>
          <?php }else if($status==2){?>
          <h1>OOPS!</h1><br><h3>Unfortunately, the verification process was unsuccessful. Please try again later.</h3>
          <?php }else if($status==3){?>
          <h1>OOPS!</h1><br><h3>It seems there was an issue with verifying your email address. The email verification process was not completed successfully.</h3>
          <?php }?>
          <div class="spacer"></div>
          <div class="spacer"></div>
          <div class="spacer"></div>
        </div>
    </div>
  </div>
</section>

<div class="clearfix"></div>
<?php
include "footer.php";

?>
<style>
    .ab_class{
        color:#000 !important;
        font-size: 15px !important; 
    }
</style>

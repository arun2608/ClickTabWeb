<?php 
include "admin-lib.php";
include_once 'cashback-admin/baseurl.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Telegram Lander</title>

    <link href="<?php echo $siteUrl;?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $siteUrl;?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $siteUrl;?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $siteUrl;?>assets/css/custom.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="<?php echo $siteUrl;?>assets/js/login.js"></script>-->
  </head>

  <body>
<input type="hidden" id="siteUrl" value="<?php echo $siteUrl;?>">
<section class="log_admin">
<div class="container">
      <div class="admin_div">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12"><img src="<?php echo $siteUrl;?>assets/img/login.jpg" alt="Telegram Lander"> </div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12">      
        <div class="form admin_login_form">
          <div class="admin_login_content">
                  <h3>Telegram Lander</h3>
                 
                        <p>Feel Free to contact us any time. We will get back to you as soon as we can!</p>
                  <form action="<?=$baseUrl?>controller/CommonController.php" method="post">
                      <input type="hidden" name="action_type" value="lander">
                      
                  <input type="text" name="name" class="form-control form-group" required placeholder="Name" />
                  <input type="text" name="email" class="form-control form-group" required placeholder="Email" />
                  <input type="text" name="mobile" class="form-control form-group" required placeholder="Mobile no." />
                  <?php if(!empty($_REQUEST['token'])){ ?>
                      <input type="hidden" name='token' value="<?=$_REQUEST['token']?>">
                      <input type="hidden" name='url' value="<?=$_REQUEST['url']?>">
                      <input type="hidden" name='id' value="<?=$_REQUEST['id']?>">
                      <?php } else { ?>
                      <select name="token" class="form-control">
                          <option value="0">Select Store</option>
                          <?php $storeList= $adminDao->storeList();
                          foreach($storeList as $value){ ?>
                          <option value="<?=$value->Token?>"><?=$value->Name?></option>
                          <?php } ?>
                      </select>
                      <?php } ?>
                      <br>
                  <button type="submit" class="btn btn-success contact_form_submit">Send</button>
                  </form>
                
            
          </div>
        </div>
      </div>
      </div>
    </div>
</div>
</section>

<style>
    .admin_login_content form .pull-left.validmsg{
    color: green!important;
    font-family: nunito!important;
    font-family: 'Nunito Sans', sans-serif!important;
    font-size: 13px!important;
    font-weight: lighter!important;
    line-height: 1.471!important;
    }
    
    .admin_login_content h3{
        color:#fff;
        font-size:32px !important;
    }
    
    .admin_login_content p{
        color:#e5e5e5;
        font-size:16px;
    }
</style>
  </body>
</html>

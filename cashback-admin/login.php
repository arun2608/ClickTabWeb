<?php 
include_once 'baseurl.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Click Tab Web</title>

    <link href="<?php echo $siteUrl;?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $siteUrl;?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $siteUrl;?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $siteUrl;?>assets/css/custom.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $siteUrl;?>assets/js/login.js"></script>
  </head>

  <body>
<input type="hidden" id="siteUrl" value="<?php echo $siteUrl;?>">
<section class="log_admin">
<div class="container">
      <div class="admin_div">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12"><img src="<?php echo $siteUrl;?>assets/img/login.jpg" alt="admin-login"> </div>
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-12">      
        <div class="form admin_login_form">
          <div class="admin_login_content">
            <form >
               
              <a href="#"><img src="https://clicktabweb.com/images/w-logo.webp" alt="logo"></a>  <div class="clearfix"></div>
              	<span class="pull-left validmsg">&nbsp;</span>
                <input type="text" class="form-control" placeholder="Username" name="username"/>
                <input type="password" class="form-control" placeholder="Password"  name="password"/>
                <button type="button" class="btn btn-default submit isValidLogin">Login</button>

              <div class="clearfix"></div>
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
    
</style>
  </body>
</html>

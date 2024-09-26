<?php
@ob_start ();
@session_start ();
error_reporting ( 0 ); 
include_once '../cashback-admin/baseurl.php';
include_once '../cashback-admin/controller/Connection.php';
include_once ('../dao/AdminDao.php');
$Connection = new Connection ();
$db = $Connection->getConnection ();
$adminDao = new AdminDao ( $db );
date_default_timezone_set ( "Asia/Kolkata" );
$date = date ( "Y-m-d h:i:s" );
$action_type = $_REQUEST ['action_type'];
$cart_id = $_SESSION['cart_session'] = session_id ();


if (isset ( $action_type ) && $action_type == "verify-email") {
	$email = $_REQUEST ['email'];
	$otp = $_REQUEST ['otp'];
	
	$checkOtp = $adminDao->verifyEmailByOtp( $email, $otp );
	if ($checkOtp) {
		$updateVerifyStatus = $adminDao->updateVerifyStatus( $checkOtp->Id, $email, $otp );	
		if($updateVerifyStatus){
		    $userData = $adminDao->userById($checkOtp->Id);
		    $message = "<html><head><link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto' rel='stylesheet'>
					<style>
					.emailer_holder{
						width:100%;
						max-width: 600px;
						margin: auto;
						padding: 0;
						background: #ffff;
						font-family: 'Roboto', sans-serif;
						box-sizing: border-box;
						border-top:1px solid #eee;
						border-left:1px solid #eee;
						border-right:1px solid #eee;
					}.emailer_holder>h1{
						font-size: 35px;
						margin: 0;
						padding:25px 0;
						color: #333;
						text-align: left;
					}.emailer_holder h1 span{
						font-weight: bold;
						color: #00a1d8;
					}.emailer_holder .header{
						width: 100%;
						margin: 0;
						padding: 15px 0 15px 15px;
						text-align: left;
						float: left;
						box-sizing: border-box;
						border-bottom:3px solid #d74d4d;
					}.emailer_holder .header a>img{
						width:250px;
					}.emailer_holder .header h2{
						font-size: 35px;
						color: #fff;
						margin: 0;
						padding: 5px 0;
						text-align: center
					}.emailer_holder .header p{	
						border-top:3px solid #00a1d8;
						font-size:13px;
						margin: 0;
					}.Document thead{
						background: #eee;
						font-weight: bold;
					}.Document tbody td{
						font-size: 13px;
						font-weight: bold;
						padding: 7px 10px;
						border:hidden;
					}.Document{
						width: 100%;
						margin: 0;
						padding: 0 25px;
						float: left;
						box-sizing: border-box;
					}.Document ul{
						margin: 0;
						padding:15px 0 15px 25px;
						list-style:none;
					}.Document ul li{
						margin: 0;
						padding:0;
						display: block;
					}.Document>ul>li>a{
						margin: 0;
						padding:5px 0;
						display: inline-block;
						font-size: 15px;
						color: #0a21c8;
						text-decoration: none;
						font-weight: bold;
					}.Document ul li img{
						max-width: 20px;
						padding-right:5px; 
					}.Document h3{
						font-size:13px;
						margin: 0;
						padding-top:20px;
						float:left;		
					}.sign{
						padding: 0 25px;
						margin: 0;
					}.sign a>img{
						width:200px;
					}.sign>p{
						font-size: 13px;
						margin: 0;
						padding: 0;
						display: inline-block;
					}.clearfix{
						clear: both;
					}.Document p{
						margin: 0;
						padding:5px 0 5px 0;
						display: inline-block;
						font-size: 13px;
					}.Document p>a{
						text-decoration: none;
						color: #666;
					}.Document p>strong>a{
						text-decoration: none;
						color: #0a21c8;
					}.Document h6{
						font-size:16px;
						color: #333;
						margin: 0;
						padding:8px 0 0 0;
					}.Document h1{
						float: left;
						margin: 0;
						padding: 0;
						color: #e66c00;
					}.Document h1 span{
						font-size: 12px;
						color: #e66c00;
					}.Document em{
						font-size: 12px;
					}.footer-top{
						width: 100%;
						margin: 0;
						padding: 0 25px;
						box-sizing: border-box;
					}.footer-top p{
						font-size:12px;
						text-align: center;
						border-bottom: 2px solid #000;  
						padding: 10px 0;			
					}.footer-bottom{
						width: 100%;
						margin: 0;
						padding: 0 25px;
						box-sizing: border-box;
						background:#eee;
					}.footer-bottom p{
					    font-size: 9px;
						padding: 15px 0 25px 0;
						text-align: left;
						color: #000;
						line-height: 1.8;
					}
				</style></head>
				<body > 
				<div style='background:#e7e7e7;width: 600px;'>
				<div class='emailer_holder'>
				<div class='header'>
				<a href='".$baseUrl."'><img src='".$baseUrl."assets/images/logo.png'></a>
				</div>
				<p>&nbsp;</p>
				<div class='Document'>
				<p> Hello <strong>".$userData->name."</strong>,</p>
				<div class='clearfix'></div>
				<br>
				<p>Thank you for joining  <a href='".$baseUrl."/' style='color: #2d73dc;'>clicktabweb.com</a>,</p>
				<div class='clearfix'></div>
				<p>We'd like to confirm that your account was created successfully. Use the below credentials to access the portal.</p>
				<p>Login Url : <a href='".$baseUrl."/login' style='color: #2d73dc;'>Click Here</a></p>
				<div class='clearfix'></div>
				<p>Login ID : ".$userData->email."</p>
				<div class='clearfix'></div>
				
				<p>If you experience any issues logging into your account, reach out to us at info@clicktabweb.com</p>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class='footer-bottom'>
				<p>Best,
				<br>
				Click Tab Web Team</p>   
				</div>
				</div>
				</div>
				</body>
				</html>
				";
			$nameTo = $userData->name;
			$emailTo = $userData->email;				
			$subject = "Your account login details";
			$adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );
		    
			$url = $baseUrl."verify-account/1";			
			header("location:$url");
		}else{
			$url = $baseUrl."verify-account/2";			
			header("location:$url");
		}
	} else {
		$url = $baseUrl."verify-account/3";			
			header("location:$url");
	}
}
?>
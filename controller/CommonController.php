<?php
@ob_start ();
@session_start ();
error_reporting ( 0 ); 
include_once "../cashback-admin/baseurl.php";
include_once '../cashback-admin/controller/Connection.php';
include_once ('../dao/AdminDao.php');
$Connection = new Connection ();
$db = $Connection->getConnection ();
$adminDao = new AdminDao ( $db );
date_default_timezone_set ( "Asia/Kolkata" );
$date = date ( "Y-m-d h:i:s" );
$action_type = $_REQUEST ['action_type']; 
$cart_id = $_SESSION['cart_session'] = session_id ();


	if (isset ( $action_type ) && $action_type == "register-user") {
		$gender = $_REQUEST ['gender'];
		$fname = $_REQUEST ['fname'];
		$lname = $_REQUEST ['lname'];
		$email_id = $_REQUEST ['email_id'];
		$password = $_REQUEST['password'];	
		$offer = $_REQUEST['offer'];	
		$newsletter = $_REQUEST['newsletter'];	
		$mobile = $_REQUEST['mobile'];	
		$otp = rand(100000,9999999);
		
		$checkEmail = $adminDao->checkEmail( $email_id );
		if($checkEmail){
			echo "1";
		}else{
			$saveUser = $adminDao->saveUser($gender, $fname, $lname, $email_id, $password, $mobile, $otp, $offer, $newsletter, $date );
			$id = $saveUser;
			if($saveUser){
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
				<a href='".$baseUrl."'><img src='".$baseUrl."images/w-logo.webp'></a>
				</div>
				<p>&nbsp;</p>
				<div class='Document'>
				<p> Dear <strong>".$fname."</strong>,</p>
				<div class='clearfix'></div>
				<br>
				<p>Your account has been created. Please verify the email by clicking the link below</p>
				<div class='clearfix'></div>
				<p> <a href='".$baseUrl."controller/confirmation.php?action_type=verify-email&email=".$email_id."&otp=".$otp."' style='color: #2d73dc;'>Click Here</a>.</p>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class='footer-bottom'>
				<p>Regards
				<br>
				Team Click Tab Web </p>  
				</div>
				</div>
				</div>
				</body>
				</html>
				";
			$nameTo = $fname." ".$lname;
			$emailTo = $email_id;				
			$subject = "Click Tab Web Account created";
			
			
			$adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );
			echo "2";
		}else{
			echo "3";
		}			
	}
}








if (isset ( $action_type ) && $action_type == "send-invitation") {
    

	 $email = $_REQUEST ['invite_email'];
	 $link = $_REQUEST ['invite_link'];
	 $user_id = $_REQUEST['user_id'];
	 $sub_id = $_REQUEST['sub_id'];
	 $refer_code = $_REQUEST['refer_code'];
	
    $saveInvitation= $adminDao->saveInvitation($user_id, $sub_id, $refer_code, $email, $link, $date);
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
				<a href='".$baseUrl ."'><img src='".$baseUrl."images/w-logo.webp'></a>
				</div>
				<p>&nbsp;</p>
				<div class='Document'>
				
				<br>
				<p>Dear Sir/Mam</p>
					<div class='clearfix'></div>
			<p>Here is your referral link click the link below to register over the click to web website</p>
				<div class='clearfix'></div>
				
				<p>Email: ".$email."</p><br>
				<p>Invitation Link: ".$link."</p>
				
				<div class='clearfix'></div>
				<p>And its duly noted. We really appreciate your effort </p>
				
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class='footer-bottom'>
				<p>Regards
				<br>
				Team Click Tab Web</p>  
				
				</div>
				</div>
				</div>
				</body>
				</html>
				";
				
			$nameFrom = "Click Tab Web ";
			$emailFrom = "info@clicktabweb.com";//"clicktabweb@cwltechnology.in";
			$nameTo = "Click Tab Web";
			$emailTo = $email;				
			$subject = " Referral Link";
			
	
			
			$adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );
			$_SESSION['contact_message']="Invitation link sent successfully.";
			header("Location:../refer.php");
				
}

if (isset ( $action_type ) && $action_type == "contact-enquiry") {
    

	 $name = $_REQUEST ['name'];
	 $email = $_REQUEST ['email'];
	 $mobile = $_REQUEST ['mobile'];
	 $subject = $_REQUEST ['subject'];
	 $message1 = $_REQUEST ['message'];	
	
		$saveEnquiry = $adminDao->saveEnquiry( $name, $email, $mobile, $subject, $message1,  $date );
		$id = $saveEnquiry;
		if($saveEnquiry){
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
				<a href='".$baseUrl ."'><img src='".$baseUrl."images/w-logo.webp'></a>
				</div>
				<p>&nbsp;</p>
				<div class='Document'>
				<p> Hi <strong>Click Tab Web</strong>,</p>
				<div class='clearfix'></div>
				<br>
				<p>You have a new enquiry</p>
				<div class='clearfix'></div>
				<p>Name: ".$name."</p>
				<p>Email: ".$email."</p>
				<p>Mobile: ".$mobile."</p>
				<p>Message: ".$message1."</p>
				<div class='clearfix'></div>
				<p>And its duly noted. We really appreciate your effort </p>
				
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class='footer-bottom'>
				<p>Regards
				<br>
				Team Click Tab Web</p>  
				
				</div>
				</div>
				</div>
				</body>
				</html>
				";
				
			$nameFrom = "Click Tab Web ";
			$emailFrom = "clicktabweb@cwltechnology.in";
			$nameTo = "Click Tab Web";
			$emailTo = "arunkumarg293@gmail.com";				
			$subject = " Thank you for submitting your Enquiry";
			
	
			
			
		    $adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );
			$_SESSION['contact_message']="Thank you for your enquiry. Our Support team will contact you soon.";
			header("Location:../contact-us");
		}else{
			$_SESSION['contact_message']="Something went Wrong.";
			header("Location:../contact-us");
			
		}			
}

if (isset ( $action_type ) && $action_type == "become-a-partner") {
    

	 $name = $_REQUEST ['name'];
	 $email = $_REQUEST ['email'];
	 $mobile = $_REQUEST ['mobile'];
	 $subject = $_REQUEST ['subject']; //subject act as a store name
	 $message1 = $_REQUEST ['message'];	
	
		$saveEnquiry = $adminDao->savePartner( $name, $email, $mobile, $subject, $message1,  $date );
		$id = $saveEnquiry;
		if($saveEnquiry){
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
				<a href='".$baseUrl ."'><img src='".$baseUrl."images/w-logo.webp'></a>
				</div>
				<p>&nbsp;</p>
				<div class='Document'>
				<p> Hi <strong>Click Tab Web</strong>,</p>
				<div class='clearfix'></div>
				<br>
				<p>You have Become a Partner Request</p>
				<div class='clearfix'></div>
				<p><b>Name: <b>".$name."</p><br>
				<p><b>Email:<b> ".$email."</p><br>
				<p><b>Mobile:<b> ".$mobile."</p><br>
				<p><b>Store Name: <b>".$subject."</p><br>
				<p><b>Message: <b>".$message1."</p>
				<div class='clearfix'></div>
				<p>And its duly noted. We really appreciate your effort </p>
				
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class='footer-bottom'>
				<p>Regards
				<br>
				Team Click Tab Web</p>  
				
				</div>
				</div>
				</div>
				</body>
				</html>
				";
				
			$nameFrom = "Click Tab Web ";
			$emailFrom = "info@clicktabweb.com";
			$nameTo = "Click Tab Web";
			$emailTo = "arunkumarg293@gmail.com";				
			$subject = " Thank you for submitting your Become a Partner Request";
			
			
			$adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );
			$_SESSION['contact_message']="Thank you for your Request. Our Support team will contact you soon.";
			header("Location:../become-a-partner");
		}else{
			$_SESSION['contact_message']="Something went Wrong.";
			header("Location:../become-a-partner");
			
		}			
}


if (isset ( $action_type ) && $action_type == "lander") {
    
     $token = $_REQUEST ['token'];
     $url = $_REQUEST ['url'];
     $coupon_id = $_REQUEST ['id'];
	 $name = $_REQUEST ['name'];
	 $email = $_REQUEST ['email'];
	 $mobile = $_REQUEST ['mobile'];
	 
	
		$saveEnquiry = $adminDao->saveLander( $name, $email, $mobile,  $date );
		$id = $saveEnquiry;
		if($saveEnquiry){
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
				<a href='".$baseUrl ."'><img src='".$baseUrl."images/w-logo.webp'></a>
				</div>
				<p>&nbsp;</p>
				<div class='Document'>
				<p> Hi <strong>Click Tab Web</strong>,</p>
				<div class='clearfix'></div>
				<br>
				<p>You have a Lander Request</p>
				<div class='clearfix'></div>
				<p><b>Name:</b> ".$name."</p><br>
				<p><b>Email:</b> ".$email."</p><br>
				<p><b>Mobile:</b> ".$mobile."</p>
				
				<div class='clearfix'></div>
				<p>And its duly noted. We really appreciate your effort </p>
				
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class='footer-bottom'>
				<p>Regards
				<br>
				Team Click Tab Web</p>  
				
				</div>
				</div>
				</div>
				</body>
				</html>
				";
				
			$nameFrom = "Click Tab Web ";
			$emailFrom = "info@clicktabweb.com";
			$nameTo = "Click Tab Web";
			$emailTo = "info@clicktabweb.com";				
			$subject = " Thank you for submitting your Lander Request";
			
            $adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );    
            
			$_SESSION['contact_message']="Thank you for your Request. Our Support team will contact you soon.";
			$landerLink = $adminDao->landerLink();
			//$rurl = explode('/',$landerLink->Link);
			
			$store = $adminDao->ReguserByToken($token);
           
            $categoryById = $adminDao->categoryById($store->Category);
            $click_id="CD_".time()."_Telegram";
            $token = $store->Token;
            
			if(empty($coupon_id)){
			    if($store->OfferType==1){
                $code1="FD_".$store->OfferValue;
               $offer = "Flat ". $store->OfferValue." Cashback";
            } else if($store->OfferType==2){
                 $code1="FP_".$store->OfferValue;
                $offer = "Flat ". $store->OfferValue."% Cashback";
            } else if($store->OfferType==3){
                $code1="UD_".$store->OfferValue;
                $offer = "Upto Rs.". $store->OfferValue." Cashback";
            } else if($store->OfferType==4){
                $code1="UP_".$store->OfferValue;
                $offer = "Upto ". $store->OfferValue."% Cashback";
            } else {
                $code1="";
                $offer ="";
            }
			   $redirection_url=$store->StoreLink.'&p9='.$click_id.'&source='.$token.'&txn_id='.time().'&sale_amount='.'&currency=INR&p8='.urlencode($offer).'&p6=Telegram&p7='.$code1.'&p5=Admin&security_token=CWT20241036'; 
			} else {
			     $couponData = $adminDao->couponById( $coupon_id );
			     // counpon and deals cashback
                if($couponData->OfferType==1){
                        $code1="FD_".$couponData->CouponPrice;
                   $offer1 = "Flat ". $couponData->CouponPrice." Cashback";
                } else if($store1->OfferType==2){
                    $code1="FP_".$couponData->CouponPrice;
                    $offer1 = "Flat ". $couponData->CouponPrice."% Cashback";
                } else if($store1->OfferType==3){
                    $code1="UD_".$couponData->CouponPrice;
                    $offer1 = "Upto Rs.". $couponData->CouponPrice." Cashback";
                } else if($store1->OfferType==4){
                    $code1="UP_".$couponData->CouponPrice;
                    $offer1 = "Upto ". $couponData->CouponPrice."% Cashback";
                } else {
                    $code1="Flat_".$couponData->Cashback;
                    $offer1 = $couponData->Cashback;
                }
			  $redirection_url= $store->StoreLink.'&p9='.$click_id.'&source='.$token.'&txn_id='.time().'&sale_amount='.$couponData->CouponPrice.'&currency=INR&p8='.urlencode($offer).'&p6=Telegram&p7='.$code1.'&p5='.$couponData->CompLink.'&security_token=CWT20241036'; 
			}
			
			header("Location:".$redirection_url);
		}else{
			$_SESSION['contact_message']="Something went Wrong.";
			header("Location:../lander");
			
		}			
}




// if (isset ( $action_type ) && $action_type == "send-enquiry") {

// 	 $name = $_REQUEST ['name'];
// 	 $email = $_REQUEST ['email'];
// 	 $mobile = $_REQUEST ['mobile'];
// 	 $subject = $_REQUEST ['subject'];
// 	 $message1 = $_REQUEST ['message'];	
	
// 		$saveEnquiry = $adminDao->saveEnquiry( $name, $email, $mobile, $subject, $message1,  $date );
// 		$id = $saveEnquiry;
// 		if($saveEnquiry){
// 			$message = "<html><head><link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto' rel='stylesheet'>
// 					<style>
// 					.emailer_holder{
// 						width:100%;
// 						max-width: 600px;
// 						margin: auto;
// 						padding: 0;
// 						background: #ffff;
// 						font-family: 'Roboto', sans-serif;
// 						box-sizing: border-box;
// 						border-top:1px solid #eee;
// 						border-left:1px solid #eee;
// 						border-right:1px solid #eee;
// 					}.emailer_holder>h1{
// 						font-size: 35px;
// 						margin: 0;
// 						padding:25px 0;
// 						color: #333;
// 						text-align: left;
// 					}.emailer_holder h1 span{
// 						font-weight: bold;
// 						color: #00a1d8;
// 					}.emailer_holder .header{
// 						width: 100%;
// 						margin: 0;
// 						padding: 15px 0 15px 15px;
// 						text-align: left;
// 						float: left;
// 						box-sizing: border-box;
// 						border-bottom:3px solid #d74d4d;
// 					}.emailer_holder .header a>img{
// 						width:250px;
// 					}.emailer_holder .header h2{
// 						font-size: 35px;
// 						color: #fff;
// 						margin: 0;
// 						padding: 5px 0;
// 						text-align: center
// 					}.emailer_holder .header p{	
// 						border-top:3px solid #00a1d8;
// 						font-size:13px;
// 						margin: 0;
// 					}.Document thead{
// 						background: #eee;
// 						font-weight: bold;
// 					}.Document tbody td{
// 						font-size: 13px;
// 						font-weight: bold;
// 						padding: 7px 10px;
// 						border:hidden;
// 					}.Document{
// 						width: 100%;
// 						margin: 0;
// 						padding: 0 25px;
// 						float: left;
// 						box-sizing: border-box;
// 					}.Document ul{
// 						margin: 0;
// 						padding:15px 0 15px 25px;
// 						list-style:none;
// 					}.Document ul li{
// 						margin: 0;
// 						padding:0;
// 						display: block;
// 					}.Document>ul>li>a{
// 						margin: 0;
// 						padding:5px 0;
// 						display: inline-block;
// 						font-size: 15px;
// 						color: #0a21c8;
// 						text-decoration: none;
// 						font-weight: bold;
// 					}.Document ul li img{
// 						max-width: 20px;
// 						padding-right:5px; 
// 					}.Document h3{
// 						font-size:13px;
// 						margin: 0;
// 						padding-top:20px;
// 						float:left;		
// 					}.sign{
// 						padding: 0 25px;
// 						margin: 0;
// 					}.sign a>img{
// 						width:200px;
// 					}.sign>p{
// 						font-size: 13px;
// 						margin: 0;
// 						padding: 0;
// 						display: inline-block;
// 					}.clearfix{
// 						clear: both;
// 					}.Document p{
// 						margin: 0;
// 						padding:5px 0 5px 0;
// 						display: inline-block;
// 						font-size: 13px;
// 					}.Document p>a{
// 						text-decoration: none;
// 						color: #666;
// 					}.Document p>strong>a{
// 						text-decoration: none;
// 						color: #0a21c8;
// 					}.Document h6{
// 						font-size:16px;
// 						color: #333;
// 						margin: 0;
// 						padding:8px 0 0 0;
// 					}.Document h1{
// 						float: left;
// 						margin: 0;
// 						padding: 0;
// 						color: #e66c00;
// 					}.Document h1 span{
// 						font-size: 12px;
// 						color: #e66c00;
// 					}.Document em{
// 						font-size: 12px;
// 					}.footer-top{
// 						width: 100%;
// 						margin: 0;
// 						padding: 0 25px;
// 						box-sizing: border-box;
// 					}.footer-top p{
// 						font-size:12px;
// 						text-align: center;
// 						border-bottom: 2px solid #000;  
// 						padding: 10px 0;			
// 					}.footer-bottom{
// 						width: 100%;
// 						margin: 0;
// 						padding: 0 25px;
// 						box-sizing: border-box;
// 						background:#eee;
// 					}.footer-bottom p{
// 					    font-size: 9px;
// 						padding: 15px 0 25px 0;
// 						text-align: left;
// 						color: #000;
// 						line-height: 1.8;
// 					}
// 				</style></head>
// 				<body > 
// 				<div style='background:#e7e7e7;width: 600px;'>
// 				<div class='emailer_holder'>
// 				<div class='header'>
// 				<a href='".$baseUrl ."'><img src='".$baseUrl."assets/images/logo.png'></a>
// 				</div>
// 				<p>&nbsp;</p>
// 				<div class='Document'>
// 				<p> Hi <strong>Frontline Coins USA</strong>,</p>
// 				<div class='clearfix'></div>
// 				<br>
// 				<p>You have a new enquiry</p>
// 				<div class='clearfix'></div>
// 				<p>Name: ".$name."</p>
// 				<p>Email: ".$email."</p>
// 				<p>Mobile: ".$mobile."</p>
// 				<p>Message: ".$message1."</p>
// 				<div class='clearfix'></div>
// 				<p>And its duly noted. We really appreciate your effort </p>
				
// 				</div>
// 				<p>&nbsp;</p>
// 				<p>&nbsp;</p>
// 				<p>&nbsp;</p>
// 				<div class='footer-bottom'>
// 				<p>Regards
// 				<br>
// 				Team Fronline Coin USA</p>  
				
// 				</div>
// 				</div>
// 				</div>
// 				</body>
// 				</html>
// 				";
				
// 			$nameFrom = "Fronline Coin USA ";
// 			$emailFrom = "info@frontlinecoinsusa.com";
// 			$nameTo = "Fronline Coin USA ";
// 			$emailTo = "info@frontlinecoinsusa.com";
// 			$emailTo2 = "pravindubeyppc@gmail.com";
// 			$subject = " Thank you for submitting your Enquiry";
// 			$adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );
// 			$adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo2, $subject, $message );
// 			echo "2";
// 		}else{
// 			echo "3";
			
// 		}			
// }
		
	

?>
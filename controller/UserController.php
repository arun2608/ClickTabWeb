<?php
@ob_start ();
@session_start ();
error_reporting ( 0 ); 
include_once "../cashback-admin/baseurl.php";
// if (! isset ( $_SESSION ['CTW_LoggedUserId'] )) {
// 	header ( "location:$siteUrl" );
// }
include_once '../cashback-admin/controller/Connection.php';
include_once ('../dao/AdminDao.php');
$Connection = new Connection ();
$db = $Connection->getConnection ();
$adminDao = new AdminDao ( $db );
date_default_timezone_set ( "Asia/Kolkata" );
$date = date ( "Y-m-d h:i:s" );
$action_type = $_REQUEST ['action_type'];
$cart_id = $_SESSION['cart_session'] = session_id ();
$user_id = $_SESSION ['CTW_LoggedUserId'];

if (isset ( $action_type ) && $action_type == "update-profile") {
    $id = $_REQUEST ['id'];
	$name = $_REQUEST ['name'];
	$email = $_REQUEST ['email'];
	$mobile = $_REQUEST ['mobile'];
    
    if ($_FILES ['image'] ['tmp_name'] != '') {
        $_img = $_FILES ['image'] ['name'];
        $temp_name = $_FILES ['image'] ['tmp_name'];
        $file_parts = pathinfo($_img);
        $new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
        if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
            move_uploaded_file($temp_name, "../productImage/user/".$new_filename);
        }
    }

		$saveUser = $adminDao->updateProfile($name , $email, $mobile, $new_filename, $date, $id );
		if($saveUser){
			$_SESSION['profile_msg'] = 'Profile updated successfully';
			header('Location:'.$baseUrl.'dashboard.php');
		}else{
			$_SESSION['profile_msg'] = 'Something went Wrong';

			header('Location:'.$baseUrl.'dashboard.php');
		}			
	
}

if (isset($action_type) && $action_type == "register-user") {
    $name = htmlspecialchars(trim($_REQUEST['name']));
    $email = htmlspecialchars(trim($_REQUEST['email']));
    $mobile = htmlspecialchars(trim($_REQUEST['mobile']));
    $referral_code = htmlspecialchars(trim($_REQUEST['referral_code']));
    $password = md5(trim($_REQUEST['password']));//password_hash(trim($_REQUEST['password']), PASSWORD_BCRYPT); // Hash the password
    $date = date("Y-m-d H:i:s");
    $last_four_digits = substr($mobile, -4);
    $first_four_digits = substr($mobile, 0, 4);
    $code = 'CWT' . $first_four_digits . $last_four_digits;
    $token = bin2hex(random_bytes(16)); 
    $my_referral_code = $name . $last_four_digits;
    $otp = rand(100000,999999);
    $checkEmail = $adminDao->checkEmail($email);
    
    if ($checkEmail) {
        echo "1"; 
    } else {
        $saveUser = $adminDao->saveUser($name, $email, $mobile, $referral_code, $my_referral_code, $password, $token, $code, $otp, $date);
        
        $sub_id= $code;
        $compaign_token="Sign Up Cashback";
        $order_id = time();
        $user_id = $saveUser;
        $store_id="";
        $ctw_order_id = $code;
        $cashback = "10";
        $wallet = $adminDao->saveTransactionReport2($user_id, $order_id, $compaign_token, $sub_id, $store_id, $ctw_order_id, $cashback);
        
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
				<p> Dear <strong>".$name."</strong>,</p>
				<div class='clearfix'></div>
				<br>
				<p>Your account has been created. Please verify the email by clicking the link below</p>
				<div class='clearfix'></div>
				<p> <a href='".$baseUrl."controller/confirmation.php?action_type=verify-email&email=".$email."&otp=".$otp."' style='color: #2d73dc;'>Click Here</a>.</p>
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
			$nameTo = $name;
			$emailTo = $email;				
			$subject = "Click Tab Web Account created";
			
			
			$adminDao->sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message );
        echo "2"; 
    }
}

if (isset ( $action_type ) && $action_type == "authenticate-user") {
	$login_email = $_REQUEST ['login_email'];
	$login_password = md5(trim($_REQUEST['login_password']));//$_REQUEST ['login_password'];
	
	$checkEmailLogin = $adminDao->checkEmailLogin ($login_email );
	if($checkEmailLogin){
    	$isValidUser = $adminDao->isAuthenticateUser ($login_email, $login_password );
    	if ($isValidUser) {
    	    $_SESSION ['CTW_LoggedUserId'] = $isValidUser->Id;
    		$_SESSION ['CTW_LoggedUserName'] = $isValidUser->Name;
    	    $_SESSION ['CTW_LoggedUserEmail'] = $isValidUser->Email;
    		echo "1";
    	} else {
    		echo "2";
    	}
	}else{
	    echo "3";
	}
}

if (isset($action_type) && $action_type == "reset-password") {
    $forgot_email = $_REQUEST['forgot_email'];
    $new_password = $_REQUEST['new_password'];
    $reset_code = $_REQUEST['reset_code'];
    $checkEmail = $adminDao->checkEmail($forgot_email);
    if ($checkEmail) {
        $checkCode = $adminDao->checkResetCode($reset_code,$forgot_email);
        if ($checkCode) {
            $resetPassword = $adminDao->resetPassword($forgot_email, $new_password, $reset_code);
            if ($resetPassword) {
                echo "1"; 
            }else{
                echo "2";
            }
        }else{
            echo "3";
        }
    }else{
        echo "4";
    }
}


if (isset($action_type) && $action_type == "missing-report") {
    $order_id = $_REQUEST['order_id'];
    $transaction_date = $_REQUEST['transaction_date'];
    $order_amount = $_REQUEST['order_amount'];
    $store_id = $_REQUEST['store_id'];
    $coupon_id = $_REQUEST['coupon_id'];
    $source = $_REQUEST['source'];
    $other_detail = $_REQUEST['other_detail'];
    $saveMissingReport = $adminDao->saveMissingReport($user_id, $order_id, $transaction_date, $order_amount, $store_id, $coupon_id, $source, $other_detail, $date);
    if($saveMissingReport){
     header('Location:'.$baseUrl.'missing-report.php');
    }
}

if (isset($action_type) && $action_type == "withdrawl-money") {
    $user_id =  $_SESSION ['CTW_LoggedUserId'];
    $withdraw_id = rand(100000,9999999);
    $amount = $_REQUEST['amount'];
    $transaction_mode = $_REQUEST['transaction_mode'];
    $upi_id = $_REQUEST['upi_id'];
    $account_number = $_REQUEST['account_number'];
    $ifsc_code = $_REQUEST['ifsc_code'];
    $account_holder_name = $_REQUEST['account_holder_name'];
    $reference = $_REQUEST['reference'];
    $saveMissingReport = $adminDao->saveWithdrawRequest($user_id, $withdraw_id, $amount, $transaction_mode, $upi_id, $account_number, $ifsc_code, $account_holder_name, $reference, $date);
    if($saveMissingReport){
     header('Location:'.$baseUrl.'wallet.php');
    }
}


if (isset($action_type) && $action_type == "save-support") {
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $saveSupport = $adminDao->saveSupport($user_id, $title, $description, $date);
    if($saveSupport){
     header('Location:'.$baseUrl.'supportlist.php');
    }
}



if (isset ( $action_type ) && $action_type == "forgot-password") {
	$email = $_REQUEST ['forgot_email'];
	
	$checkEmailLogin = $adminDao->checkEmailLogin ($email);
	if($checkEmailLogin){
	    $otp = rand(000000,999999);
	    $adminDao->updateResetPasswordOtp($otp, $checkEmailLogin->Id);
	    
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
				<p> Dear <strong>".$checkEmailLogin->Name."</strong>,</p>
				<div class='clearfix'></div>
				<br>
				<p>Your account reset code is $otp. Please click on below link to reset your password.</p>
				<div class='clearfix'></div>
				<p> <a href='".$baseUrl."reset-password' style='color: #2d73dc;'>Click Here</a>.</p>
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
			$nameTo = $name;
			$emailTo = $email;				
			$subject = "Reset Password";
			
			
			$adminDao->sendMail( $nameFrom, $emailFrom, $checkEmailLogin->Name, $checkEmailLogin->Email, $subject, $message );
			echo "1";
	}else{
	    echo "2";
	}
}


?>
<?php
@ob_start ();
@session_start ();
error_reporting ( 0 ); 
include_once "admin/baseurl.php";
include_once 'admin/controller/Connection.php';
include_once ('dao/AdminDao.php');
$Connection = new Connection ();
$db = $Connection->getConnection ();
$adminDao = new AdminDao ( $db );
date_default_timezone_set ( "Asia/Kolkata" );
$date = date ( "Y-m-d h:i:s" );

$action_type = $_REQUEST ['action_type'];


if (isset ( $action_type ) && $action_type == "verify-email") {
	$email = $_REQUEST ['email'];
	$otp = $_REQUEST ['otp'];	
	$checkOtp = $adminDao->verifyEmailByOtp( $email, $otp );
	if ($checkOtp) {
		$updateVerifyStatus = $adminDao->updateVerifyStatus( $checkOtp->Id, $email, $otp );	
		if($updateVerifyStatus){
			$_SESSION ['Sumanya_LoggedUserId'] = $checkOtp->Id;
			$_SESSION ['Sumanya_LoggedUserName'] = $checkOtp->Fname;	
			$url = $siteUrl."profile/";			
			header("location:$url");
		}else{
			echo '<script>alert("Try again later.");window.location.href="'.$siteUrl.'";</script>';
		}
	} else {
		echo '<script>alert("Your account already active.");window.location.href="'.$siteUrl.'";</script>';
	}
}
?>
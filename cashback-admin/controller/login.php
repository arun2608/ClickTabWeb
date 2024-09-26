<?php
@ob_start ();
@session_start ();
error_reporting(0);
include_once 'Connection.php';
include_once '../dao/LoginDao.php';
$Connection = new Connection ();
$db = $Connection->getConnection ();
$loginDao = new LoginDao ( $db );
$actionType = $_REQUEST ['actionType'];
if (isset ( $actionType ) && $actionType == "sitelogin") {
	$username = $_REQUEST ['username'];
	$password = $_REQUEST ['password'];
	$isValidUser = $loginDao->isAuthenticateUser ( $username, $password );
	if ($isValidUser) {
		$_SESSION ['AdminLoggedId'] = $isValidUser->Id;
		$_SESSION ['AdminLoggedUserName'] = $isValidUser->UserName;
		$_SESSION ['AdminLoggedName'] = $isValidUser->Name;
		echo "exist";
	} else {
		echo "fail";
	}

}

?>
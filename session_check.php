<?php
@ob_start ();
@session_start ();
error_reporting ( 0 );
$CTW_LoggedUserId = $_SESSION['CTW_LoggedUserId'];
include_once "cashback-admin/baseurl.php";
$loginUrl = $baseUrl . 'register';
if (! isset ( $_SESSION ['CTW_LoggedUserId'] )) {
	header ( "location:$loginUrl" );
}
?>
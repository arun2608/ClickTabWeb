<?php
@ob_start ();
@session_start ();
error_reporting ( 0 );
$adminLoggedId = $_SESSION['AdminLoggedId'];
include_once "baseurl.php";
$loginUrl = $siteUrl . 'admin-login';
if (! isset ( $_SESSION ['AdminLoggedId'] )) {
	header ( "location:$loginUrl" );
}
?>
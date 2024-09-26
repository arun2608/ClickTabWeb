<?php 
@ob_start();
@session_start();
error_reporting(0); 
require_once 'cashback-admin/baseurl.php';
require_once 'cashback-admin/controller/Connection.php';
require_once 'dao/AdminDao.php';
$Connection = new Connection();
$db = $Connection->getConnection ();
$adminDao = new AdminDao($db);
$cart_id = session_id();
date_default_timezone_set ( "Asia/Kolkata" );
$date = date ( "Y-m-d H:i:s" );
$date_time = date ( "Y-m-d H:i:s" );
//$client_id = $_SESSION['authenticateEarth_ClientId'];
//$clientData = $adminDao->clientById($client_id);

?>
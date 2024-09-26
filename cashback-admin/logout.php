<?php
error_reporting(0);
session_start(); 
session_destroy(); 
include_once 'session_check.php';
$AdminLoggedId = $_SESSION ['AdminLoggedId'];
if (! isset ( $_SESSION ['AdminLoggedId'] )) {
	header("location:admin-login");
}exit();
?>
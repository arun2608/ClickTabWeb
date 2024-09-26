<?php
include "admin-lib.php";
include "header.php";
error_reporting(0);
session_start();
session_destroy(); 
include_once 'session_check.php';
header("Location: {$baseUrl}");
exit(); 
?>

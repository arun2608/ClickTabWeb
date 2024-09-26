<?php 
include_once 'session_check.php';
require_once 'controller/Connection.php';
require_once 'dao/AdminDao.php';
$Connection = new Connection();
$db = $Connection->getConnection ();
$adminDao = new AdminDao($db);
?>
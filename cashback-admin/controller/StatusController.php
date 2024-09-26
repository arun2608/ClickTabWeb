<?php
require_once '../session_check.php';
require_once 'Connection.php';
require_once '../dao/AdminDao.php';

$Connection = new Connection ();
$db = $Connection->getConnection();
$adminDao = new AdminDao ($db);

date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d H:i:s");
$action_type = $_REQUEST ['action_type'];

/*--------------------------------Banner----------------------------------------*/

if ($action_type == "banner-status") {
    $id = $_REQUEST['id'];	
	$status = $_REQUEST['status'];	
	$type = $_REQUEST['type'];
    $adminDao->updateBannerStatus( $status, $date, $id );   
    if($type=="Banner"){
        header("location:../banner");
	} else {
	    header("location:../home-page-banners"); 
	}
}


if (isset ( $action_type ) && $action_type == "site-control-status") {
	$id = $_REQUEST ['id'];
	$status = $_REQUEST ['status'];
	$adminDao->siteControlStatus( $status, $date, $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "college-status") {
	$id = $_REQUEST ['id'];
	$status = $_REQUEST ['status'];
	$adminDao->collegeStatus( $status, $date, $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "delete-college") {
	$id = $_REQUEST ['id'];
	$product_image = $_REQUEST ['product_image'];
	$deleteProduct = $adminDao->deleteCollege( $id );
	if($deleteProduct){
		$p_image = "../../productImage/college/".$product_image;
		unlink($p_image);
	
		$productImageList = $adminDao->collegeImageListByCollegeId($id);
		if($productImageList){
			foreach($productImageList AS $productImage){
				$product_image = "../../productImage/college/".$productImage->Image;
				unlink($product_image);
			}
		}
		$adminDao->deleteCollegeImage( $id );
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}


if (isset ( $action_type ) && $action_type == "delete-college-image") {
	$id = $_REQUEST ['id'];
	$product_image = $_REQUEST ['product_image'];
	$deleteProduct = $adminDao->deleteCollegeImageById( $id );
	if($deleteProduct){
		$p_image = "../../productImage/college/".$product_image;
		unlink($p_image);			
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}


if (isset ( $action_type ) && $action_type == "blog-status") {
	$id = $_REQUEST ['id'];
	$status = $_REQUEST ['status'];
	$adminDao->blogStatus( $status, $date, $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "delete-blog") {
	$id = $_REQUEST ['id'];
	$adminDao->deleteBlog( $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "delete-testimonial") {
	$id = $_REQUEST ['id'];
	$adminDao->deleteTestimonial( $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} 

if (isset ( $action_type ) && $action_type == "delete-user") {
	$id = $_REQUEST ['id'];
	$adminDao->deleteUser( $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "user-status") {
	$id = $_REQUEST ['id'];
	$status = $_REQUEST ['status'];
	$adminDao->userStatus( $status, $date, $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}


if (isset ( $action_type ) && $action_type == "delete-budget") {
	$id = $_REQUEST ['id'];
	$adminDao->deletePredictor( $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "delete-reguser") {
	$id = $_REQUEST ['id'];
	$adminDao->deleteReguser( $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "home-category-status") {
	$id = $_REQUEST ['id'];
	$status = $_REQUEST ['status'];
	$adminDao->homeCategoryProductStatus( $status, $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset ( $action_type ) && $action_type == "coupon-status") {
	$id = $_REQUEST ['id'];
	$status = $_REQUEST ['status'];
	$adminDao->couponStatus( $status, $date, $id );
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
<?php
@ob_start();
@session_start();
error_reporting(0);
require_once '../session_check.php';
require_once 'Connection.php';
require_once '../dao/AdminDao.php';
$Connection = new Connection ();
$db = $Connection->getConnection();
$adminDao = new AdminDao ($db);
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d H:i:s");
$image_date = date("YmdHis");
include_once "baseurl.php";

$action_type = $_REQUEST ['action_type'];


if (isset ( $action_type ) && $action_type == "update-banner") {
    $id = $_REQUEST['id'];	
    $type = $_REQUEST['type'];
	$text_1 = $_REQUEST['text_1'];	
	$text_2 = $_REQUEST['text_2'];
    $link = $_REQUEST['link'];	
    $updateBanner = $adminDao->updateBanner( $text_1, $text_2, $link, $date, $id );
	if($updateBanner){
		if ($_FILES ['image'] ['tmp_name'] != '') {
			$_img = $_FILES ['image'] ['name'];
			$temp_name = $_FILES ['image'] ['tmp_name'];
			$file_parts = pathinfo($_img);
			$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
			if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
				move_uploaded_file($temp_name, "../../productImage/banner/".$new_filename);
				$adminDao->updateBannerImage( $new_filename, $id );
			}
		}
	}
	if($type=="Banner"){
    header("location:../banner");
	} else {
	   header("location:../home-page-banners"); 
	}
}


if (isset ( $action_type ) && $action_type == "update-popular-brands") {
    $id = $_REQUEST['id'];
    $popular_brand = serialize($_REQUEST['popular_brand']);	
    $updateBanner = $adminDao->updatePopularBrands( $popular_brand, $id );
    header("location:../edit-popular-brand"); 
}

if (isset ( $action_type ) && $action_type == "update-cashback-brands") {
    $id = $_REQUEST['id'];
    $popular_brand = serialize($_REQUEST['popular_brand']);	
    $updateBanner = $adminDao->updatePopularBrands( $popular_brand, $id );
    header("location:../cashback-brand"); 
}

if (isset ( $action_type ) && $action_type == "update-lander") {
    $id = $_REQUEST['id'];	
    $type = $_REQUEST['type'];
	$text_1 = $_REQUEST['text_1'];	
	$text_2 = $_REQUEST['text_2'];
    $link = $_REQUEST['link'];	
    $updateBanner = $adminDao->updateLander( $link, $id );
    header("location:../edit-lander-link"); 
}

if (isset ( $action_type ) && $action_type == 'update-trans-status') {
    $id = $_REQUEST['id'];	
    $status = $_REQUEST['status'];
	
    $updateBanner = $adminDao->updateTransStatus( $status, $id );
	echo 1;
   
	
}

if (isset ( $action_type ) && $action_type == 'update-missing-status') {
    $id = $_REQUEST['id'];	
    $status = $_REQUEST['status'];
	
    $updateBanner = $adminDao->updateMissingStatus( $status, $id );
	echo 1;
   
	
}

if (isset ( $action_type ) && $action_type == 'update-withdraw-status') {
    $id = $_REQUEST['id'];	
    $status = $_REQUEST['status'];
	
    $updateBanner = $adminDao->updateWithdrawStatus( $status, $id );
	echo 1;
    //header("location:../");
	
}

if (isset ( $action_type ) && $action_type == "create-category") {
	$type = $_REQUEST['type'];
	$category = $_REQUEST['category'];
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $category);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	
	$checkCategory = $adminDao->checkCategory( $type, $category );	
	if($checkCategory){
		echo "1";
	}else{
		$saveCategory = $adminDao->saveCategory($type, $category, $url, $title, $meta_keyword, $meta_description, $date );	
		if($saveCategory){
			$id = $saveCategory;
			if ($_FILES ['file_1'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateCategoryImage( "banner", $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_2'] ['name'];
				$temp_name = $_FILES ['file_2'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateCategoryImage( "category_image", $new_filename, $id );
				}
			}
			echo "2";
		}else{
			echo "3";
		}
	}
}




if (isset($action_type) && $action_type == "category-export") {
    ob_clean();
    $categoryList = $adminDao->categoryList();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="category_data.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');

    fputcsv($output, [ 'Type', 'Category', 'Banner Image', 'Category Image', 'Date', 'Status']);

    foreach ($categoryList as $category) {
        fputcsv($output, [
            $category->Type,
            $category->Category,
            $imageUrl . "category/" . $category->BannerImage,
            $imageUrl . "category/" . $category->CategoryImage,
            $category->Date,
            $category->Status
        ]);
    }

    fclose($output);
    exit;
}



if (isset($action_type) && $action_type == "store-export") {
    ob_clean();
    $Reguserlist = $adminDao->ReguserList();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="store_data.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Category', 'Name', 'Image', 'Com Status', 'Com Trending', 'Deeplink', 'Com Offer Title', 'Com Meta Title', 'Offer Type', 'Offer Value', 'Default Tracking', 'Estimated Cashback Date', 'Average Tracking Speed', 'Average Claim Time', 'Description', 'Cashback Rate', 'Link','Date','Status']);
    foreach ($Reguserlist as $coupon) {
    $categorydata = $adminDao->categoryById($coupon->CategoryId);
        fputcsv($output, [
            $categorydata->Category, 
            $coupon->Name,
            $coupon->Image,
            $coupon->Com_Status,
            $coupon->Com_Trending,
            $coupon->Deeplink,
            $coupon->Com_Offer_Title,
            $coupon->Com_Meta_Title,
            $coupon->OfferType,
            $coupon->OfferValue,
            $coupon->Default_Tacking,
            $coupon->Esti_Cashback_Date,
            $coupon->Avg_Tracking_Speed,
            $coupon->Avg_Claim_Time,
            $coupon->Description,
            $coupon->Cashback_Rate,
            $coupon->Link,
            $coupon->Date,
            $coupon->Status
        ]);
    }
    
    fclose($output);
    exit;
}


if (isset($action_type) && $action_type == "store-samplefile") {
    ob_clean();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="store_data_sample.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Name', 'Image', 'Com Offer Title', 'Com Meta Title', 'Offer Type', 'Offer Value', 'Default Tracking', 'Estimated Cashback Date', 'Average Tracking Speed', 'Average Claim Time', 'Cashback Rate', 'Link', 'Description']);
    fputcsv($output, [
        'Sample Name',
        'sample-image.jpg',
        'Sample Offer Title',
        'Sample Meta Title',
        '2',
        '10%',
        'Yes',
        '2024-09-30',
        '2 days',
        '1 week',
		'5%',
        'http://example.com/sample-link',
        'This is a sample description.'
      
    ]);
    fclose($output);
    exit;
}

if (isset($action_type) && $action_type == "store-import") {

	$category = $_REQUEST ['category'];
	if ($_FILES ['import_store'] ['tmp_name'] != '') {
		$file = $_FILES["import_store"]["tmp_name"];
		$file_open = fopen($file,"r");
		$count = 0;
		while(($csv = fgetcsv($file_open, 1000, ",")) !== false){	
			if($count!=0){			
				$name = $csv[0];
				$image = $csv[1];
				$com_offer_title = $csv[2];
				$com_meta_title = $csv[3];
				$offer_type = $csv[4];
				$offer_value = $csv[5];
				$default_tracking = $csv[6]; 
				$esti_cashback_date = $csv[7];
				$avg_tracking_speed = $csv[8];
				$avg_claim_time = $csv[9];
				$cashback_rate = $csv[10];
				$link = $csv[11];
				$description = $csv[12]."\n";			
				$chars = ["!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s"];
				$urlValue = str_replace($chars, "-", $com_meta_title);
				$slug = strtolower(trim($urlValue, "-"));
				$token = bin2hex(random_bytes(16));
				$com_status = 1; 
				$com_trending = 1;
				$com_deeplink = 1; 
				$date = date('Y-m-d H:i:s');
				
				$saveReguser = $adminDao->saveReguser($category, $name, $image, $com_status, $com_trending, $com_deeplink, $com_offer_title, $com_meta_title, $offer_type, $offer_value, $default_tracking, $esti_cashback_date, $avg_tracking_speed, $avg_claim_time, $cashback_rate, $link, $slug, $token, $description, $date);
			}
			$count++;
          }
	     }
	if($saveReguser){
        header("Location: ../reguser/");
	}else{
        header("Location: ../reguser/import-reguser");
	}	

   
}


if (isset($action_type) && $action_type == "coupon-export") {
    ob_clean(); 
    $couponlist = $adminDao->couponList();  
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="coupon_data.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, [
        'Category', 'Type',  'Coupon Heading', 'Store', 'Coupon Code', 'Coupon Excerpt', 'Cashback Amount', 'MRP',  'Coupon Price',  'Order Amount',  'Coupon User', 'Coupon Start Date', 'Coupon End Date',  'Campaign Link', 'Image', 'Handpicked', 'Offer Type', 'Offer', 'Top 20', 'Verified', 'Link',  'Content1',  'Content2', 'Content3', 'Date', 'Status'
    ]);
    foreach ($couponlist as $coupon) {
        $categorydata = $adminDao->categoryById($coupon->Category);
        $storedata = $adminDao->ReguserById($coupon->Store);
        fputcsv($output, [
            $categorydata->Category, 
            $coupon->Type,
            $coupon->CouponHeading, 
            $storedata->Name, 
            $coupon->CouponCode, 
            $coupon->CouponExcerpt, 
            $coupon->CashbackAmt, 
            $coupon->MRP, 
            $coupon->CouponPrice, 
            $coupon->OrderAmount, 
            $coupon->CouponUser, 
            $coupon->CouponStartDate, 
            $coupon->CouponEndDate, 
            $coupon->CompaignLink, 
            $coupon->Image, 
            $coupon->Handpicked, 
            $coupon->OfferType, 
            $coupon->Offer, 
            $coupon->Top20, 
            $coupon->Verified, 
            $coupon->Link, 
            $coupon->Content1, 
            $coupon->Content2, 
            $coupon->Content3, 
            $coupon->Date, 
            $coupon->Status
        ]);
    }
    fclose($output);
    exit;
}
if (isset($action_type) && $action_type == "coupon-samplefile") {
    ob_clean(); 
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="coupon-samplefile.csv"'); // Ensure the filename has .csv extension
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');
    fputcsv($output, [
        'Coupon Heading','Coupon Excerpt', 'Coupon Code','Cashback Amount', 'MRP', 'Coupon Price','Order Amount', 'Coupon User','Coupon Start Date', 'Coupon End Date','Campaign Link','Image','Handpicked','Offer Type(FD=1,FP=2, UD=3, UP=4)', 'Cahsback', 'Top 20', 'Verified', 'Link', 'Content1', 'Content2','Content3',
    ]);
    fputcsv($output, [
        'Sample Offer Title', 
        'Get 10% off on your first purchase!', 
		'SAMPLECODE123',
        '10%',                
        '100.00',            
        '90.00',             
        '50.00',             
        'User123',            
        '2024-09-01',         
        '2024-12-31',         
        'http://example.com/campaign', 
        'http://example.com/campaign/sample-image.jpg',   
        'Yes',                
        '2',         
        '10',            
        'Yes',                
        'Yes',                
        'http://example.com/sample-link',
        'This is a sample description for Content1.', 
        'This is a sample description for Content2.', 
        'This is a sample description for Content3.'  
    ]);
    fclose($output); 
    exit; 
}


if (isset ( $action_type ) && $action_type == "import-coupon") {
	$type = $_REQUEST ['type'];
	$category = $_REQUEST ['category'];
	$store = $_REQUEST ['store'];
	if ($_FILES ['import_coupon'] ['tmp_name'] != '') {
		$file = $_FILES["import_coupon"]["tmp_name"];
		$file_open = fopen($file,"r");
		$count = 0;
		while(($csv = fgetcsv($file_open, 1000, ",")) !== false){	
			if($count!=0){			
				$coupon_heading = $csv[0];
				$coupon_excerpt = $csv[1];
				$coupon_code = $csv[2];
				$offer_type = $csv[3];
				$coupon_price = $csv[4];
				$cashback_amt = $csv[5];
				$mrp = $csv[6]; 
				$image = $csv[7];
				$order_amount = $csv[8];
				$coupon_user = $csv[9];
				$coupon_start_date = $csv[10];
				$coupon_end_date = $csv[11];
				$comp_link = $csv[12];
				$top20 = $csv[13];
				$verified = $csv[14];
				$link = $csv[15];
				$content1 = $csv[16];
				$content2 = $csv[17];
				$content3 = $csv[18]."\n";			
				$chars = ["!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s"];
				$urlValue = str_replace($chars, "-", $coupon_heading);
				$slug = strtolower(trim($urlValue, "-"));
				$token = bin2hex(random_bytes(16));
				$com_status = 1; 
				$com_trending = 1;
				$com_deeplink = 1; 
				$date = date('Y-m-d H:i:s');
			    $saveCoupon = $adminDao->saveCoupon( $type, $category, $store,  $coupon_heading, $coupon_excerpt, $coupon_code, $offer_type, $coupon_price, $cashback_amt , $mrp, $image, $order_amount, $coupon_user, $coupon_start_date, $coupon_end_date,$comp_link, $handpicked, $top20, $offer, $verified, $link, $content1, $content2, $content3, $slug, $date );
			   }
			$count++;
            }
	     }
	if($saveCoupon){
        header("Location: ../coupon/");
	}else{
        header("Location: ../coupon/import-coupon");
	}	


}

if (isset($action_type) && $action_type == "user-export") {
    ob_clean();
    $userdata = $adminDao->userList();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="user_data.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Name', 'Code', 'Email', 'Mobile', 'ReferralCode', 'MyRefCode', 'Date']);
    foreach ($userdata as $user) {
        fputcsv($output, [
            $user->Name,
            $user->Code,
            // $user->Token,
            $user->Email,
            $user->Mobile,
            $user->ReferralCode,
            $user->MyRefCode,
            $user->Date
        ]);
    }
    
    fclose($output);
    exit;
}


if (isset($action_type) && $action_type == "withdrawl-export") {
    ob_clean();
	$type = $_REQUEST['type'];
    $missingreport = $adminDao->withdrawlReport($type);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="withdrawl_data.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Transaction Mode', 'Acoount No.', 'IFSC Code','Acoount Holder Name','UPI Id','Name', 'Amount', 'Mobile', 'Date', 'Status']);
    foreach ($missingreport as $report) {
        if($report->status==0){
            $status="Pending";
        } else if($report->status==1){
            $status="Success";
        } else {
            $status="Reject";
        }
		$userdata = $adminDao->registerById($report->user_id); 
        fputcsv($output, [
            $report->id,
            $report->transaction_mode,
            $report->account_number,
            $report->ifsc_code,
            $report->account_holder_name,
            $report->upi_id,
            $userdata->Name,
			$report->amount,
            $userdata->Mobile,
            $report->date,
            $status
        ]);
    }
    fclose($output);
    exit;
}


if (isset($action_type) && $action_type == "withdrawl-bulk-updates") {

	if ($_FILES['import_file']['tmp_name'] != '') {
		$file = $_FILES["import_file"]["tmp_name"];
		$file_open = fopen($file,"r");
		$count = 0;
		while(($csv = fgetcsv($file_open, 1000, ",")) !== false){	
		 
			if($count!=0){			
				$id = $csv[0];
				$status = $csv[10];
				if($status=="Pending"){
				    $stat=0;
				}
				if($status=="Success"){
				    $stat=1;
				}
				if($status=="Reject"){
				    $stat=2;
				}
				$transactionBulkUpdates = $adminDao->updateWithdrawStatus($stat, $id);
				echo "<br>";
			}
			$count++;
          } 
	     }

         header("Location: ../import-bulk-withdrawl");
   
}



// if (isset($action_type) && $action_type == "withdrawl-export") {
//     ob_clean();
// 	$type = $_REQUEST['type'];
//     $missingreport = $adminDao->withdrawlReport($type);
//     header('Content-Type: text/csv');
//     header('Content-Disposition: attachment; filename="withdrawl_data.csv"');
//     header('Pragma: no-cache');
//     header('Expires: 0');
//     $output = fopen('php://output', 'w');
//     fputcsv($output, ['Transaction Mode', 'Account No.', 'IFSC Code','Acoount Holder Name','UPI Id','Name', 'Amount', 'Mobile', 'Status', 'Date']);
//     foreach ($missingreport as $report) {
// 		$userdata = $adminDao->registerById($report->user_id); 
//         fputcsv($output, [
//             $report->transaction_mode,
//             $report->account_number,
//             $report->ifsc_code,
//             $report->account_holder_name,
//             $report->upi_id,
//             $userdata->Name,
// 			$report->amount,
//             $userdata->Mobile,
// 			$report->status,
//             $report->date
//         ]);
//     }
//     fclose($output);
//     exit;
// }




if (isset($action_type) && $action_type == "missing-report-export") {
    ob_clean();
	$type = $_REQUEST['type'];
	$missingreport = $adminDao->missingReportList();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="missing-report-export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Order Id', ' Account No.', 'Store Name','Coupon Code','Name','Transaction Id', 'Order Amount','Date']);
    foreach ($missingreport as $report) {
		$userdata = $adminDao->registerById($report->user_id); 
		$storedata = $adminDao->ReguserById($report->StoreId);
		$coupondata = $adminDao->CouponById($report->CouponId);
        fputcsv($output, [
            $report->OrderId,
            $report->account_number,
            $storedata->Name,
            $coupondata->CouponCode,
            $userdata->Name,
			$report->TransactionDate,
            $report->OrderAmount,
			$report->Date
        ]);
    }
    fclose($output);
    exit;
}


if (isset($action_type) && $action_type == "click-report-export") {
    ob_clean();
	$type = $_REQUEST['type'];
	$clickReport = $adminDao->clickReport();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="click-report-export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Sub Id', 'UID', 'OrderId','Compaingn Name','Sale Amount ','Currency Id', ' Reference Link','Cashback','Date']);
    foreach ($clickReport as $report) {
        fputcsv($output, [
            $report->sub_id,
            $report->ctw_order_id,
            $report->order_id,
            $report->campaign_name,
            $report->sale_amount,
			$report->currency,
            $report->refernce_link,
			$report->cashback,
			$report->date
        ]);
    }
    fclose($output);
    exit;
}



if (isset($action_type) && $action_type == "transaction-report-export") {
    ob_clean();
	$type = $_REQUEST['type'];
	$clicktransaction = $adminDao->transactionReport();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="transaction-report-export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    fputcsv($output, [ 'ID', 'UID','Sub Id', 'OrderId','Store Name','Transaction Date ','Amount','Date','Status']);
    foreach ($clicktransaction as $report) {
        if($report->uid!=="Sign Up Cashback"){
        if($report->status==0){
            $status="Pending";
        } else if($report->status==1){
            $status="Success";
        } else {
            $status="Reject";
        }
		$userdata = $adminDao->registerById($report->user_id); 
        $storedata = $adminDao->ReguserById($report->store_id);
        fputcsv($output, [
            $report->id,
            $report->uid,
            $report->sub_id,
            $report->order_id,
            $storedata->Name,
			$report->trans_date,
			$report->amount,
			$report->date,
			$status
        ]);
    }
    }
    fclose($output);
    exit;
}


if (isset($action_type) && $action_type == "transaction-bulk-updates") {

	if ($_FILES['import_file']['tmp_name'] != '') {
		$file = $_FILES["import_file"]["tmp_name"];
		$file_open = fopen($file,"r");
		$count = 0;
		while(($csv = fgetcsv($file_open, 1000, ",")) !== false){	
		 
			if($count!=0){			
				$id = $csv[0];
				$status = $csv[8];
				if($status=="Pending"){
				    $stat=0;
				}
				if($status=="Success"){
				    $stat=1;
				}
				if($status=="Reject"){
				    $stat=2;
				}
				$transactionBulkUpdates = $adminDao->updateTransStatus($stat, $id);
				echo "<br>";
			}
			$count++;
          } 
	     }

         header("Location: ../transaction-report");
   
}


if (isset($action_type) && $action_type == "import-offline-transaction") {

	if ($_FILES['import_file']['tmp_name'] != '') {
		$file = $_FILES["import_file"]["tmp_name"];
		$file_open = fopen($file,"r");
		$count = 0;
	
		while(($csv = fgetcsv($file_open, 1000, ",")) !== false){	
		 	$ReguserByToken = $adminDao->ReguserByToken($csv[0]);
			if($count!=0){	
			    $user_id =0;
				$order_id = $csv[1];
				$uid = "NA";
				$sub_id = $csv[0];
				$store_id  = $ReguserByToken->Id;
				$ctw_order_id = "NA";
				$trans_date = $csv[2];
				$amount = $csv[3];
				$date = date('Y-m-d H:i:s');
				$status = $csv[4];
				if($status=="Pending"){
				    $stat=0;
				}
				if($status=="Success"){
				    $stat=1;
				}
				if($status=="Reject"){
				    $stat=2;
				}
				$transactionBulkUpdates = $adminDao->saveTransactionReport($user_id, $order_id, $uid, $sub_id, $store_id, $ctw_order_id, $amount, $stat, $date);
				echo "<br>";
			}
			$count++;
          } 
	     }

         header("Location: ../transaction-report");
   
}




if (isset ( $action_type ) && $action_type == "update-category") {
	$type = $_REQUEST['type'];
	$category = $_REQUEST['category'];
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];	
	$id = $_REQUEST['id'];
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $category);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	
	$checkCategory = $adminDao->checkCategoryById( $type, $category, $id );	
	if($checkCategory){
		echo "1";
	}else{
		$updateCategory = $adminDao->updateCategory( $type, $category, $url, $title, $meta_keyword, $meta_description, $date, $id );	
		if($updateCategory){
			if ($_FILES ['file_1'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateCategoryImage( "banner", $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_2'] ['name'];
				$temp_name = $_FILES ['file_2'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateCategoryImage( "category_image", $new_filename, $id );
				}
			}
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "create-subcat") {
	$category = $_REQUEST['category'];
	$subcat = $_REQUEST['subcat'];
	
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];	
	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $subcat);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	
	$checkSubCat = $adminDao->checkSubcat( $category, $subcat );	
	if($checkSubCat){
		echo "1";
	}else{
		$saveSubCat = $adminDao->saveSubCat( $category, $subcat, $url, $title, $meta_keyword, $meta_description, $date );	
		if($saveSubCat){
			$id = $saveSubCat;
			if ($_FILES ['file_1'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateSubcatImage( "banner", $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_2'] ['name'];
				$temp_name = $_FILES ['file_2'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateSubcatImage( "category_image", $new_filename, $id );
				}
			}
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-subcat") {
	$category = $_REQUEST['category'];
	$subcat = $_REQUEST['subcat'];
	$id = $_REQUEST['id'];
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];	
	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $subcat);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	
	$checkSubCat = $adminDao->checkSubcatById( $category, $subcat, $id );	
	if($checkSubCat){
		echo "1";
	}else{
		$updateSubCat = $adminDao->updateSubCat( $category, $subcat, $url, $title, $meta_keyword, $meta_description, $date, $id );	
		if($updateSubCat){
			if ($_FILES ['file_1'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateSubcatImage( "banner", $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_2'] ['name'];
				$temp_name = $_FILES ['file_2'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/category/".$new_filename);
					$adminDao->updateSubcatImage( "category_image", $new_filename, $id );
				}
			}
			echo "2";
		}else{
			echo "3";
		}
	}
}


if (isset ( $action_type ) && $action_type == "create-brand") {
	$brand = $_REQUEST['brand'];
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];	
	$type = 1;	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $brand);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	$checkBrand = $adminDao->checkBrand( $brand );	
	if($checkBrand){
		echo "1";
	}else{
		$saveBrand = $adminDao->saveBrand( $brand, $url, $title, $meta_keyword, $meta_description, $date );	
		if($saveBrand){

			$id = $saveBrand;
			if ($_FILES ['file_1'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/brand/".$new_filename);
					$adminDao->updateBrandImage( "banner", $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_2'] ['name'];
				$temp_name = $_FILES ['file_2'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/brand/".$new_filename);
					$adminDao->updateBrandImage( "brand_image", $new_filename, $id );
				}
			}

			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-brand") {
	$id = $_REQUEST['id'];
	$brand = $_REQUEST['brand'];	
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];	
	$type = 1;	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $brand);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));

	$checkBrand = $adminDao->checkBrandById( $brand, $id );	
	if($checkBrand){
		echo "1";
	}else{
		$updateBrand = $adminDao->updateBrand( $brand, $url, $title, $meta_keyword, $meta_description, $date, $id );	
		if($updateBrand){

			if ($_FILES ['file_1'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/brand/".$new_filename);
					$adminDao->updateBrandImage( "banner", $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				$_img = $_FILES ['file_2'] ['name'];
				$temp_name = $_FILES ['file_2'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename'])."-".$image_date."." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/brand/".$new_filename);
					$adminDao->updateBrandImage( "brand_image", $new_filename, $id );
				}
			}
			echo "2";
		}else{
			echo "3";
		}
	}
}

/*--------------------------------Service----------------------------------------*/
if (isset ( $action_type ) && $action_type == "create-college") {
    $name = $_REQUEST['name'];
    $type = $_REQUEST['type'];
    $bond = $_REQUEST['bond'];
    $rating = $_REQUEST['rating'];
    $rank = $_REQUEST['rank'];
    $fee = $_REQUEST['fee'];
    $location = $_REQUEST['location'];
    $city = $_REQUEST['city'];
	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $name);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];
	
	$short_description = $_REQUEST['short_description'];
	$description = $_REQUEST['description'];
	
	
	$checkCollege = $adminDao->checkCollege( $name );	
	if($checkCollege){
		echo "1";
	}else{
		$saveCollege = $adminDao->saveCollege( $name, $type, $url, $bond, $rating, $rank, $fee, $location, $city, $title, $meta_keyword, $meta_description, $description, $short_description, $date );	
		if($saveCollege){
			$id = $saveCollege;
			
			if ($_FILES ['file_1'] ['tmp_name'] != '') { 
				$file_name = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo ( $file_name );
				$new_filename = trim ( $file_parts ['filename'] ) ."-".$image_date. "." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file ( $temp_name, "../../productImage/college/$new_filename" );
					$adminDao->updateCollegeImage ( $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				foreach($_FILES ['file_2'] ['tmp_name'] as $key=>$tmp_name) {				
					$file_name = $_FILES ['file_2'] ['name'][$key];
					$temp_name = $_FILES ['file_2'] ['tmp_name'][$key];
					$file_parts = pathinfo ( $file_name );
					$new_filename = trim ( $file_parts ['filename'] ) ."-".$image_date. "." . $file_parts ['extension'];
					if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
						move_uploaded_file ( $temp_name, "../../productImage/college/$new_filename" );
						$adminDao->saveCollegeGalleryImage ( $new_filename, $id );
					}				
				}
			}

			
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-college") {
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
    $type = $_REQUEST['type'];
    $bond = $_REQUEST['bond'];
     $rating = $_REQUEST['rating'];
    $rank = $_REQUEST['rank'];
    $fee = $_REQUEST['fee'];
    $location = $_REQUEST['location'];
    $city = $_REQUEST['city'];
	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $name);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];
	
	$short_description = $_REQUEST['short_description'];
	$description = $_REQUEST['description'];
	$checkProduct = $adminDao->checkCollegeById( $name, $id );	
	if($checkProduct){
		echo "1";
	}else{
		$updateProduct = $adminDao->updateCollege( $name, $type, $url, $bond, $rating, $rank, $fee, $location, $city, $title, $meta_keyword, $meta_description, $description, $short_description, $date, $id );	
		if($updateProduct){
			
			if ($_FILES ['file_1'] ['tmp_name'] != '') {
				$file_name = $_FILES ['file_1'] ['name'];
				$temp_name = $_FILES ['file_1'] ['tmp_name'];
				$file_parts = pathinfo ( $file_name );
				$new_filename = trim ( $file_parts ['filename'] ) ."-".$image_date. "." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file ( $temp_name, "../../productImage/college/$new_filename" );
					$adminDao->updateCollegeImage ( $new_filename, $id );
				}
			}
			if ($_FILES ['file_2'] ['tmp_name'] != '') {
				foreach($_FILES ['file_2'] ['tmp_name'] as $key=>$tmp_name) {				
					$file_name = $_FILES ['file_2'] ['name'][$key];
					$temp_name = $_FILES ['file_2'] ['tmp_name'][$key];
					$file_parts = pathinfo ( $file_name );
					$new_filename = trim ( $file_parts ['filename'] ) ."-".$image_date. "." . $file_parts ['extension'];
					if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
						move_uploaded_file ( $temp_name, "../../productImage/college/$new_filename" );
						$adminDao->saveCollegeGalleryImage ( $new_filename, $id );
					}				
				}
			}
			
			echo "2";
		}else{
			echo "3";
		}
	}
}



/*--------------------------------Blog----------------------------------------*/
if (isset ( $action_type ) && $action_type == "create-blog") {
	$heading = $_REQUEST['heading'];
	$blog_date = date("Y-m-d",strtotime($_REQUEST['blog_date']));
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--","=","'","-" );
	$urlValue = str_replace ( $chars, "-", $heading);
	$url = strtolower(str_replace ( $chars, "-", $urlValue ));
	$taging = $_REQUEST['taging'];
	$name = $_REQUEST['name'];
	$short_description = $_REQUEST['short_description'];
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];
	$description = $_REQUEST['description'];
	
	$checkBlog = $adminDao->checkBlog( $heading );	
	if($checkBlog){
		echo "1";
	}else{
		$saveBlog = $adminDao->saveBlog( $heading, $url, $name, $short_description, $title, $meta_keyword, $meta_description, $description, $blog_date, $date );	
		if($saveBlog){
			$id = $saveBlog;
			if ($_FILES ['image'] ['tmp_name'] != '') {
				$_img = $_FILES ['image'] ['name'];
				$temp_name = $_FILES ['image'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename']) . "." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/blog/".$new_filename);
					$adminDao->updateBlogImage( $new_filename, $id );
				}
			}
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-blog") {
	$id = $_REQUEST['id'];
	$heading = $_REQUEST['heading'];
	$blog_date = date("Y-m-d",strtotime($_REQUEST['blog_date']));
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--","=","'","-" );
	$urlValue = str_replace ( $chars, "-", $heading);
	$url = strtolower(str_replace ( $chars, "-", $urlValue ));
	$name = $_REQUEST['name'];
	$short_description = $_REQUEST['short_description'];
	$title = $_REQUEST['title'];
	$meta_keyword = $_REQUEST['meta_keyword'];
	$meta_description = $_REQUEST['meta_description'];
	$description = $_REQUEST['description'];
	
	$checkBlog = $adminDao->checkBlogById( $heading, $id );	
	if($checkBlog){
		echo "1";
	}else{
		$updateBlog = $adminDao->updateBlog( $heading, $url, $name, $short_description, $title, $meta_keyword, $meta_description, $description, $blog_date, $date, $id );	
		if($updateBlog){
			if ($_FILES ['image'] ['tmp_name'] != '') {
				$_img = $_FILES ['image'] ['name'];
				$temp_name = $_FILES ['image'] ['tmp_name'];
				$file_parts = pathinfo($_img);
				$new_filename = trim($file_parts ['filename']) . "." . $file_parts ['extension'];
				if ((strtolower($file_parts ['extension']) == 'jpg') || (strtolower($file_parts ['extension']) == 'jpeg') || (strtolower($file_parts ['extension']) == 'png') || (strtolower($file_parts ['extension']) == 'webp')) {
					move_uploaded_file($temp_name, "../../productImage/blog/".$new_filename);
					$adminDao->updateBlogImage( $new_filename, $id );
				}
			}
			echo "2";
		}else{
			echo "3";
		}
	}
}




if (isset ( $action_type ) && $action_type == "update-page") {
	$heading_1 = $_REQUEST ['heading_1'];
	$heading_2 = $_REQUEST ['heading_2'];
	$title = $_REQUEST ['title'];
	$meta_keyword = $_REQUEST ['meta_keyword'];
	$meta_description = $_REQUEST ['meta_description'];
	$id = $_REQUEST ['id'];
	
	$chars = array ("!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s" );
	$urlValue = str_replace ( $chars, "-", $heading_1);
	$url = strtolower(str_replace ( $chars, "-", rtrim($urlValue,"-") ));
	$checkPage = $adminDao->checkPageById( $heading_1, $id );
	if($checkPage){
		echo "1";
	}else{
		$updatePage = $adminDao->updatePage( $url, $heading_1, $heading_2, $title, $meta_keyword, $meta_description, $date, $id );
		if($updatePage){
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-title-keyword") {
	$title = $_REQUEST ['title'];
	$meta_keyword = $_REQUEST ['meta_keyword'];
	$meta_description = $_REQUEST ['meta_description'];
	$id = $_REQUEST ['id'];
	
	$updateTitleKeyword = $adminDao->updateTitleKeyword( $title, $meta_keyword, $meta_description, $date, $id );
	if($updateTitleKeyword){
		echo "1";
	}else{
		echo "2";
	}
	
}


if (isset ( $action_type ) && $action_type == "create-pincode") {
	$delivery_type = $_REQUEST ['delivery_type'];
	$area = $_REQUEST ['area'];
	$pincode = $_REQUEST ['pincode'];
	
	$checkPincode = $adminDao->checkPincode( $delivery_type, $area, $pincode );
	if($checkPincode){
		echo "1";
	}else{
		$savePincode = $adminDao->savePincode( $delivery_type, $area, $pincode, $date );
		if($savePincode){
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-pincode") {
	$id = $_REQUEST ['id'];
	$delivery_type = $_REQUEST ['delivery_type'];
	$area = $_REQUEST ['area'];
	$pincode = $_REQUEST ['pincode'];
	$checkPincode = $adminDao->checkPincodeById( $delivery_type, $area, $pincode, $id );
	if($checkPincode){
		echo "1";
	}else{
		$updatePincode = $adminDao->updatePincode( $delivery_type, $area, $pincode, $date, $id );
		if($updatePincode){
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "cancel-order") {
	$id = $_REQUEST ['id'];
	$updateCancelOrderStatus = $adminDao->updateCancelOrderStatus( $id );
	if($updateCancelOrderStatus){
	    $orderdData = $adminDao->orderById($id);
	    $Phno = $orderdData->Mobile;					
		$Msg = "Dear ".$orderdData->Name." your Order ".$orderdData->OrderId." has been cancelled Earth fresh mart";
		$Password='lmpf4985LM';
		$SenderID='EFMART';
		$UserID='earthfreshmart';
		$TemplateID = "1707162313068544004";
		$adminDao->sendOrderMessage($Phno,$Msg,$Password,$SenderID,$UserID,$TemplateID);
		
	    header("location:../order");
	}else{
	    header("location:../order");
	}
}

if (isset ( $action_type ) && $action_type == "create-delivery-time") {
	$delivery_date = date("Y-m-d",strtotime($_REQUEST ['delivery_date']));
	$delivery_time = $_REQUEST ['delivery_time'];
	
	$saveDeliveryTime = $adminDao->saveDeliveryTime( $delivery_date, $delivery_time, $date );
	if($saveDeliveryTime){
	    echo "1";
	}else{
		echo "2";
	}
}


if (isset ( $action_type ) && $action_type == "udpate-delivery-time") {
	$id = $_REQUEST ['id'];
	$delivery_date = date("Y-m-d",strtotime($_REQUEST ['delivery_date']));
	$delivery_time = $_REQUEST ['delivery_time'];
	
	$updateDeliveryTime = $adminDao->updateDeliveryTime( $delivery_date, $delivery_time, $date, $id );
	if($updateDeliveryTime){
	    echo "1";
	}else{
		echo "2"; 
	}
}


if (isset ( $action_type ) && $action_type == "delivered-order") {
	$id = $_REQUEST ['id'];
	$updateDeliveredOrderStatus = $adminDao->updateDeliveredOrderStatus( $id );
	if($updateDeliveredOrderStatus){
	    $orderdData = $adminDao->orderById($id);
	    $Phno = $orderdData->Mobile;					
		$Msg = "Dear ".$orderdData->Name.", your order ".$orderdData->OrderId." has been delivered , thank you for ordering Earthfreshmart";
		$Password='lmpf4985LM';
		$SenderID='EFMART';
		$UserID='earthfreshmart';
		$TemplateID = "1707163013960570767";
		$adminDao->sendOrderMessage($Phno,$Msg,$Password,$SenderID,$UserID,$TemplateID);
	    header("location:../order");
	}else{
	    header("location:../order");
	}
}



if (isset ( $action_type ) && $action_type == "create-coupon") {
	$type = $_REQUEST ['type'];
	$category = $_REQUEST ['category'];
	$store = $_REQUEST ['store'];
	$offer_type = $_REQUEST ['offer_type'];
	$coupon_heading = $_REQUEST ['coupon_heading'];
	$coupon_excerpt = $_REQUEST ['coupon_excerpt'];
	$coupon_code = $_REQUEST ['coupon_code'];
	$coupon_price = $_REQUEST ['coupon_price'];
	$cashback_amt = $_REQUEST ['cashback_amt'];
	$mrp = $_REQUEST ['mrp'];
	$image = $_REQUEST ['image'];
	$order_amount = $_REQUEST ['order_amount'];
	$coupon_user = $_REQUEST ['coupon_user'];
	$coupon_start_date = date("Y-m-d",strtotime($_REQUEST ['coupon_start_date']));
	$coupon_end_date = date("Y-m-d",strtotime($_REQUEST ['coupon_end_date']));
	$comp_link =$_REQUEST ['comp_link'];
	$handpicked = $_REQUEST['handpicked'];
	$top20 = $_REQUEST['top20'];
	$verified = $_REQUEST['verified'];
	$offer = $_REQUEST['offer'];
	$link = $_REQUEST['link'];
	$content1 = $_REQUEST['content1'];
	$content2 = $_REQUEST['content2'];
	$content3 = $_REQUEST['content3'];
	$searching_keywords = $_REQUEST['searching_keywords'];
	$searching_keywords_array = explode(',', $searching_keywords);
	$chars = ["!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s"];
	$urlValue = str_replace($chars, "-", $coupon_heading);
	$slug = strtolower(rtrim($urlValue, "-"));
	//$checkCoupon = $adminDao->checkCoupon( $coupon_code );
    // 	if($checkCoupon){
    // 		echo "1";
    // 	}else{
		$saveCoupon = $adminDao->saveCoupon( $type, $category, $store,  $coupon_heading, $coupon_excerpt, $coupon_code, $offer_type, $coupon_price, $cashback_amt , $mrp, $image, $order_amount, $coupon_user, $coupon_start_date, $coupon_end_date,$comp_link, $handpicked, $top20, $offer, $verified, $link, $content1, $content2, $content3, $slug, $date );
		if($saveCoupon){	
			$id = $saveCoupon;
			foreach ($searching_keywords_array as $keyword) {
				$saveSearchingData = $adminDao->saveCouponkeywordData($id, $keyword, $date);
				
			}					
			echo "2";
		}else{
			echo "3";
		}
	//}
}




if (isset ( $action_type ) && $action_type == "update-coupon") {
	$id = $_REQUEST ['id'];
	$type = $_REQUEST ['type'];
	$category = $_REQUEST ['category'];
	$store = $_REQUEST ['store'];
	$coupon_heading = $_REQUEST ['coupon_heading'];
	$coupon_excerpt = $_REQUEST ['coupon_excerpt'];
	$coupon_code = $_REQUEST ['coupon_code'];
	$coupon_price = $_REQUEST ['coupon_price'];
	$cashback_amt = $_REQUEST ['cashback_amt'];
	$mrp = $_REQUEST ['mrp'];
	$image = $_REQUEST ['image'];
	$order_amount = $_REQUEST ['order_amount'];
	$coupon_user = $_REQUEST ['coupon_user'];
	$coupon_start_date = date("Y-m-d",strtotime($_REQUEST ['coupon_start_date']));
	$coupon_end_date = date("Y-m-d",strtotime($_REQUEST ['coupon_end_date']));
	$handpicked = $_REQUEST['handpicked'];
	$top20 = $_REQUEST['top20'];
	$verified = $_REQUEST['verified'];
	$offer = $_REQUEST['offer'];
	$link = $_REQUEST['link'];
	$content1 = $_REQUEST['content1'];
	$content2 = $_REQUEST['content2'];
	$content3 = $_REQUEST['content3'];
	$offer_type = $_REQUEST['offer_type'];
	$comp_link = $_REQUEST['comp_link'];
	$searching_keywords = $_REQUEST['searching_keywords'];
	$searching_keywords_array = explode(',', $searching_keywords);
	$chars = ["!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s"];
	$urlValue = str_replace($chars, "-", $coupon_heading);
    $slug = strtolower(rtrim($urlValue, "-"));
	$checkCoupon = $adminDao->checkCouponById( $coupon_code, $id );
    // 	if($checkCoupon){
    // 		echo "1";
    // 	}else{
		$updateCoupon = $adminDao->updateCoupon( $type, $category, $store, $coupon_heading, $coupon_excerpt, $coupon_code, $offer_type, $coupon_price, $cashback_amt ,$mrp, $image, $order_amount, $coupon_user, $coupon_start_date, $coupon_end_date, $comp_link, $handpicked, $top20, $offer, $verified, $link, $content1, $content2, $content3, $slug, $date, $id );
		if($updateCoupon){
			$deleteKeyword = $adminDao->deleteCouponKeyword($id);
			foreach ($searching_keywords_array as $keyword) {
			$saveSearchingData = $adminDao->saveCouponkeywordData($id, $keyword, $date);
				}
								
			echo "2";
		}else{
			echo "3";
		}
//	}
}

if (isset ($_POST['submit'] ) && $action_type == "create-predictor") {
	
	$min_rank = $_REQUEST ['min_rank'];
	$max_rank = $_REQUEST ['max_rank'];
	$fee = $_REQUEST ['fee'];
		$college = $_REQUEST ['college'];
		$savePredictor = $adminDao->savePredictor( $min_rank, $max_rank, $fee, $date );
		if($savePredictor){	
		    foreach($college as $key=>$value){
		        $adminDao->saveBudgetCollege( $savePredictor, $value );
		    }
		    
		 header("location:../budget/");
		}else{
			header("location:../budget/create-predictor");
		}
	
}

if (isset ($action_type ) && $action_type == "update-predictor") {
	$id = $_REQUEST ['id'];
	
	$min_rank = $_REQUEST ['min_rank'];
	$max_rank= $_REQUEST ['max_rank'];
	$fee = $_REQUEST ['fee'];
$college = $_REQUEST ['college'];
	$updatePredictor = $adminDao->updatePredictor( $min_rank, $max_rank, $fee, $date,$id );
	if($updatePredictor){
	    $adminDao->deleteBudgetCollege($id);
	     foreach($college as $key=>$value){
		        $adminDao->saveBudgetCollege( $id, $value );
		    }
		header("location:../budget/");
	   }else{
		   header("location:../budget/create-predictor");
	   }
	
}


if (isset($_POST['submit']) && $action_type == "create-reguser") {
    $category = $_REQUEST['category'];
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $com_status = $_REQUEST['com_status'];
    $com_trending = $_REQUEST['com_trending'];
    $com_deeplink = $_REQUEST['com_deeplink'];
    $com_offer_title = $_REQUEST['com_offer_title'];
    $com_meta_title = $_REQUEST['com_meta_title'];
    $offer_type = $_REQUEST['offer_type'];
    $offer_value = $_REQUEST['offer_value'];
    $default_tacking = $_REQUEST['default_tacking'];
    $esti_cashback_date = $_REQUEST['esti_cashback_date'];
    $avg_tracking_speed = $_REQUEST['avg_tracking_speed'];
    $avg_claim_time = $_REQUEST['avg_claim_time'];
    $cashback_rate = $_REQUEST['cashback_rate'];
    $description = $_REQUEST['description'];
    $link = $_REQUEST['link'];
    $searching_keywords = $_REQUEST['searching_keywords'];
	$chars = ["!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s"];
	$urlValue = str_replace($chars, "-", $com_meta_title);
	$slug = strtolower(rtrim($urlValue, "-"));
	$token = bin2hex(random_bytes(16)); 

    $saveReguser = $adminDao->saveReguser($category, $name, $image, $com_status, $com_trending, $com_deeplink, $com_offer_title, $com_meta_title, $offer_type, $offer_value, $default_tacking, $esti_cashback_date, $avg_tracking_speed, $avg_claim_time, $cashback_rate, $link,$slug, $token, $description, $date);
    $store_id = $saveReguser;
    if ($saveReguser) {
        foreach ($searching_keywords as $keyword) {
            $saveSearchingData = $adminDao->saveSearchingData($store_id, $keyword, $date);
            // if (!$saveSearchingData) {
            //     header("Location: ../reguser/create-reguser");
            //     exit;
            // }
        }
        // Redirect if everything is successful
        header("Location: ../reguser/");
    } else {
        header("Location: ../reguser/create-reguser");
    }
}


if (isset ($action_type ) && $action_type == "update-reguser") {
	$id = $_REQUEST ['id'];
	$category = $_REQUEST['category'];
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $com_status = $_REQUEST['com_status'];
    $com_trending = $_REQUEST['com_trending'];
    $com_deeplink = $_REQUEST['com_deeplink'];
    $com_offer_title = $_REQUEST['com_offer_title'];
    $com_meta_title = $_REQUEST['com_meta_title'];
    $offer_type = $_REQUEST['offer_type'];
    $offer_value = $_REQUEST['offer_value'];
    $default_tacking = $_REQUEST['default_tacking'];
    $esti_cashback_date = $_REQUEST['esti_cashback_date'];
    $avg_tracking_speed = $_REQUEST['avg_tracking_speed'];
    $avg_claim_time = $_REQUEST['avg_claim_time'];
    $cashback_rate = $_REQUEST['cashback_rate'];
    $description = $_REQUEST['description'];
    $link = $_REQUEST['link'];
	$token = bin2hex(random_bytes(16)); 
	$searching_keywords = $_REQUEST['searching_keywords'];
      $chars = ["!", "\"", "#", "$", "%", "&", "/", "(", ")", "?", "*", "+", "-", ".", ",", ";", ":", "_", " ", "--", "---", "----", "-----", "=", "'", "-", "’s", "'s"];
      $urlValue = str_replace($chars, "-", $com_meta_title);
    $slug = strtolower(rtrim($urlValue, "-"));
	$updateReguser = $adminDao->updateReguser( $category, $name, $image, $com_status, $com_trending, $com_deeplink, $com_offer_title, $com_meta_title, $offer_type, $offer_value, $default_tacking, $esti_cashback_date, $avg_tracking_speed, $avg_claim_time, $cashback_rate, $link, $slug, $description, $date, $id );	
	if($updateReguser){	
		$deleteKeyword = $adminDao->deleteKeyword($id);
		foreach ($searching_keywords as $keyword) {
		$saveSearchingData = $adminDao->saveSearchingData($id, $keyword, $date);
		if (!$saveSearchingData) {
			header("Location: ../reguser/create-reguser");
				exit;
			}
			}
			
		 header("location:../reguser/");
		}else{
			header("location:../reguser/create-reguser");
		}
	
}





if (isset ( $action_type ) && $action_type == "create-testimonial") {
	
	$name = $_REQUEST ['name'];
	$content = $_REQUEST ['content'];
	
	$saveTestimonial = $adminDao->saveTestimonial( $name, $content, $date );
	if($saveTestimonial){						
		header("Location: ../testimonials");
	}else{
		header("Location: ../testimonials");
	}
}

if (isset ( $action_type ) && $action_type == "update-testimonial") {
	$id = $_REQUEST ['id'];
	$name = $_REQUEST ['name'];
	$content = $_REQUEST ['content'];
	$designation = $_REQUEST ['designation'];
	
	$updateTestimonial = $adminDao->updateTestimonial(  $name, $content, $designation, $date, $id );
	if($updateTestimonial){						
		header("Location: ../testimonials");
	}else{
		header("Location: ../testimonials");
	}
}




if (isset ( $action_type ) && $action_type == "create-area") {
	
	$state = $_REQUEST ['state'];
	$city = $_REQUEST ['city'];
	$delivery_type = $_REQUEST ['delivery_type'];
	$area = $_REQUEST ['area'];
	
	$saveArea = $adminDao->saveArea( $state, $city, $delivery_type, $area, $date );
	if($saveArea){						
		echo "1";
	}else{
		echo "2";
	}
}

if (isset ( $action_type ) && $action_type == "update-area") {
	$id = $_REQUEST ['id'];
	$state = $_REQUEST ['state'];
	$city = $_REQUEST ['city'];
	$delivery_type = $_REQUEST ['delivery_type'];
	$area = $_REQUEST ['area'];
	
	$updateArea = $adminDao->updateArea( $state, $city, $delivery_type, $area, $date, $id );
	if($updateArea){						
		echo "1";
	}else{
		echo "2";
	}
}

if (isset ( $action_type ) && $action_type == "create-state") {
	$state = $_REQUEST ['state'];
	
	$checkState = $adminDao->checkState( $state );
	if($checkState){
		echo "1";
	}else{
		$saveState = $adminDao->saveState( $state, $date );
		if($saveState){
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-state") {
	$state = $_REQUEST ['state'];
	$id = $_REQUEST ['id'];
	$checkState = $adminDao->checkStateById( $state, $id );
	if($checkState){
		echo "1";
	}else{
		$updateState = $adminDao->updateState( $state, $date, $id );
		if($updateState){
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "create-city") {
	$state = $_REQUEST ['state'];
	$city = $_REQUEST ['city'];
	$checkCity = $adminDao->checkCity( $state, $city );
	if($checkCity){
		echo "1";
	}else{
		$saveCity = $adminDao->saveCity( $state, $city, $date );
		if($saveCity){
			echo "2";
		}else{
			echo "3";
		}
	}
}

if (isset ( $action_type ) && $action_type == "update-city") {
	$state = $_REQUEST ['state'];
	$city = $_REQUEST ['city'];
	$id = $_REQUEST ['id'];
	$checkCity = $adminDao->checkCityById( $state, $city, $id );
	if($checkCity){
		echo "1";
	}else{
		$updateCity = $adminDao->updateCity( $state, $city, $date, $id );
		if($updateCity){
			echo "2";
		}else{
			echo "3";
		}
	}
}
?>
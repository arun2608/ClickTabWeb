<?php
include "admin-lib.php";
$store_id = $_REQUEST['store'];
$token = $_REQUEST['token'];
$user_sub_id = $_REQUEST['user_sub_id'];
$store = $adminDao->ReguserById( $store_id  );
// print_r($store);die;
//$userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
// $storeData = $adminDao->storeBySlugToken($store->Url,$store->storeSubId);
$couponByStore = $adminDao->couponByStore( $store->Id );
$categoryById = $adminDao->categoryById($store->Category);
$click_id="CD_".time()."_"."StoreRefer";

if($store->OfferType==1){
    $code1="FD_".$store->OfferValue;
   $offer = "Flat ". $store->OfferValue." Cashback";
} else if($store->OfferType==2){
     $code1="FP_".$store->OfferValue;
    $offer = "Flat ". $store->OfferValue."% Cashback";
} else if($store->OfferType==3){
    $code1=1;
    $offer = "Upto Rs.". $store->OfferValue." Cashback";
} else if($store->OfferType==4){
    $code1=1;
    $offer = "Upto ". $store->OfferValue."% Cashback";
} else {
    $code1="";
    $offer ="";
}
header("Location:".$store->StoreLink.'&p9='.$click_id.'&source='.$token.'&txn_id='.time().'&sale_amount='.'&currency=INR&p8='.urlencode($offer).'&p6='.$user_sub_id.'&p7='.$code1.'&p5=StoreRefer&security_token=CWT20241036');
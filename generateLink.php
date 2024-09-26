<?php
include "admin-lib.php";
$store_id = $_REQUEST['store'];
$store = $adminDao->ReguserById( $store_id  );
// print_r($store);die;
$userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
$token = $store->storeSubId;
$couponByStore = $adminDao->couponByStore( $store->Id );
$categoryById = $adminDao->categoryById($store->Category);
$click_id="CD_".time()."_".$_SESSION['CTW_LoggedUserId'];

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

$messge= '<div class="store-rt about-coupon">
                  <div class="ref-store-img"><img src="'.$store->Image.'" alt="'.$store->Name.'"></div>
<b>Coupon Description</b>
                    <p>'.$store->Description.'</p>
              </div><br><br>';
 $messge.= '<b>'.$baseUrl."store-refer-link/".$store->Id."/".$token.'/'.$userdata->Code.'</b>';
 echo $messge;
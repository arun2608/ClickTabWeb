<?php
include "admin-lib.php";
$bannerData = $adminDao->landerLink(1);
$store_id = $_REQUEST['store'];
$store = $adminDao->ReguserById( $store_id  );
$userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
// $storeData = $adminDao->storeBySlugToken($store->Url,$store->storeSubId);
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
    $code1="UD_".$store->OfferValue;
    $offer = "Upto Rs.". $store->OfferValue." Cashback";
} else if($store->OfferType==4){
    $code1="UP_".$store->OfferValue;
    $offer = "Upto ". $store->OfferValue."% Cashback";
} else {
    $code1="";
    $offer ="";
}
?>
 <label>Coupon/Product</label>
<select class="form-control" name="coupon" id="coupon">
    <option value="">Select One</option>
    <?php foreach($couponByStore as $v){?>
    <option value="<?=$v->Id?>" <?=($v->Id==$bannerData->Coupon)?"selected":""?>><?=$v->CouponHeading?></option>
    <?php } ?>
</select>

<?php
//echo $store->StoreLink.'&p9='.$click_id.'&source='.$token.'&txn_id='.time().'&sale_amount='.'&currency=INR&p8='.urlencode($offer).'&p6='.$userdata->Code.'&p7='.$code1.'&p5='.$couponData->CompLink.'&security_token=CWT20241036';
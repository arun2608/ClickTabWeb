<?php
include "admin-lib.php";
$store_id = $_REQUEST['store'];
$coupon_id = $_REQUEST['coupon'];
$store = $adminDao->ReguserById( $store_id  );
$couponByStore = $adminDao->couponById( $coupon_id );
$categoryById = $adminDao->categoryById($store->Category);
$updateLink = $adminDao->categoryById($store->Category);
if(!empty($couponByStore)){
$link =  $baseUrl."lander/".$store->Token.'/'.$couponByStore->Slug."/".$couponByStore->Id;
} else {
$link =  $baseUrl."lander/".$store->Token;  
}
$adminDao->updateLander($store_id,$coupon_id,$link);

echo $link;
?>
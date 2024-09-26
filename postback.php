<?php  
session_start();
include "admin-lib.php";

//$user_id = $_SESSION['CTW_LoggedUserId'];
$click_id = $_REQUEST['click_id']; // cD Time userid
$compaign_token = $_REQUEST['compaign_token']; // cD Time userid
$sub_id= $_REQUEST['sub_id']; //store Token
$order_id =  $_REQUEST['order_id'];
$sale_amount =  $_REQUEST['sale_amount'];
$currency =  $_REQUEST['currency'];
$campaign_name =  $_REQUEST['campaign_name'];
$ctw_order_id =  $_REQUEST['ctw_order_id'];
$cashback =  $_REQUEST['cashback'];
$refernce_link =  $_REQUEST['refrence_link'];
$security_token =  $_REQUEST['security_token'];
$data['status'] = "success";
$data['message'] = "Postback Submitted Successfully";
$data['click_id'] = $click_id;
$data['compaign_token'] = $compaign_token;
$data['sub_id'] = $sub_id;
$data['order_id'] = $order_id;
$data['sale_amount'] = $sale_amount;
$data['currency'] =$currency;
$data['campaign_name'] = $campaign_name;
$data['ctw_order_id'] = $ctw_order_id;
$data['cashback'] = $cashback;
$data['refernce_link'] =$refernce_link;
$ReguserByToken = $adminDao->ReguserByToken($sub_id);

$ct = explode("_",$compaign_token);
$user_id = $ct[2];
// echo "2";
 if (strpos($cashback, "_") !== false) {
//if (str_contains($cashback, '_')) { 
    $ex = explode("_",$cashback);
    if($ex[0]=="FD"){
        $cashback1=$ex[1];
    }
    if($ex[0]=="FP"){
        $cashback1=$sale_amount*$ex[1]/100;
    }
    if($ex[0]=="UD"){
        $cashback1=1;
    }
    if($ex[0]=="UP"){
        $cashback1=1;
    }
} else {
    $cashback1=$cashback;
}
// echo "hiii";die;
$store_id=$ReguserByToken->Id;
$adminDao->clickReport($click_id, $compaign_token, $sub_id, $order_id, $sale_amount, $currency, $campaign_name, $ctw_order_id, $cashback1, $refernce_link, $user_id, $security_token);
$adminDao->saveTransactionReport($user_id, $order_id, $compaign_token, $sub_id, $store_id, $ctw_order_id, $cashback1);

echo json_encode($data);

?>
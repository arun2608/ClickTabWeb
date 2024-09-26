<?php 
include_once '../admin-lib.php';
include_once '../session_check.php';
$orderData = $adminDao->orderById( $_REQUEST['id'] );
$stateData = $adminDao->stateById($orderData->State);
$cityData = $adminDao->cityById($orderData->City);
if($orderData->PaymentType==1){
    $payment_type = "Online";
}else if($orderData->PaymentType==2){
    $payment_type = "Cash On Delivery";
}
$message = '<html lang="en">
<head>
<style>
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}a {
  color: #5D6975;
  text-decoration: underline;
}.order-receipt {
  position: relative;
  width: 572px;  
  margin: 0 auto; 
  color: #001028;
  background: #f2f5f7; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
 padding:15px;
}.order-receipt-detail{
  color: #001028;
  background: #fff; 
  padding:15px;
  margin-bottom: 10px;
}header {
  padding: 10px 0;
  margin-bottom: 30px;
}#logo {
  text-align: center;
  margin-bottom: 10px;
}#logo img {
  width: 90px;
}h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 20px;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
}.project {
  float: left;
  width:50%;
  text-align: left;
  display: inline-block;
  font-size: 11px;
}.project span,.company span {
  color: #5D6975;
  text-align: left;
  width: 70px;
  margin-right: 10px;
  display: inline-block;
  font-size: 12px;
  font-weight: bold;
}.company {
  float: left;
  width:50%;
  text-align: left;
  display: inline-block;
  font-size: 11px;
}.project div, .company div {
  white-space: nowrap;        
}table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #eee;
}table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}table td {
  text-align: center;
}table th {
  padding: 5px 10px;
  color: #5D6975;
  font-size:12px;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: bold;
}table .service, table .desc {
  text-align: left;
}table th.total{
  text-align: right !important;
}table td {
  padding: 10px 10px;
  text-align: right;
  font-size:11px;
  border-bottom: 1px solid #eee;
}table td.service, table td.desc {
  vertical-align: top;
}table td.unit, table td.qty, table td.total {
  font-size: 11px;
}table td.grand {
  border-top: 1px solid #5D6975;;
}#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
</style>
<title>Invoice</title>
</head>
<body><div class="order-receipt"><div class="order-receipt-detail"><header class="clearfix"><h1>Order Receipt</h1>						 	
<div class="project">
<div><span>Buyer</span></div>	
<div>'.$orderData->Name.'</div>	
<div>'.$orderData->Email.'</div>
<div>'.$orderData->Mobile.'</div>
<div>'.$stateData->State.'</div>
<div>'.$cityData->City.'</div>';
if($orderData->Area!=""){
							$message.= '<div>'.$orderData->Area.'</div>';
							}
							$message.= '
							<div>'.$orderData->Landmark.'</div>
							<div style="white-space: pre-wrap;">'.$orderData->Address.'</div>
							<div>'.$orderData->Pincode.'</div>
<div>Order Type: '.$payment_type.'</div>
</div>

<div class="company">
<div><span>Seller</span></div>
<div>Earth Fresh Mart</div>
<div>customercare@earthfreshmart.in</div>	
<div>GST No.:07ASTPH4117J1ZH</div>
<div width="50%" style="white-space: pre-wrap;">159 pocket c ifc village gharoli delhi 110096</div>
<div>Order Id: '.$orderData->OrderId.'</div>
<div>Order Date: '.date("d, M Y",strtotime($orderData->Date)).'</div>
</div>
</header>
<main>
<table>
<thead>
  <tr>
	<th width="50%" colspan="2" class="desc">Product</th>
	<th class="total">Qty</th>
	<th class="total">Weight</th>
	<th class="total">Price</th>
	<th class="total">Total</th>
  </tr>
</thead>
<tbody>';
$orderDetailList = $adminDao->orderDetailListById( $orderData->Id );
if($orderDetailList){
$total = 0;
foreach($orderDetailList AS $orderDetail){
$total+= $orderDetail->Qty*$orderDetail->Price;
$message.= '
  <tr>								
	<td colspan="2" class="desc"><strong>'.$orderDetail->ProductName.'</strong></td>
	<td class="total">'.$orderDetail->Qty.'</td>
	<td class="total">'.$orderDetail->Weight.'</td>
	<td class="total">Rs. '.$orderDetail->Price.'/-</td>
	<td class="total">Rs. '.$orderDetail->Qty*$orderDetail->Price.'/-</td>
  </tr>';
}
}
$message.= '		  
  <tr>
	<td colspan="5">Subtotal</td>
	<td class="total">Rs. '.$total.'/-</td>
  </tr>
  <tr>
	<td colspan="5">Shipping charges</td>
	<td class="total">Rs. 0/-</td>
  </tr>';

$coupon_value = 0;		  
if($orderData->CouponAmount!=""){

$coupon_value = round(($total*$orderData->CouponAmount)/100);
$message.= '		  
			<tr>
			  <td colspan="5">Discount</td>
			  <td class="total">Rs. '.$coupon_value.'/-</td>
			</tr>';
}	
$grand_total = $total-$coupon_value;
$message.= '		  
			<tr>
			  <td colspan="5">Total</td>
			  <td class="total">Rs. '.$grand_total.'/-</td>
			</tr>';		  

$message.= '
<tr><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6" style="text-align: left !important;"><p>Delivery Time: '.$orderData->Delivery.'</p></td></tr>';							
$message.= '		
<tr>
	<td colspan="6" style="text-align: left !important;">
		<p>For any query please write us at customercare@earthfreshmart.in</p>
		<img src="'.$baseUrl.'assets/images/logo/logo-2.png" width="100px">
	</td>
</tr>
<tr><td colspan="6" style="text-align: left !important;color: #a09a9a;"><strong>Note: </strong>This is system generated bill no signature required. The refund will be credited in your respective bank within 7 to 8 days into your bank account. Thank you for using earthfreshmart.in</td></tr>
</tbody>
</table> 

</main></div></div>
</body>
</html>';
echo $message;
					?>

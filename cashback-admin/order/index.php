<?php include_once '../header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	<?php include_once '../menu.php';?>        
		<div class="right_col" role="main" style="height: 600px;">
          <!-- top tiles -->
          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order List <small id="validate-msg"></small></h2>					
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
					  <tr>
						<th>#</th>
						<th>Order Type</th>
						<th>OrderId</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>State</th>
						<th>City</th>
						<th>Coupon Code</th>
						<th>Date</th>
						<th>Invoice</th>
						<th>Cancel Request</th>
						<th>Delivered</th>
						<th>Feedback</th>
					  </tr>
					</thead>
					<tbody>
					  <?php 
						$orderList = $adminDao->orderList();
						if($orderList){
							$count = 1;
							foreach($orderList AS $order){
								$stateData = $adminDao->stateById($order->State);
								$cityData = $adminDao->cityById($order->City);
								$countFeedbackData = $adminDao->countFeedbackById( $order->Id) ;?>
					  <tr>
						<td><?php echo $count++;?></td>
						<td><?php if($order->PaymentType==1){echo "Online Payment";}else if($order->PaymentType==2){echo "Cash On Delivery";}?></td>
						<td><?php echo $order->OrderId;?></td>
						<td><?php echo $order->Name;?></td>
						<td><?php echo $order->Email;?></td>
						<td><?php echo $order->Mobile;?></td>
						<td><?php echo $stateData->State;?></td>
						<td><?php echo $cityData->City;?></td>
						<td><?php echo $order->CouponCode;?></td>
						<td><?php echo date('d M, Y H:i:s',strtotime($order->Date));?></td>
						<td><a target='_blank' href='<?php echo $siteUrl."order/invoice-".$order->Id;?>'><i class="fa fa-file-pdf" aria-hidden="true"></i> Invoice</a></td>	
						<td>
						    <?php 
						        if($order->OrderStatus!=4){
						        if($order->OrderStatus==3){echo "Order Cancelled.";}else if($order->OrderStatus==2){?>
            				    <a href='<?php echo $siteUrl."controller/AdminController.php?action_type=cancel-order&id=".$order->Id;?>' onclick="return confirm('Are you sure. You want to cancel this order ?')">Cancel Request</a>
            				<?php }else if($order->OrderStatus=1){?>
            				    <a href='<?php echo $siteUrl."controller/AdminController.php?action_type=cancel-order&id=".$order->Id;?>' onclick="return confirm('Are you sure. You want to cancel this order ?')">Cancel</a>
            				<?php }}?>
        				</td>
        				
        				<td>
						    <?php if($order->OrderStatus==4){echo "Order Delivered.";}else if($order->OrderStatus==3){echo "Order Cancelled.";}else {?>
            				    <a href='<?php echo $siteUrl."controller/AdminController.php?action_type=delivered-order&id=".$order->Id;?>' onclick="return confirm('Are you sure. You want to delivered this order ?')">Complete</a>
                            <?php }?>
        				</td>
        				<td>
						    <a href='<?php echo $siteUrl."order/feedback-list-".$order->Id;?>'><i class="fa fa-comments" aria-hidden="true"></i> &nbsp;<font style="color:red;">(<?php echo $countFeedbackData->TotalFeedback?>)</font></a>
        				</td>
					  </tr>      
					  <?php }}else{echo "<tr><td colspan='9'>No Detail..</td></tr>";}?>
					</tbody>
                    </table>
                  </div>
                </div>
              </div></div>
          

                    

          
        </div>
 	<?php include_once '../footer.php';?>      
 	</div>
    </div>
	<?php include_once '../script.php';?>
	<?php require_once '../tabel-js.php';?>
  </body>
</html>

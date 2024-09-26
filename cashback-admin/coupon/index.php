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
                    <h2>Coupon  / Product List</h2>
                    <div class="clearfix"></div>
                    <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=coupon-export'?>"><button style="color:red">Export</button></a>
                    <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=coupon-samplefile'?>"><button style="color:red">Sample File</button></a>
                    <a href="<?php echo $siteUrl.'coupon/import-coupon'?>"><button style="color:red">Import Excel</button></a>
                  </div>
                  <div class="x_content">
                    <table id="example" class="table table-striped table-bordered">
                      <thead>
                        <tr>
              <th>S.No.</th>
              <th>Type</th>
						  <th>Campaign Name</th>
						  <th>Store Name</th>
						  <th>Coupon Price</th>
						  <th>Category</th>
						  <th>Status</th>
						  <th>Campaign Link</th>
						  <th>Date</th>
                          <th width="10%">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $couponList = $adminDao->couponList();
                        if ($couponList) {
                        	$count = 1;
                        	foreach ($couponList as $coupon) {
                        	    $storeById = $adminDao->ReguserById($coupon->Store);
                        	$categoryById = $adminDao->categoryById($coupon->Category);
                        	$offerTypeById = $adminDao->offerTypeById($coupon->OfferType);?>
                        <tr>
                          <td><?php echo $count++;?></td>   
                          <td><?php echo $coupon->Type;?></td>
						  <td><?php echo $coupon->CouponHeading;?></td>
						  <td><?=$storeById->Name?></td>
						  <td><?=$coupon->CouponPrice." (".$offerTypeById->Name.")"?></td>
						  <td><?=$categoryById->Category?></td>
						  <td><?=($coupon->Status==0)?"False":"True"?></td>
						  <td><a style="color:blue" href='<?=$coupon->CompaignLink?>'>Campaign Link</a></td>
						  
                          <td><?php echo date("d/M/Y H:i:s",strtotime($coupon->Date));?></td>						 
                          <td>
                          	<a href="<?php echo $siteUrl;?>coupon/edit-coupon-<?php echo $coupon->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<?php if($coupon->Type!=1 && $coupon->Type!=3){if($coupon->Status=="1"){?>
								<a href="<?php echo $siteUrl;?>controller/StatusController.php?id=<?php echo $coupon->Id;?>&action_type=coupon-status&status=0"><i class="fa fa-check" aria-hidden="true" style="color:#2fd02f;"></i></a>
							<?php }else{?>	
								<a href="<?php echo $siteUrl;?>controller/StatusController.php?id=<?php echo $coupon->Id;?>&action_type=coupon-status&status=1"><i class="fa fa-times" aria-hidden="true" style="color:#fb0505;"></i></a>
							<?php }}?>
                          </td>                       
                        </tr>
						<?php }}else{echo "<tr><td colspan='5'>No details..</td></tr>";}?>
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

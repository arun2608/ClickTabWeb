<?php 
include "dashboard-side-menu.php";
?>
<div class="col-md-9">
    <div class="main-content">
        <div class="col-md-12">
            <div id="no-more-tables"> 
               <div id="top-title"> <h4 class="sub-heading">Missing Report List</h4> <a href="javascript:void(0)" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#missingReportModal"> Add Report </a></div>
                

                <table id="datatable" class="table table-striped table-bordered">
                    <thead class="cf">
                        <tr>
                            <th>#</th>
                            <th>OrderId/Transaction Id</th>
                            <th>Store Name</th>
                            <th>Coupon Name</th>
                            <th>User Name</th>
                            <th>Transaction Date</th>
                            <th>Price</th>
                            <th>Date</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        $missingreport = $adminDao->missingReportList($_SESSION['CTW_LoggedUserId']);
                        foreach($missingreport as $report){
                          $userdata = $adminDao->registerById($report->UserId);
                           $storedata = $adminDao->ReguserById($report->StoreId);
                           $coupondata = $adminDao->CouponById($report->CouponId);

                        ?>
                        <tr>
                            <td data-title="#"><?= $count++; ?></td>
                            <td data-title="OrderId"><?= $report->OrderId; ?></td>
                            <td data-title="reportId"><?= $storedata->Name; ?></td>
                            <td data-title="CouponCode"><?= $coupondata->CouponCode; ?></td>
                            <td data-title="Name"><?=$userdata->Name?></td>
                            <td data-title="TxnId"><?=$report->TransactionDate?></td>
                            <td data-title="Amount"><i class='fa fa-inr'></i> <?=$report->OrderAmount?></td>
                            <td data-title="Date"> <?=$report->Date?></td>
                        </tr>   
                        <?php } ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>

    <!-- Modal Structure with custom size -->
    <div class="modal fade" id="missingReportModal" tabindex="-1" aria-labelledby="missingReportModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-size">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="missingReportModalLabel">Missing Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <form action="<?php echo $baseUrl;?>controller/UserController.php" method="post">
                    <input type="hidden"  name="action_type" value="missing-report" class="form-control" >
                    <div class="row"><div class="mb-3">
                        <label for="orderId" class="form-label">Order Id/Transaction Id</label>
                        <input type="text" required name="order_id" class="form-control" id="orderId" placeholder="Enter Order Id or Transaction Id">
                      </div>
                       
                        <div class="mb-3">
                            <label for="transactionDate" class="form-label">Transaction Date</label>
                            <input  type="date" class="form-control" required  id="transactionDate" name="transaction_date" />
                        </div>
                        <div class="mb-3">
                            <label for="OrderAmount" class="form-label">Order Amount</label>
                            <input class="form-control" name="order_amount"  required id="OrderAmount" placeholder="Enter order amount" />
                        </div>
                        <div class="mb-3">
                           <label class="form-label">Select Store</label>
                        <select class="form-control" required  name="store_id">
                            <option value="0">Select Store</option>
                        <?php 
	                        $storeList = $adminDao->storeList();
	                        if ($storeList) {
	                          $count = 1;
	                          foreach ($storeList AS $store){?>
	                          <option value='<?php echo $store->Id;?>'><?php echo $store->Name;?></option>  
	                          <?php }}?>
                        </select>
                          </div>
                        <div class="mb-3">
                            <label class="form-label" >Select Coupon </label>
                            <select class="form-control" required  name="coupon_id">
                                <option value="0">Select Coupon</option>
                                <?php 
        	                      $couponList = $adminDao->AllCoupon();
        	                      if ($couponList) {
        	                          $count = 1;
        	                          foreach ($couponList AS $coupon){
    	                          ?>
    	                          <option value='<?php echo $coupon->Id;?>'><?php echo $coupon->CouponHeading;?></option>  
    	                          <?php } } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="source"  required class="form-label">Source </label>
                            <input class="form-control" name="source" id="source" placeholder="Enter source Name" />
                        </div>

                        <div class="mb-3">
                            <label for="otherdetail" class="form-label">Other Detail </label>
                            <textarea class="form-control" required name="other_detail" id="otherdetail" placeholder="Enter  Other detail"></textarea>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
      <?php include "footer.php";?>
    </body>
    </html>
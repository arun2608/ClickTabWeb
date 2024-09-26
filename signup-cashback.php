<?php 
include "dashboard-side-menu.php";
?>
<div class="col-md-9">
    <div class="main-content">
        <div class="col-md-12">
            <div id="no-more-tables"> 
               <div id="top-title"> <h4 class="sub-heading">Signup Cashback</h4> </div>
                
                <table id="datatable" class="table table-striped table-bordered">
                    <thead class="cf">
                        <tr>
                            <th>#</th>
                            <th>Transaction Date</th>
                            <th>Order/Transaction Id</th>
                            <th> Name</th>
                            <!--<th>Sale Amount</th>-->
                            <th>Cashback</th>
                            <th>Sub Id</th>
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        
                        $transactionReport = $adminDao->transactionReport($_SESSION['CTW_LoggedUserId']);
                        if(!empty($transactionReport)){
                         foreach($transactionReport as $report){
                            //$userdata = $adminDao->registerById($report->UserId);
                          $storedata = $adminDao->ReguserById($report->store_id);
                            //$coupondata = $adminDao->CouponById($report->CouponId);
                        if($report->uid=="Sign Up Cashback"){

                        ?>
                        <tr>
                            <td data-title="#"><?= $count++; ?></td>
                            <td data-title="OrderId"><?= $report->trans_date; ?></td>
                            <td data-title="reportId"><?= $report->order_id; ?></td>
                            <td data-title="reportId"><?=$report->uid; ?></td>
                            <td data-title="Txn Id"><?=$report->amount?></td>
                            <td data-title="Amount"><?=$report->sub_id?></td>
                             <td data-title="Amount"><?php if($report->status==0){ echo "Pending"; }
                             if($report->status==1){ echo "Success"; }
                             if($report->status==2){ echo "Rejected"; }?></td>
                        </tr>   
                        <?php } } } else{ ?>  
                        <tr>
                            <td data-title="#" colspan="8">No Transactions </td>
                            </td></tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>

    <!-- Modal Structure with custom size -->

      <?php include "footer.php";?>
    </body></html>
<?php 
include "dashboard-side-menu.php";
?>
<div class="col-md-9">
    <div class="main-content">
        <div class="col-md-12">
            <div id="no-more-tables"> 
               <div id="top-title"> <h4 class="sub-heading">Wallet</h4> <a href="javascript:void(0)" data-bs-toggle="modal" class="btn btn-success btn-xs" data-bs-target="#withdrawlModal"> Withdrawl Money </a> </div>
                <a href="javascript:void(0)" class="btn btn-primary btn-xs"> Signup Cashback : <i class="fa fa-inr"></i> 10 </a>
                &nbsp;<a href="javascript:void(0)" class="btn btn-primary btn-xs"> Transaction Cashback : <i class="fa fa-inr"></i> 
                <?php $wallet = $adminDao->sumOfAmount2($_SESSION ['CTW_LoggedUserId']);
                echo $wallet->Amount;
                ?></a>
               <a href="javascript:void(0)"  class="btn btn-primary btn-xs" > Refer Cashback : <i class="fa fa-inr"></i><?php
                        $count = 1;
                        $registerById = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
                        
                        $referredInvitation = $adminDao->referralUsers($registerById->MyReferralCode);
                        if(!empty($referredInvitation))
                        $earnedAmount=0;
                        foreach($referredInvitation as $report){
                        $tData = $adminDao->sumOfAmount($report->Id);
                        $earnedAmount+= ($tData->Amount*10)/100; 
                            
                        }
                        echo ceil($earnedAmount);
                        ?></a><br>
                <table id="datatable" class="table table-striped table-bordered table-responsive">
                    <thead class="cf">
                        <tr>
                            <th>#</th>
                            <!--<th> Date</th>-->
                            <th>Withdrawl Id</th>
                            <th>Request Amount</th>
                            <th>Mode</th>
                            <th>Bank/UPI</th>
                            <th>Status</th>
                            <!--<th>Sub Id</th>-->
                            <th>Reference</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        
                         $missingreport = $adminDao->withdrawRequest($_SESSION['CTW_LoggedUserId']);
                         if(!empty($missingreport)){
                         foreach($missingreport as $report){
                           $userdata = $adminDao->registerById($report->user_id);
                        //   $storedata = $adminDao->ReguserById($report->StoreId);
                        //   $coupondata = $adminDao->CouponById($report->CouponId);

                        ?>
                        <tr>
                            <td data-title="#"><?= $count++; ?></td>
                            <td data-title="OrderId"><?= $report->withdraw_id; ?></td>
                            <td data-title="amount"><?= $report->amount; ?></td>
                            <td data-title="transaction mode"><?= $report->transaction_mode; ?></td>
                            <td data-title="bankandupi">
                                <?php if($report->transaction_mode=="Bank"){ ?>
                                A/c no:<?= $report->account_number; ?><br>IFSC code:<?= $report->ifsc_code; ?><br>A/C Name:<?= $report->account_holder_name; ?><br>
                                <?php } else {echo $report->upi_id;} ?>
                                </td>
                            <td data-title="status"><?php if($report->status==0){ echo "Pending";} if($report->status==1){ echo "Success";} if($report->status==2){ echo "Rejected";}?></td>
                            <!--<td data-title="Code"><?=$userdata->code?></td>-->
                            <td data-title="reference"><?=$report->reference?></td>
                        </tr>   
                        <?php } } else{ ?>  
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
    <div class="modal fade" id="withdrawlModal" tabindex="-1" aria-labelledby="withdrawlModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-size">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withdrawlModalLabel">Withdrawl Money</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
               <?php $wallet = $adminDao->sumOfAmount($_SESSION ['CTW_LoggedUserId']);
               if($wallet->Amount>149){ ?>
                <form action="<?php echo $baseUrl;?>controller/UserController.php" method="post">
                    <input type="hidden"  name="action_type" value="withdrawl-money" class="form-control" >
                     <div class="mb-6">
                            <label for="OrderAmount" class="form-label">Request Amount</label>
                            <input class="form-control" name="amount"  required id="OrderAmount" placeholder="Enter Request amount" />
                        </div>
                    <div class="mb-6">
                        <label for="orderId" class="form-label">Transaction mode</label>
                        <select name="transaction_mode" class="form-control" onchange="return transaction_mode(this.value)">
                            <option value="0">-Select One-</option>
                            <option value="Bank">Bank</option>
                            <option value="Upi">Upi</option>
                        </select>
                      </div>
                       <div class="row">
                        <div class="mb-6 ac">
                            <label for="transactionDate" class="form-label">Account number</label>
                            <input  type="text" class="form-control"  name="account_number" />
                        </div>
                       
                        
                    
                        <div class="mb-6 ac">
                            <label for="source"  required class="form-label">IFSC Code </label>
                            <input class="form-control" name="ifsc_code" placeholder="Enter IFSC Code" />
                        </div>
                        <div class="mb-6 ac">
                            <label for="source"  required class="form-label">Account Holder Name  </label>
                            <input class="form-control" name="account_holder_name"  placeholder="Account Holder Name " />
                        </div>
                        <div class="mb-6 upi">
                            <label for="source"  required class="form-label">UPI ID </label>
                            <input class="form-control" name="upi_id" id="source" placeholder="Enter UPI" />
                        </div>

                        <div class="mb-6">
                            <label for="otherdetail" class="form-label">Reference </label>
                            <textarea class="form-control" required name="reference" id="otherdetail" placeholder="Enter reference"></textarea>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php } else { ?>
                <h2>Oops !</h2>
                <p>Looks like your redeemable amount is less than ₹ 149. Minimum amount required for bank transfer is ₹ 149.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
      <?php include "footer.php";?>
      
      <style>
        .form-label {
            margin-top: 1rem !important;
            font-weight: 700  !important;
        }
      </style>
      
    </body></html>
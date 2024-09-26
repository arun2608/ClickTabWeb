<?php include_once 'header.php';?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php include_once 'menu.php';?>        
            <div class="right_col" role="main" style="height: 600px;">
                <!-- top tiles -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Withdrawl Request</h2>
                                <div class="clearfix"></div>
         <a href="<?php echo $siteUrl . 'controller/AdminController.php?action_type=withdrawl-export&type=' .$_REQUEST['type']; ?>">
        <button style="color:red">Export</button>
        
       </a>
       <a href="<?php echo $siteUrl.'import-bulk-withdrawl'?>"><button style="color:red">Bulk Withdrawl Updates</button></a>

                            </div>
                            <div class="x_content">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Payment Mode</th>
                                            <th>Bank/UPI Details</th>
                                            <th>Withdraw Id</th>
                                            <th>Customer Name</th>
                                            <th>Withdrawal amount</th>
                                            <th>Mobile No</th>
                                            <th>Date</th>    
                                            <th>Status</th>  
                                        </tr>
                                        </thead>
                                         <tbody>
                                        <?php 
                                        $count = 1;
                                        $missingreport = $adminDao->withdrawlReport($_REQUEST['type']);
                                        if (!empty($missingreport)) {
                                            foreach($missingreport as $report) {
                                                $userdata = $adminDao->registerById($report->user_id); 
                                                // $storedata = $adminDao->ReguserById($report->StoreId);
                                               
                     
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?=$report->transaction_mode?></td>
                                                    <td>
                                                        <?php if($report->transaction_mode=="Bank"){ ?>
                                                        A/c no:<?= $report->account_number; ?><br>
                                                        IFSC code:<?= $report->ifsc_code; ?><br>
                                                        A/C Name:<?= $report->account_holder_name; ?>
                                                        <br>
                                                        <?php } else {echo $report->upi_id;} ?>
                                                    </td>
                                                    <td ><?= $report->withdraw_id; ?></td>
                                                    <td><?= $userdata->Name; ?></td>
                                                    <td><?= $report->amount; ?></td>
                                                    <td><?= $userdata->Mobile; ?> </td>
                                                    <td><?php echo date('d M, Y ', strtotime($report->date)); ?></td>
                                                     <td><select name="status" onchange='return updateTransactionStatus(this.value, <?= $report->id; ?>)'>
                                                        <option value="0" <?=($report->status==0)?"selected":""?>>Pending</option>
                                                        <option value="1"  <?=($report->status==1)?"selected":""?>>Success</option>
                                                        <option value="2"  <?=($report->status==2)?"selected":""?>>Reject</option>
                                                    </select></td>
                                                 </tr>
                                                <?php }
                                            } else {
                                            echo "<tr><td colspan='9'>No details found.</td></tr>";
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once 'footer.php';?>      
        </div>
    </div>
     <input type="hidden" id="siteUrl" value="<?php echo $siteUrl; ?>">
    <?php include_once 'script.php';?>
    <?php require_once 'tabel-js.php';?>
    <script>
    var siteUrl = $("#siteUrl").val();
       function updateTransactionStatus(obj, id){
        var formData = new FormData();
        formData.append('status', obj);
        formData.append('id', id);
        formData.append('action_type', 'update-withdraw-status');

        $.ajax({
            url: siteUrl + 'controller/AdminController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
               
                    $("#msg_error2").show();
                   if(obj==0){
                       $("#msg_error2").html("Withdrawl is pending "); 
                    }else  if(obj==1){
                        $("#msg_error2").html("Withdrawl is Accepted "); 
                    } else  if(obj==2){
                        $("#msg_error2").html("Withdrawl is Rejected "); 
                    } else {
                        $("#msg_error2").html(""); 
                    }
                    
                    
                    setTimeout(function() {
                        window.location.href = siteUrl+'withdrawal.php?type='+obj;
                    }, 2000);

                
            },
        });
    }
    </script>
</body>
</html>

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
                                <h2>Transaction Report</h2>
                                <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=transaction-report-export'?>"><button style="color:red">Export</button></a>
                                <a href="<?php echo $siteUrl.'import-bulk-transactions'?>"><button style="color:red">Bulk Transaction Updates</button></a>
                                <a href="<?php echo $siteUrl.'import-offline-transactions'?>"><button style="color:red">Import Offline Transaction </button></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p id="msg_error2">&nbsp;</p>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UID</th>
                                            <th>Sub ID</th>
                                            <th>OrderId</th>
                                            <th>Store Name</th>
                                            <th>Transation Date</th>
                                            <th>Amount</th>
                                            <th>Date</th>    
                                            <th>Status</th>   
                                        </tr>
                                        </thead>
                                         <tbody>
                                        <?php 
                                        
                                        $count = 1;
                                        $clickReport = $adminDao->transactionReport();
                                        if (!empty($clickReport)) {
                                            foreach($clickReport as $report) {
                                                $userdata = $adminDao->registerById($report->user_id); 
                                                $storedata = $adminDao->ReguserById($report->store_id);
                     
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?= $report->uid; ?></td>
                                                    <td><?= $report->sub_id; ?></td>
                                                    <td><?= $report->order_id; ?></td>
                                                    <td ><?= $storedata->Name; ?></td>
                                                   <td ><?= date('d M, Y ', strtotime($report->trans_date)); ?></td>
                                                    <td><i class="fa fa-inr"></i><?= $report->amount; ?></td>
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
        <input type="hidden" id="siteUrl" value="<?php echo $siteUrl; ?>">
    </div>
    <?php include_once 'script.php';?>
    <?php require_once 'tabel-js.php';?>
    <script>
    var siteUrl = $("#siteUrl").val();
       function updateTransactionStatus(obj, id){
        var formData = new FormData();
        formData.append('status', obj);
        formData.append('id', id);
        formData.append('action_type', 'update-trans-status');

        $.ajax({
            url: siteUrl + 'controller/AdminController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
               
                    $("#msg_error2").show();
                    if(obj==0){
                       $("#msg_error2").html("Transaction is pending "); 
                    }else  if(obj==1){
                        $("#msg_error2").html("Transaction is Accepted "); 
                    } else  if(obj==2){
                        $("#msg_error2").html("Transaction is Rejected "); 
                    } else {
                        $("#msg_error2").html(""); 
                    }
                    //$("#msg_error2").html("Transaction"+ obj);
                    setTimeout(function() {
                        window.location.href = siteUrl+'transaction-report';
                    }, 2000);

                
            },
        });
    }
    </script>
</body>
</html>

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
                                <h2>Missing Report</h2>
                                <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=missing-report-export'?>"><button style="color:red">Export</button></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
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
                                        $missingreport = $adminDao->missingReportList();
                                        if (!empty($missingreport)) {
                                            foreach($missingreport as $report) {
                                                $userdata = $adminDao->registerById($report->UserId); 
                                                $storedata = $adminDao->ReguserById($report->StoreId);
                                                $coupondata = $adminDao->CouponById($report->CouponId);
                     
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?= $report->OrderId; ?></td>
                                                    <td ><?= $storedata->Name; ?></td>
                                                   <td ><?= $coupondata->CouponCode; ?></td>
                                                    <td><?= $userdata->Name; ?></td>
                                                    <td><?= $report->TransactionDate; ?></td>
                                                    <td>₹ <?= $report->OrderAmount; ?></td>
                                                    <td><?php echo date('d M, Y ', strtotime($report->Date)); ?></td>
                                                    <td> <select name="status" onchange='return updateTransactionStatus(this.value, <?= $report->Id; ?>)'>
                                                        <option value="0" <?=($report->Status==0)?"selected":""?>>Pending</option>
                                                        <option value="1"  <?=($report->Status==1)?"selected":""?>>Success</option>
                                                        <option value="2"  <?=($report->Status==2)?"selected":""?>>Reject</option>
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
        formData.append('action_type', 'update-missing-status');

        $.ajax({
            url: siteUrl + 'controller/AdminController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
               
                    $("#msg_error2").show();
                    if(obj==0){
                       $("#msg_error2").html("Missing Transaction is pending "); 
                    }else  if(obj==1){
                        $("#msg_error2").html("Missing Transaction is Accepted "); 
                    } else  if(obj==2){
                        $("#msg_error2").html("Missing Transaction is Rejected "); 
                    } else {
                        $("#msg_error2").html(""); 
                    }
                    //$("#msg_error2").html("Transaction"+ obj);
                    setTimeout(function() {
                        window.location.href = siteUrl+'report';
                    }, 2000);

                
            },
        });
    }
    </script>
</body>
</html>

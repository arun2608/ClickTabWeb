<?php include_once 'header.php';
$type=$_REQUEST['type'];?>
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
                                <h2><?php if($type==1){ echo "Success"; } else if($type==2){echo "Rejected";} else { echo "Pending";}?> Payments</h2>
                                <div class="clearfix"></div>
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
                                                     <td><?php if($report->status==0){ echo "Pending";} if($report->status==1){ echo "Success";} if($report->status==2){ echo "Reject";}?>
                                                         </td>
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
    <?php include_once 'script.php';?>
    <?php require_once 'tabel-js.php';?>
</body>
</html>

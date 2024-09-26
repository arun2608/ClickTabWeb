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
                                <h2>All Report</h2>
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

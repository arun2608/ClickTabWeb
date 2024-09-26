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
                                <h2>Click Report</h2>
                                <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=click-report-export'?>"><button style="color:red">Export</button></a>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sub Id</th>
                                            <th>UID</th>
                                            <th>Order ID</th>
                                            <th>Campaign name</th>
                                            <th>Sale Amount</th>
                                            <th>Currency</th>
                                            <th>Refrence Link</th>
                                            
                                            <th>Cashback</th>
                                            <th>Date</th>    
                                        </tr>
                                        </thead>
                                         <tbody>
                                        <?php 
                                        $count = 1;
                                        $clickReport = $adminDao->clickReport();
                                        if (!empty($clickReport)) {
                                            foreach($clickReport as $report) {
                                               
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?= $report->sub_id; ?></td>
                                                    <td ><?= $report->ctw_order_id; ?></td>
                                                    <td ><?= $report->order_id; ?></td>
                                                    <td ><?= $report->campaign_name; ?></td>
                                                   <td ><?= $report->sale_amount; ?></td>
                                                    <td><?= $report->currency; ?></td>
                                                    <td><a href='<?= $report->refernce_link; ?>'>Ref Link</a></td>
                                                    <td><?= $report->cashback; ?></td>
                                                    <td><?php echo date('d M, Y ', strtotime($report->date)); ?></td>
                                                 </tr>
                                                <?php }
                                            } else {
                                            echo "<tr><td colspan='8'>No details found.</td></tr>";
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

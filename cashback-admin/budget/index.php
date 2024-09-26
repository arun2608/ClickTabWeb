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
                    <h2>Budget List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S.No.</th>						  
						  <th>Min Rank</th>
						  <th>Max Rank</th>
						  <th>Fee</th>
						  <th>Date</th>
                          <th width="10%">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $predictorList = $adminDao->predictorList();
                        if ($predictorList) {
                        	$count = 1;
                        	foreach ($predictorList as $budget) {
                           ?>
                        <tr>
                          <td><?php echo $count++;?></td>                          
						  <td><?php echo $budget->MinRank;?></td>
						  <td><?php echo $budget->MaxRank;?></td>
						  <td >Rs. <?php echo $budget->Fee;?></td>
						  
                          <td><?php echo $budget->Date;?></td>						 
                          <td>
                          	<a href="<?php echo $siteUrl;?>budget/edit-predictor-<?php echo $budget->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=delete-budget&id='.$budget->Id;?>" onclick="return confirm('Are you sure. you want to delete this rank.')"><i class="fa fa-trash" aria-hidden="true"></i></a>	    
		
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

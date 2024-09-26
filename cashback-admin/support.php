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
                    <h2>All Support</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No.</th>
						              <th> User Name</th>
                          <th> Title</th>
                          <th> Description</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $supportList = $adminDao->supportList();
                        if ($supportList) {
						            	$count = 1;
                        	foreach ($supportList AS $support){
                            $userdata = $adminDao->registerById($support->UserId); ?>
                        
                        <tr>
                      <td><?php echo $count++;?> </td>
                    <td><?php echo $userdata->Name;?></td>
						       <td><?php echo $support->Title;?></td>
                   <td><?php echo $support->Description;?></td>
                   <td><?php echo date('d M, Y ',strtotime($support->Date));?></td>
						    
                        </tr>
                        <?php }}else{echo "<tr><td colspan='4'>No details..</td></tr>";}?>
                      </tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div></div>
        </div>
 	<?php include_once 'footer.php';?>      
 	</div>
    </div>
	<?php include_once 'script.php';?>
	<?php require_once 'tabel-js.php';?>
  </body>
</html>

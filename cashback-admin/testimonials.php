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
                    <h2>Testimonial List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S.No.</th>						  
						  <th>Name</th>
						  <th>Testimonial</th>
						  <th>Date</th>
                          <th width="10%">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $testimonialList = $adminDao->testimonialList();
                        if ($testimonialList) {
                        	$count = 1;
                        	foreach ($testimonialList as $testi) {?>
                        <tr>
                          <td><?php echo $count++;?></td>                          
						  <td><?php echo $testi->Name;?></td>
						  <td><?php echo $testi->Content;?></td>
						  
                          <td><?php echo $testi->Date;?></td>						 
                          <td>
								<a onclick="confirm('Do you really want to delete this Testimonial?')"; href="<?php echo $siteUrl;?>controller/StatusController.php?id=<?php echo $testi->Id;?>&action_type=delete-testimonial"><i class="fa fa-trash" aria-hidden="true" style="color:#2fd02f;"></i></a>
							
                          </td>                       
                        </tr>
						<?php }}else{echo "<tr><td colspan='5'>No details..</td></tr>";}?>
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

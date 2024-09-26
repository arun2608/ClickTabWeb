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
                    <h2>Brand List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No.</th>
                          
                          <th>Brand</th>
						  <th>Create Date</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $brandList = $adminDao->brandList(1);
                        if ($brandList) {
							$count = 1;
                        	foreach ($brandList AS $brand){?>
                        <tr>
                          <td><?php echo $count++;?> </td>
             
						  <td><?php echo $brand->Brand;?></td>
                          <td><?php echo date('d M, Y H:i:s',strtotime($brand->Date));?></td>
						  <td>
							<a href="<?php echo $siteUrl."product/edit-brand-".$brand->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>							

						  </td>
                        </tr>
                        <?php }}else{echo "<tr><td colspan='5'>No details..</td></tr>";}?>
                      </tbody>
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

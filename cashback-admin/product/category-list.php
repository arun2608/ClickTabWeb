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
                    <h2>Category List</h2>
                    <div class="clearfix"></div>
                    <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=category-export'?>"><button style="color:red">Export</button></a>

                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No.</th>
                          
                          <th>Category</th>
						              <th>Create Date</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $categoryList = $adminDao->categoryList();
                        if ($categoryList) {
							          $count = 1;
                        	foreach ($categoryList AS $category){?>
                        <tr>
                          <td><?php echo $count++;?> </td>
                          
						              <td><?php echo $category->Category;?></td>
                          <td><?php echo date('d M, Y h:i:s',strtotime($category->Date));?></td>
            						  <td>
            							<a href="<?php echo $siteUrl."product/edit-category-".$category->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>							
            							<?php
            								if($category->Status=="1"){?>
              							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=category-status&id='.$category->Id.'&status=0';?>"><i class="fa fa-check" area-hidden="true" style="color:green;"></i></a>
              							<?php }else{ ?>
              							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=category-status&id='.$category->Id.'&status=1';?>"><i class="fa fa-times" area-hidden="true" style="color:red" ></i></a>
            							<?php }?>
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

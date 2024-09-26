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
                    <h2>Product List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width='10%'>Sr.No.</th>
						  <th>Product</th>						  
                          <th width='15%'>Create Date</th>
						  <th width='10%'>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $productList = $adminDao->productList();
                        if ($productList) {
							$count = 1;
                        	foreach ($productList AS $product){
								$categoryData = $adminDao->categoryById( $product->Category );
								$subCatData = $adminDao->subCatById( $product->SubCat );
								$productStockData = $adminDao->productStockByProductId( $product->Id );?>
                        <tr>
                          <td><?php echo $count++;?> </td>
						  <td><?php echo $product->Product;?><?php if($productStockData){echo "<font style='color:red;'>Stock (0)</font>";}?></td>						  
                          <td><?php echo date('d M, Y H:i:s',strtotime($product->Date));?></td>		
						  <td>
							<a href="<?php echo $siteUrl."product/edit-product-".$product->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>							
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=delete-product&id='.$product->Id."&product_image=".$product->ProductImage;?>" onclick="return confirm('Are you sure. you want to delete this service.')"><i class="fa fa-trash" aria-hidden="true"></i></a>
							<?php
								if($product->Status=="1"){?>
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=product-status&id='.$product->Id.'&status=0';?>"><i class="fa fa-check" area-hidden="true" style="color:green;"></i></a>
							<?php }else{ ?>
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=product-status&id='.$product->Id.'&status=1';?>"><i class="fa fa-times" area-hidden="true" style="color:red" ></i></a>
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

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
                    <h2>Update Brand<small id="product-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<?php 
						$brandData = $adminDao->brandById($_REQUEST['id']);?>
                    <form class="form-horizontal form-label-left frm" >
					<input type="hidden" name="action_type" value="update-brand">
					<input type="hidden" name="id" value="<?php echo $brandData->Id;?>">
					<div class="form-group col-md-4">
                      <label>Brand</label>
                       <input type='text' name='brand' class="form-control" placeholder='Enter brand' value="<?php echo $brandData->brand;?>"/>
					   <span class='message' id='msgbrand' style='display:none;'>&nbsp;</span>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Banner <img style="width:20px;" src="<?php echo $imageUrl."brand/".$brandData->Banner;?>"/></label>
                        <input id="file_1" type="file" name="banner" class="form-control col-md-7 col-xs-12"  accept=".jpeg,.jpg,.png,.webp">                                                  
                    </div>
          <div class="form-group col-md-4">
                        <label>Brand Image <img style="width:20px;" src="<?php echo $imageUrl."brand/".$brandData->BrandImage;?>"/></label>
                        <input id="file_2" type="file" name="brand_image" class="form-control col-md-7 col-xs-12"  accept=".jpeg,.jpg,.png,.webp">                                                  
                    </div>

                    <div class="clearfix"></div>
          <p>&nbsp;</p>
          <div class="clearfix"></div>
          <fieldset>
          <legend>SEO Keyword</legend>
          <div class="form-group col-md-4">
                      <label>Title</label>
                       <textarea name='title' class="form-control" placeholder='Enter Title' style='height:100px;'><?php echo $categoryData->Title;?></textarea>
             <span class='message' id='msgtitle' style='display:none;'>&nbsp;</span>
                    </div>
          
          <div class="form-group col-md-4">
                      <label>Meta Keyword</label>
                       <textarea name='meta_keyword' class="form-control" placeholder='Enter Meta Keyword' style='height:100px;'><?php echo $categoryData->MetaKeyword;?></textarea>
             <span class='message' id='msgmeta_keyword' style='display:none;'>&nbsp;</span>
                    </div>
          
          <div class="form-group col-md-4">
                      <label>Meta Description</label>
                       <textarea name='meta_description' class="form-control" placeholder='Enter Meta Description' style='height:100px;'><?php echo $categoryData->MetaDescription;?></textarea>
             <span class='message' id='msgmeta_description' style='display:none;'>&nbsp;</span>
                    </div>
          </fieldset>
					
					
					<div class='clearfix'></div>
					<div class="form-group col-md-2 pull-right">
						<label>&nbsp;</label>
						<button type='button' id="authenticateBrand" class="form-control btn btn-success">Update Brand</button>
					</div>
					

                  </form>
                  </div>
                </div>
              </div></div>
        </div>
 	<?php include_once '../footer.php';?>      
 	</div>
    </div>
	<?php include_once '../script.php';?>
  </body>
</html>

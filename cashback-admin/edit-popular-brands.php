<?php require_once 'header.php';?>
 
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require_once 'menu.php';?>
        <div class="right_col" role="main" >
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Popular Brands <small id="product-msg">Please select atleast 12 brands</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php //$bannerData = $adminDao->bannerById($_REQUEST['id']);?>
                    <form id="frm" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo $siteUrl;?>controller/AdminController.php">
                      <input type="hidden" name="action_type" value="update-popular-brands">
                      <input type="hidden" name="id" value="1">
					    
                     <?php 
                     $showingBrands = $adminDao->showingBrands(1);
                     $brands = unserialize($showingBrands->brands);
                        $ReguserList = $adminDao->ReguserList();
                        if ($ReguserList) {
                        	$count = 1;
                        	foreach ($ReguserList as $reguser) {
                        	    $offerTypeById = $adminDao->offerTypeById($reguser->OfferType);
                           ?>
					  <div class="form-group col-md-4" >
                        <label>
                        <input type="checkbox" name="popular_brand[]" <?=(in_array($reguser->Id,$brands))?"checked":""?>  value="<?php echo $reguser->Id;?>"> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $reguser->Name;?></label>
                      </div>
                      <?php }} ?>
					  
					  <div class='clearfix'></div>
					  <div class="form-group col-md-4 pull-right">
						<input type="submit" class="pull-right btn btn-success" value="Update Brand"/>
					  </div>

                    </form>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php require_once 'footer.php';?>
      </div>
    </div>
    <?php include_once 'script.php';?>
    </body>
</html>
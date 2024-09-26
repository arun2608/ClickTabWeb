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
                    <h2>Edit Banner <small id="product-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php $bannerData = $adminDao->bannerById($_REQUEST['id']);?>
                    <form id="frm" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo $siteUrl;?>controller/AdminController.php">
                      <input type="hidden" name="action_type" value="update-banner">
                      <input type="hidden" name="type" value="<?php echo $bannerData->Type;?>">
                      <input type="hidden" name="id" value="<?php echo $bannerData->Id;?>">
					    
                      <div class="form-group col-md-4">
                        <label>Banner <img style="width:20px;" src="<?php echo $imageUrl."banner/".$bannerData->Image;?>"/></label>
                        <input id="img" type="file" name="image" class="form-control col-md-7 col-xs-12" >                                                  
                      </div>
					  <div class="form-group col-md-4" style="display:none;" >
                        <label>Text 1</label>
                        <input type="text" name="text_1" class="form-control col-md-7 col-xs-12" value="<?php echo $bannerData->Text_1;?>">                                                  
                      </div>
					  <div class="form-group col-md-4" style="display:none;">
                        <label>Text 2</label>
                        <input type="text" name="text_2" class="form-control col-md-7 col-xs-12" value="<?php echo $bannerData->Text_2;?>">                                                  
                      </div>
					  
					  <div class="form-group col-md-4">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control col-md-7 col-xs-12" value="<?php echo $bannerData->Link;?>">                                                  
                      </div>
					  <div class='clearfix'></div>
					  <div class="form-group col-md-4 pull-right">
						<input type="submit" class="pull-right btn btn-success" value="Update Banner"/>
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
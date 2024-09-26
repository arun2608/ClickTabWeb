<?php require_once '../header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require_once '../menu.php';?>
        <div class="right_col" role="main" >
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
				<?php 
					$id = $_REQUEST['id'];
					$bannerData = $adminDao->siteControlById($id);?>
				<div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Pages Title/Keyword<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form id="frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="update-title-keyword">
                      <input type="hidden" name="id" value="<?php echo $bannerData->Id;?>">
					  
					  
					  <div class="form-group col-md-4">
                        <label>Type</label>
                        <input type="text" class="form-control" readonly value='<?php echo $bannerData->Heading_1;?>'>
						<span class="message" id="msgheading_1"></span>                                                
                      </div>
					  

					  <div class='clearfix'></div>
					  <div class="form-group col-md-4">
                        <label>Title</label>
                        <textarea name="title" class="form-control"><?php echo $bannerData->Title;?></textarea>
						<span class="message" id="msgtitle"></span>                                                
                      </div>
					  
					  <div class="form-group col-md-4">
                        <label>Keyword</label>
                        <textarea name="meta_keyword" class="form-control"><?php echo $bannerData->MetaKeyword;?></textarea>
						<span class="message" id="msgmeta_keyword"></span>                                                
                      </div>
					  
					  <div class="form-group col-md-4">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control"><?php echo $bannerData->MetaDescription;?></textarea>
						<span class="message" id="msgmeta_description"></span>                                                
                      </div>
					  <div class='clearfix'></div>
					  					  
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="button" class="btn btn-success pull-right" id="authenticateTitleKeyword">Save</button>
                      </div>

                    </form>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php require_once '../footer.php';?>
      </div>
    </div>
    <?php include_once '../script.php';?>
	<script src="<?php echo $siteUrl;?>assets/js/home-service.js"></script>		
</body>
</html>
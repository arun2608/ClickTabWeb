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
                    <h2>Edit Blog<small id="product-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <?php 
					 $blogData = $adminDao->blogById($_REQUEST['id']);?>
                    <form class="form-horizontal form-label-left frm" >
					<input type="hidden" name="action_type" value="update-blog">
					<input type="hidden" name="id" value="<?php echo $blogData->Id;?>">
					<input type="hidden" name="type" value="2">
					
					
					<div class="form-group col-md-4">
                      <label>Heading</label>
                       <input type='text' name='heading' class="form-control" placeholder='Enter Heading' value="<?php echo $blogData->Heading;?>"/>
					   <span class='message' id='msgheading' style='display:none;'>&nbsp;</span>
                    </div>
					<div class="form-group col-md-4">
                      <label>Blog Date</label>
                       <input type='text' name='blog_date' class="form-control single_cal1" placeholder='Select Blog Date' value="<?php echo date("d-m-Y",strtotime($blogData->BlogDate));?>"/>
					   <span class='message' id='msgblog_date' style='display:none;'>&nbsp;</span>
                    </div>
					<div class="form-group col-md-4">
                      <label>Name</label>
                       <input type='text' name='name' class="form-control" placeholder='Enter name' value="<?php echo $blogData->Name;?>"/>
					   <span class='message' id='msgname' style='display:none;'>&nbsp;</span>
                    </div>
					<div class="form-group col-md-4">
                      <label>Image</label>
                       <input type='file' id='file_1' name='image' class="form-control" />
					   <span class='message' id='msgimage' style='display:none;'>&nbsp;</span>
                    </div>
					
					<div class="form-group col-md-4">
                      <label>Title</label>
                       <input type='text' name='title' class="form-control" placeholder='Enter Title' value="<?php echo $blogData->Title;?>"/>
					   <span class='message' id='msgtitle' style='display:none;'>&nbsp;</span>
                    </div>
					
					<div class="form-group col-md-4">
                      <label>Meta Keyword</label>
                       <input type='text' name='meta_keyword' class="form-control" placeholder='Enter Meta Keyword' value="<?php echo $blogData->MetaKeyword;?>"/>
					   <span class='message' id='msgmeta_keyword' style='display:none;'>&nbsp;</span>
                    </div>
					<div class="form-group col-md-4">
                      <label>&nbsp;</label>
					  <div class="clearfix"></div>
                      <?php if($blogData->Image!=""){?>
					  <img src='<?php echo $imageUrl."blog/".$blogData->Image;?>' style='width:50px;'/>
					  <?php }?>
					   <span class='message' id='msgimage' style='display:none;'>&nbsp;</span>
                    </div>
					<div class="clearfix"></div>
					<div class="form-group col-md-4">
                      <label>Meta Description</label>
                       <input type='text' name='meta_description' class="form-control" placeholder='Enter Meta Description' value="<?php echo $blogData->MetaDescription;?>"/>
					   <span class='message' id='msgmeta_description' style='display:none;'>&nbsp;</span>
                    </div>
					<div class="form-group col-md-6">
                      <label>Short Description</label>
					  <div class="clearfix"></div>
                       <textarea name="short_description"  class="form-control"><?php echo $blogData->ShortDescription;?></textarea>
					   <span class='message' id='msgshort_description' style='display:none;'>&nbsp;</span>
                    </div>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">
                      <label>Description</label>
					  <div class="clearfix"></div>
                       <textarea name="description" style="height:200px;" class="form-control" id='editor'><?php echo $blogData->Description;?></textarea>
					   <span class='message' id='msgdescription' style='display:none;'>&nbsp;</span>
                    </div>
					
					<div class="clearfix"></div>
					
					<div class="form-group col-md-2 pull-right">
						<label>&nbsp;</label>
						<button type='button' id="authenticateUpdateBlog" class="form-control btn btn-success">Update Blog</button>
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
	<style>
	.cazary{
		width: 768px !important;
	}	
	.nav-md{
		font-size:13px !important;
	}
	</style>

	<script src="<?php echo $siteUrl;?>assets/ckeditor/ckeditor.js"></script>
	<script src="<?php echo $siteUrl;?>assets/ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="<?php echo $siteUrl;?>assets/ckeditor/samples/css/samples.css">
	<script>
		 CKEDITOR.replace('editor', {
			filebrowserUploadUrl: "<?php echo $siteUrl;?>assets/ckeditor/ck_upload.php",
			filebrowserUploadMethod: 'form'
		});

    </script>
	<script src="<?php echo $siteUrl;?>assets/js/moment.min.js"></script>
	<script src="<?php echo $siteUrl;?>assets/js/daterangepicker.js"></script>
	<link href="<?php echo $siteUrl;?>assets/css/daterangepicker.css" rel="stylesheet">
	<script>
	$(document).ready(function() {
		$('.single_cal1').daterangepicker({
			format: 'DD-MM-YYYY',
			singleDatePicker: true,
			calender_style: "picker_2"		
		});
	});
	</script>
</body>
</html>
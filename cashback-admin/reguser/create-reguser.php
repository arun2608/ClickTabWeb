<?php require_once '../header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require_once '../menu.php';?>
        <div class="right_col" role="main" >
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Create Store<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" class="form-horizontal form-label-left" action="<?php echo $siteUrl;?>controller/AdminController.php"  enctype="multipart/form-data">
                      <input type="hidden" name="action_type" value="create-reguser">
                <div class="row">
					          <div class="form-group col-md-4">
                      <label>Category </label>
                      <select class="form-control search-box"  name="category">
                      <?php 
                        $categoryList = $adminDao->categoryList();
                        if ($categoryList) {
                          $count = 1;
                          foreach ($categoryList AS $category){ ?>
                          <option value='<?php echo $category->Id;?>'><?php echo $category->Category;?></option>  
                        <?php } } ?>
                      </select>
                     <span class='message' id='msgcategory' style='display:none;'>&nbsp;</span>
                    </div>
                    </div>
                     <div class="col-md-4 form-group">
                        <label> Compaign Status</label>
                         <select name="com_status" class="form-control col-md-7 col-xs-12">
                         <option value="" >Select Status</option>
                         <option value="1" >Success</option>
                           <option value="0">Fail</option>
                          </select>
						           <div class="clearfix"></div>
					              <span class="message" id="msgcom_status"></span>                        
                      </div>


                     <div class="col-md-4 form-group">
                        <label> Compaign Trending</label>
                         <select name="com_trending" class="form-control col-md-7 col-xs-12">
                         <option value="" >Select </option>
                         <option value="1" >True</option>
                           <option value="0">False</option>
                          </select>
						           <div class="clearfix"></div>
					              <span class="message" id="msgcom_trending"></span>                        
                      </div>

					           <div class="col-md-4 form-group">
                        <label> Compaign Deep Linking</label>
                         <select name="com_deeplink" class="form-control col-md-7 col-xs-12">
                         <option value="" >Select </option>
                         <option value="1" >True</option>
                           <option value="0">False</option>
                          </select>
						           <div class="clearfix"></div>
					              <span class="message" id="msgcom_deeplink"></span>                        
                      </div>

                    <div class="col-md-4 form-group">
                        <label> Compaign Name</label>
                        <input type='text' name="name" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign name" required>
						           <div class="clearfix"></div>
					              <span class="message" id="msgname"></span>                        
                      </div>
					  

                      <div class="form-group col-md-8">
                        <label>Compaing Logo </label>
                        <input id="file_2" type="text" name="image"   placeholder=" Compaign  logo  url" class="form-control col-md-7 col-xs-12" >
                    </div>



                      <div class="col-md-6 form-group">
                        <label> Compaign offer Title</label><br>
                        <h6 style="color:red">Note: Ex: (Flat 15% off) only</h6>
                        <input type='text' name="com_offer_title" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign offer title" required>
						           <div class="clearfix"></div>
					              <span class="message" id="msgcom_offer_title"></span>                        
                      </div>


                      <div class="col-md-6 form-group">
                        <label> Compaign Meta Title</label><sbr>
                        <h6 style="color:red">Note: Ex: Meta Title for page title</h6>
                        <input type='text' name="com_meta_title" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign meta  title" required>
						           <div class="clearfix"></div>
					              <span class="message" id="msgcom_meta_title"></span>                        
                      </div>
                      
                      <div class="form-group col-md-12">
                        <label>Compaign Link</label>
                        <input id="url" type="text" name="link" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign link" >
                    </div>

                    <div class="col-md-4 form-group"> 
                      <label>Backend CTW offer </label>
                      <h6 style="color:red">Note: Ex: Offer Select </h6>
                      <select name="offer_type" class="form-control col-md-7 col-xs-12">
                      <option value="">Select</option>
                          <?php 
                          $offerType = $adminDao->offerTypelist();
                          if ($offerType) {
                              foreach ($offerType AS $offer){?>
                            <option value='<?php echo $offer->Id;?>'><?php echo $offer->Name;?></option>  
                              <?php }}?>
                    </select>
                      <div class="clearfix"></div>
                    <span class="message" id="msgoffer_type"></span>                        
                  </div>

                      <div class="form-group col-md-4">
                        <label>Offer Value </label>
                        <h6 style="color:red">Note: Ex:  Value only in digit just like 10 or 5 </h6>
                        <input  type="text" name="offer_value" class="form-control col-md-7 col-xs-12" placeholder="Enter  Compaign offer value"  >
                     </div>

                     <div class="col-md-4 form-group">
                        <label> Default Tracking </label>
                        <h6 style="color:red">Note: Ex: defalut Tracking</h6>
                         <select name="default_tacking" class="form-control col-md-7 col-xs-12">
                         <option value="" >Select </option>
                         <option value="1" selected >True</option>
                           <option value="0">False</option>
                          </select>
						           <div class="clearfix"></div>
					              <span class="message" id="msgdefault_tacking"></span>                        
                      </div>


                    

                    <div class="form-group col-md-4">
                        <label>Estimate Cashback Date </label>
                        <input  type="date" name="esti_cashback_date" placeholder="Enter Estimate Cashback date" class="form-control col-md-7 col-xs-12" value="<?=date('Y-m-d', strtotime("+90 days"));?>" >
                     </div>

                     <div class="form-group col-md-4">
                        <label>Avg. Tracking Speed </label>
                        <input  type="text" name="avg_tracking_speed" placeholder="Enter Avg. Tracking Speed  " class="form-control col-md-7 col-xs-12" value="2-3 Days">
                     </div>


                     <div class="form-group col-md-4">
                        <label>Avg. Cashback Claim Time </label>
                        <input  type="text" name="avg_claim_time" placeholder="Enter Avg. Cashback Claim time" class="form-control col-md-7 col-xs-12" value="90 Days">
                     </div>

                     <div class="form-group col-md-6">
                        <label>Store Description </label>
                        <textarea  id="editor" name="description" class="form-control col-md-7 col-xs-12" ></textarea>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Cashback T&C </label>
                        <textarea  id="editor1" name="cashback_rate" class="form-control col-md-7 col-xs-12" ></textarea>
                     </div>
                     
                     

                    <div class="form-group col-md-8" id="keyword-container">
                      <label>Searching Keywords</label>
                      <input type="text" name="searching_keywords[]" placeholder="Enter Searching Keywords" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="form-group col-md-4 pull-right">
                      <label>&nbsp;</label>
                      <div class="clearfix"></div>
                      <button type="button" id="add-keyword" class="btn btn-success pull-right">Add Search Keyword</button>
                    </div>

					           <div class="clearfix"></div>
                      <div class="form-group col-md-4 pull-right">
				      	      	<label>&nbsp;</label>
					 	               <div class="clearfix"></div>
                        <button type="submit" name='submit' class="btn btn-success pull-right" >Save</button>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo $siteUrl;?>assets/ckeditor/ckeditor.js"></script>
	<script src="<?php echo $siteUrl;?>assets/ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="<?php echo $siteUrl;?>assets/ckeditor/samples/css/samples.css">
	<script>
		 CKEDITOR.replace('editor', {
			filebrowserUploadUrl: "<?php echo $siteUrl;?>assets/ckeditor/ck_upload.php",
			filebrowserUploadMethod: 'form'
		});
		 CKEDITOR.replace('editor1', {
			filebrowserUploadUrl: "<?php echo $siteUrl;?>assets/ckeditor/ck_upload.php",
			filebrowserUploadMethod: 'form'
		});
</script>
	<link href="<?php echo $siteUrl;?>assets/css/datepicker.css" rel="stylesheet">
	<script src="<?php echo $siteUrl;?>assets/js/bootstrap-datepicker.js"></script>


<script>
$(document).ready(function() {
    $('#add-keyword').click(function() {
        var newKeyword = '<div class="form-group col-md-8 keyword-input">' +
                            '<input type="text" name="searching_keywords[]" placeholder="Enter Searching Keywords" class="form-control col-md-7 col-xs-12">' +
                            '<button type="button" class="btn btn-danger remove-keyword">Remove</button>' +
                         '</div>';
        $('#keyword-container').append(newKeyword);
    });

    $(document).on('click', '.remove-keyword', function() {
        $(this).closest('.keyword-input').remove();
    });
});
</script> 
</body>
</html>

<?php require_once '../header.php'; ?>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php require_once '../menu.php'; ?>
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Edit Store<small id="validate-msg"></small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <?php
                  $ReguserData = $adminDao->ReguserById($_REQUEST['id']);
                ?>
                <form method="post" class="form-horizontal form-label-left" action="<?php echo $siteUrl; ?>controller/AdminController.php" enctype="multipart/form-data">
                  <input type="hidden" name="action_type" value="update-reguser">
                  <input type="hidden" name="id" value="<?php echo $ReguserData->Id; ?>">
                  
                  <!-- Category -->
                  <div class="form-group col-md-4">
                    <label>Category</label>
                    <select class="form-control search-box" name="category">
                      <?php 
                        $categoryList = $adminDao->categoryList();
                        if ($categoryList) {
                          foreach ($categoryList as $category) {
                      ?>
                        <option value='<?php echo $category->Id; ?>' <?=($ReguserData->Category == $category->Id) ? "selected" : ""; ?>><?php echo $category->Category; ?></option>
                      <?php }} ?>
                    </select>
                    <span class='message' id='msgcategory' style='display:none;'>&nbsp;</span>
                  </div>
                  
                  <!-- Compaign Status -->
                  <div class="col-md-4 form-group">
                    <label>Compaign Status</label>
                    <select name="com_status" class="form-control col-md-7 col-xs-12">
                      <option value="">Select Status</option>
                      <option value="1" <?=($ReguserData->CompStatus == 1) ? "selected" : ""; ?>>Success</option>
                      <option value="0" <?=($ReguserData->CompStatus == 0) ? "selected" : ""; ?>>Fail</option>
                    </select>
                    <div class="clearfix"></div>
                    <span class="message" id="msgcom_status"></span>
                  </div>

                  <!-- Compaign Trending -->
                  <div class="col-md-4 form-group">
                    <label>Compaign Trending</label>
                    <select name="com_trending" class="form-control col-md-7 col-xs-12">
                      <option value="">Select</option>
                      <option value="1" <?=($ReguserData->CompTrending == 1) ? "selected" : ""; ?>>True</option>
                      <option value="0" <?=($ReguserData->CompTrending == 0) ? "selected" : ""; ?>>False</option>
                    </select>
                    <div class="clearfix"></div>
                    <span class="message" id="msgcom_trending"></span>
                  </div>

                  <!-- Compaign Deep Linking -->
                  <div class="col-md-4 form-group">
                    <label>Compaign Deep Linking</label>
                    <select name="com_deeplink" class="form-control col-md-7 col-xs-12">
                      <option value="">Select</option>
                      <option value="1" <?=($ReguserData->compdeeplink == 1) ? "selected" : ""; ?>>True</option>
                      <option value="0" <?=($ReguserData->compdeeplink == 0) ? "selected" : ""; ?>>False</option>
                    </select>
                    <div class="clearfix"></div>
                    <span class="message" id="msgcom_deeplink"></span>
                  </div>

                  <!-- Compaign Name -->
                  <div class="col-md-4 form-group">
                    <label>Compaign Name</label>
                    <input type="text" name="name" value="<?php echo $ReguserData->Name; ?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign name" required>
                    <div class="clearfix"></div>
                    <span class="message" id="msgname"></span>
                  </div>

                  <!-- Compaign Logo -->
                  <div class="form-group col-md-8">
                    <label>Compaign Logo</label>
                    <input id="file_2" type="text" value="<?php echo $ReguserData->Image; ?>" name="image" placeholder="Compaign logo URL" class="form-control col-md-7 col-xs-12">
                  </div>

                  <!-- Compaign Offer Title -->
                  <div class="col-md-6 form-group">
                    <label>Compaign Offer Title</label>
                    <h6 style="color:red">Note: Ex: (Flat 15% off) only</h6>
                    <input type="text" name="com_offer_title" value="<?php echo $ReguserData->CompOfferTitle; ?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign offer title" required>
                    <div class="clearfix"></div>
                    <span class="message" id="msgcom_offer_title"></span>
                  </div>

                  <!-- Compaign Meta Title -->
                  <div class="col-md-6 form-group">
                    <label>Compaign Meta Title</label>
                    <h6 style="color:red">Note: Ex: Meta Title for page title</h6>
                    <input type="text" name="com_meta_title" value="<?php echo $ReguserData->CompMetaTitle; ?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign meta title" required>
                    <div class="clearfix"></div>
                    <span class="message" id="msgcom_meta_title"></span>
                  </div>

                  <!-- Offer Type -->
                  <div class="col-md-4 form-group">
                    <label>Backend CTW Offer</label>
                    <h6 style="color:red">Note: Ex: Offer Select</h6>
                    <select name="offer_type" class="form-control col-md-7 col-xs-12">
                      <option value="">Select</option>
                      <?php 
                        $offerType = $adminDao->offerTypelist();
                        if ($offerType) {
                          foreach ($offerType as $offer) {
                      ?>
                        <option value='<?php echo $offer->Id; ?>' <?=($ReguserData->OfferType == $offer->Id) ? "selected" : ""; ?>><?php echo $offer->Name; ?></option>
                      <?php }} ?>
                    </select>
                    <div class="clearfix"></div>
                    <span class="message" id="msgoffer_type"></span>
                  </div>

                  <!-- Offer Value -->
                  <div class="form-group col-md-4">
                    <label>Offer Value</label>
                    <h6 style="color:red">Note: Value only in digits like 10 or 5</h6>
                    <input type="text" name="offer_value" value="<?=$ReguserData->OfferValue?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign offer value">
                  </div>

                  <!-- Default Tracking -->
                  <div class="col-md-4 form-group">
                    <label>Default Tracking</label>
                    <h6 style="color:red">Note: Default Tracking</h6>
                    <select name="default_tacking" class="form-control col-md-7 col-xs-12">
                      <option value="">Select</option>
                      <option value="1" <?=($ReguserData->DefaultTacking == 1) ? "selected" : ""; ?>>True</option>
                      <option value="0" <?=($ReguserData->DefaultTacking == 0) ? "selected" : ""; ?>>False</option>
                    </select>
                    <div class="clearfix"></div>
                    <span class="message" id="msgdefault_tacking"></span>
                  </div>

                  <!-- Store URL -->
                  <div class="form-group col-md-4">
                    <label>Store URL</label>
                    <input type="text" name="link" value="<?=$ReguserData->StoreLink?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Compaign store link">
                  </div>

                  <!-- Estimate Cashback Date -->
                  <div class="form-group col-md-4">
                    <label>Estimate Cashback Date</label>
                    <input type="text" name="esti_cashback_date" value="<?=$ReguserData->EstiCashbackDate?>" placeholder="Enter Estimate Cashback date" class="form-control col-md-7 col-xs-12">
                  </div>

                  <!-- Avg. Tracking Speed -->
                  <div class="form-group col-md-4">
                    <label>Avg. Tracking Speed</label>
                    <input type="text" name="avg_tracking_speed" value="<?=$ReguserData->AvgTrackingSpeed?>" placeholder="Enter Avg. Tracking Speed" class="form-control col-md-7 col-xs-12">
                </div>


                 <div class="form-group col-md-4">
                    <label>Avg.  Claim Time</label>
                    <input type="text" name="avg_claim_time" value="<?=$ReguserData->AvgClaimTime?>" placeholder="Enter Avg. Tracking Speed" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="clearfix"></div>

                <div class="form-group col-md-6">
                        <label>Store Description </label>
                        <textarea  id="editor" name="description" class="form-control col-md-7 col-xs-12" ><?=$ReguserData->Description?></textarea>
                     </div>
                
                <div class="form-group col-md-6">
                        <label>Cashback T&C </label>
                        <textarea  id="editor1" name="cashback_rate" class="form-control col-md-7 col-xs-12" ><?=$ReguserData->CashbackRate?></textarea>
                     </div>
   <?php 
  $keywords = $adminDao->KeywordSearchByStoreId($ReguserData->Id);
  if ($keywords) {
      foreach ($keywords as $searchkey) {
          ?>
          <div class="form-group col-md-8" id="keyword-container">
              <label>Searching Keywords</label>
              
              <input type="text" name="searching_keywords[]" value="<?php echo htmlspecialchars($searchkey->Keyword); ?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Searching Keywords">
          </div>
          <?php
      }
  } else {
      ?>
      <div class="form-group col-md-8" id="keyword-container">
          <label>Searching Keywords</label>
          <input type="text" name="searching_keywords[]" placeholder="Enter Searching Keywords" class="form-control col-md-7 col-xs-12">
      </div>
      <?php
  }
?>

<div class="form-group col-md-4 pull-right">
  <label>&nbsp;</label>
  <div class="clearfix"></div>
  <button type="button" id="add-keyword" class="btn btn-success pull-right">Add Search Keyword</button>
</div>

                  <div class="form-group col-md-12">
                    <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once '../footer.php'; ?>
      </div>
    </div>
    <?php include_once '../script.php';?>
	
	<link href="<?php echo $siteUrl;?>assets/css/datepicker.css" rel="stylesheet">
	<script src="<?php echo $siteUrl;?>assets/js/bootstrap-datepicker.js"></script>
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
</body>
</html>




<!-- <script>
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
</script> -->

<script>
$(document).ready(function() {
    // Add a new keyword input field when the "Add Search Keyword" button is clicked
    $('#add-keyword').click(function() {
        var newKeyword = 
            '<div class="form-group col-md-8 keyword-input">' +
                '<input type="text" name="searching_keywords[]" placeholder="Enter Searching Keywords" class="form-control col-md-7 col-xs-12">' +
                '<button type="button" class="btn btn-danger remove-keyword">Remove</button>' +
            '</div>';
        $('#keyword-container').append(newKeyword);
    });

    // Remove a keyword input field when the "Remove" button is clicked
    $(document).on('click', '.remove-keyword', function() {
        $(this).closest('.keyword-input').remove();
    });
});
</script>



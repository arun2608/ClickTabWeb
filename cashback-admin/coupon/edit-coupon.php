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
                    <h2>Edit Coupon / Deals / Product<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
					<?php 
					$couponData = $adminDao->couponById($_REQUEST['id']);?>
                    <form id="coupon-frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="update-coupon">
					  <input type="hidden" name="id" value="<?php echo $couponData->Id;?>">
					  <div class="row">
					  <div class="form-group col-md-4">
	                      <label>Type </label>
	                       	<select class="form-control search-box"  name="type" onchange="findType(this.value)">
	                       	  <option value=''>Select Type</option>
	                          <option value='Coupon' <?=($couponData->Type=="Coupon")?"selected":""?>>Coupon</option>  
	                          <option value='Deals' <?=($couponData->Type=="Deals")?"selected":""?>>Deals</option>  
							  <option value='Product' <?=($couponData->Type=="Product")?"selected":""?>>Product</option>  
	                     	</select>
	                     	<span class='message' id='msgcategory' style='display:none;'>&nbsp;</span>
	                    </div>
					    <div class="form-group col-md-4">
	                      <label>Category </label>
	                       <select class="form-control search-box"  name="category" onchange="findStore(this.value)">
	                      	<option value=''>Select Category</option>
	                    	<?php 
	                        $categoryList = $adminDao->categoryList();
	                        if ($categoryList) {
	                         $count = 1;
	                          foreach ($categoryList AS $category){?>
	                        <option value='<?php echo $category->Id;?>' <?=($couponData->Category==$category->Id)?"selected":""?>><?php echo $category->Category;?></option>  
	                        <?php }}?>
	                         </select>
	                         <span class='message' id='msgcategory' style='display:none;'>&nbsp;</span>
	                    </div>
	                    <div class="form-group col-md-4">
	                      <label>Store </label>
	                       <select class="form-control " id="store-data" name="store">
	                      	<option value=''>Select Store</option>
							<?php 
							$storeList = $adminDao->storeListByCategory($couponData->Category);
							if ($storeList) {
								foreach ($storeList AS $store){?>
							<option value='<?php echo $store->Id;?>' <?=($couponData->Store==$store->Id)?"selected":""?>><?php echo $store->Name;?></option>	
							<?php }}?>
	                     </select>
	                     <span class='message' id='msgstore' style='display:none;'>&nbsp;</span>
	                    </div>
	                    </div>
	                    <div class="row">
	                    <div class="col-md-4 form-group">
	                        <label> Campaign Name</label>
	                        <input type='text' name="coupon_heading" class="form-control col-md-7 col-xs-12" placeholder="Enter Heading" value="<?=$couponData->CouponHeading?>">
							<div class="clearfix"></div>
						    <span class="message" id="msgcoupon_heading"></span>                        
	                      </div>

                      <div class="col-md-4 form-group">
                        <label> Excerpt</label>
                        <textarea name="coupon_excerpt" class="form-control col-md-7 col-xs-12" ><?=$couponData->CouponExcerpt?></textarea>
						<div class="clearfix"></div>
					    <span class="message" id="msgcoupon_excerpt"></span>                        
                      </div>

					  <div class="coupon col-md-4 form-group">
                        <label>Coupon Code</label>
                        <input type='text' name="coupon_code" class="form-control col-md-7 col-xs-12" placeholder="Enter Coupon Code" value="<?php echo $couponData->CouponCode;?>" <?php if($couponData->Type==1 OR $couponData->Type==3){echo "readonly";}?>>
						<div class="clearfix"></div>
					    <span class="message" id="msgcoupon_code"></span>                        
                      </div>
					  </div>
					  
					  <div class="row">
					      <div class="col-md-6 form-group">
						<label> Image Url <img src="<?=$couponData->Image?>" width="20px"></label>
                        <input type='text' name="image" id="image" value="<?=$couponData->Image?>" class="form-control col-md-7 col-xs-12" >
						<div class="clearfix"></div>
					    <span class="message" id="msgimage"></span>                        
                      </div>
					  <div class=" col-md-6 form-group">
                        <label> Campaing Link</label>
                        <input type='text' name="comp_link" value="<?=$couponData->CompLink?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Campaign Link">
						<div class="clearfix"></div>
					    <span class="message" id="msgcomp_link"></span>                        
                      </div>
					  </div>
                    <div class="row">
                   <div class=" product3 col-md-4  form-group">
                    <label>Backend CTW Offer</label>
                    
                    <select name="offer_type" class="form-control col-md-7 col-xs-12">
                      <option value="">Select</option>
                      <?php 
                        $offerType = $adminDao->offerTypelist();
                        if ($offerType) {
                          foreach ($offerType as $offer) {
                      ?>
                        <option value='<?php echo $offer->Id; ?>' <?=($couponData->OfferType == $offer->Id) ? "selected" : ""; ?>><?php echo $offer->Name; ?></option>
                      <?php }} ?>
                    </select>
                    <p style="color:red">Note: Ex: Offer Select</p>
                    <div class="clearfix"></div>
                    <span class="message" id="msgoffer_type"></span>
                  </div>
                  </div>

				  <div class="clearfix"></div>
					  <div class="row">
					  <div class="product col-md-4 form-group">
                        <label>MRP</label>
                        <input type='number' name="mrp"  value="<?php echo $couponData->Mrp;?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Mrp">
						<div class="clearfix"></div>
					    <span class="message" id="msgmrp"></span>                        
                      </div>



					  <div class="col-md-4 form-group">
                        <label>Amount</label>
                        <input type='number' name="coupon_price" class="form-control col-md-7 col-xs-12" placeholder="Enter Coupon Price" value="<?php echo $couponData->CouponPrice;?>">
						<div class="clearfix"></div>
					    <span class="message" id="msgcoupon_price"></span>                        
                      </div>
                      
                      <div class="product col-md-4 form-group">
                        <label>Cashback Amount</label>
                        <input type='number' name="cashback_amt"  value="<?php echo $couponData->CashbackAMT;?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Mrp">
						<div class="clearfix"></div>
					    <span class="message" id="msgcashback_amt"></span>                        
                      </div>
					 
					  <div class="coupon col-md-4 form-group">
                        <label>Minimum Order Amount</label>
                        <input type='text' name="order_amount" class="form-control col-md-7 col-xs-12" placeholder="Enter Order Amount" value="<?php echo $couponData->OrderAmount;?>">
						<div class="clearfix"></div>
					    <span class="message" id="msgorder_amount"></span>                        
                      </div>
					  
					  <input type="hidden" name="coupon_user" value="20000">
					  <div class="col-md-4 form-group" style="display: none;">
                        <label>How Many User Use This Coupon</label>
                        <select name="coupon_user" class="form-control col-md-7 col-xs-12">
						<?php 
							for($i=1;$i<=100;$i++){?>
						<option value='<?php echo $i;?>' <?php if($couponData->CouponUser==$i){echo "selected";}?>><?php echo $i;?></option>
						<?php }?>	
						</select>
						<div class="clearfix"></div>
					    <span class="message" id="msgorder_amount"></span>                        
                      </div>
                      </div>
                      
                      <div class="row coupon">
				<div class=" col-md-4 form-group">
				<label>Coupon Start Date</label>
				<input type="date" name="coupon_start_date" id="dp1" class="form-control col-md-7 col-xs-12" placeholder="Enter Coupon Start Date" 
				value="<?php echo date('Y-m-d', strtotime($couponData->CouponStartDate)); ?>">
				<div class="clearfix"></div>
				<span class="message" id="msgcoupon_start_date"></span>                        
				</div>

				<div class=" col-md-4 form-group">
				<label>Coupon End Date</label>
				<input type="date" name="coupon_end_date" id="dp2" class="form-control col-md-7 col-xs-12" placeholder="Enter Coupon End Date" 
				value="<?php echo date('Y-m-d', strtotime($couponData->CouponEndDate)); ?>">
				<div class="clearfix"></div>
				<span class="message" id="msgcoupon_end_date"></span>                        
				</div>
				</div>
				
				
                      
                      
					  <?php 
  $keywords = $adminDao->KeywordByCouponId($couponData->Id);
  if ($keywords) {
      foreach ($keywords as $searchkey) {
          ?>
          <div class="form-group col-md-8" >
              <label>Searching Keywords</label>
              
              <input type="text" name="searching_keywords[]" value="<?php echo htmlspecialchars($searchkey->Keyword); ?>" class="form-control col-md-7 col-xs-12" placeholder="Enter Searching Keywords">
          </div>
          <?php
      }
  } else {
      ?>
      <div class="form-group col-md-8" >
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
                       
<div id="keyword-container"></div>

        
                     


					  <div class=" deals product2 col-md-12 form-group">
                        <label>About Deals /Product</label>
                        <textarea type='text' name="content1"  id="editor"  class="form-control col-md-7 col-xs-12"><?=$couponData->Content1?></textarea>
						<div class="clearfix"></div>
					    <span class="message" id="msgcontent1"></span>                        
                      </div>


					  <div class=" deals col-md-12 form-group">
                        <label>About this Offer</label>
                        <textarea type='text' name="content2"    id="editor1" class="form-control col-md-7 col-xs-12"><?=$couponData->Content2?></textarea>
						<div class="clearfix"></div>
					    <span class="message" id="msgcontent2"></span>                        
                      </div>


					  <div class=" deals col-md-12 form-group">
                        <label>How to get this deal</label>
                        <textarea type='text' name="content3" id="editor2"  class="form-control col-md-7 col-xs-12"><?=$couponData->Content3?></textarea>
						<div class="clearfix"></div>
					    <span class="message" id="msgcontent3"></span>                        
                      </div>



                      
                      <div class="clearfix"></div>
                      <div class="clearfix"></div>
                      <br>
                      <fieldset class="coupon">
                      	<legend>Other Options</legend>
                      
	                    <div class="col-md-8 form-group">
	                        <label>&nbsp;</label>
	                        <input type='checkbox' name="handpicked" <?=($couponData->Handpicked==1)?"checked":""?>  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Handpicked Deals</b>&nbsp;&nbsp;&nbsp;&nbsp;
	                        <input type='checkbox' name="top20" <?=($couponData->Top20==1)?"checked":""?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Top 20 Deals</b>&nbsp;&nbsp;&nbsp;&nbsp;
	                        <input type='checkbox' name="offer" <?=($couponData->Offer==1)?"checked":""?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Offers</b>&nbsp;&nbsp;&nbsp;&nbsp;
	                        <input type='checkbox' name="verified"  <?=($couponData->Verified==1)?"checked":""?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Verified</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<div class="clearfix"></div>                        
	                    </div>
                      </fieldset>
					  
					  <div class="clearfix"></div>
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="button" class="btn btn-success pull-right" id="authenticateCoupon">Save</button>
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
		CKEDITOR.replace('editor2', {
			filebrowserUploadUrl: "<?php echo $siteUrl;?>assets/ckeditor/ck_upload.php",
			filebrowserUploadMethod: 'form'
		});
    </script>

	<script src="<?php echo $siteUrl;?>assets/js/coupon.js"></script>
	<link href="<?php echo $siteUrl;?>assets/css/datepicker.css" rel="stylesheet">
	<script src="<?php echo $siteUrl;?>assets/js/bootstrap-datepicker.js"></script>
	<script>
		<?php if($couponData->Type == "Coupon"){ ?>
    $(".deals").hide();
    $(".coupon").show();
    $(".product").hide();
    $(".product2").hide();
    $(".product3").hide();
    $(".product4").hide();
<?php } elseif($couponData->Type == "Deals"){ ?>
    $(".deals").show();
    $(".coupon").hide();
    $(".product").hide();
    $(".product2").show();
    $(".product3").hide();
    $(".product4").hide();
<?php } else { // Assuming "Product" or any other type ?>
    $(".deals").hide();
    $(".coupon").hide();
    $(".product").show();
    $(".product2").show();
    $(".product3").hide();
    $(".product4").show();
<?php } ?>

function findType(obj){
    if(obj == "Coupon"){
        $(".deals").hide();
        $(".coupon").show();
        $(".product").hide();
        $(".product2").hide();
        $(".product3").hide();
        $(".product4").hide();
    } else if(obj == "Deals") {
        $(".deals").show();
        $(".coupon").hide();
        $(".product").hide();
        $(".product2").hide();
        $(".product3").hide();
        $(".product4").hide();
    } else { // Assuming "Product" or any other type
        $(".deals").hide();
        $(".coupon").hide();
        $(".product").show();
        $(".product2").show();
        $(".product3").hide();
        $(".product4").show();
    }
}

		
		
	$(function(){
		window.prettyPrint && prettyPrint();
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

		var checkin = $('#dp1').datepicker({
			format: 'dd-mm-yyyy',
			onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function(ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 5);
			checkout.setValue(newDate);
		}
		checkin.hide();
		$('#dp2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dp2').datepicker({
			format: 'dd-mm-yyyy',
			onRender: function(date) {
			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function(ev) {
			checkout.hide();
		}).data('datepicker');
	});
	</script>	
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

	  
</body>
</html>
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
                    <h2>Create Coupon / Product / Deals <small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="coupon-frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="create-coupon">
                        <div class="row">
                          <div class="form-group col-md-4">
    	                      <label>Type </label>
    	                       	<select class="form-control search-box"  name="type" onchange="findType(this.value)">
    	                       	  <option value=''>Select Type</option>
    	                          <option value='Coupon'>Coupon</option>  
    	                          <option value='Deals'>Deals</option>  
    							  <option value='Product'>Product</option>  
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
    	                          <option value='<?php echo $category->Id;?>'><?php echo $category->Category;?></option>  
    	                          <?php }}?>
    	                     	</select>
    	                     	<span class='message' id='msgcategory' style='display:none;'>&nbsp;</span>
    	                    </div>
    	                    <div class="form-group col-md-4">
    	                      <label>Store </label>
    	                       <select class="form-control " id="store-data" name="store">
    	                      
    	                     </select>
    	                     <span class='message' id='msgcategory' style='display:none;'>&nbsp;</span>
    	                    </div>
    	                    </div>
    	                <div class="row">
                          <div class="col-md-4 form-group">
                            <label> Campaign Name</label>
                            <input type='text' name="coupon_heading" class="form-control col-md-7 col-xs-12" placeholder="Enter Campaign Name">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcoupon_heading"></span>                        
                          </div>
    
                          <div class="col-md-4 form-group">
                            <label> Excerpt</label>
                            <textarea name="coupon_excerpt" class="form-control col-md-7 col-xs-12" placeholder="Enter  Excerpt"></textarea>
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcoupon_excerpt"></span>                        
                          </div>
    					  
    					  <div class=" col-md-4 coupon form-group">
                            <label>Coupon Code</label>
                            <input type='text' name="coupon_code" class="form-control col-md-7 col-xs-12" placeholder="Enter Coupon Code">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcoupon_code"></span>                        
                          </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6 form-group">
                            <label> Image Url</label>
                            <input type='text' name="image" id="image" class="form-control col-md-7 col-xs-12" >
    						<div class="clearfix"></div>
    					    <span class="message" id="msgimage"></span>                        
                          </div>
                            <div class=" col-md-6 form-group">
                            <label> Campaign Link</label>
                            <input type='text' name="comp_link" id="dp2" class="form-control col-md-7 col-xs-12" placeholder="Enter Campaign Link">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcomp_link"></span>                        
                          </div>
                          
                        </div>
                        
                       
    				   <div class="row">
    				       
    				       <div class="col-md-4  product3 form-group"> 
                              <label>Backend CTW offer </label>
                              
                                <select name="offer_type" class="form-control col-md-7 col-xs-12">
                                  <option value="">Select</option>
                                      <?php 
                                      $offerType = $adminDao->offerTypelist();
                                      if ($offerType) {
                                          foreach ($offerType AS $offer){?>
                                        <option value='<?php echo $offer->Id;?>'><?php echo $offer->Name;?></option>  
                                          <?php }}?>
                                </select>
                                <p style="color:red">Note: Ex: Offer Select </p>
                                <div class="clearfix"></div>
                                <span class="message" id="msgoffer_type"></span>                        
                            </div>
                            
    					  <div class="product col-md-4 form-group">
                            <label>Mrp</label>
                            <input type='number' name="mrp" class="form-control col-md-7 col-xs-12" placeholder="Enter Mrp">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgmrp"></span>                        
                          </div>
    
    				
    					  <div class="col-md-4 form-group">
                            <label> Amount </label>
                            <input type='number' name="coupon_price" class="form-control col-md-7 col-xs-12" placeholder="Enter  Amount">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcoupon_price"></span>                        
                          </div>
                          
                        
    					  <div class="product col-md-4 form-group">
                              <label>Cashback Amount</label>
                              <input type='number' name="cashback_amt" class="form-control col-md-7 col-xs-12" placeholder="Enter Cashback Amount">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcashback_amt"></span>                        
                          </div>
                          
    					  <div class="coupon col-md-4 form-group">
                            <label>Minimum Order Amount</label>
                            <input type='text' name="order_amount" class="form-control col-md-7 col-xs-12" placeholder="Enter Order Amount">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgorder_amount"></span>                        
                          </div>
    					  
    					  <input type="hidden" name="coupon_user" value="20000">
    					 
    					 </div>
    					 
    					 <div class="row">
    					  <div class="coupon col-md-4 form-group">
                            <label>Coupon Start Date</label>
                            <input type='date' name="coupon_start_date" id="dp1" class="form-control col-md-7 col-xs-12" placeholder="Enter Coupon Start Date">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcoupon_start_date"></span>                        
                          </div>
    					  
    
    					  <div class="coupon col-md-4 form-group">
                            <label>Coupon End Date</label>
                            <input type='date' name="coupon_end_date" id="dp2" class="form-control col-md-7 col-xs-12" placeholder="Enter Coupon End Date">
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcoupon_end_date"></span>                        
                          </div>
                          
                          
    					  
                        </div>
                        
                        
                    
                        <div class="row">
    					  <div class="form-group col-md-8" >
                              <label>Searching Keywords</label>
                              <input type="text" name="searching_keywords[]" placeholder="Enter Searching Keywords" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="form-group col-md-4 pull-right">
                              <label>&nbsp;</label>
                              <div class="clearfix"></div>
                              <button type="button" id="add-keyword" class="btn btn-success pull-right">Add Search Keyword</button>
                            </div>
                        </div>
                        <div id="keyword-container"></div>
    					<!--<div class="row">-->
                          
    
         <!--                 <div class=" deals col-md-4 form-group">-->
         <!--                   <label>Link Url</label>-->
         <!--                   <input type='url' name="link"  class="form-control col-md-7 col-xs-12" placeholder="Enter  Link">-->
    					<!--	<div class="clearfix"></div>-->
    					<!--    <span class="message" id="msgcoupon_link"></span>                        -->
         <!--                 </div>-->
    
         <!--               </div>-->

    					  <div class="row coupon deals product2 col-md-12 form-group">
                            <label>About Deals/Product</label>
                            <textarea type='text' name="content1"  id="editor"  class="form-control col-md-7 col-xs-12"></textarea>
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcontent1"></span>                        
                          </div>
    
    
    					  <div class=" deals col-md-12 form-group">
                            <label>About this Offer</label>
                            <textarea type='text' name="content2"    id="editor1" class="form-control col-md-7 col-xs-12"></textarea>
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcontent2"></span>                        
                          </div>
    
    
    					  <div class=" deals col-md-12 form-group">
                            <label>How to get this deal</label>
                            <textarea type='text' name="content3" id="editor2"  class="form-control col-md-7 col-xs-12"></textarea>
    						<div class="clearfix"></div>
    					    <span class="message" id="msgcontent3"></span>                        
                          </div>
                          <div class="clearfix"></div>
                          <br>
                          <fieldset class="coupon">
                          	<legend>Other Options</legend>
                          
    	                    <div class="col-md-8 form-group">
    	                        <label>&nbsp;</label>
    	                        <input type='checkbox' name="handpicked" value="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Handpicked Deals</b>&nbsp;&nbsp;&nbsp;&nbsp;
    	                        <input type='checkbox' name="top20" value="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Top 20 Deals</b>&nbsp;&nbsp;&nbsp;&nbsp;
    	                        <input type='checkbox' name="offer" value="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Offers</b>&nbsp;&nbsp;&nbsp;&nbsp;
    	                        <input type='checkbox' name="verified" value="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Verified</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
		CKEDITOR.replace('editor2', {
			filebrowserUploadUrl: "<?php echo $siteUrl;?>assets/ckeditor/ck_upload.php",
			filebrowserUploadMethod: 'form'
		});
    </script>
	<script src="<?php echo $siteUrl;?>assets/js/coupon.js"></script>
	<link href="<?php echo $siteUrl;?>assets/css/datepicker.css" rel="stylesheet">
	<script src="<?php echo $siteUrl;?>assets/js/bootstrap-datepicker.js"></script>
	<script>
$(".deals").hide();
$(".coupon").show();	
$(".product").hide();
function findType(obj){
    if(obj == "Coupon"){
        $(".deals").hide();
        $(".coupon").show();
        $(".product").hide(); 
    } else if(obj == "Deals") {
        $(".deals").show();
        $(".coupon").hide();
        $(".product").hide(); 
        $(".product2").show();
    } else {
        $(".product").show();
        $(".deals").hide();
        $(".coupon").hide();
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

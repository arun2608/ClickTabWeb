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
                    <form method="post" class="form-horizontal form-label-left" action="<?php echo $siteUrl;?>controller/AdminController.php"  enctype="multipart/form-data">
                      <input type="hidden" name="action_type" value="import-coupon">
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

                          <div class="col-md-6 form-group">
                            <label> Excel  File </label>
                            <input type='file' name="import_coupon"  class="form-control col-md-7 col-xs-12" >
                             <div class="clearfix"></div>
                              <span class="message" id="msgimage"></span>                        
                              </div>
                            </div>
                        
                           
                            <div class="clearfix"></div>
                                      <div class="form-group col-md-4 pull-right">
                            <label>&nbsp;</label>
                            <div class="clearfix"></div>
                                        <button type="submit" class="btn btn-success pull-right">Save</button>
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

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
                    <h2>Edit Link <small id="product-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php $bannerData = $adminDao->landerLink(1);?>
                    <form id="frm" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo $siteUrl;?>controller/AdminController.php">
                      <input type="hidden" name="action_type" value="update-lander">
                      <input type="hidden" name="id" value="<?php echo $bannerData->Type;?>">
					  <div class="form-group col-md-4">
                        <label>Link</label>
                        <select class="form-control" aria-label="Default select example" id="store" name="store" onchange="return getcoupons(this.value)">
                          <option selected>Select Store</option>
                          <?php $categoryList = $adminDao->categoryList();
                                  foreach ($categoryList as $key => $value) { 
                                    $storeListByCategory = $adminDao->storeListByCategory($value->Id);
                                    if(!empty($storeListByCategory)){ 
                                      foreach ($storeListByCategory as $key1 => $value1) { 
                                         // $couponByStore = $adminDao->couponByStore($value1->Id); 
                                            if($value1->OfferType==1){
                                               $offer = "Flat ". $value1->OfferValue." Cashback";
                                            } else if($value1->OfferType==2){
                                                $offer = "Flat ". $value1->OfferValue."% Cashback";
                                            } else if($value1->OfferType==3){
                                                $offer = "Upto Rs.". $value1->OfferValue." Cashback";
                                            } else if($value1->OfferType==4){
                                                $offer = "Upto ". $value1->OfferValue."% Cashback";
                                            } else {
                                                $offer ="Sale Live Now";
                                            }
                                  ?>
                                      <option value="<?=$value1->Id?>" <?=($value->Id==$bannerData->Store)?"selected":""?>><?=$value1->Name?></option>
                                      <?php } } } ?>
                                </select>
                        <!--<input type="text" name="link" class="form-control col-md-7 col-xs-12" value="<?php echo $bannerData->Link;?>">                                                  -->
                      </div>
                      <div class="form-group col-md-4" id="getcoupons">
                      </div>
                      
					  <div class='clearfix'></div>
					  <div class="form-group col-md-4 pull-right">
						<input type="button" class="pull-right btn btn-success" onclick="return generateLink()" value="Generate Link"/>
					  </div>

                    </form>
                   
                    <p style="color:blue;font-weight:700" id="gen_link"><a style="color:blue;" href="<?php echo $bannerData->Link;?>"><?php echo $bannerData->Link;?></a></p>
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
    <script>
   getcoupons(<?=$bannerData->Store?>); 
function getcoupons(store) {
    // var store = $("#store").val();
    var formData = new FormData();
    formData.append('store', store);
    $.ajax({
        url: '<?=$baseUrl?>cashback-admin/getcoupons.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            $("#getcoupons").html(result);
        },
    });
    
}

function generateLink() {
     var store = $("#store").val();
      var coupon = $("#coupon").val();
    var formData = new FormData();
    formData.append('store', store);
    formData.append('coupon', coupon);
    $.ajax({
        url: '<?=$baseUrl?>cashback-admin/generateLink.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            $("#gen_link").html(result);
            
        },
    });
    
}
</script>
    </body>
</html>
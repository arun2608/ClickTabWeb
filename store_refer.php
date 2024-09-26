<?php 
 include "dashboard-side-menu.php";
?>
         <div class="col-md-9">
         <div class="main-content edit-pro-content">
        <div class="pull-left">
          <div class="main-content-right">
            <h3>Refer & Earn  </h3>
          </div>

<?php
$userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
?>

         
            <!--<div class="col-md-3">-->
            <!--  <div class="store-left">-->
            <!--   <img src="<?=$baseUrl?>dashboard/refer.jpg" alt="refer image">-->
            <!--  </div>-->
            <!--</div>-->

                      <div class="store-title">
                     <h4>Generate Link & Share With Friends! Get Cashback</h4>
                      <!--<div class="store-radio"><span><input type="radio"><label>Store</label></span> <span><input type="radio"><label>Product</label></span></div>-->
                      <!--<input type="radio"><label>Deal</label> <input type="radio"><label>Coupon</label>-->
             <div class="row d-flex justify-content-center align-items-center"><div class="col-md-8 ">
              <div class="store-rt">
                <select class="form-select" aria-label="Default select example" id="store" name="store" onclick="return getStore(this.value)">
                  <option selected>Select Store</option>
                  <?php $categoryList = $adminDao->categoryList();
                          foreach ($categoryList as $key => $value) { 
                            $storeListByCategory = $adminDao->storeListByCategory($value->Id);
                            if(!empty($storeListByCategory)){ 
                              foreach ($storeListByCategory as $key1 => $value1) { 
                                  $couponByStore = $adminDao->couponByStore($value1->Id); 
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
                              <option value="<?=$value1->Id?>"><?=$value1->Name?></option>
                              <?php } } } ?>
                        </select>
              </div>
            </div>
            <div class="clearfix"></div><br>
                        <div class="col-md-10 offset-1" id="gen_link">
              
            </div> </div>
            <div class="str-btn"> <button type="button" class="gen-link" onclick="generateLink();">Generate Link</button> </div> 
             <b><p ></p></b>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php include "footer.php"; ?>

<script>
    
function generateLink() {
        var store = $("#store").val();
        var formData = new FormData();
        formData.append('store', store);
        $.ajax({
            url: '<?=$baseUrl?>generateLink',
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
<style>
    p{
        overflow-wrap: anywhere !important;
        color:dark-blue;
    }
</style>
</body>
</html>




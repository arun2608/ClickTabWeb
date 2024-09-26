<?php 
include "dashboard-side-menu.php";
?>
<div class="col-md-9">
    <div class="main-content">
        <div class="col-md-12">
               <div id="top-title"> <h4 class="sub-heading">All Stores</h4> </div>
                
                <div class="row gy-4 d-flex justify-content-center">
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
      <div class="col-lg-4 col-md-4 col-6"><a class="brand-card " href="<?=$baseUrl?>storeCoupon/<?=$value1->Slug?>/<?=$value1->Token?>">
            
            
          <div class="b_offer"><span>Sale Live Now</span></div>
		 <div class="brand-terms"><?=!empty($couponByStore)?count($couponByStore):"0"?> <em>Offers</em></div>
          <div class="b-img"><img src="<?=$value1->Image?>" alt="<?=$value1->Name?>"></div>
       
          <div class="brand-btn"> <?=$offer?>  </div>

          </a></div>
          
      
     <?php } } } ?> 

    </div>
            
        </div>
    </div>
</div>
</section>

    <!-- Modal Structure with custom size -->
    
      <?php include "footer.php";?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script>
    //   $(".ac").hide();
    //   $(".upi").hide();
    //       function transaction_mode(obj){
    //           if(obj=="Bank"){
    //               $(".ac").show();
    //   $(".upi").hide();
    //           } else {
    //               $(".ac").hide();
    //   $(".upi").show();
    //           }
    //       }
      </script>
      <style>
        .brand-card {
            border:1px solid #eee;
        }
      </style>
    </body></html>
<?php 
include "dashboard-side-menu.php";
?>
<div class="col-md-9">
    <div class="main-content">
        <div class="col-md-12">
               <div id="top-title"> <h4 class="sub-heading">100% Cashback Stores</h4> </div>
                
                <div class="row gy-4 d-flex justify-content-center">
      <?php $count=0;
        $showingBrands = $adminDao->showingBrands(2);
        $storeList = unserialize($showingBrands->brands);
            foreach ( $storeList as $key1 => $value1 ) {
                $store1 = $adminDao->ReguserById( $value1 );
                if($count==12){ break; }
                $couponByStore = $adminDao->couponByStore( $value1 );
                if($store1->OfferType==1){
                   $offer = "Flat Rs.". $store1->OfferValue." Cashback";
                } else if($store1->OfferType==2){
                    $offer = "Flat ". $store1->OfferValue."% Cashback";
                } else if($store1->OfferType==3){
                    $offer = "Upto Rs.". $store1->OfferValue." Cashback";
                } else if($store1->OfferType==4){
                    $offer = "Upto ". $store1->OfferValue."% Cashback";
                } else {
                    $offer ="Sale Live Now";
                }
                ?>
        <div class="col-lg-4 col-md-4 col-6"><a class="brand-card " href="<?=$baseUrl?>storeCoupon/<?=$store1->Url?>/<?=$store1->Token?>">
            
            
          <div class="b_offer"><span>Sale Live Now</span></div>
		 <div class="brand-terms"> <em><?=!empty($couponByStore)?count($couponByStore):"0"?> Offers</em></div>
          <div class="b-img"><img src="<?=$store1->Image?>" alt="<?=$store1->Name?>"></div>
       
          <div class="brand-btn"> <?=$offer?>  </div>

          </a></div>
               
           <?php $count++;  }  ?>

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
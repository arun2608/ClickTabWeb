<?php

include "admin-lib.php";

include "header.php";

$category = $_REQUEST['category_url'];
$categoryByUrl = $adminDao->categoryByUrl($category);


?>
<section class="breadcrumb-sec">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>all-stores">Store</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          <?=$categoryByUrl->Category?>
        </li>
      </ol>
    </nav>
  </div>
</section>
<section class="cat-page pt-30 pb-60">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title">
          <h2>TOP SELLING <?=$categoryByUrl->Category?> STORES<span>Start Saving today</span></h2>
        </div>
      </div>
    </div>
    <div class="row gy-4 d-flex justify-content-center">
       <?php

        $storeListByCategory = $adminDao->storeListByCategory( $categoryByUrl->Id );
        if ( !empty( $storeListByCategory ) ) {
            foreach ( $storeListByCategory as $key1 => $value1 ) {
                $couponByStore = $adminDao->couponByStore( $value1->Id );
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
                <div class="col-md-3 d-flex justify-content-center">
                    <a href="<?=$baseUrl?>storeCoupon/<?=$value1->Slug?>/<?=$value1->Token?>" class="brand-card product_c">
                        <div class="product_c proCard">
                          <div class="pos product_img b-img" >
                            <div class="ck-clicker dy_lk_hide" data-href="<?=$baseUrl?>storeCoupon/<?=$value1->Slug?>/<?=$value1->Token?>"><img alt="<?=$value->Name?>" title="" loading="lazy" decoding="async" data-nimg="1" class="" style="color:transparent" src="<?=$value1->Image?>"></div>
                          </div>
                          <div class="brand-btn"> <?=$offer?>  </div>
                        </div>
                      </a>
                  </div>
        
           <?php } } else {  ?>
           <div class="col-md-8 d-flex justify-content-center">
               
               <h2>No Data found</h2>
           </div>
           <?php } ?>
   </div>
  </div>
</section>
<div class="clearfix"></div>
<?php

include "footer.php";


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$('.nav a').on('click', function (e) {
    $('.nav a').removeClass('active');
        e.preventDefault();
        var cat = $(this).data('categoryType');
        var nam = $(this).data('categoryName');
        $('#allCouponData > div').hide();
        $('#allCouponData > div[data-category-type="'+cat+'"]').show();
         $(this).addClass('active');
         
    });
    </script>
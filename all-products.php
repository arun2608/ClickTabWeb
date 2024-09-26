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
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Categories</li>
    <li class="breadcrumb-item active" aria-current="page"><?=$categoryByUrl->Category?></li>
  </ol>
</nav>      
</div>
</section>

<section class="cat-page pt-30 pb-60">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title">
          <h2><?=$categoryByUrl->Category?> Coupons, Deals for <?=date('M')?> <?=date('Y')?><span>Start Saving today</span></h2>
        </div>
      </div>
    </div>
    <div class="row gy-4 d-flex justify-content-center">
      <?php
      $count = 0;
      $couponList = $adminDao->productCoupon();
      foreach ( $couponList as $key => $value ) {
          $store1 = $adminDao->ReguserById( $value->Store );
          ?>
      <div class="col-md-3 d-flex justify-content-center">
    <a href="<?=$value->Link?>" class="product_c">
            <div class="product_c proCard">
              
              <div class="pos product_img" >
                <div class="ck-clicker dy_lk_hide" data-href="<?=$value->Link?>"><img alt="<?=$value->CouponHeading?>" title="" loading="lazy" width="145" height="145" decoding="async" data-nimg="1" class="" style="color:transparent" src="<?=$imageUrl?>coupon/<?=$value->Image?>"></div>
              </div>
              <div class="item_detail">
                <p class="brand"> <strong><?=$store1->Name?></strong></p>
                <div data-href="<?=$value->Link?>" class="ck-clicker product_name" title="Realme narzo N53"><?=$value->CouponHeading?></div>
                <div class="price_detail">
                  <ul class="fl fw">
                    <li class="p_finalprice_wrp fl fw">
                      <p class="p_finalprice"><span class="price_strike">₹10,999</span><span class="p_totalprice">₹<?=$value->CouponPrice?></span><span class="p_offer_amount">(<!-- -->27<!-- -->% Off)</span></p>
                    </li>
                    <li class="p_cashback_wrp fl fw">
                      <p class="p_bestprice" >Product at its best price</p>
                    </li>
                    <li class="final_price fl fw">
                      <p class="fl fw">Final Price&nbsp;<!-- -->₹<?=$value->CouponPrice?></p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </a>
      </div>
      <?php $count++; //if($count==12){ break; } 
      } ?>
   </div>
  </div>
</section>

<p>&nbsp;</p>
<?php 
include "footer.php";

?>

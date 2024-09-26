<?php
include "admin-lib.php";
include "header.php";
$url = $_REQUEST['url'];
$token = $_REQUEST[ 'token' ];
$userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
$storeData = $adminDao->storeBySlugToken($url,$token);
$couponByStore = $adminDao->couponByStore( $storeData->Id );
$categoryById = $adminDao->categoryById($storeData->Category);
$click_id="CD_".time()."_".$_SESSION['CTW_LoggedUserId'];
$store = $adminDao->ReguserById( $storeData->Id  );
if($storeData->OfferType==1){
    $code1="FD_".$store->OfferValue;
   $offer = "Flat ". $store->OfferValue." Cashback";
} else if($store->OfferType==2){
     $code1="FP_".$store->OfferValue;
    $offer = "Flat ". $store->OfferValue."% Cashback";
} else if($store->OfferType==3){
    $code1="UD_".$store->OfferValue;
    $offer = "Upto Rs.". $store->OfferValue." Cashback";
} else if($store->OfferType==4){
    $code1="UP_".$store->OfferValue;
    $offer = "Upto ". $store->OfferValue."% Cashback";
} else {
    $code1="";
    $offer ="";
}
?>
<section class="breadcrumb-sec">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>all-stores">Store</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          <?=$store->Name?>
        </li>
      </ol>
    </nav>
  </div>
</section>
<section class="cat-page pt-60 pb-60">
<div class="container">
  <div class="row d-lg-flex align-items-center justify-content-center">
    <div class="col-md-8 d-flex justify-content-center">
      <div class="title">
        <h2>
          <?=$store->Name?>
          Coupons<span>Deals for
          <?=date('M')?>
          <?=date('Y')?>
          </span></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="cat-side-img"> 
      
      <a class="logo-box-2" href="<?=$store->StoreLink?>&p9=<?=$click_id?>&source=<?=$token?>&txn_id=<?=time()?>&sale_amount=&currency=INR&p8=<?=urlencode($offer)?>&p6=<?=$userdata->Code?>&p7=<?=$code1?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036"> <img style="width:100%;height:100%" src="<?=$store->Image?>" alt=""></a>
      <?php  if(!empty($_SESSION ['CTW_LoggedUserId'])){?>
        <div class="web-btn"><a href="<?=$store->StoreLink?>&p9=<?=$click_id?>&source=<?=$token?>&txn_id=<?=time()?>&sale_amount=&currency=INR&p8=<?=urlencode($offer)?>&p6=<?=$userdata->Code?>&p7=<?=$code1?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036">Earn Cashback</a></div>
        <?php } else { ?>
        <div class="web-btn"><a href="<?=$baseUrl?>register">Earn Cashback</a></div>
        <?php } ?>
        
        
      </div>
    
      <div class="similar-category">
        <h4>Track Cashback</h4><hr>
        <div class="row">
          <div class="col-md-12 category-col">
            <h6>Estimated Cashback Date</h6>
            <p class="points"><?=date('d M, Y', strtotime($store->EstimateCashbackDate))?></p>
            <h6>Tracking Speed</h6>
            <p class="points"><?=$store->TrackingSpeed?></p>
            <h6>Cashback Claim Time</h6>
            <p class="points"><?=$store->ClaimTime?></p>
          </div>
        </div>
      </div>
      <div class="similar-category">
        <h4> Cashback T&C</h4><hr>
        <div class="row">
          <div class="col-md-12 category-col">
           <?=$offer?> 
           <?=$store->CashbackRate?>
          </div>
        </div>
      </div>
     
      
      <div class="similar-category-2">
              <div class="row"><div class="col-lg-9 col-md-8 col-9"><h4>All Stores</h4></div><div class="col-lg-3 col-md-4 col-3 d-flex justify-content-end"><small>
<a href="<?=$baseUrl?>all-stores">See All</a></small></div></div>
        <hr>
        <div class="row">
          <div class="col-md-12 category-col">
            <ul class="cat-ul">
              <?php
              $storeList = $adminDao->storeList();
              for ( $i = 0; $i <= 5; $i++ ) {
                  if ( !empty( $storeList[ $i ]->Image ) ) { ?>
                <li> <a href="<?=$baseUrl?>storeCoupon/<?=$storeList[$i]->Slug?>/<?=$storeList[$i]->Token?>"><i class="fa-solid fa-check"></i><?=$storeList[$i]->Name?></a></li>
              <?php }} ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="similar-category-2">
     <div class="row"><div class="col-lg-9 col-md-8 col-9"> <h4>All Categories</h4></div><div class="col-lg-3 col-md-4 col-3 d-flex justify-content-end"><small>
<a href="<?=$baseUrl?>categories.php">See All</a></small></div></div>
        <hr>
        <div class="row">
          <div class="col-md-12 category-col">
            <ul class="cat-ul">
              <?php
              $categoryList = $adminDao->categoryList();

              for ( $i = 0; $i <= 5; $i++ ) {

                  if ( !empty( $categoryList[ $i ]->Category ) ) {
                    //category in url for different page  ?>
              <li> <a href="<?=$baseUrl.'stores/'.$categoryList[$i]->Url?>"> <i class="fa-solid fa-check"></i>
                <?=$categoryList[$i]->Category?>
                </a> </li>
              <?php }} ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tabs">
          <?php 
            $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
          ?>
        <div class="all-btn nav"> <a class="all-btn-1 active" href="javascript:void(0)" onclick="location.reload();" >ALL</a><a class="all-btn-1" data-category-type="Deals" type="button" href="javascript:void(0)" previewlistener="true">DEALS</a><a class="all-btn-1" type="button" href="javascript:void(0)" data-category-type="Coupon" previewlistener="true">COUPONS</a></div>
        <div class="tab " id="allCouponData">
          <?php
          $count = 0; //$couponList = $adminDao->couponByCategory($categoryByUrl->Id); 

          foreach ( $couponByStore as $key => $value ) {
              
                // if($value->OfferType==1){
                //   $offer = "Flat ". $value->CouponPrice." Cashback";
                // } else if($value->OfferType==2){
                //     $offer = "Flat ". $value->CouponPrice."% Cashback";
                // } else if($value->OfferType==3){
                //     $offer = "Upto Rs.". $value->CouponPrice." Cashback";
                // } else if($value->OfferType==4){
                //     $offer = "Upto ". $value->CouponPrice."% Cashback";
                // } else {
                //     $offer ="";
                // }
              ?>
          <div class="category-card" data-category-type="<?=$value->Type?>">
                <div class="row w-100">
                  <div class="col-md-2 cat-card-img">
					   <!--<div class="trend-btn"><h4>Trending</h4></div>-->
                      <div class="trend-img"><a class="logo-box-2" href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$url?>/<?=$value->Slug?>"> <img src="<?=$store->Image?>" alt=""></a></div>
                  </div>
                  <div class="col-md-10 cat-card-text">
                    <div class="expire-date category-expiry">
                      
                    
                    </div>
                    <div class="title-prod"><h5 class="coupn-head">
                      <?=$value->CouponHeading?></h5> 
                      <?php if($value->Type=="Coupon"){ ?> 
                      <div class="offer-btn"><a class="btn btn-success button coupon-btn" href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$url?>/<?=$value->Slug?>">Show Coupon Code</a></div>
                      <?php } else if($value->Type=="Deals"){  ?>
                      <div class="offer-btn"><a class="btn btn-success button coupon-btn" href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$url?>/<?=$value->Slug?>">Activate Deal</a></div>
                      <?php } else { ?>
                      <div class="offer-btn"><a class="btn btn-success button coupon-btn" href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$url?>/<?=$value->Slug?>">Activate Offer</a></div>
                      <?php } ?>
                      </div>
                       <?php if(!empty($offer)){ ?>
                      <h4><div class="offer-btn"><a class="all-btn-1 coupon-btn" href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$url?>/<?=$value->Slug?>"><?=$offer?></a></div></h4>
                      <?php } ?>
                    <p>
                      <?=$value->CouponExcerpt?>
                    </p>
                  </div>
                </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <h4><?=$store->Name?> Cashback Offers & Coupons</h4>
      <p><?=$store->Description?> </p>
    </div>
  </div>
  </section>
</div>
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
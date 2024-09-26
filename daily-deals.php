<?php
include "admin-lib.php";
include "header.php";

?>
<div class="clearfix"></div>
<nav aria-label="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Daily Deals</li>
    </ol>
  </div>
</nav>
<div class="clearfix"></div>
<div class="container">
  <section class="daily-deals ps-section mt-30 mb-90">
    <div class="title-heading">
      <h2 class="heading">Daily Deals</h2>
    </div>
    <div class="row mb-30">
      <?php
      $count = 0;
      $couponList = $adminDao->dealCoupon();
      foreach ( $couponList as $key => $value ) {
          $store = $adminDao->ReguserById( $value->Store );
          ?>
      <?php /*?>
<div class="col-md-4 mb-40">
    <div class="deals-grid d-flex flex-row">
        <div class="deals-left"> <a class="deals-btn fa-pull-left" href="#"><?=$value->CouponPrice?>% OFF</a> <img class="deals-card" src="assets/img/deals/deals-150x150.png" alt="deals">
            <div class="deals-card-img"> <img src="<?=$imageUrl?>store/<?=$store->Image?>" alt="deals"></div>
        </div>
        <div class="deals-right"> <a href="#"><?=$store->Name?></a>
            <p><?=$value->CouponHeading?></p>
            <span><?=$value->CouponCode?></span><em><?=$value->CouponCode?></em>
            <a class="get-deal-btn" href="#popup<?=$key?>">GET DEAL</a>
            <div id="popup<?=$key?>" class="overlay">
                <div class="popup"> <a href="#"> <img src="<?=$imageUrl?>store/<?=$store->Image?>" alt="<?=$store->Name?>"></a>
                    <h4><?=$value->CouponHeading?></h4>
                    <p><?=$value->CouponExcerpt?></p>
                    <div class="copy-button">
                        <input id="copyvalue" type="text" readonly value="<?=$value->CouponCode?>" />
                        <button onclick="copyIt()" class="copybtn">COPY</button>
                    </div>
                    <a class="close" href="#">&times;</a> <a class="coupon-web-link" href="<?=!empty($store->StoreLink)?$store->StoreLink:'javascript:void(0)'?>">Visit Website</a>
                    <div class="like-dislike-btn">
                        <h5>Did this offer work for you?</h5>
                        <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                        <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
      <?php */?>
      <div class="col-md-4 mb-40">
        <div class="deals-grid d-flex flex-row">
          <div class="deals-left"> <a class="deals-btn fa-pull-left" href="#">
            <?=$value->CouponPrice?>
            % OFF</a>
            <div class="deals-card-img"> <img src="<?=$imageUrl?>store/<?=$store->Image?>" alt="deals"></div>
          </div>
          <div class="deals-right"> <a href="#">
            <?=$store->Name?>
            </a>
            <p>
              <?=$value->CouponHeading?>
            </p>
            <span>
            <?=$value->CouponCode?>
            </span><em>
            <?=$value->CouponCode?>
            </em> <a class="get-deal-btn" href="#popup<?=$key?>">GET DEAL</a> </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>
</div>
<div class="clearfix"></div>
<div id="popup<?=$key?>" class="overlay">
  <div class="popup new_popup_container"> <img src="<?=$imageUrl?>store/<?=$store->Image?>" alt="<?=$store->Name?>">
    <h4>
      <?=$value->CouponHeading?>
    </h4>
    <p>
      <?=$value->CouponExcerpt?>
    </p>
    <div class="copy-button">
      <input id="copyvalue" type="text" readonly value="<?=$value->CouponCode?>" />
      <button onclick="copyIt()" class="copybtn">COPY</button>
    </div>
    <a class="close" href="#">&times;</a> <a class="coupon-web-link" href="<?=!empty($store->StoreLink)?$store->StoreLink:'javascript:void(0)'?>">Visit Website</a> </div>
</div>
<?php
include "footer.php";

?>
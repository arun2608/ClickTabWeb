<?php 
include "admin-lib.php";
include "header.php";

?>
<div class="clearfix"></div>
  <nav aria-label="breadcrumb">
	  	<div class="container"> 
<ol class="breadcrumb">   
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Top 20</li>
    </div></ol>
  </nav>
<div class="clearfix"></div>
<div class="container">
  <section class="daily-deals ps-section mt-30 mb-90">
    <div class="title-heading">
      <h2 class="heading">Top 20 Deals</h2>
    </div>
    <div class="row mb-30">
    <?php $count=0; $couponList = $adminDao->top20Coupon(); 
    foreach ($couponList as $key => $value) { 
      $store = $adminDao->ReguserById($value->Store);
      ?>   
	
      <div class="col-md-4 mb-40">
        <div class="deals-grid d-flex flex-row">
          <div class="deals-left"> <a class="deals-btn fa-pull-left" href="#"><?=$value->CouponPrice?>% OFF</a>
            <div class="deals-card-img"> <img src="<?=$imageUrl?>store/<?=$store->Image?>" alt="deals"></div>
          </div>
          <div class="deals-right"> <a href="#"><?=$store->Name?></a>
            <p><?=$value->CouponHeading?></p>
            <span><?=$value->CouponCode?></span><em><?=$value->CouponCode?></em>
			   <a class="get-deal-btn" href="#popup<?=$key?>">GET DEAL</a>
						  			              <div id="popup<?=$key?>" class="overlay">
                <div class="popup new_popup_container"> <img src="<?=$imageUrl?>store/<?=$store->Image?>" alt="<?=$store->Name?>">
                  <h4><?=$value->CouponHeading?></h4>
                  <p><?=$value->CouponExcerpt?></p>
                  <div class="copy-button">
                    <input id="copyvalue" type="text" readonly value="<?=$value->CouponCode?>" />
                    <button onclick="copyIt()" class="copybtn">COPY</button>
                  </div>
                  <a class="close" href="#">&times;</a> <a class="coupon-web-link" href="<?=!empty($store->StoreLink)?$store->StoreLink:'javascript:void(0)'?>">Visit Website</a>
				  				  
				  </div>
              </div>
			</div>

        </div>
      </div>
      
      
	  
	  <?php } ?>
    </div>

  </section>
</div>
	
	

<div class="clearfix"></div>

<?php 
 include "footer.php";

?>
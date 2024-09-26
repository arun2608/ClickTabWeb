<?php 
include "admin-lib.php";
include "header.php";
$category = $_REQUEST['category_url'];
$categoryByUrl = $adminDao->categoryByUrl($category);
?>
<div class="clearfix"></div>
  <nav aria-label="breadcrumb">
	  	  	<div class="container"> 
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Coupon Categories</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$categoryByUrl->Category?></li>
				</ol></div>
  </nav>
<div class="clearfix"></div>
<div class="container">
  <section class="category ps-section mb-90 mt-30">
    <div class="title-heading">
      <h2 class="heading"><?=$categoryByUrl->Category?> Coupons, Deals for <?=date('M')?> <?=date('Y')?></h2>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="store-logos">
          <h4>Related Stores</h4>
          <div class="row">
            <div class="col-md-12">
              <ul>
                <?php $storeList = $adminDao->storeList();
                for ($i=0; $i <= 5; $i++) { 
                if(!empty($storeList[$i]->Image)){ ?>
                <li><a class="store-image" href="<?=$baseUrl.'storeCoupon/'.$storeList[$i]->Id?>"> <img src="<?=$imageUrl.'store/'.$storeList[$i]->Image?>" alt="logo"></a></li>
                <?php } } ?>
              </ul>
            </div>
<?php /*?>            <div class="col-md-6">
              <ul>
                <?php $storeList = $adminDao->storeList();
                for ($i=6; $i <= 10; $i++) { 
                if(!empty($storeList[$i]->Image)){ ?>
                <li><a class="store-image" href="#"> <img src="<?=$imageUrl.'store/'.$storeList[$i]->Image?>" alt="logo"></a></li>
                <?php } } ?>
              </ul>
            </div><?php */?>
          </div>
        </div>
        <div class="similar-category">
          <h4>Similar Category</h4>
          <div class="row">
            <div class="col-md-12 category-col">
              <ul>
                 <?php $categoryList = $adminDao->categoryList();
                for ($i=0; $i <= 5; $i++) { 
                if(!empty($categoryList[$i]->Category)){ ?>
                <li>
                  <div class="category-image"> <img src="<?=$imageUrl.'category/'.$categoryList[$i]->Banner?>" alt="">
                    <div class="category-icon d-flex justify-content-center"> <a href="<?=$baseUrl.'category/'.$categoryList[$i]->Url?>">
                      <h5><?=$categoryList[$i]->Category?></h5>
                      </a> </div>
                  </div>
                </li>
                <?php }} ?>
              </ul>
            </div>
<?php /*?>            <div class="col-md-6 category-col">
              <ul>
                <?php $categoryList = $adminDao->categoryList();
                for ($i=6; $i <= 10; $i++) { 
                if(!empty($categoryList[$i]->Category)){ ?>
                <li>
                  <div class="category-image"> <img src="<?=$imageUrl.'category/'.$categoryList[$i]->Banner?>" alt="">
                    <div class="category-icon d-flex justify-content-center"> <a href="#">
                      <h5><?=$categoryList[$i]->Category?></h5>
                      </a> </div>
                  </div>
                </li>
                <?php }} ?>
              </ul>
            </div><?php */?>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <h3 class="category-title"><?=$categoryByUrl->Category?> Coupons, Deals for <?=date('M')?> <?=date('Y')?></h3>
        <div class="tabs">
          <input type="radio" name="tabs" id="tabone" checked="checked">
          <label for="tabone">All</label>
          <div class="tab ">
            <?php $count=0; $couponList = $adminDao->couponByCategory($categoryByUrl->Id); 
                foreach ($couponList as $key => $value) { 
                  $store = $adminDao->ReguserById($value->Store);
                  ?> 
            <div class="category-card">
              <div class="row">


                <div class="col-md-8">
                  <div class="expire-date category-expiry">
                    <h4 class="fa-pull-left"><i class="fa-regular fa-circle-check"></i>Verified</h4>
                    <div class="date fa-pull-right"> <i class="far fa-clock mr-1"></i><?=date('d M, Y', strtotime($value->CouponEndDate))?>  </div>
                  </div>
                  <h5><?=$value->CouponHeading?></h5>
                  <p><?=$value->CouponExcerpt?></p>
                </div>
                <div class="col-md-4">
                  <div class="card-right"> <a class="logo-box-2" style="display: block;margin-bottom: 0px;" href="#"> <img src="<?=$imageUrl.'store/'.$store->Image?>" alt=""></a> 
					  <a class="button coupon-btn" href="#popup<?=$key?>">GET OFFER</a>
					              <div id="popup<?=$key?>" class="overlay">
                <div class="popup new_popup_container"> <img src="<?=$imageUrl.'store/'.$store->Image?>" alt="<?=$store->Name?>">
                  <h4><?=$value->CouponHeading?></h4>
                  <p><?=$value->CouponExcerpt?></p>
                  <p>Use this coupon code at checkout:</p>
                  <div class="copy-button">
                    <input id="copyvalue" type="text" readonly value="<?=$value->CouponCode?>" />
                    <button onclick="copyIt()" class="copybtn">COPY</button>
                  </div>
                  <a class="close" href="#">&times;</a> <a class="coupon-web-link" href="<?=!empty($store->StoreLink)?$store->StoreLink:$value->Link?>">Visit Website</a>
				  				  
				  </div>
              </div>
					</div>
                </div>
              </div>
            </div>

          <?php } ?>
          
            
          </div>
          <input type="radio" name="tabs" id="tabtwo">
          <label for="tabtwo">T20</label>
          <div class="tab">
            
            
            <?php $count=0; $couponList = $adminDao->t20CouponByCategory($categoryByUrl->Id); 
                foreach ($couponList as $key => $value) { 
                  $store = $adminDao->ReguserById($value->Store);
                  ?> 
            <div class="category-card">
              <div class="row">


                <div class="col-md-8">
                  <div class="expire-date category-expiry">
                    <h4 class="fa-pull-left"><i class="fa-regular fa-circle-check"></i>Verified</h4>
                    <div class="date fa-pull-right"> <i class="far fa-clock mr-1"></i><?=date('d M, Y', strtotime($value->CouponEndDate))?>  </div>
                  </div>
                  <h5><?=$value->CouponHeading?></h5>
                  <p><?=$value->CouponExcerpt?></p>
                </div>
                <div class="col-md-4">
                  <div class="card-right"> <a class="logo-box-2" style="display: block;margin-bottom: 0px;" href="#"> <img src="<?=$imageUrl.'store/'.$store->Image?>" alt=""></a> 
            <a class="button coupon-btn" href="#popup<?=$key?>">GET OFFER</a>
                        <div id="popup<?=$key?>" class="overlay">
                <div class="popup"> <a href="#"> <img src="<?=$imageUrl.'store/'.$store->Image?>" alt="<?=$store->Name?>"></a>
                  <h4><?=$value->CouponHeading?></h4>
                  <p><?=$value->CouponExcerpt?></p>
                  <p>Use this coupon code at checkout:</p>
                  <div class="copy-button">
                    <input id="copyvalue" type="text" readonly value="GOFREE" />
                    <button onclick="copyIt()" class="copybtn">COPY</button>
                  </div>
                  <a class="close" href="#">&times;</a> <a class="coupon-web-link" href="<?=!empty($store->StoreLink)?$store->StoreLink:$value->Link?>">Visit Website</a>
                    
          </div>
              </div>
          </div>
                </div>
              </div>
            </div>

          <?php } ?>
          </div>
          <input type="radio" name="tabs" id="tabthree">
          <label for="tabthree">Offers</label>
          <div class="tab">
            <?php $count=0; $couponList = $adminDao->offerCouponByCategory($categoryByUrl->Id); 
                foreach ($couponList as $key => $value) { 
                  $store = $adminDao->ReguserById($value->Store);
                  ?> 
            <div class="category-card">
              <div class="row">


                <div class="col-md-8">
                  <div class="expire-date category-expiry">
                    <h4 class="fa-pull-left"><i class="fa-regular fa-circle-check"></i>Verified</h4>
                    <div class="date fa-pull-right"> <i class="far fa-clock mr-1"></i><?=date('d M, Y', strtotime($value->CouponEndDate))?>  </div>
                  </div>
                  <h5><?=$value->CouponHeading?></h5>
                  <p><?=$value->CouponExcerpt?></p>
                </div>
                <div class="col-md-4">
                  <div class="card-right"> <a class="logo-box-2" style="display: block;margin-bottom: 0px;" href="#"> <img src="<?=$imageUrl.'store/'.$store->Image?>" alt=""></a> 
            <a class="button coupon-btn" href="#popup<?=$key?>">GET OFFER</a>
                        <div id="popup<?=$key?>" class="overlay">
                <div class="popup"> <a href="#"> <img src="<?=$imageUrl.'store/'.$store->Image?>" alt="<?=$store->Name?>"></a>
                  <h4><?=$value->CouponHeading?></h4>
                  <p><?=$value->CouponExcerpt?></p>
                  <p>Use this coupon code at checkout:</p>
                  <div class="copy-button">
                    <input id="copyvalue" type="text" readonly value="<?=$value->CouponCode?>" />
                    <button onclick="copyIt()" class="copybtn">COPY</button>
                  </div>
                  <a class="close" href="#">&times;</a> <a class="coupon-web-link" href="<?=!empty($store->StoreLink)?$store->StoreLink:$value->Link?>">Visit Website</a>
                    
          </div>
              </div>
          </div>
                </div>
              </div>
            </div>

          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="clearfix"></div>
<?php 
include "footer.php";

?>
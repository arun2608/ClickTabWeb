<?php 
 include "admin-lib.php";
 include "header.php";
 $hb1 = $adminDao->bannerById(6);
 $hb2 = $adminDao->bannerById(7);
 $hb3 = $adminDao->bannerById(8);
 
?>
<section class="banner pt-10 pb-20">
    <div class="container-fluid">
  <div class="banner-slider">
    <div class="home-banner-carousel owl-carousel owl-theme">
      <?php
        $bannerList = $adminDao->bannerList("Banner");
        foreach ( $bannerList as $key => $value ) {
            ?>
      <div class="item">
        <div class="banner-img"><a href="<?=$value->Link?>"><img src="<?=$imageUrl?>banner/<?=$value->Image?>" alt="banner image"></a></div>
      </div>
      <?php } ?>
      
    </div>
  </div></div>
</section>
<section class="category-sec pt-20 pb-20">
  <div class="container">
    
        <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 col-12 d-flex justify-content-lg-start justify-content-center">
        <div class="title mb-0" data-aos="zoom-out" data-aos-duration="800">
          <h2>Top Categories</h2>
        </div>
      </div>
            <div class="col-md-4 col-12 d-flex justify-content-lg-end justify-content-center">
        <div class="v-more-btn" data-aos="zoom-out" data-aos-duration="800">
         <a href="<?=$baseUrl?>categories.php">View More</a>
        </div>
      </div>
    </div>

    <div class="">
      <div class="fest-carousel owl-carousel owl-theme">
        <?php
        $categoryList = $adminDao->categoryList();
        foreach ( $categoryList as $key => $value ) {
            ?>
        <div class="item">
          <div class="fest-card">
            <div class="fest-img"><a href="<?=$baseUrl.'stores/'.$value->Url?>"><img loading="lazy" width="301" height="160" decoding="async" data-nimg="1" class="" style="color:transparent" src="<?=$imageUrl.'category/'.$value->Banner?>" alt="<?=$value->Category?>"></a></div>
            <div class="fest_botm">
              <a href="<?=$baseUrl.'stores/'.$value->Url?>" class="fest-btn">GRAB DEAL</a>
            </div>
            <span><?=$value->Category?></span> </div>
        </div>
         <?php } ?>
      </div>
    </div>
    
  </div>
</section>
<section class="category-sec pt-20 pb-20 bg-grey">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 col-12 d-flex justify-content-lg-start justify-content-center">
        <div class="title mb-0" data-aos="zoom-out" data-aos-duration="800">
          <h2>Most Popular Brands</h2>
        </div>
      </div>
            <div class="col-md-4 col-12 d-flex justify-content-lg-end justify-content-center">
        <div class="v-more-btn" data-aos="zoom-out" data-aos-duration="800">
         <a href="<?=$baseUrl?>all-stores">View More</a>
        </div>
      </div>
    </div>
      <div class="brand-slider row">
        <?php $count=0;
        $showingBrands = $adminDao->showingBrands(1);
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
        <div class="col-lg-3 col-md-3 col-6"><a class="brand-card " href="<?=$baseUrl?>storeCoupon/<?=$store1->Url?>/<?=$store1->Token?>">
            
            
          <div class="b_offer"><span>Sale Live Now</span></div>
		 <div class="brand-terms"> <em><?=!empty($couponByStore)?count($couponByStore):"0"?> Offers</em></div>
          <div class="b-img"><img src="<?=$store1->Image?>" alt="<?=$store1->Name?>"></div>
       
          <div class="brand-btn"> <?=$offer?>  </div>

          </a></div>
               
           <?php $count++;  }  ?>
        
      </div>

  </div>
</section>
 
<section class="cta pt-20 pb-20">
  <div class="container">
    <div class="row g-0">
      <div class="col-md-4">
        <div class="cta-bg d-flex align-items-center justify-content-center h-100 w-100">
          <div class="cta-text" data-aos="zoom-out" data-aos-duration="800">
            <h4>India's Best Cashback & Coupons Site</h4>
            <a href="<?=$hb1->Link?>" data-aos="flip-right" data-aos-duration="800">Shop Today</a></div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="cta-img"> <img src="<?=$imageUrl?>banner/<?=$hb1->Image?>" alt="cta img"> </div>
      </div>
    </div>
  </div>
</section>
<section class="top-selling pt-20 pb-20">
  <div class="container">
        <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 col-12 d-flex justify-content-lg-start justify-content-center">
        <div class="title mb-0" data-aos="zoom-out" data-aos-duration="800">
          <h2>TOP SELLING PRODUCTS - LIVE NOW!</h2>
        </div>
      </div>
            <div class="col-md-4 col-12 d-flex justify-content-lg-end justify-content-center">
        <div class="v-more-btn" data-aos="zoom-out" data-aos-duration="800">
         <a href="<?=$baseUrl?>all-stores">View More</a>
        </div>
      </div>
    </div>  

    <div class="">
      <div class="top-sell top-sell-carousel owl-carousel owl-theme">

        <?php
      $count = 0;
      $couponList = $adminDao->productCoupon();
      foreach ( $couponList as $key => $value ) {
          $store1 = $adminDao->ReguserById( $value->Store );
          $offer = "Flat ₹". $value->Cashback." Cashback";
        $categoryById = $adminDao->categoryById($value->Category);
          ?>
      <div class="item">
    <a href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$store1->Url?>/<?=$value->Slug?>" class="product_c">
            <div class="product_c proCard" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
              <div class="pos product_seller">
                <div class="ck-clicker dy_lk_hide cfont" data-href="#"> <!-- -->₹ <?=$value->Cashback?><!-- --> Cashback </div>
              </div>
              <div class="pos product_img" >
				    <div data-href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$store1->Url?>/<?=$value->Slug?>" class="ctw-brand-tag" title="<?=$value->CouponHeading?>"><span><?=$store1->Name?></span></div>
                <div class="ck-clicker dy_lk_hide" data-href="<?=$value->Link?>"><img alt="<?=$value->CouponHeading?>" title="" loading="lazy" width="145" height="145" decoding="async" data-nimg="1" class="" style="color:transparent" src="<?=$value->Image?>"></div>
				
              </div>
              <div class="item_detail">
                <p class="brand"> <strong><?=$value->CouponHeading?></strong></p>
                <div class="price_detail">
                  <ul class="fl fw">
                    <li class="p_finalprice_wrp fl fw">
                      <p class="p_finalprice"><span class="price_strike">₹ <?=$value->MRP?></span><span class="p_totalprice">₹ <?=$value->CouponPrice?></span><span class="p_offer_amount"></span></p>
                    </li>
                 
                    <!--<li class="p_cashback_wrp fl fw">-->
                    <!--  <p class="p_bestprice" >Product at its best price</p>-->
                    <!--</li>-->
                    
                    <li class="final_price fl fw">
                      <p class="fl fw">Final Price&nbsp;<!-- -->₹<?=$value->CouponPrice-$value->Cashback?></p>
                    </li>
                  </ul>
                  <div class="flat-off"><h5><?=$offer?></h5></div>
                </div>
                 <div class="client-btn d-flex align-items-center w-100"><span><img class="p-1" src="<?=$store1->Image?>" loading="lazy" alt="product image"></span><a type="button" class="pro-show" href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$store1->Url?>/<?=$value->Slug?>">Show Now</a></div>
              </div>
            </div>
          </a>
      </div>
      <?php $count++; //if($count==12){ break; } 
      } ?>

      </div>
    </div>
  </div>
</section>
<?php
    $categoryList = $adminDao->categoryList();
    foreach ( $categoryList as $key => $value ) { 
     $count = 0;
      $couponList = $adminDao->productCouponByCategory($value->Id);
       $categoryById = $adminDao->categoryById($value->Id);
      if(!empty($couponList)){ ?>
<section class="top-selling pt-20 pb-20">
  <div class="container">
              <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 col-12 d-flex justify-content-lg-start justify-content-center">
        <div class="title mb-0" data-aos="zoom-out" data-aos-duration="800">
           <h2><?=$value->Category?> - LIVE NOW!</h2>
        </div>
      </div>
            <div class="col-md-4 col-12 d-flex justify-content-lg-end justify-content-center">
        <div class="v-more-btn" data-aos="zoom-out" data-aos-duration="800">
         <a href="<?=$baseUrl?>stores/<?=$value->Url?>">View More</a>
        </div>
      </div>
    </div>  

      
    <!--<div class="row d-lg-flex align-items-center justify-content-center">-->
    <!--  <div class="col-md-8 d-flex justify-content-center">-->
    <!--    <div class="title" data-aos="zoom-out" data-aos-duration="800">-->
    <!--      <h2><?=$value->Category?> - LIVE NOW!</h2>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <div class="">
      <div class="top-sell top-sell-carousel owl-carousel owl-theme">

        <?php
    //  echo "<pre>";
    //  print_r($couponList);
      foreach ( $couponList as $key => $value ) {
          $store1 = $adminDao->ReguserById( $value->Store );
          $offer = "Flat ₹". $value->Cashback." Cashback";
               
          ?>
      <div class="item">
    <a href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$store1->Url?>/<?=$value->Slug?>" class="product_c">
            <div class="product_c proCard" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
              <div class="pos product_seller">
                <div class="ck-clicker dy_lk_hide cfont" data-href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$store1->Url?>/<?=$value->Slug?>"> <!-- -->₹ <?=$value->Cashback?><!-- --> Cashback </div>
              </div>
              <div class="pos product_img" >
				    <div data-href="<?=$value->Link?>" class="ctw-brand-tag" title="<?=$value->CouponHeading?>"><span><?=$store1->Name?></span></div>
                <div class="ck-clicker dy_lk_hide" data-href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$store1->Url?>/<?=$value->Slug?>"><img alt="<?=$value->CouponHeading?>" title="" loading="lazy" width="145" height="145" decoding="async" data-nimg="1" class="" style="color:transparent" src="<?=$value->Image?>"></div>
				
              </div>
              <div class="item_detail">
                <p class="brand"> <strong><?=$value->CouponHeading?></strong></p>
                
                <div class="price_detail">
                  <ul class="fl fw">
                    <li class="p_finalprice_wrp fl fw">
                      <p class="p_finalprice"><span class="price_strike">₹ <?=$value->MRP?></span><span class="p_totalprice">₹ <?=$value->CouponPrice?></span><span class="p_offer_amount"></span></p>
                    </li>
                 
                    <!--<li class="p_cashback_wrp fl fw">-->
                    <!--  <p class="p_bestprice" >Product at its best price</p>-->
                    <!--</li>-->
                    
                    <li class="final_price fl fw">
                      <p class="fl fw">Final Price&nbsp;<!-- -->₹<?=$value->CouponPrice-$value->Cashback?></p>
                    </li>
                  </ul>
                  <div class="flat-off"><h5><?=$offer?></h5></div>
                </div>
                <div class="client-btn d-flex align-items-center w-100"><span><img class="p-1" src="<?=$store1->Image?>" loading="lazy" alt="product image"></span><a type="button" class="pro-show" href="<?=$baseUrl?>details/<?=$value->Id?>/<?=$categoryById->Url?>/<?=$store1->Url?>/<?=$value->Slug?>">Show Now</a></div>
              </div>
            </div>
          </a>
      </div>
      <?php $count++; //if($count==12){ break; } 
      }  ?>
        
       
        
      
      
      </div>
    </div>
  </div>
</section>
<?php } } ?>
<section class="cta">
  <div class="cta-img"><a href=""><img src="<?=$imageUrl?>banner/<?=$hb2->Image?>" alt="cta img"></a>  </div>
</section>

<section class="refer pt-20 pb-20">
  <div class="container">
    <div class="refer-img d-flex justify-content-center"> <a href="<?=$hb3->Link?>"><img src="<?=$imageUrl?>banner/<?=$hb3->Image?>" alt="refer"></a></div>
  </div>
</section>
<section class="refer pt-0 pb-20">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title" data-aos="zoom-out" data-aos-duration="800">
          <h2>Three Easy Steps to Save with ClickTabWeb<span>How it works</span></h2>
        </div>
      </div>
    </div>
    <div class="row g-2 d-flex justify-content-center">
      <div class="col-md-4 d-flex justify-content-center">
        <div class="work-card" data-aos="fade-up-right" data-aos-duration="900">
          <div class="work-img"><img src="images/work/1.gif" alt="how we work"></div>
          <div class="work-text">
            <h4>Log In & Shop</h4>
            <p>Click your favourite coupon & Shop</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center">
        <div class="work-card" data-aos="fade-down" data-aos-duration="900">
          <div class="work-img"><img src="images/work/2.gif" alt="how we work"></div>
          <div class="work-text">
            <h4>Cashback Earned</h4>
            <p>Cashback gets added to your CouponDunia wallet</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center">
        <div class="work-card" data-aos="fade-up-left" data-aos-duration="900">
          <div class="work-img"><img src="images/work/3.gif" alt="how we work"></div>
          <div class="work-text">
            <h4>Withdraw Cashback</h4>
            <p>To your bank account, or as a voucher, recharge</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="creative-testimonial--slider">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title" data-aos="zoom-out" data-aos-duration="800">
          <h2>Our Testimonials</h2>
        </div>
      </div>
    </div>
    <div class="">
      <div class="testimonial-left--thumb"> <img src="images/testimonial/1.gif" alt=""> </div>
      <div class="testimonial-left--thumb-2"> <img src="images/testimonial/3.gif" alt=""> </div>
      <div class="slider-row">
        <div class="slider-custom-image">
          <div class="testimonial-carousel owl-carousel owl-them">
              <?php $testimonialList = $adminDao->testimonialList();
              foreach($testimonialList as $value){ ?>
            <div class="item" data-bullet-thumb="images/testimonial/user-1.webp">
              <div class="testimonial-wrap" data-aos="flip-left" data-aos-duration="900">
                <div class="testimonial-wrap--inner"> <img src="images/testimonial/quote.webp" class="quote-icon" alt="">
                  <h4 class="testimonial-heading"><?=$value->Content?></h4>
                  <span class="testimonial-user"><?=$value->Name?></span> </div>
              </div>
            </div>


            <?php } ?>
          </div>
          <div class="swiper-pagination "></div>
        </div>
      </div>
      <div class="testimonial-right--thumb"> <img src="images/testimonial/2.gif" alt=""> </div>
    </div>
  </div>
</section>

<section class="blogs pb-20 pt-20">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title" data-aos="zoom-out" data-aos-duration="800">
          <h2>Our Blogs & News</h2>
        </div>
      </div>
    </div>
    <div class="blog-cards"><div class="row">
        <?php $blogList = $adminDao->blogList();
            if(!empty($blogList)){
                $i=1;
            foreach($blogList as $key=>$value){ ?>
                <div class="col-lg-4">
                    <div class="blog2-box-all" data-aos-duration="700" data-aos="fade-up">
                        <div class="blog2-box-img img100">
                            <a href="<?= $baseUrl?>blog/<?=$value->Url?>"><img src="<?=$imageUrl?>blog/<?=$value->Image?>" alt="blog img"></a>
                        </div>
                        <div class="hadding2 blog2-hadding">
                            <ul>
                              <li style="display: inline-block;"><a class="date2" href="#"><?=date('d M, Y',strtotime($value->Date))?></a></li>
                            </ul>
              
                            <h4><a href="<?= $baseUrl?>blog/<?=$value->Url?>"><?=$value->Heading?> </a></h4>

                            <p><?=substr($value->ShortDescription,0,150)?> </p>
                            <div class="space24"></div>
                                <a class="read-more-btn" href="<?= $baseUrl?>blog/<?=$value->Url?>">Read More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php $i++; if($i==4){ break; } }} ?>
                

            

            </div></div>
  </div>
</section>
<section class="stores pt-0 pb-20">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center row-col-5">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title" data-aos="zoom-out" data-aos-duration="800">
          <h2>Popular Stores</h2>
        </div>
      </div>
    </div>
    <div class="row g-2 d-flex justify-content-center">
      <div class="col-lg-3 col-6 d-flex justify-content-lg-center justify-content-sm-start">
        <div class="store-list" data-aos="fade-down-left" data-aos-duration="600" data-aos-easing="ease-in-sine" data-aos-duration="500">
          <ul>
              <?php $storeListWithLimit = $adminDao->storeListWithLimit(0,8);
              foreach($storeListWithLimit AS $value){ ?>
            <li><a href="<?=$baseUrl?>storeCoupon/<?=$value->Slug?>/<?=$value->Token?>"><?=$value->Name?></a></li>
            <?php } ?>
            
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-6 d-flex justify-content-lg-center justify-content-sm-start">
        <div class="store-list" data-aos="zoom-in-down" data-aos-duration="600">
          <ul>
            <?php $storeListWithLimit = $adminDao->storeListWithLimit(8,8);
              foreach($storeListWithLimit AS $value){ ?>
            <li><a href="<?=$baseUrl?>storeCoupon/<?=$value->Slug?>/<?=$value->Token?>"><?=$value->Name?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-6 d-flex justify-content-lg-center justify-content-sm-start">
        <div class="store-list" data-aos="zoom-in-up" data-aos-duration="600">
          <ul>
            <?php $storeListWithLimit = $adminDao->storeListWithLimit(16,8);
              foreach($storeListWithLimit AS $value){ ?>
            <li><a href="<?=$baseUrl?>storeCoupon/<?=$value->Slug?>/<?=$value->Token?>"><?=$value->Name?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-6 d-flex justify-content-lg-center justify-content-sm-start">
        <div class="store-list" data-aos="zoom-in-down" data-aos-duration="600">
          <ul>
            <?php $storeListWithLimit = $adminDao->storeListWithLimit(24,8);
              foreach($storeListWithLimit AS $value){ ?>
            <li><a href="<?=$baseUrl?>storeCoupon/<?=$value->Slug?>/<?=$value->Token?>"><?=$value->Name?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      
    </div>
  </div>
</section>
<section class="stores pt-0 pb-20">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title" data-aos="zoom-out" data-aos-duration="800">
          <h2>Popular Categories</h2>
        </div>
      </div>
    </div>
    <div class="row g-2 d-flex justify-content-center">
      <div class="col-lg-4 col-md-6 col-6 d-flex justify-content-center">
        <div class="store-list" data-aos="fade-down-left" data-aos-duration="600" data-aos-easing="ease-in-sine" data-aos-duration="500">
          <ul>
              
              <?php $storeListWithLimit = $adminDao->categoryListWithLimit(0,6);
              foreach($storeListWithLimit AS $value){ ?>
            <li><a href="<?=$baseUrl?>stores/<?=$value->Url?>"><?=$value->Category?></a></li>
            <?php } ?>
            
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-6 d-flex justify-content-center">
        <div class="store-list" data-aos="zoom-in-down" data-aos-duration="600">
          <ul>
            <?php $storeListWithLimit = $adminDao->categoryListWithLimit(6,6);
              foreach($storeListWithLimit AS $value){ ?>
            <li><a href="<?=$baseUrl?>stores/<?=$value->Url?>"><?=$value->Category?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-6 d-flex justify-content-center">
        <div class="store-list" data-aos="fade-down-right" data-aos-duration="600" data-aos-easing="ease-in-sine" data-aos-duration="300">
          <ul>
            <?php $storeListWithLimit = $adminDao->categoryListWithLimit(12,6);
              foreach($storeListWithLimit AS $value){ ?>
            <li><a href="<?=$baseUrl?>stores/<?=$value->Url?>"><?=$value->Category?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "footer.php";?>
<style>
    .blog2-box-img {
    overflow: hidden;
    height: 250px;
}
</style>
<script>$('.fest-carousel').owlCarousel({
    loop:true,
    margin:15,
    nav:false,
    dots: false,
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:true
        }
    }
})</script>

<script>$('.home-banner-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: false,
    autoplay:true,
    autoplayTimeout:1900,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:true
        }
    }
})</script>
<script>$('.top-sell-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: false,
    autoplay:true,
    autoplayTimeout:1900,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:true
        }
    }
})</script>
<script>$('.testimonial-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: false,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,dots: true,
        },
        600:{
            items:1,
            nav:false,dots: true,
        },
        1000:{
            items:1,
            nav:true,
            loop:true
        }
    }
})</script>
</body>
</html>
<?php  
include "admin-lib.php";
include "header.php";
$id = $_REQUEST['id'];
$couponData = $adminDao->couponById($id);
$store1 = $adminDao->ReguserById( $couponData->Store ); 
    $userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
    
    $click_id="CD_".time()."_".$_SESSION['CTW_LoggedUserId'];
 //store offers   
    if($store1->OfferType==1){
        $code="FD";
   $offer = "Flat ". $store1->OfferValue." Cashback";
} else if($store1->OfferType==2){
    $code="FP";
    $offer = "Flat ". $store1->OfferValue."% Cashback";
} else if($store1->OfferType==3){
    $code="UD";
    $offer = "Upto Rs.". $store1->OfferValue." Cashback";
} else if($store1->OfferType==4){
    $code="UP";
    $offer = "Upto ". $store1->OfferValue."% Cashback";
} else {
    $code="";
    $offer ="";
}

// counpon and deals cashback
if($couponData->OfferType==1){
        $code1="FD_".$couponData->CouponPrice;
   $offer1 = "Flat ". $couponData->CouponPrice." Cashback";
} else if($store1->OfferType==2){
    $code1="FP_".$couponData->CouponPrice;
    $offer1 = "Flat ". $couponData->CouponPrice."% Cashback";
} else if($store1->OfferType==3){
    $code1="UD_".$couponData->CouponPrice;
    $offer1 = "Upto Rs.". $couponData->CouponPrice." Cashback";
} else if($store1->OfferType==4){
    $code1="UP_".$couponData->CouponPrice;
    $offer1 = "Upto ". $couponData->CouponPrice."% Cashback";
} else {
    $code1="Flat_".$couponData->Cashback;
    $offer1 = $couponData->Cashback;
}

 $cashbackAmount=$code1;
?>
<section class="breadcrumb-sec"> 
<div class="container">		  
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
    <li class="breadcrumb-item " aria-current="page"><?=$store1->Name?></li>
    <li class="breadcrumb-item " aria-current="page"><?=$couponData->CouponHeading?></li>
  </ol>
</nav>		  
</div>
</section>
	



<section class="clickble_slider1 pt-60 pb-60">
    <div class="container">
      <div class="row">
          
          
       
<!--deal-->
    <?php if($couponData->Type=="Deals"){ ?>
    
    <div class="col-md-3">
     

    
     
      
      <div class="similar-category">
        <div class="row"><div class="col-lg-9 col-md-8 col-9"><h4>All Stores</h4></div><div class="col-lg-3 col-md-4 col-3 d-flex justify-content-end"><small>
<a href="<?=$baseUrl?>all-stores">See All</a></small></div></div>
        <hr>
        <div class="row">
          <div class="col-md-12 category-col">
            <ul class="cat-ul">
              <?php
              $storeList = $adminDao->storeList();

              for ( $i = 0; $i <= 5; $i++ ) {

                  if ( !empty( $storeList[ $i ]->Image ) ) {
                      ?>
              <li> <a href="<?=$baseUrl?>storeCoupon/<?=$storeList[$i]->Slug?>/<?=$storeList[$i]->Token?>"><i class="fa-solid fa-check"></i>
                <?=$storeList[$i]->Name?>
                </a></li>
                
              <?php }} ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="similar-category">
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
            
        <div class="col-lg-9 col-md-9 col-12">
            <center><h4 class="px-4 py-2 all-btn-1 cat-detail">Just A Step Away From Earning Click Tab Web Cashback</h4></center>
            
        
            <div class=" features mt-20 bg-grey">    
              <center> <img alt="<?=$couponData->CouponHeading?>" title="" loading="lazy" decoding="async" data-nimg="1" class="xzoom-gallery t-image-urlimage_url_1" src="<?=$couponData->Image?>" style="color: transparent;"></center>
             </div>
            
                <div class="features mt-20 bg-grey">          
                 <center> <h3><?=$couponData->CouponHeading?></h3>
          
                <!--<a href="" class="btn btn-success">Get Cashback of ₹<?=$couponData->Cashback?></a>-->
                <p><?=$couponData->CouponExcerpt?> 
                    </p>
                    <h4 class="mb-4 green"><?="DEAL ACTIVATED"?> 
                    </h4>
                   <h4> <a href="<?=$store1->StoreLink?>&p9=<?=$click_id?>&source=<?=$store1->storeSubId?>&txn_id=<?=time()?>&sale_amount=<?=$couponData->CouponPrice?>&currency=INR&p8=<?=urlencode($couponData->CouponHeading)?>&p6=<?=$userdata->Code?>&p7=<?=$cashbackAmount?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036" class="all-btn-1"><?=$offer?></a></h4>
                    
                    <div class="row d-lg-flex align-items-center pt-10"> 
                <div class="col-lg-12 col-md-12 col-12 ">
                    
                <?php  if(!empty($_SESSION ['CTW_LoggedUserId'])){
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                
                <a href="<?=$store1->StoreLink?>&p9=<?=$click_id?>&source=<?=$store1->storeSubId?>&txn_id=<?=time()?>&sale_amount=<?=$couponData->CouponPrice?>&currency=INR&p8=<?=urlencode($couponData->CouponHeading)?>&p6=<?=$userdata->Code?>&p7=<?=$cashbackAmount?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036" class="btn btn-success">Get Cashback </a>
                <?php } else { ?>
                    <a href="<?=$store1->StoreLink?>&p9=<?=$click_id?>&source=<?=$store1->storeSubId?>&txn_id=<?=time()?>&sale_amount=<?=$couponData->CouponPrice?>&currency=INR&p8=<?=urlencode($couponData->CouponHeading)?>&p6=<?=$userdata->Code?>&p7=<?=$cashbackAmount?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036" class="all-btn-1">Skip & Loose Cashback</a>
                	<a href="<?=$baseUrl?>register" class="all-btn-1">Login & Get Cashback </a>
                <?php } ?>
                	</div>
                	<br><br><br>
                	<!-- AddToAny BEGIN -->
                	<div class="d-flex justify-content-center">
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_email"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_telegram"></a>
<a class="a2a_button_facebook_messenger"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_x"></a>
</div></div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
     
     </center>  


</div>
        </div>
       
        
        
      </div>
     
		
		
		<div class="col-lg-12 col-md-12 features mb-4 bg-grey">
		<h4>Description</h4>
<p><?=$couponData->AboutProduct?></p>
	</div>	
		
		<div class="col-lg-12 col-md-12 features mb-0 bg-grey">
		<h4>About this Offer</h4>
		<p><?=$couponData->AboutOffer?></p>
	</div>
	  <?php } ?>
	  
	  <!--coupon-->
	   <?php if($couponData->Type=="Coupon"){ ?>
            
        <div class="col-lg-7 col-md-7 col-12">
            
            
        
            <div class="features mt-10 bg-grey">    
              <img alt="<?=$couponData->CouponHeading?>" title="" loading="lazy" decoding="async" data-nimg="1" class="xzoom-gallery t-image-urlimage_url_1" src="<?=$couponData->Image?>" style="color: transparent;">
                    <h3 style="margin-top:20px"><?=$couponData->CouponHeading?></h3>
                    <div class="col-lg-12 col-md-12 col-12 ">
                  <input type="text" readyonly class="form-control coupon-input" value="<?=$couponData->CouponCode?>"  id="myInput">
                 <div class="coupon-copy">  <a onclick="return copyIt()" href="<?=$store1->StoreLink?>&p9=<?=$click_id?>&source=<?=$store1->storeSubId?>&txn_id=<?=time()?>&sale_amount=<?=$couponData->CouponPrice?>&currency=INR&p8=<?=urlencode($couponData->
                  CouponHeading)?>&p6=<?=$userdata->Code?>&p7=<?=$cashbackAmount?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036" class="all-btn-1"> COPY NOW </a>  </div>
                  
                  </div>
              
                 
                
             </div>
            

       
        
        
      </div>
      <div class="col-lg-5 col-md-5 col-5">
            
             <div class="col-lg-12 col-md-12 features mt-10 bg-grey">
            		<h4>Coupon Description</h4>
                    <p><?=$couponData->AboutProduct?></p>
                        <!-- AddToAny BEGIN -->
 <div class="d-flex justify-content-center mt-4">
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_email"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_telegram"></a>
<a class="a2a_button_facebook_messenger"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_x"></a>
</div></div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
	              </div>

        
      </div>
     
		
		
		
	  <?php } ?>
	  <!--PRODUCT-->
	   <?php if($couponData->Type=="Product"){ ?>
    
    <div class="col-md-3">
      <div class="similar-category">
       <div class="row"><div class="col-lg-9 col-md-8 col-9"><h4>All Stores</h4></div><div class="col-lg-3 col-md-4 col-3 d-flex justify-content-end"><small><a href="<?=$baseUrl?>all-stores">See All</a></small></div></div>
        <hr>
        <div class="row">
          <div class="col-md-12 category-col">
            <ul class="cat-ul">
              <?php
              $storeList = $adminDao->storeList();

              for ( $i = 0; $i <= 5; $i++ ) {

                  if ( !empty( $storeList[ $i ]->Image ) ) {
                      ?>
              <li> <a href="<?=$baseUrl?>storeCoupon/<?=$storeList[$i]->Slug?>/<?=$storeList[$i]->Token?>"><i class="fa-solid fa-check"></i>
                <?=$storeList[$i]->Name?>
                </a></li>
                
              <?php }} ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="similar-category">
           <div class="row"><div class="col-lg-9 col-md-8 col-9"> <h4>All Categories</h4></div><div class="col-lg-3 col-md-4 col-3 d-flex justify-content-end"><small><a href="<?=$baseUrl?>categories.php">See All</a></small></div></div>
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
            
        <div class="col-lg-9 col-md-9 col-12">
            <center><h4 class="mt-0 px-4 py-2 all-btn-1 cat-detail">Just A Step Away From Earning Click Tab Web Cashback</h4></center>
            
        
            <div class=" features mt-20 bg-grey"> 
            <div class="prod-cupn-img">
                <div class="feature-logo-img"><img alt="<?=$couponData->CouponHeading?>" title="" loading="lazy" decoding="async" data-nimg="1" class="xzoom-gallery t-image-urlimage_url_1" src="<?=$store1->Image?>" style="color: transparent;"></div>
<div class="feature-prod-img"><img alt="<?=$couponData->CouponHeading?>" title="" loading="lazy" decoding="async" data-nimg="1" class="xzoom-gallery t-image-urlimage_url_1" src="<?=$couponData->Image?>" style="color: transparent;"></div>
              </div></div>
             
            
                <div class="features mt-20 mb-20 bg-grey">          
                 <center> <h3><?=$couponData->CouponHeading?></h3>
            
                <!--<a href="" class="btn btn-success">Get Cashback of ₹<?=$couponData->Cashback?></a>-->
                <p class="mb-4 mt-30"><?=$couponData->CouponExcerpt?> 
                    </p>
                    
                    
                   <h4 class=""> <a href="#" class="all-btn-1"><?=$offer?></a></h4><br>
                   <!-- AddToAny BEGIN -->
                   <div class="d-flex justify-content-center">
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_email"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_telegram"></a>
<a class="a2a_button_facebook_messenger"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_x"></a>
</div></div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
                    <div class="row d-lg-flex align-items-center pt-40"> 
                <div class="col-lg-12 col-md-12 col-12 ">
                     
                <?php  if(!empty($_SESSION ['CTW_LoggedUserId'])){
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                
                <a href="<?=$store1->StoreLink?>&p9=<?=$click_id?>&source=<?=$store1->storeSubId?>&txn_id=<?=time()?>&sale_amount=<?=$couponData->CouponPrice?>&currency=INR&p8=<?=urlencode($couponData->CouponHeading)?>&p6=<?=$userdata->Code?>&p7=<?=$cashbackAmount?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036" class="btn btn-success">Get Cashback </a>
                <?php } else { ?>
                    <a href="<?=$store1->StoreLink?>&p9=<?=$click_id?>&source=<?=$store1->storeSubId?>&txn_id=<?=time()?>&sale_amount=<?=$couponData->CouponPrice?>&currency=INR&p8=<?=urlencode($couponData->CouponHeading)?>&p6=<?=$userdata->Code?>&p7=<?=$cashbackAmount?>&p5=<?=$couponData->CompLink?>&security_token=CWT20241036" class="all-btn-1">Skip & Loose Cashback</a>
                	<a href="<?=$baseUrl?>register" class="all-btn-1 get-login-btn">Login & Get Cashback </a>
                <?php } ?>
                	</div>
     
     </center>  


</div>
        </div>
       
        
        
      </div>
     
		
		
		<div class="col-lg-12 col-md-12 features mb-4 bg-grey">
		<h4>Description</h4>
        <p><?=$couponData->AboutProduct?></p>
	</div>	
		
		<div class="col-lg-12 col-md-12 features mb-0 bg-grey">
		<h4>About this Offer</h4>
		<p><?=$couponData->AboutOffer?></p>
	</div>
	  <?php } ?>
    </div>
  </section>	
	
	
	
	
	
	
<!--
<section class="cat-detail pt-60 pb-60 clickble_slider1">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
		  <div class="row">
            <div class="col-md-12 px-0 py-2">
              <div class="swiper swiper_large_preview">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/1.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/2.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/3.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/4.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/5.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/4.jpg" />
                    </div>
                  </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
            <div class="col-md-12 px-0 py-2">
              <div thumbsSlider="" class="swiper swiper_thumb">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/small/1-small.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/small/2-small.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/small/3-small.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/small/4-small.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/small/5-small.jpg" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="zoom_img">
                      <img class="img-fluid" src="img/small/4-small.jpg" />
                    </div>
                  </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
          </div>
		  <div class="col-sm-6">
          <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
          <h3 class="text-success">Price: $999 Per KG</h3>
          <div class="lorem_text">

            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda saepe rem sit ducimus! Placeat expedita
              illo aperiam sint dicta itaque temporibus sequi, porro saepe id veniam sunt vero totam atque.
              Commodi, quidem iusto earum vitae laboriosam harum accusamus eveniet exercitationem, molestias consequatur
              expedita dolorum similique pariatur quae illum soluta aliquam dolorem, deleniti ullam praesentium!
              Officiis quidem perspiciatis quisquam! Officiis, voluptatum?
            </p>
          </div>

          <div class="form-group mb-3">
            <label for="size" class="form-label">Select Size</label>
            <select id="size" class="form-select w-50">
              <option>S</option>
              <option>M</option>
              <option>L</option>
              <option>XL</option>
              <option>XXl</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="quantity">Enter Quantity</label>
            <input type="number" value="" class="form-control w-50" name="quantity" id="quantity">
          </div>

          <a href="#" class="btn btn-primary btn-large">Add to cart</a>
        </div>

		</div>
    </div>
  </div>
</section>
-->

<?php include "footer.php";?>
<style>
    .all-btn-1:hover{
        border:1px solid #2f3c97;
    }
    .coupon-input{
        border: 2px dotted  #3d3fa9;
    height: 60px;
    font-size: 25px;
    color: #3d3fa9;
    font-weight: 900;
    margin-top: 30px;
    text-align: center;
    }
</style>
<script>

function copyIt() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}
  var swiper = new Swiper(".swiper_thumb", {
    spaceBetween: 10,
    slidesPerView: 4,
    speed: 300,
    loop: true,
    freeMode: true,
    watchSlidesProgress: true,
    ClickAble: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  var swiper2 = new Swiper(".swiper_large_preview", {
    spaceBetween: 10,
    slidesPerView: 1,
    // speed: 300,
    speed: 0,
    loop: true,
    // freeMode: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
</script>
</body>
</html>

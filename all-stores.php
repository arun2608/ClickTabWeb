<?php  include "admin-lib.php";
include "header.php";?>
<section class="breadcrumb-sec"> 
<div class="container">     
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories</li>
  </ol>
</nav>      
</div>
</section>
<section class="cat-page pt-30 pb-60">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title">
          <h2>TOP SELLING STORES</h2>
        </div>
      </div>
    </div>
    <div class="row gy-4 d-flex justify-content-center align-items-center">
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
      <div class="col-lg-3 col-md-3 col-6"><a class="brand-card " href="<?=$baseUrl?>storeCoupon/<?=$value1->Slug?>/<?=$value1->Token?>">
            
            
          <div class="b_offer"><span>Sale Live Now</span></div>
		 <div class="brand-terms"> <em><?=!empty($couponByStore)?count($couponByStore):"0"?> Offers</em></div>
          <div class="b-img"><img src="<?=$value1->Image?>" alt="<?=$value1->Name?>"></div>
       
          <div class="brand-btn"> <?=$offer?>  </div>

          </a></div>
          
      
     <?php } } } ?> 

    </div>
  </div>
</section>
<?php include "footer.php";?>
</body>
</html>
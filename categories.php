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
          <h2>TOP SELLING CATEGORIES<span>Start Saving today</span></h2>
        </div>
      </div>
    </div>
    <div class="row gy-4 d-flex justify-content-center">
      <?php
        $categoryList = $adminDao->categoryList();
        foreach ( $categoryList as $key => $value ) {
            ?>
      <div class="col-md-3 d-flex justify-content-center">
    <a href="<?=$baseUrl.'stores/'.$value->Url?>" class="product_c">
            <div class="product_c proCard">
             
              <div class="pos product_img" >
                <div class="ck-clicker dy_lk_hide" data-href="<?=$baseUrl.'stores/'.$value->Url?>"><img alt="<?=$value->Category?>" title="" loading="lazy" width="145" height="145" decoding="async" data-nimg="1" class="" style="color:transparent" src="<?=$imageUrl.'category/'.$value->Banner?>"></div>
              </div>
              <div class="item_detail">
                <div data-href="<?=$baseUrl.'stores/'.$value->Url?>" class="ck-clicker product_name" title="<?=$value->Category?>"><?=$value->Category?></div>
                
              </div>
            </div>
          </a>
      </div>
	   <?php } ?>

    </div>
  </div>
</section>
<?php include "footer.php";?>
</body>
</html>
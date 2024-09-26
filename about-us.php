<?php
include "admin-lib.php";
include "header.php";
$siteControlById = $adminDao->siteControlById(221);
?>
<div class="clearfix"></div>
<section class="breadcrumb-sec">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section>
<div class="clearfix"></div>
<section class="about pt-60 pb-60">
  <div class="container">
    <div class="col-lg-12 align-items-center justify-content-center">
      <div class="about9-images _relative aos-init aos-animate" data-aos="fade-left" data-aos-duration="100" data-aos-delay="1s">
        <div class="about-img1 img100"> <img src="<?=$baseUrl?>images/about/2.webp" alt="about" class="rounded"> </div>
      </div>
    </div>
    <div class="col-lg-12 d-lg-flex align-items-center justify-content-center">
      <div class="title" data-aos="zoom-out" data-aos-duration="800">
        <h2>Who We Are</h2>
        <div class="ab_class"><?php echo $siteControlById->Heading_2?></div>
      </div>
    </div>
  </div>
</section>
<!--<section class="about_us pt-60 pb-60">-->
<!--  <div class="container">-->
<!--    <div class="row align-items-center">-->
<!--      <div class="col-lg-6">-->
<!--        <div class="about9-images _relative aos-init aos-animate" data-aos="zoom-out" data-aos-duration="800">-->
<!--          <div class="about-img1 img100 img5"> <img src="<?=$baseUrl?>images/about/1.webp" alt="about" class="rounded">-->
<!--            <div class="about-img2">-->
<!--              <h1 class="font-f-6"><span class="counter">16</span>+</h1>-->
<!--              <p>Years of Experience</p>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-lg-6">-->
<!--        <div class="hadding about-hadding">-->
<!--          <h1 data-aos="fade-left" data-aos-duration="700" class="aos-init aos-animate mb-2">What We Do?</h1>-->
<!--          <h4 data-aos="fade-left" data-aos-duration="700" class="aos-init aos-animate mb-4">Lorem Ipsum is simply dummy text of the printing</h4>-->
<!--          <p data-aos="fade-left" data-aos-duration="900" class="aos-init aos-animate mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->
<!--          <p data-aos="fade-left" data-aos-duration="1100" class="aos-init aos-animate mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->
<div class="clearfix"></div>
<?php
include "footer.php";

?>
<style>
    .ab_class{
        color:#000 !important;
        font-size: 15px !important; 
    }
</style>

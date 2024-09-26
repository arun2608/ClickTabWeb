<?php 
include "admin-lib.php";
include "header.php";
?>
<div class="clearfix"></div>
<section class="breadcrumb-sec"> 
<div class="container">		  
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
  </ol>
</nav>		  
</div>
</section>
<div class="clearfix"></div>
<section class="blogs-page blogs pb-20 pt-20">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title">
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
                            <p><?=substr($value->ShortDescription,0.150)?> </p>
                            <div class="space24"></div>
                                <a class="read-more-btn" href="<?= $baseUrl?>blog/<?=$value->Url?>">Read More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php $i++; }} ?>
                

            </div>
            </div>
  </div>
</section>




<div class="clearfix"></div>
<?php 
include "footer.php";

?>
<style>
    .blog2-box-img {
    overflow: hidden;
    height: 250px;
}
</style>
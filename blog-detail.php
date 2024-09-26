<?php
include "admin-lib.php";
include "header.php";
$url=$_REQUEST['url'];
$blogByUrl= $adminDao->blogByUrl($url);
?>
<div class="clearfix"></div>
<section class="breadcrumb-sec">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="<?=$baseUrl?>blogs">Blog</a> </li>
        <li class="breadcrumb-item " aria-current="page"><?=$blogByUrl->Heading?> </li>
      </ol>
    </nav>
  </div>
</section>
<div class="clearfix"></div>
<section class="blogs pb-60 pt-60">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title">
          <h2>Blog Details<span>Start Saving today</span></h2>
        </div>
      </div>
    </div>
    <div class="blog-sidebar-all sp3">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="blog-sidebar-left-all">
              <article>
                <div class="img100"> <img src="<?=$imageUrl?>blog/<?=$blogByUrl->Image?>" alt=""> </div>
                <div class="space30"></div>
                <div class="page-hadding">
                  <h2><?=$blogByUrl->Heading?></h2>
                  <div class="space14"></div>
                  <p><?=$blogByUrl->ShortDescription?> </p>
                </div>
              </article>
              
              <article>
                <div class="space30"></div>
                <div class="page-hadding">
                  <p><?=$blogByUrl->Description?></p>
                </div>
                <div class="space30"></div>
                
                
              </article>
              <div class="blog-details-tags">
                <!--<div class="blog-details-tag">-->
                <!--  <div class="hadding2">-->
                <!--    <h4 class="font-f-2 font-16 weight-700 line-height-16">Tags :</h4>-->
                <!--  </div>-->
                <!--  <div class="details-tag-list">-->
                <!--    <ul>-->
                <!--      <li><a href="#" class="font-f-2">Business consult</a></li>-->
                <!--      <li><a href="#" class="font-f-2">Consultant</a></li>-->
                <!--      <li><a href="#" class="font-f-2">Consulting</a></li>-->
                <!--    </ul>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="blog-details-icons">
                  <div class="hadding2">
                    <h4 class="font-f-2 font-16 weight-700 line-height-16">Share :</h4>
                  </div>
                  <div class="social1-blog">
                    <ul>
                      <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                      <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="space40"></div>
              <!--<div class="page-hadding">-->
              <!--  <h4><a href="#">Comments (1)</a></h4>-->
              <!--</div>-->
              <!--<div class="space12"></div>-->
              <!--<div class="details-border"></div>-->
              <!--<div class="space30"></div>-->
              <!--<div class="replly-box">-->
                <!--<div class="">-->
                <!--  <div class="replly-img border50"> <img src="<?=$baseUrl?>images/blogs/replly-img.png" alt=""> </div>-->
                <!--</div>-->
                <!--<div class="replly-p">-->
                <!--  <div class="replly-hadding">-->
                <!--    <h6><a href="#">Moris Jhonson</a></h6>-->
                <!--    <p>April 12, 2023</p>-->
                <!--  </div>-->
                <!--  <div class="space14"></div>-->
                <!--  <p>Working with Advisr Consulting transformed our HR function. Their expertise in talent acquisition and development helped us attract top talent and build a high-performance culture. Professional, knowledgeable, and results-driven. HR Consulting guided us through a complex.</p>-->
                <!--</div>-->
                <!--<a href="#" class="replly-button">Reply</a> </div>-->
              <!--<div class="space40"></div>-->
              <!--<div class="page-hadding">-->
              <!--  <h4><a href="#">Write a comment</a></h4>-->
              <!--  <div class="space30"></div>-->
              <!--</div>-->
              <!--<form action="#">-->
              <!--  <div class="comment-form">-->
              <!--    <div class="form-floating">-->
              <!--      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>-->
              <!--      <label for="floatingTextarea2">Comments</label>-->
              <!--    </div>-->
              <!--    <div class="space12"></div>-->
              <!--    <div class="row">-->
              <!--      <div class="col">-->
              <!--        <input type="text" class="form-control" placeholder="First name" aria-label="First name">-->
              <!--      </div>-->
              <!--      <div class="col">-->
              <!--        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="space24"></div>-->
              <!--    <div class="form-check">-->
              <!--      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
              <!--      <label class="form-check-label" for="flexCheckDefault"> I agree to the <a href="<?= $baseUrl?>terms">terms &amp; conditions</a> and <a href="<?= $baseUrl?>privacy-policy">privacy policy</a> </label>-->
              <!--    </div>-->
              <!--    <div class="space24"></div>-->
              <!--    <button class="comon-button">Post Comment</button>-->
              <!--  </div>-->
              <!--</form>-->
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-sidebar _relative">
              <div class="single-widget">
                <h3>Recent Posts</h3>
                <div class="space24"></div>
                <?php $blogList = $adminDao->blogList();
                if(!empty($blogList)){
                    $i=1;
                foreach($blogList as $key=>$value){ ?>
                <div class="recent-post">
                  <div class="">
                    <div class="recent-img"> <img src="<?=$imageUrl?>blog/<?=$value->Image?>" alt=""> </div>
                  </div>
                  <div class="recent-post-content">
                    <h6><a href="<?=$baseUrl?>blog/<?=$value->Url?>"><?=$value->Heading?></a></h6>
                    <div class="space6"></div>
                    <div class="blog-date-time">
                      <ul class="blog-date">
                        <li><img src="" alt=""> <?=date('d M, Y',strtotime($value->Date))?></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php } } ?>
                
                
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<?php
include "footer.php";

?>

<?php
include "admin-lib.php";
include "header.php";

$siteControlById = $adminDao->siteControlById(46);
?>
<div class="clearfix"></div>
<section class="breadcrumb-sec">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
      </ol>
    </nav>
  </div>
</section>
<div class="clearfix"></div>
<section class="privacy pt-60 pb-60">
  <div class="container">
    <div class="inner_text">
      <div class="row y-gap-50 justify-between items-center">
        <div class="col-lg-12">
          <h1>Privacy Policy</h1>
          <?=$siteControlById->Heading_2?>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="clearfix"></div>
<?php
include "footer.php";

?>

    <?php 
        include "dashboard-side-menu.php";
    ?>
         <div class="col-md-9">
         <div class="main-content">
        <div class="col-md-12">
          <div class="main-content-right">
            <h3> Personal Information </h3>
          </div>

            <?php $userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);?>
          <div class="main-side">
            <div class="col-md-2 pull-left">
              <div class="left-side">
                <h6><i class="fa fa-codepen"></i> &nbsp; Refer Code</h6>
              </div>
            </div>
            <div class="col-md-10 pull-left">
              <div class="right-side">
                <h6>:  <?=$userdata->MyReferralCode?></h6>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="main-side">
            <div class="col-md-2 pull-left">
              <div class="left-side">
                <h6><i class="fa fa-mobile"></i> &nbsp; Sub ID</h6>
              </div>
            </div>
            <div class="col-md-10 pull-left">
              <div class="right-side">
                <h6>:  <?=$userdata->Code?></h6>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="main-side">
            <div class="col-md-2 pull-left">
              <div class="left-side">
                <h6> <i class="fa fa-user"></i> &nbsp; Name</h6>
              </div>
            </div>
            <div class="col-md-10 pull-left">
              <div class="right-side">
                <h6>:<?=$userdata->Name?></h6>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="main-side">
            <div class="col-md-2 pull-left">
              <div class="left-side">
                <h6><i class="fa fa-envelope"></i> &nbsp; Email</h6>
              </div>
            </div>
            <div class="col-md-10 pull-left">
              <div class="right-side">
                <h6>: <?=$userdata->Email?></h6>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="main-side">
            <div class="col-md-2 pull-left">
              <div class="left-side">
                <h6><i class="fa fa-mobile"></i> &nbsp; Mobile No.</h6>
              </div>
            </div>
            <div class="col-md-10 pull-left">
              <div class="right-side">
                <h6>:  <?=$userdata->Mobile?></h6>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="main-side">
            <div class="col-md-2 pull-left">
              <div class="left-side">
                <h6><i class="fa fa-codepen"></i> &nbsp; Refer By</h6>
              </div>
            </div>
            <div class="col-md-10 pull-left">
              <div class="right-side">
                <h6>:  <?=$userdata->ReferralCode?></h6>
              </div>
            </div>
          </div>
         
          <div class="clearfix"></div>
          
          

    <a href="<?=$baseUrl?>edit-profile.php" class="  secondary-solid-btn border-radius pull-right"> <button class="btn btn-success form-control" >Edit Profile</button></a>
    <p>&nbsp;</p>
    <p>&nbsp;</p><p>&nbsp;</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<div class="bts-popup" role="alert">
  <div class="bts-popup-container">
    <img src="<?=$baseUrl?>/images/dashboard/popup.webp" alt="popup image" width="100%" />

  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php 
    if($userdata->DashPopup==""){?>
<script>

$(document).ready(function () {
  setTimeout(function () {
    $(".bts-popup").addClass("is-visible");
  }, 2000);

  //open popup
  $(".bts-popup-trigger").on("click", function (event) {
    event.preventDefault();
    $(".bts-popup").addClass("is-visible");
  });

  //close popup
  $(".bts-popup").on("click", function (event) {
    if (
      $(event.target).is(".bts-popup-close") ||
      $(event.target).is(".bts-popup")
    ) {
      event.preventDefault();
      $(this).removeClass("is-visible");
    }
  });
  //close popup when clicking the esc keyboard button
  $(document).keyup(function (event) {
    if (event.which == "27") {
      $(".bts-popup").removeClass("is-visible");
    }
  });
});
<?php 
$adminDao->updatePopup($_SESSION['CTW_LoggedUserId']);?>
</script>
<?php }?>

<?php include "footer.php"; ?>
</body>
</html>


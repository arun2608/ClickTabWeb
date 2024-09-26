<?php

include "admin-lib.php";

include "header.php";

if ( !isset( $_SESSION[ 'CTW_LoggedUserId' ] ) ) {

    header( "location:$baseUrl" );

}

?>
<link rel="stylesheet" href="<?=$baseUrl?>dashboard/bootstrap.min.css" />
<link rel="stylesheet" href="<?=$baseUrl?>dashboard/font-awesome.min.css" />
<link rel="stylesheet" href="<?=$baseUrl?>dashboard/dashboard.css">
<link href="https://www.us-cpe.com/assets/frontend/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<section class="about-area four section-padding gray-light-bg ">

<div class="container">
<div class="row d-flex justify-content-center">
<div class="col-md-3">
    
  <div class="dashboard">
      <?php 
    $registerById = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
    if(!empty($registerById->Image)){ ?>
    <img src="<?=$imageUrl?>user/<?=$registerById->Image?>" alt="<?=$registerById->Name?>">
    <?php } else {
    ?>
       <img src="<?=$baseUrl?>dashboard/demo-user.png" alt="#">
       <?php } ?>
    <h3>
      <?=$_SESSION['CTW_LoggedUserName']?>
    </h3>
    <div class="side-bar">
      <ul>
        <li><a href="<?=$baseUrl?>dashboard.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
        <li><a href="<?=$baseUrl?>transaction.php"> <i class="fa fa-exchange" aria-hidden="true"></i>Transaction</a></li>
        <li><a href="<?=$baseUrl?>signup-cashback"> <i class="fa fa-exchange" aria-hidden="true"></i>Sign Up Cashback</a></li>
        <li><a href="<?=$baseUrl?>wallet.php"><i class="fa-solid fa-wallet"></i>Wallet</a></li>
        <li><a href="<?=$baseUrl?>store_refer.php"><i class="fa-solid fa-wallet"></i>Refer & Earn</a></li>
        <li><a href="<?=$baseUrl?>CTW-cashback.php"><i class="fa-solid fa-cash-register"></i>CTW Cashback</a></li>
        <li><a href="<?=$baseUrl?>all-store-list"><i class="fa-solid fa-cash-register"></i>All Stores</a></li>
        <li><a href="<?=$baseUrl?>cashback-store"><i class="fa-solid fa-cash-register"></i>100% Cashback Stores</a></li>
        <li><a href="<?=$baseUrl?>refer-cashback.php"><i class="fa-solid fa-arrow-up-right-from-square"></i>Refer Cashback</a></li>
        <li> <a href="<?=$baseUrl?>missing-report.php"> <i class="fa-sharp fa-regular fa-arrows-cross"></i> Missing Report </a> </li>
        <li><a href="<?=$baseUrl?>supportlist.php"> <i class="fa-sharp fa-regular fa-square-question"></i>Support</a></li>
        <li><a href="<?=$baseUrl?>logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
      </ul>
    </div>
  </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>let menuButton = document.querySelector(".button-menu");
let container = document.querySelector(".container");
let pageContent = document.querySelector(".page-content");
let responsiveBreakpoint = 991;

if (window.innerWidth <= responsiveBreakpoint) {
  container.classList.add("nav-closed");
}

menuButton.addEventListener("click", function () {
  container.classList.toggle("nav-closed");
});

pageContent.addEventListener("click", function () {
  if (window.innerWidth <= responsiveBreakpoint) {
    container.classList.add("nav-closed");
  }
});

window.addEventListener("resize", function () {
  if (window.innerWidth > responsiveBreakpoint) {
    container.classList.remove("nav-closed");
  }
});
</script>
<style>

    .custom-modal-size {

        max-width: 38%;

        width: 35%;      

    }

  
</style>

<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CLICKTABWEB | HOME</title>
<link rel="stylesheet" href="<?=$baseUrl?>css/all.min.css">
<link rel="stylesheet" href="<?=$baseUrl?>css/fontawesome.min.css">
<link rel="stylesheet" href="<?=$baseUrl?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?=$baseUrl?>css/swiper-bundle.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="<?=$baseUrl?>css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</head>

<body>
<div class="header">
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <div class="container">
    <div class="row d-lg-flex align-items-center justify-content-between">
      <div class="col-lg-1 col-md-1 col-1">
        <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner diagonal part-1"></div>
        <div class="spinner horizontal"></div>
        <div class="spinner diagonal part-2"></div>
        </label>
      </div>
      <div class="col-lg-2 col-md-2 col-5">
        <div class="logo"><a href="<?=$baseUrl?>"><img src="<?=$baseUrl?>images/w-logo.webp" alt="logo"></a></div>
      </div>
      <div class="col-lg-3 col-md-3 col-6">
        <form class="d-flex h-search" action="<?=$baseUrl?>search.php" method="get">
          <input class="form-control" type="text" name="search_term" placeholder="Search" aria-label="Search">
          <button class="btn s-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
      <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-end">
        <div class="h-links">
          <ul>
            <li><a href="<?=$baseUrl?>index.php">Home</a></li>
            <li><a href="#">|</a></li>
            <li><a href="<?=$baseUrl?>all-stores">Stores</a></li>
            <li><a href="#">|</a></li>
            <li><a href="<?=$baseUrl?>categories.php">Categories</a> </li>
            <li><a href="#">|</a></li>
            <?php if(!empty($_SESSION ['CTW_LoggedUserId'])){
            $wallet = $adminDao->sumOfAmount($_SESSION ['CTW_LoggedUserId']);
            ?>
            
            <?php
                        $count = 1;
                        $registerById = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
                        
                        $referredInvitation = $adminDao->referralUsers($registerById->MyReferralCode);
                        if(!empty($referredInvitation))
                        $earnedAmount=0;
                        foreach($referredInvitation as $report){
                        $tData = $adminDao->sumOfAmount($report->Id);
                        $earnedAmount+= ($tData->Amount*10)/100; 
                            
                        }
                        if($earnedAmount!=0){
                            $amount=$wallet->Amount+$earnedAmount;
                        } else {
                            $amount=$wallet->Amount;
                        }
                        ?>
            <li class="user-sign"><a href="<?=$baseUrl?>dashboard.php"><i class="fa-solid fa-user"></i>
              <?=$_SESSION ['CTW_LoggedUserName']?>
              </a></li>
            <li><a href="#">|</a></li>
            <li class="money-sign"><a href="<?=$baseUrl?>wallet.php"><i class="fa-solid fa-money-bill-wave"></i> <?=(!empty($amount))?ceil($amount):"0.00"?></a></li>
            <li><a href="#">|</a></li>
            <?php } else{ ?>
            <li><a href="<?=$baseUrl?>register">Login/Signup</a></li>
            <li><a href="#">|</a></li>
            <?php }?>
            
            <?php if(!empty($_SESSION ['CTW_LoggedUserId'])){?>
            <li><a href="<?=$baseUrl?>refer.php">Refer & Earn</a></li>
            <?php } else { ?>
            <li><a href="<?=$baseUrl?>register">Refer & Earn</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="sidebarMenu">
    <ul class="menu sidebarMenuInner">
        
         
         
        <?php $categoryList = $adminDao->categoryList();
      foreach ($categoryList as $key => $value) { 
         ?>
      <li><a href="<?=$baseUrl.'stores/'.$value->Url?>"><?=$value->Category?></a>
        <!--<div class="megadrop">-->
        <!--  <div class="row">-->
        <!--    <div class="col-lg-2 col-md-4 col-12">-->
        <!--      <h5>Title</h5>-->
        <!--      <ul class="deep-ul">-->
        <!--        <li><a href="#">Sub-menu 1</a> </li>-->
        <!--        <li><a href="#">Sub-menu 2</a> </li>-->
        <!--        <li><a href="#">Sub-menu 3</a> </li>-->
        <!--      </ul>-->
        <!--    </div>-->
        <!--    <div class="col-lg-2 col-md-4 col-12">-->
        <!--      <h5>Title</h5>-->
        <!--      <ul class="deep-ul">-->
        <!--        <li><a href="#">Sub-menu 1</a> </li>-->
        <!--        <li><a href="#">Sub-menu 2</a> </li>-->
        <!--        <li><a href="#">Sub-menu 3</a> </li>-->
        <!--      </ul>-->
        <!--    </div>-->
        <!--    <div class="col-lg-2 col-md-4 col-12">-->
        <!--      <h5>Title</h5>-->
        <!--      <ul class="deep-ul">-->
        <!--        <li><a href="#">Sub-menu 1</a> </li>-->
        <!--        <li><a href="#">Sub-menu 2</a> </li>-->
        <!--        <li><a href="#">Sub-menu 3</a> </li>-->
        <!--      </ul>-->
        <!--    </div>-->
        <!--    <div class="col-lg-6 col-md-4 col-12">-->
        <!--      <div class="menu-img"><img src="images/menu.webp" alt="menu image"></div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      </li>
     <?php }  ?>
    </ul>
  </div>
</div>
<div class="clearfix"></div>

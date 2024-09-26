<input type="hidden" name="siteUrl" value="<?php echo $siteUrl;?>" id="siteUrl">
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="javascript:void(0)" class="site_title"> <span><img src="https://clicktabweb.com/images/w-logo.webp" alt="logo"></span></a>
            </div>
            <div class="clearfix"></div>

            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $siteUrl;?>assets/img/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2><?php echo ucwords($_SESSION ['AdminLoggedUserName']);?></h2>
              </div>
            </div>

            <br />

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Admin Panel</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo $siteUrl;?>">Home</a></li>	
                  <li><a href="<?php echo $siteUrl;?>banner">Manage Banner</a></li>	
                  <li><a href="<?php echo $siteUrl;?>home-page-banners">Manage Home Page Banner</a></li>
                  <li><a href="<?php echo $siteUrl;?>edit-popular-brand">Popular Brands</a></li>
                  <li><a href="<?php echo $siteUrl;?>cashback-brands">100% Cashback Brands</a></li>
                  <li><a>Manage Category<span class="fa fa-chevron-down"></span></a>	   
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $siteUrl;?>product/create-category">Create Category</a></li>
                      <li><a href="<?php echo $siteUrl;?>product/category-list">Category List</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo $siteUrl;?>reguser/">Manage Store<span class="fa fa-chevron-down"></span></a>	   
                  <ul class="nav child_menu">
                    <li><a href="<?php echo $siteUrl;?>reguser/create-reguser">Create</a></li>
                    <li><a href="<?php echo $siteUrl;?>reguser/">View</a></li>
                  </ul>
                </li>
              

                <li><a href="<?php echo $siteUrl;?>coupon/">Manage Campaign<span class="fa fa-chevron-down"></span></a>     
                  <ul class="nav child_menu">
                  <li><a href="<?php echo $siteUrl;?>coupon/create-coupon">Create Coupon/Deals</a></li>
                 <li><a href="<?php echo $siteUrl;?>coupon/">View Coupon/Deals</a>  </li>                 
                  </ul>
                </li>

               
                <li><a>Manage Users<span class="fa fa-chevron-down"></span></a>     
                    <ul class="nav child_menu">
                    <li><a href="<?php echo $siteUrl;?>register-user">Users</a></li>
                    <!--<li><a href="<?php echo $siteUrl;?>total-earning">Earning History</a></li>-->
                    <li><a href="#">Payment</a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $siteUrl;?>payment.php?type=1">Success</a></li>
                      <li><a href="<?php echo $siteUrl;?>payment.php?type=0">Pending</a></li>
                      <li><a href="<?php echo $siteUrl;?>payment.php?type=2">Rejected</a></li>
                      
                    </ul>
                  </li>
                    <li><a href="javascript:void(0);">Withrawal Request </a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $siteUrl;?>withdrawal.php?type=1">Success</a></li>
                      <li><a href="<?php echo $siteUrl;?>withdrawal.php?type=0">Pending</a></li>
                      <li><a href="<?php echo $siteUrl;?>withdrawal.php?type=2">Rejected</a></li>
                      
                    </ul></li>
                    
                  </ul>
                </li>

                
                <li><a>Manage Reports<span class="fa fa-chevron-down"></span></a>     
                    <ul class="nav child_menu">
                    <li><a href="<?php echo $siteUrl;?>report">Missing Reports</a></li>
                    <li><a href="<?php echo $siteUrl;?>click-report">Click Reports</a></li>
                    <li><a href="<?php echo $siteUrl;?>transaction-report">Transaction Report</a></li>
                    

                  </ul>
                </li>
                
               
                <li><a href="<?php echo $siteUrl;?>testimonials">Manage Testimonials<span class="fa fa-chevron-down"></span></a>     
                  <ul class="nav child_menu">
                  <li><a href="<?php echo $siteUrl;?>create-testimonial">Create Testimonial</a></li>
                  <li><a href="<?php echo $siteUrl;?>testimonials">View Testimonial</a>    </li>                
                  </ul>
                </li>
                
                 <li><a href="<?php echo $siteUrl;?>blog/">Manage Blog<span class="fa fa-chevron-down"></span></a>     
                  <ul class="nav child_menu">
                  <li><a href="<?php echo $siteUrl;?>blog/create-blog">Create Blog</a></li>
                  <li><a href="<?php echo $siteUrl;?>blog/">View Blog</a>    </li>                
                  </ul>
                </li>
                
                <li><a href="<?php echo $siteUrl;?>lander">Manage Lander<span class="fa fa-chevron-down"></span></a>     
                  <ul class="nav child_menu">
                  <li><a href="<?php echo $siteUrl;?>lander">Lander Requests</a></li>
                  <li><a href="<?php echo $siteUrl;?>edit-lander-link">Lander Link</a></li>                
                  </ul>
                </li>
                
                <li><a href="<?php echo $siteUrl;?>site/pages">Manage Pages</a></li>
                <li><a href="<?php echo $siteUrl;?>contact-enquiry">Contact Enquiry</a></li>
                <li><a href="<?php echo $siteUrl;?>become-a-partner">Become a Partner</a></li>
                
                <li><a href="<?php echo $siteUrl;?>support">Support Enquiry</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $siteUrl;?>assets/img/user1.png" alt=""><?php echo $_SESSION['AdminLoggedUserName'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
				            <li><a href="<?php echo $siteUrl;?>logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
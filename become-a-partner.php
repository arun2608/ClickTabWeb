<?php 
include "admin-lib.php";
include "header.php";
?>
<section class="breadcrumb-sec"> 
<div class="container">		  
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$baseUrl?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Become A Partner</li>
  </ol>
</nav>		  
</div>
</section>
<section class="contact_us pt-60 pb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="contact_inner">
          <div class="row">
            <div class="col-md-10">
              <div class="contact_form_inner" data-aos="fade-right" data-aos-duration="800">
                <div class="contact_field">
                  <h3>Become A Partner</h3>
                  <?php if(!empty($_SESSION['contact_message'])){ ?>
                  <p style="color:red"><?=$_SESSION['contact_message']?></p>
                  <?php } unset($_SESSION['contact_message']);?>
                  <p>Feel Free to contact us any time. We will get back to you as soon as we can!</p>
                  <form action="<?=$baseUrl?>controller/CommonController.php" method="post">
                      <input type="hidden" name="action_type" value="become-a-partner">
                  <input type="text" name="name" class="form-control form-group" required placeholder="Name" />
                  <input type="text" name="email" class="form-control form-group" required placeholder="Email" />
                  <input type="text" name="mobile" class="form-control form-group" required placeholder="Mobile no." />
                  <input type="text" name="subject" class="form-control form-group" required placeholder="Store Name" />
                  <textarea name="message" class="form-control form-group" placeholder="Message"></textarea>
                  <button type="submit" class="contact_form_submit">Send</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="right_conatct_social_icon d-flex align-items-end">
                <div class="socil_item_inner d-flex">
                  <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </div>
              </div>
            </div>
          </div>
          
          <div class="contact_info_sec" data-aos="fade-left" data-aos-duration="800">
            <h4>Contact Info</h4>
            <div class="d-flex info_single align-items-center">
              <i class="fas fa-headset"></i>
              <span><a href="tel:+91-9876543210">+91 - 9810614582</a></span>
            </div>
            <div class="d-flex info_single align-items-center">
              <i class="fas fa-envelope-open-text"></i>
              <span><a href="mailto:clicktabweb@gmail.com">Clicktabweb@gmail.com</a></span>
            </div>
            <div class="d-flex info_single align-items-center">
              <i class="fas fa-map-marked-alt"></i>
              <span>A19 Gali number 3 Laxmi Nagar Delhi -110092</span>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="map_sec">
  <div class="container">
	      <div class="row d-lg-flex align-items-center justify-content-center">
      <div class="col-md-8 d-flex justify-content-center">
        <div class="title" data-aos="zoom-out" data-aos-duration="800">
          <h2>Find Us on Google Map<span>Tagline Keywords</span></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="map_inner" data-aos="flip-left" data-aos-duration="800" data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
          
          <div class="map_bind">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.5479991676775!2d77.31209737429148!3d28.58333268631533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfb2e4948ab45%3A0xc25af56566256879!2sCWL%20TECHNOLOGY%20PRIVATE%20LIMITED!5e0!3m2!1sen!2sin!4v1723014200832!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

	
<?php include "footer.php";?>
</body>
</html>

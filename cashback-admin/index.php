<?php include_once 'header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	<?php include_once 'menu.php';
	$blogList = $adminDao->blogList();
  $ReguserList = $adminDao->ReguserList();
	$enquiryList = $adminDao->enquiryList(1);
	$couponList = $adminDao->couponList();?>        
		<div class="right_col" role="main" style="height: 600px;">
		<div class="row tile_count">
           <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="row mb-3">
            <div class="col-xl-3 col-lg-3">
            <div class="card card-inverse card-success">
              <div class="card-block bg-success dark-bg">
                <div class="rotate">

                  <i class="fa fa-th-large fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Counpons</h6>
                <h1 class="display-1"><?=count($couponList)?></h1>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3">
            <div class="card card-inverse card-danger">
              <div class="card-block bg-danger dark-bg">
                <div class="rotate">
                  <i class="fa fa-cogs fa-4x"></i>
                </div>
                <h6 class="text-uppercase">Stores</h6>
                <h1 class="display-1"><?=count($ReguserList)?></h1>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3">
            <div class="card card-inverse card-info">
              <div class="card-block bg-info dark-bg">
                <div class="rotate">
                  <i class="fa fa-user fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Enquiry</h6>
                <h1 class="display-1"><?=(!empty($enquiryList))?count($enquiryList):"0"?></h1>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3">
            <div class="card card-inverse card-warning">
              <div class="card-block bg-warning dark-bg">
                <div class="rotate">
                  <i class="fa fa-book fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Blog</h6>
                <h1 class="display-1"><?=(!empty($blogList))?count($blogList):"0"?></h1>
              </div>
            </div>
          </div>
                   
        <!--/row-->
              </div>
        </div>	
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Reports</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <main>
                      <h1> Pie Charts</h1>
                      <h2>Simple Techniques, Stunning Results</h2>
                    
                      <figure class="charts">
                        <div class="pie"></div>
                        <div class="pie donut"></div>
                    
                        <figcaption class="legends">
                          <span>Coupon</span>
                          <span>Stores </span>
                          <span>Contact Enquiry </span>
                          <span>Blogs </span>
                        </figcaption>
                      </figure>
                    
                      <!-- 
                      <div role="figure" aria-labelledby="caption">
                        <img src="" alt="" />
                        <p id="caption">The caption</p>
                      </div>
                      -->
                    </main>
                  </div>
                </div>
              </div>
			
			
			
			
			
			
			
			
			
			
			
			
			
        </div>
 	<?php include_once 'footer.php';?>      
 	</div>
    </div>
    
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<?php include_once 'script.php';?>
<style>


body {
  --c1: #6b6bd6;
  --c2: #e74f4f;
  --c3: #fc921f;
  --c4: #149ece;

  /*font-family: system-ui, sans-serif;*/
  /*font-size: 1rem;*/
  /*line-height: 1.7;*/
  /*color: #222;*/
  /*background-color: #fff;*/
  /*padding-block: 2rem 3rem;*/
}

main {
  max-width: 90%;
  margin-inline: auto;
  text-align: center;
}

h1 {
  font-size: 2rem;
}

h2 {
  font-size: 1.25rem;
  margin-block-end: 3rem;
}

.charts {
  display: flex;
  place-content: center;
  flex-flow: wrap;
  gap: 2rem;
}

.pie {
  flex: 1 0 225px;
  max-width: 325px;
  aspect-ratio: 1;
  border-radius: 50%;
  /* border: 1px solid; */

  background-image: conic-gradient(
    from 30deg,
    var(--c1) 40%,
    var(--c2) 0 65%,
    var(--c3) 0 85%,
    var(--c4) 0
  );
}

.donut {
  background-image: radial-gradient(white 40%, transparent 0 70%, white 0),
    conic-gradient(
      from 30deg,
      var(--c1) 40%,
      var(--c2) 0 65%,
      var(--c3) 0 85%,
      var(--c4) 0
    );
}

.legends {
  margin-block-end: 2rem;
  font-size: 0.9rem;
  flex-basis: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-flow: wrap;
  gap: 1rem;
}

.legends span {
  position: relative;
  padding-inline-start: 1.25rem;
}

.legends span::before {
  position: absolute;
  top: 0.4rem;
  left: 0;
  content: "";
  width: 0.8rem;
  aspect-ratio: 1;
  border-radius: 50%;
}

.legends span:nth-child(1)::before {
  background-color: var(--c1);
}

.legends span:nth-child(2)::before {
  background-color: var(--c2);
}

.legends span:nth-child(3)::before {
  background-color: var(--c3);
}

.legends span:nth-child(4)::before {
  background-color: var(--c4);
}

</style>
  </body>
</html>

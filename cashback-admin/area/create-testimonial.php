<?php require_once 'header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require_once 'menu.php';?>
        <div class="right_col" role="main" >
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Create Testimonial<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="area-frm" class="form-horizontal form-label-left" action="<?php echo $siteUrl;?>controller/AdminController.php">
                      <input type="hidden" name="action_type" value="create-testimonial">
                      
					  
					  
					  
					  <div class="col-md-3 form-group">
                        <label>Name</label>
                        <input name="name" class="form-control col-md-7 col-xs-12" placeholder="Name" required >
						
						<div class="clearfix"></div>
					    <span class="message" id="msgcity"></span>                        
                      </div>
					  
					 
                      
					  <div class="col-md-8 form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control col-md-7 col-xs-12" required placeholder="Enter Testimonial"></textarea>
						<div class="clearfix"></div>
					    <span class="message" id="msgarea"></span>                        
                      </div>
					  
					  					   
					  <div class="clearfix"></div>
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="submit" class="btn btn-success pull-right" >Save</button>
                      </div>

                    </form>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php require_once 'footer.php';?>
      </div>
    </div>
    <?php include_once 'script.php';?>
	
		  
</body>
</html>
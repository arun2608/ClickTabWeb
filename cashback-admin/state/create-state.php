<?php require_once '../header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require_once '../menu.php';?>
        <div class="right_col" role="main" >
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Create State<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="state-frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="create-state">
                      

					  <div class="col-md-3 form-group">
                        <label>State</label>
                        <input type='text' name="state" class="form-control col-md-7 col-xs-12" placeholder="Enter state">
						<div class="clearfix"></div>
					    <span class="message" id="msgstate"></span>                        
                      </div>
					  
					  					   
					  <div class="clearfix"></div>
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="button" class="btn btn-success pull-right" id="authenticateState">Save</button>
                      </div>

                    </form>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php require_once '../footer.php';?>
      </div>
    </div>
    <?php include_once '../script.php';?>
	
	<script src="<?php echo $siteUrl;?>assets/js/state.js"></script>
		  
</body>
</html>
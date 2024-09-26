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
                    <h2>Edit City<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php 
						$cityData = $adminDao->cityById($_REQUEST['id']);?>
                    <form id="city-frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="update-city">
					  <input type="hidden" name="id" value="<?php echo $cityData->Id;?>">

					  <div class="col-md-3 form-group">
                        <label>Location</label>
                        <select name="state" class="form-control col-md-7 col-xs-12" onchange="findCity(this)">
						<option value="">Location</option>
						<?php 
							$stateList = $adminDao->stateListByStatus(1);
							if($stateList){
								foreach($stateList AS $state){?>
						<option value="<?php echo $state->Id;?>" <?php if($cityData->State==$state->Id){echo "selected";}?>><?php echo $state->State;?></option>
						<?php }}?>		
						</select>
						<div class="clearfix"></div>
					    <span class="message" id="msgstate"></span>                        
                      </div>
					  
					  
					  <div class="col-md-3 form-group">
                        <label>City</label>
                        <input type='text' name="city" class="form-control col-md-7 col-xs-12" placeholder="Enter city" value="<?php echo $cityData->City;?>">
						<div class="clearfix"></div>
					    <span class="message" id="msgcity"></span>                        
                      </div>
					  
					  <div class="clearfix"></div>
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="button" class="btn btn-success pull-right" id="authenticateCity">Save</button>
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
	
	<script src="<?php echo $siteUrl;?>assets/js/city.js"></script>
		  
</body>
</html>
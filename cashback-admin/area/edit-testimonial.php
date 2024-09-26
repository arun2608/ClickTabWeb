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
                    <h2>Edit Area<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<?php 
						$areaData = $adminDao->areaById($_REQUEST['id']);?>
                    <form id="area-frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="update-area">
					  <input type="hidden" name="id" value="<?php echo $areaData->Id;?>">

					  <div class="col-md-3 form-group">
                        <label>State</label>
                        <select name="state" class="form-control col-md-7 col-xs-12" onchange="findCity(this)">
						<option value="">State</option>
						<?php 
							$stateList = $adminDao->stateListByStatus(1);
							if($stateList){
								foreach($stateList AS $state){?>
						<option value="<?php echo $state->Id;?>" <?php if($areaData->State==$state->Id){echo "selected";}?>><?php echo $state->State;?></option>
						<?php }}?>		
						</select>
						<div class="clearfix"></div>
					    <span class="message" id="msgstate"></span>                        
                      </div>
					  
					  <div class="col-md-3 form-group">
                        <label>City</label>
                        <select name="city" class="form-control col-md-7 col-xs-12" id="city-data">
						<option value=''>City</option>
						<?php 
						$cityList = $adminDao->cityListByState($areaData->State);
						if ($cityList) {
							foreach ($cityList AS $city){?>
						<option value='<?php echo $city->Id;?>' <?php if($areaData->City==$city->Id){echo "selected";}?>><?php echo $city->City;?></option>	
						<?php }}?>						
						</select>
						<div class="clearfix"></div>
					    <span class="message" id="msgcity"></span>                        
                      </div>
					  
					  <div class="form-group col-md-3">
                        <label>Delivery Type</label>
                        <select name="delivery_type" class="form-control">
                        <option value='1' <?php if($areaData->DeliveryType==1){echo "selected";}?>>Express Delivery</option>
                        <option value='2' <?php if($areaData->DeliveryType==2){echo "selected";}?>>Normal Delivery</option>
                        </select>    
						<span class="message" id="msgdelivery_type"></span>                                                
                      </div>
                      
					  <div class="col-md-3 form-group">
                        <label>Area</label>
                        <input type='text' name="area" class="form-control col-md-7 col-xs-12" placeholder="Enter Area" value="<?php echo $areaData->Area;?>">
						<div class="clearfix"></div>
					    <span class="message" id="msgarea"></span>                        
                      </div>
					  
					  <div class="clearfix"></div>
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="button" class="btn btn-success pull-right" id="authenticateArea">Save</button>
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
	
	<script src="<?php echo $siteUrl;?>assets/js/area.js"></script>
	
</body>
</html>
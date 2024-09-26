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
                    <h2>Create Pincode <small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form id="frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="create-pincode">
					  
					  <div class="form-group col-md-4">
                        <label>Delivery Type</label>
                        <select name="delivery_type" class="form-control">
                        <option value='1'>Express Delivery</option>
                        <option value='2'>Normal Delivery</option>
                        </select>    
						<span class="message" id="msgdelivery_type"></span>                                                
                      </div>
                      <div class="form-group col-md-4">
                        <label>Area</label>
                        <select name="area" class="form-control">
                        <?php 
                          $areaList = $adminDao->areaListByStatus(1);
                          if($areaList){
                            foreach($areaList AS $area){?>
                        <option value="<?php echo $area->Id;?>"><?php echo $area->Area;?></option>
                        <?php }}?>
                        </select>
						<span class="message" id="msgarea"></span>                                                
                      </div>          
					  <div class="form-group col-md-4">
                        <label>Pincode</label>
                        <input type="text" name="pincode" class="form-control">
						<span class="message" id="msgpincode"></span>                                                
                      </div>
					  
					  <div class='clearfix'></div>
					  					  
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="button" class="btn btn-success pull-right" id="authenticatePincode">Save</button>
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
	<script src="<?php echo $siteUrl;?>assets/js/home-service.js"></script>	
		
</body>
</html>
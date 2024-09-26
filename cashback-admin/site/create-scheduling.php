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
                    <h2>Create Scheduling <small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form id="frm" class="form-horizontal form-label-left">
                      <input type="hidden" name="action_type" value="create-delivery-time">
					  
					  <div class="form-group col-md-4">
                        <label>Delivery Date</label>
                        <input type="text" name="delivery_date" class="form-control single_cal1">
						<span class="message" id="msgdelivery_date"></span>                                                
                      </div>
                      
					  <div class="form-group col-md-4">
                        <label>Delivery Time</label>
                        <input type="text" name="delivery_time" class="form-control">
						<span class="message" id="msgdelivery_time"></span>                                                
                      </div>
					  
					  <div class='clearfix'></div>
					  					  
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
                        <button type="button" class="btn btn-success pull-right" id="authenticateScheduling">Save</button>
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
	<script src="<?php echo $siteUrl;?>assets/js/moment.min.js"></script>
	<script src="<?php echo $siteUrl;?>assets/js/daterangepicker.js"></script>
	<link href="<?php echo $siteUrl;?>assets/css/daterangepicker.css" rel="stylesheet">
	<script>
	$(document).ready(function() {
		$('.single_cal1').daterangepicker({
			format: 'DD-MM-YYYY',
			singleDatePicker: true,
			calender_style: "picker_2"		
		});
	});
	</script>
		
</body>
</html>
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
                    <h2>Edit Predictor<small id="validate-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<?php 
    
						$predictorData = $adminDao->predictorById($_REQUEST['id']);?>
                    <form method="post" class="form-horizontal form-label-left" action="<?php echo $siteUrl;?>controller/AdminController.php">
                      <input type="hidden" name="action_type" value="update-predictor">
					  <input type="hidden" name="id" value="<?php echo $predictorData->Id;?>">

					  <div class="col-md-4 form-group">
                        <label>Min Rank</label>
                        <input type='text' name="min_rank" class="form-control col-md-7 col-xs-12" placeholder="Enter Min Rank" value="<?php echo $predictorData->MinRank;?>" <?php if($predictorData->Type==1 OR $predictorData->Type==3){echo "readonly";}?>>
						<div class="clearfix"></div>
					    <span class="message" id="msgcoupon_code"></span>                        
                      </div>
					  
					  <div class="col-md-4 form-group">
                        <label>Max Rank</label>
                        <input type='text' name="max_rank" class="form-control col-md-7 col-xs-12" placeholder="Enter Max Rank" value="<?php echo $predictorData->MaxRank;?>">
						<div class="clearfix"></div>
					    <span class="message" id="msgcoupon_price"></span>                        
                      </div>
					 
					  <div class="col-md-4 form-group">
                        <label>Fee</label>
                        <input type='text' name="fee" class="form-control col-md-7 col-xs-12" placeholder="Enter Fee" value="<?php echo $predictorData->Fee;?>">
						<div class="clearfix"></div>
					    <span class="message" id="msgorder_amount"></span>                        
                      </div>
                      <?php 
					   $collegeList = $adminDao->collegeList();
					   $budgetCollegeList = $adminDao->budgetCollegeList($_REQUEST['id']);
					   $haystack= array();
					   foreach($budgetCollegeList as $value){
					       $haystack[] = $value->college_id;
					   }
					   //print_r($haystack);
					  ?>
					  <div class="col-md-8 form-group">
                        <label>Colleges</label>
					    <select class="js-example-basic-multiple form-control" name="college[]" multiple="multiple">
					        <?php foreach($collegeList as $value){
					         ?>
                          <option value="<?=$value->Id?>" <?=in_array($value->Id, $haystack)?"selected":""?>><?=$value->Name?></option>
                          <?php } ?>
                            
                        </select>
                        </div>
					  
			
					  <div class="clearfix"></div>
                      <div class="form-group col-md-4 pull-right">
						<label>&nbsp;</label>
						<div class="clearfix"></div>
            <button type="submit" name='submit' class="btn btn-success pull-right" >Update</button>
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
	
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
</body>
</html>
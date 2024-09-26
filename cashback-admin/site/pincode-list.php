<?php include_once '../header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	<?php include_once '../menu.php';?>        
		<div class="right_col" role="main" style="height: 600px;">
          <!-- top tiles -->
          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pincode List <small id="validate-msg"></small></h2>					
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th data-toggle="tooltip" data-placement="top" title="Sr. No.">Sr. No.</th>
						  <th data-toggle="tooltip" data-placement="top" title="Type">Type</th>
              <th data-toggle="tooltip" data-placement="top" title="Area">Area</th>	
						  <th data-toggle="tooltip" data-placement="top" title="Pincode">Pincode</th>						  
						  <th data-toggle="tooltip" data-placement="top" title="Date">Date</th>
                          <th data-toggle="tooltip" data-placement="top" title="Actions">&nbsp;</th>						  
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							$pincodeList = $adminDao->pincodeList();
							if ($pincodeList) {
								$count = 1;
								foreach ($pincodeList as $pincode){
                  $areaData = $adminDao->areaById($pincode->Area);?>
                        <tr>
                          <td><?php echo $count++;?></td>
						  <td><?php if($pincode->DeliveryType==1){echo "Express Delivery";}else if($pincode->DeliveryType==2){echo "Normal Delivery";}?></td>
						  <td><?php echo $areaData->Area;?></td>
              <td><?php echo $pincode->Pincode;?></td>
						  <td><?php echo date("d/M/Y h:i:s",strtotime($pincode->Date));?></td>
						  <td>
                          	<a href="<?php echo $siteUrl;?>site/edit-pincode-<?php echo $pincode->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							
                          </td>
                        </tr>
						<?php }}else{echo "<tr><td colspan='4'>No details..</td></tr>";}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div></div>
          

                    

          
        </div>
 	<?php include_once '../footer.php';?>      
 	</div>
    </div>
	<?php include_once '../script.php';?>
	<?php require_once '../tabel-js.php';?>
  </body>
</html>

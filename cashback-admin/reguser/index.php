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
                    <h2>Store List</h2>
                    <div class="clearfix"></div>
                    <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=store-export'?>"><button style="color:red">Export</button></a>
                    <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=store-samplefile'?>"><button style="color:red">Sample File</button></a>
                    <a href="<?php echo $siteUrl.'reguser/import-reguser'?>"><button style="color:red">Import Excel</button></a>

                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                    <th>S.No.</th>	
                    <th>Logo</th>					  
            			  <th>Name</th>
            			  <th>Deep Linking </th>
            			  <th>Cashback </th>
            			  <th>Campaign Link </th>
                          <th>Date</th>
                          <th width="10%">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $ReguserList = $adminDao->ReguserList();
                        if ($ReguserList) {
                        	$count = 1;
                        	foreach ($ReguserList as $reguser) {
                        	    $offerTypeById = $adminDao->offerTypeById($reguser->OfferType);
                           ?>
                        <tr>
                          <td><?php echo $count++;?></td> 
                          <td><img src='<?php echo $reguser->Image;?>' width="80px"></td>                         
            						  <td><?php echo $reguser->Name;?></td>
            						  <td><?=($reguser->Deeplink==0)?"False":"True"?></td>
            						  <td><?=$reguser->OfferValue." (".$offerTypeById->Name.")"?></td>
            						  <td><a style="color:blue" href='<?=$reguser->Link?>'>Campaign Link</a></td>
            						  
                          <td><?php echo $reguser->Date;?></td>						 
                          <td>
                          	<a href="<?php echo $siteUrl;?>reguser/edit-reguser-<?php echo $reguser->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=delete-reguser&id='.$reguser->Id;?>" onclick="return confirm('Are you sure. you want to delete this Register user.')"><i class="fa fa-trash" aria-hidden="true"></i></a>	    
		
                          </td>                       
                        </tr>
						          <?php }}else{echo "<tr><td colspan='5'>No details..</td></tr>";}?>
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

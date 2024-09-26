<?php include_once 'header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	  <?php include_once 'menu.php';?>        
		<div class="right_col" role="main" style="height: 600px;">
          <!-- top tiles -->
          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Banner</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No.</th>
						  <th>Type</th>
                          <th>Image</th>
                          <th>Create Date</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $bannerList = $adminDao->bannerList("Banner");
                        if ($bannerList) {
							$count = 1;
                        	foreach ($bannerList AS $banner){?>
                        <tr>
                          <td><?php echo $count++;?> </td>
						  <td><?php echo $banner->Type;?></td>
						  <td><img src="<?php echo $imageUrl."banner/".$banner->Image;?>" style="width:50px;"></td>
                          <td><?php echo date('d M, Y h:i:s',strtotime($banner->Date));?></td>
						  <td>
							<a href="<?php echo $siteUrl."edit-banner-".$banner->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<?php
							    if($banner->Type!="Adword"){
								if($banner->Status=="1"){?>
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=banner-status&id='.$banner->Id.'&type='.$banner->Type.'&status=0';?>"><i class="fa fa-check" area-hidden="true" style="color:green;"></i></a>
							<?php }else{ ?>
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=banner-status&id='.$banner->Id.'&type='.$banner->Type.'&status=1';?>"><i class="fa fa-times" area-hidden="true" style="color:red" ></i></a>
							<?php }}?>
						 </td>
                        </tr>
                        <?php }}else{echo "<tr><td colspan='4'>No details..</td></tr>";}?>
                      </tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div></div>
        </div>
 	<?php include_once 'footer.php';?>      
 	</div>
    </div>
	<?php include_once 'script.php';?>
	<?php require_once 'tabel-js.php';?>
  </body>
</html>

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
                    <h2>Pages List <small id="validate-msg"></small></h2>					
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th data-toggle="tooltip" data-placement="top" title="Sr. No.">Sr. No.</th>
						  <th data-toggle="tooltip" data-placement="top" title="Heading">Heading</th>						  
						  <th data-toggle="tooltip" data-placement="top" title="Date">Date</th>
                          <th data-toggle="tooltip" data-placement="top" title="Actions">&nbsp;</th>						  
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							$siteControlList = $adminDao->siteControlListByType(8);
							if ($siteControlList) {
								$count = 1;
								foreach ($siteControlList as $siteControl){?>
                        <tr>
                          <td><?php echo $count++;?></td>
						  <td><a style="Color:#000" href='<?php echo $baseUrl.$siteControl->Url;?>' target='_blank'><?php echo $siteControl->Heading_1;?></a></td>						  
						  <td><?php echo date("d/M/Y h:i:s",strtotime($siteControl->Date));?></td>
						  <td>
                          	<a href="<?php echo $siteUrl;?>site/edit-page-<?php echo $siteControl->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>							
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

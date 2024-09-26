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
                    <h2>All Blog List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width='10%'>Sr.No.</th>
						  <th width='50%'>Heading</th>
						  <th width='15%'>Create Date</th>
                          <th width='15%'>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $blogList = $adminDao->blogList();
                        if ($blogList) {
							$count = 1;
                        	foreach ($blogList AS $blog){?>
                        <tr>
                          <td><?php echo $count++;?> </td>
						  <td><a href="<?php echo $baseUrl."blog/".$blog->Url."/";?>" target='_blank' class="heading"><?php echo $blog->Heading;?></a></td>
                          <td><?php echo date('d M, Y h:i:s',strtotime($blog->Date));?></td>
						  <td>
							<a href="<?php echo $siteUrl."blog/edit-blog-".$blog->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=delete-blog&id='.$blog->Id;?>" onclick="return confirm('Are you sure. you want to delete this service.')"><i class="fa fa-trash" aria-hidden="true"></i></a>							
							<?php
								if($blog->Status=="1"){?>
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=blog-status&id='.$blog->Id.'&status=0';?>"><i class="fa fa-check" area-hidden="true" style="color:green;"></i></a>
							<?php }else{ ?>
							<a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=blog-status&id='.$blog->Id.'&status=1';?>"><i class="fa fa-times" area-hidden="true" style="color:red" ></i></a>
							<?php }?>	
						 </td>
                        </tr>
                        <?php }}else{echo "<tr><td colspan='5'>No details..</td></tr>";}?>
                      </tbody>
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
	<style type="text/css">
    .heading{
      color: #000;
    }
  </style>
  </body>
</html>

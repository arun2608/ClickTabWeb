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
                    <h2>Contact Enquiry</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No.</th>
                          <th>Name</th>
						  <th>Email</th>
						  <th>Mobile</th>
						  <th>Subject</th>
						  <th>Message</th>
                          <th>Create Date</th>
                       
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $enquiryList = $adminDao->enquiryList(1);
                        if ($enquiryList) {
							$count = 1;
                        	foreach ($enquiryList AS $enquiry){?>
                        <tr>
                          <td><?php echo $count++;?> </td>
						  <td><?php echo $enquiry->Name;?></td>
						  <td><?php echo $enquiry->Email;?></td>
						  <td><?php echo $enquiry->Mobile;?></td>
						  <td><?php echo $enquiry->Subject;?></td>
						  <td><?php echo $enquiry->Message;?></td>
                          <td><?php echo date('d M, Y H:i:s',strtotime($enquiry->Date));?></td>
						  
                        </tr>
                        <?php }}else{echo "<tr><td colspan='7'>No details..</td></tr>";}?>
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

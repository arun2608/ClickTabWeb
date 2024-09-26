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
                    <h2>All Register User List</h2>
                    <a href="<?php echo $siteUrl.'controller/AdminController.php?action_type=user-export'?>"><button style="color:red">Export</button></a>

                    <div class="clearfix"></div>
                  </div>
        <div class="x_content">
           <table id="datatable" class="table table-striped table-bordered">
                 <thead>
               <tr>
              <th>Sr.No.</th>
              <th>UID</th>
              <th>Sub ID</th>
              <th>Name</th>
						  <th>Email</th>
						  <th>Mobile</th>
						  <th>Referral Code</th>
						  <th>My Ref Code </th>
              <th>Create Date</th>
						  <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $userList = $adminDao->userList();
                          if($userList) {
						            	$count = 1;
                        	foreach($userList AS $user){?>
                          <tr>
                          <td><?php echo $count++;?> </td>
                          <td><?php echo $user->Token;?></td>
                          <td><?php echo $user->Code;?></td>
						  <td><?php echo $user->Name;?></td>
						  <td><?php echo $user->Email;?></td>
						  <td><?php echo $user->Mobile;?></td>
						  <td><?php echo $user->ReferralCode;?></td>
						  <td><?php echo $user->MyRefCode;?></td>
             <td><?php echo date('d M, Y H:i:s',strtotime($user->Date));?></td>
						  <td>
						  <a href="<?php echo $siteUrl.'controller/StatusController.php?action_type=delete-user&id='.$user->Id;?>" onclick="return confirm('Are you sure. you want to delete this user.')"><i class="fa fa-trash" aria-hidden="true"></i></a>	    
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

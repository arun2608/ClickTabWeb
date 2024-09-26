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
                    <h2>Feedback List <small id="validate-msg"></small></h2>					
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
					  <tr>
						<th>#</th>
						<th>Star Rating</th>
						<th>Status</th>
						<th>comment</th>

						<th>Date</th>
					  </tr>
					</thead>
					<tbody>
					  <?php 
						$orderFeedbackList = $adminDao->orderFeedbackList($_REQUEST['id']);
						if($orderFeedbackList){
							$count = 1;
							foreach($orderFeedbackList AS $orderFeedback){?>
					  <tr>
						<td><?php echo $count++;?></td>
						<td><?php echo $orderFeedback->StarRating;?></td>
						<td><?php echo $orderFeedback->DeliveryIssue;?></td>
						<td><?php echo $orderFeedback->Comment;?></td>
						<td><?php echo date('d M, Y H:i:s',strtotime($orderFeedback->Date));?></td>
						
					  </tr>      
					  <?php }}else{echo "<tr><td colspan='5'>No Detail..</td></tr>";}?>
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

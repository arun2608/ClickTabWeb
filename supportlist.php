<?php 
include "dashboard-side-menu.php";
?>
<div class="col-md-9">
    <div class="main-content">
        <div class="col-md-12">
            <div id="no-more-tables"> 
				<div id="top-title"> <h4 class="sub-heading">Support List</h4> <a href="#" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#supportModal">Support</a></div>
                
                <table id="datatable" class="table table-striped table-bordered">
                    <thead class="cf">
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        $supportList = $adminDao->supportList();
                        foreach($supportList as $support){
                          $userdata = $adminDao->registerById($support->UserId)
                        ?>
                        <tr>
                            <td data-title="#"><?= $count++; ?></td>
                            <td data-title="Name"><?=$userdata->Name?></td>
                            <td data-title="Txn Id"><?=$support->Title?></td>
                            <td data-title="Amount"><?=$support->Description?></td>
                            <td data-title="Date"> <?=$support->Date?></td>
                        </tr>   
                        <?php } ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>

<div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supportModalLabel">Support </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $baseUrl;?>controller/UserController.php" method="post">

                    <input type="hidden"  name="action_type" value="save-support" class="form-control"/>
                    <div class="mb-3">
                        <label for="Title" class="form-label"> Title</label>
                        <input type="text" name="title" required class="form-control" id="Title" placeholder="Enter  title">
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control" required  name="description" id="Description" rows="3" placeholder="Enter  description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

      <?php include "footer.php";?>



    </body></html>
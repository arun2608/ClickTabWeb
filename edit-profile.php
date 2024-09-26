<?php 
 include "dashboard-side-menu.php";
?>
         <div class="col-md-9">
         <div class="main-content edit-pro-content">
        <div class="col-md-12 pull-left">
          <div class="main-content-right">
            <h3> Edit Profile </h3>
          </div>

<?php
$userdata = $adminDao->registerById($_SESSION['CTW_LoggedUserId']);
?>
         

    
<form action="<?=$baseUrl?>controller/UserController.php" method="POST" enctype="multipart/form-data" >
<input type="hidden" class="form-control" name="action_type" value="update-profile"/>
<input type="hidden" class="form-control" name="id" value="<?=$userdata->Id?>"/>
<div class="col-md-8" class="form-control">
  <label> Name</label>
  <input type="text" required class="form-control mb-3" name="name" value="<?=$userdata->Name?>"/>
</div>

<div class="col-md-8" class="form-control" >
  <label> Email</label>
  <input type="text" class="form-control mb-3" readonly name="email" value="<?=$userdata->Email?>"/>
</div>

<div class="col-md-8"  class="form-control" >
  <label>Mobile No</label>
  <input type="text" required class="form-control mb-3" name="mobile" value="<?=$userdata->Mobile?>"/>
</div>

<br>
<div class="col-md-8"  class="form-control" >
  <label>Image</label>
  <input type="file" required class="form-control mb-3" name="image"/>
  <img style="width:20px;" src="<?php echo $imageUrl."user/".$userdata->Image;?>"/>
  </div>
<br>

<div class="col-md-3" class="form-control" >
<button class="btn btn-success form-control mb-3" type="submit">Update Profile</button>
</div>

</form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php include "footer.php"; ?>
</body>
</html>


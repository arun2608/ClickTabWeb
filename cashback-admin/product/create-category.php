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
                    <h2>Create Category<small id="product-msg"></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left frm" >
                    <input type="hidden" name="action_type" value="create-category">
                    <input type="hidden" name="type" value="1">
                    

                     

                    <div class="form-group col-md-4">
                      <label>Category</label>
                       <input type='text' name='category' class="form-control" placeholder='Enter Category'/>
					              <span class='message' id='msgcategory' style='display:none;'>&nbsp;</span>
                    </div>
					          <div class="form-group col-md-4">
                        <label>Banner</label>
                        <input id="file_1" type="file" name="banner" class="form-control col-md-7 col-xs-12"  accept=".jpeg,.jpg,.png,.webp">
                    </div>
					          <div class="form-group col-md-4">
                        <label>Category Image</label>
                        <input id="file_2" type="file" name="category_image" class="form-control col-md-7 col-xs-12"  accept=".jpeg,.jpg,.png,.webp">
                    </div>

                    <div class="clearfix"></div>
                    <p>&nbsp;</p>
                    <div class="clearfix"></div>
                    <fieldset>
                    <legend>SEO Keyword</legend>
                    <div class="form-group col-md-4">
                      <label>Title</label>
                      <textarea name='title' class="form-control" placeholder='Enter Title' style='height:100px;'></textarea>
                      <span class='message' id='msgtitle' style='display:none;'>&nbsp;</span>
                    </div>

                    <div class="form-group col-md-4">
                      <label>Meta Keyword</label>
                      <textarea name='meta_keyword' class="form-control" placeholder='Enter Meta Keyword' style='height:100px;'></textarea>
                      <span class='message' id='msgmeta_keyword' style='display:none;'>&nbsp;</span>
                    </div>

                    <div class="form-group col-md-4">
                      <label>Meta Description</label>
                      <textarea name='meta_description' class="form-control" placeholder='Enter Meta Description' style='height:100px;'></textarea>
                      <span class='message' id='msgmeta_description' style='display:none;'>&nbsp;</span>
                    </div>
                    </fieldset>


                    <div class='clearfix'></div>
                    <div class="form-group col-md-2 pull-right">
                      <label>&nbsp;</label>
                      <button type='button' id="authenticateCategory" class="form-control btn btn-success">Save Category</button>
                    </div>


                  </form>
                  </div>
                </div>
              </div></div>
        </div>
 	<?php include_once '../footer.php';?>
 	</div>
    </div>
	<?php include_once '../script.php';?>
  </body>
</html>

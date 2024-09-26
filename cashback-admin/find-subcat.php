<?php 
include_once 'admin-lib.php';?>

<option value=''>Select Subcat</option>
<?php 
$subCatList = $adminDao->subCatListByCategory($_REQUEST['category']);
if ($subCatList) {
	foreach ($subCatList AS $subCat){?>
<option value='<?php echo $subCat->Id;?>'><?php echo $subCat->SubCat;?></option>	
<?php }}?>
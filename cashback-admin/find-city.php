<?php 
include_once 'admin-lib.php';?>

<option value=''>Select City</option>
<?php 
$cityListByLOcation = $adminDao->cityListByLocation($_REQUEST['location']);
if ($cityListByLOcation) {
	foreach ($cityListByLOcation AS $subCat){?>
<option value='<?php echo $subCat->Id;?>'><?php echo $subCat->City;?></option>	
<?php }}?>
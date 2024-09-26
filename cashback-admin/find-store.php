<?php 
include_once 'admin-lib.php';?>

<option value=''>Select Store</option>
<?php 
$storeList = $adminDao->storeListByCategory($_REQUEST['category']);
if ($storeList) {
	foreach ($storeList AS $store){?>
<option value='<?php echo $store->Id;?>'><?php echo $store->Name;?></option>	
<?php }}?>
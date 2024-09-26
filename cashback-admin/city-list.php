<?php 
include_once 'admin-lib.php';?>

<option value=''>City</option>
<?php 
$cityList = $adminDao->cityListByState($_REQUEST['state']);
if ($cityList) {
	foreach ($cityList AS $city){?>
<option value='<?php echo $city->Id;?>'><?php echo $city->City;?></option>	
<?php }}?>
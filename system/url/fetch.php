<?php 
if (empty($_POST['employee_id'])) {
	$message = "ไม่พบสินค้า นี้!";
	echo  $message;
}else{
	include '../class.php';
	$use = new HnawStudio;
	
	$fetcharray = $use->fetcharray($_POST['employee_id']);
}


?>
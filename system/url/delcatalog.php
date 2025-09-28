<?php 
if (empty($_POST['namepack'])) {
	$message['status'] = "error!";
	$message['info'] = "ไม่พบสินค้านี้!";
	echo json_encode($message);
}else{
	include '../system/class.php';
	$use = new HnawStudio;
	
	$delcatalog = $use->delcatalog($_POST['namepack']);
}

?>
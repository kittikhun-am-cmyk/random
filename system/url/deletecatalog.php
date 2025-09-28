

<?php 

if (empty($_POST['id'])) {

	$message['status'] = "error!";

	$message['info'] = "กรุณากรอกข้อมูลให้ครบ!";

	echo json_encode($message);

}else{

	include '../class.php';

	$use = new HnawStudio;

	$deletecode = $use->deletecode($_POST['id']);

}



?>
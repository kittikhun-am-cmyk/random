

<?php 

if (empty($_POST['typedata'] and $_POST['itemstock'])) {

	$message['status'] = "error!";

	$message['info'] = "กรุณากรอกข้อมูลให้ครบ!";

	echo json_encode($message);

}else{

	include '../class.php';

	$use = new HnawStudio;

	$inseartdatacode = $use->inseartdatacode($_POST['typedata'],$_POST['itemstock']);

}



?>
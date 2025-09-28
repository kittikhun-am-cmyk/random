<?php 

include '../system/class.php';

$use = new HnawStudio;

if (empty($_SESSION['id'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณาเข้าสู่ระบบก่อนทำการสุ่ม'));

}else{

	$spin = $use->spin($_POST['id']);

}

?>
<?php 

if (empty($_POST['id'])) {

	echo json_encode(array('status'=>"error",'info'=>'เกิดข้อผิดพลาด'));

}else{

	include '../class.php';

	$use = new HnawStudio;

	$deleteuser = $use->deleteuser($_POST['id']);

}



?>
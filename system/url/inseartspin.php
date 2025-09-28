<?php 

if (empty($_POST['name_spin1_name'] and $_POST['image_spin51'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกข้อมูลให้ครบ'));

}else{

	include '../class.php';

	$use = new HnawStudio;

	$inseartspin = $use->inseartspin($_POST['image_spin51'],$_POST['name_spin1_name']);

}



?>


<?php 

if (empty($_POST['phone'] and $_POST['point'] and $_POST['classselect'] and $_POST['getidvalue'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกข้อมูลให้ครบ'));

}else{

	include '../class.php';

	$use = new HnawStudio;

	$admin_updatedata = $use->admin_updatedata($_POST['phone'],$_POST['point'],$_POST['classselect'],$_POST['getidvalue']);

}



?>
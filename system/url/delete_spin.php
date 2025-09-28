<?php 
if (empty($_POST['idattr'])) {
	echo json_encode(array('status'=>"error",'info'=>'มีข้อผิดพลาด'));
}else{
	include '../connect.php';
	$db = database();
	$stmt = $db->prepare("DELETE FROM `random_spin` WHERE `random_spin`.`id` = :idattr");
	$stmt->execute([':idattr'=>$_POST['idattr']]);
	echo json_encode(array('status'=>"success"));
}

?>
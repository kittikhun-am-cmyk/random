<?php 
if (empty($_POST['name'])) {
	echo json_encode(array('status'=>"error",'info'=>'เกิดข้อผิดพลาด'));
}else{
	include '../connect.php';
	$db = database();
	$stmt = $db->prepare("DELETE FROM `name_userpromote` WHERE `name_userpromote`.`name_promote` = :id");
	$stmt->execute([':id'=>$_POST['name']]);
	$stmt1 = $db->prepare("DELETE FROM `sumhistory_topupcode` WHERE `sumhistory_topupcode`.`name_promote` = :id");
	$stmt1->execute([':id'=>$_POST['name']]);

	echo json_encode(array('status'=>"success"));
}

?>
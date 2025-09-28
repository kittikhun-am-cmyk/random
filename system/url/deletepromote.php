<?php 
if (empty($_POST['deleteid'])) {
	echo json_encode(array('status'=>"error",'info'=>'เกิดข้อผิดพลาด'));
}else{
	include '../connect.php';
	$db = database();
	$stmt = $db->prepare("DELETE FROM `youtube_promote` WHERE `youtube_promote`.`id` = :id");
	$stmt->execute([':id'=>$_POST['deleteid']]);
	echo json_encode(array('status'=>"success"));
}

?>
<?php 
if (empty($_POST['exampleInputEmail1'])) {
	$message['status'] = "error!";
	$message['info'] = "กรุณากรอกข้อมูลให้ครบ!";
	echo json_encode($message);
}else{
	include '../connect.php';
	$db = database();
	$stmt1 = $db->prepare("SELECT * FROM youtube_promote WHERE name_code = :checkname");
	$stmt1->execute([':checkname'=>$_POST['exampleInputEmail1']]);
	if ($stmt1->RowCount() > 0) {
		$message['status'] = "error!";
		$message['info'] = "มีชื่อช่องนี้แล้ว!";
		echo json_encode($message);
	}else{
		$stmt = $db->prepare("INSERT INTO `youtube_promote` (`id`, `name_code`, `date`) VALUES (NULL, :chanalname, current_timestamp());");
		$stmt->execute([':chanalname'=>$_POST['exampleInputEmail1']]);
		$message['status'] = "success";
		echo json_encode($message);
	}
}

?>
<?php 
if (empty($_POST['exampleInputEmail1'])) {
	$alert['status'] = "error";
	$alert['info'] = "กรุณากรอกข้อมูลให้ครบ";
	echo json_encode($alert);
}else{
	include '../connect.php';
	$db = database();
	$findpromote = $db->prepare("SELECT * FROM youtube_promote WHERE id = :id");
	$findpromote->execute([':id'=>$_POST['getid']]);
	$result = $findpromote->fetch();
	
	$checkstmt = $db->prepare("SELECT * FROM name_userpromote WHERE `name_userpromote`.`name_promote` = :name_promote5;");
	$checkstmt->execute([':name_promote5'=> $result['name_code']]);
	if ($checkstmt->Rowcount() < 0) {
		$update = $db->prepare("UPDATE `youtube_promote` SET `name_code` = :name_code5 WHERE `youtube_promote`.`id` = :id1;");
		$update->execute([':name_code5'=>$_POST['exampleInputEmail1'],':id1'=>$_POST['getid']]);
		echo json_encode(array("status"=>'success'));
	}else{
		$stmt = $db->prepare("UPDATE `name_userpromote` SET `name_promote` = :postdata WHERE `name_userpromote`.`name_promote` = :name_promote;");
		$stmt->execute([':postdata'=>$_POST['exampleInputEmail1'],':name_promote'=>$result['name_code']]);
		$update15 = $db->prepare("UPDATE `youtube_promote` SET `name_code` = :name_code5 WHERE `youtube_promote`.`id` = :id1;");
		$update15->execute([':name_code5'=>$_POST['exampleInputEmail1'],':id1'=>$_POST['getid']]);
		echo json_encode(array("status"=>'success'));
	}
}

?>
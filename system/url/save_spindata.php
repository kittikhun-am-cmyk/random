<?php
if (empty($_POST['spin_name'] and $_POST['floatingTextarea2'] and $_POST['spin_name5'] and $_POST['getvalueid'])) {
	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกข้อมูลให้ครบ'));
}else{
	include '../connect.php';
	$db = database();
	$stmt = $db->prepare("UPDATE `random_spin` SET `image` = :image1,`name_spin` = :namespin1,`point` = :spin_name5  WHERE `random_spin`.`id` = :idgetvalue;");
	try {
		$stmt->execute([':image1'=>$_POST['floatingTextarea2'],':namespin1'=>$_POST['spin_name'],':spin_name5'=>$_POST['spin_name5'],':idgetvalue'=>$_POST['getvalueid']]);
		echo json_encode(array('status'=>"success"));
	} catch (Exception $e) {
		echo json_encode(array('status'=>"error",'info'=>$e->getmessage()));
	}

}

?>
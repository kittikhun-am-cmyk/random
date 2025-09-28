



<?php 

if (empty($_POST['oldpassword'] and $_POST['newpassword'] and  $_POST['confirmnewpassword'])) {

	$message['status'] = "error!";

	$message['info'] = "กรุณากรอกข้อมูลให้ครบ!";

	echo json_encode($message);

}else{

	if ($_POST['newpassword'] == $_POST['confirmnewpassword']) {

		include '../class.php';

		$use = new HnawStudio;

		$oldpassword = $_POST['oldpassword'];

		$hash = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

		$confirmnewpassword = $_POST['confirmnewpassword'];

		$changpassword = $use->changpassword($oldpassword,$hash,$confirmnewpassword);

	}else{

		$message['status'] = "error!";

		$message['info'] = "กรุณากรอกรหัสยืนยันรหัสผ่านให้ถูกต้อง!";

		echo json_encode($message);

	}

}





?>
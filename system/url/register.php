

<?php 

if (empty($_POST['username'] and $_POST['phone'] and $_POST['password'] and $_POST['confirm'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกข้อมูลให้ครบ'));

}elseif (! preg_match('/^[a-z0-9 .\-]+$/i',  $_POST['username'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรอกชื่อแค่ภาษาอังกฤษเท่านั้นและห้ามมีตัวอักษรพิเศษ'));

}elseif (!is_numeric($_POST['phone'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกเบอร์ให้ถูกต้อง'));

}elseif ($_POST['password'] !== $_POST['confirm']) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกรหัสผ่านให้ถูกต้อง'));

}else{

	include '../class.php';

	$use = new HnawStudio;

	$username = $_POST['username'];

	$phone = $_POST['phone'];

	$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$register = $use->register($username,$phone,$password_hash);

}



?>
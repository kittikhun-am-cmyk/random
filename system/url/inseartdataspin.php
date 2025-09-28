<?php 
include '../connect.php';
$db = database();
if (empty($_POST['name_spin1_name'] and $_POST['percent10'] and $_POST['image_spin51'] and $_POST['select16'])) {
	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกข้อมูลให้ครบ'));
}elseif (empty($_POST['credit_spin51'])) {
	$stmt = $db->prepare("INSERT INTO `setting_spin` (`id`, `image`, `message`, `reward_type`, `reward_point`, `reward_itemcatalog`, `percent`, `name_spin`) VALUES (NULL, :image1, :message5, 'item', '0.00', '', :percent11, :getvaluespinname1);");
	$stmt->execute([':image1'=>$_POST['image_spin51'],':message5'=>$_POST['name_spin1_name'],':percent11'=>$_POST['percent10'],':getvaluespinname1'=>$_POST['getvaluespinname']]);
	echo json_encode(array('status'=>"success",'info'=>'success'));
}else{
	$stmt = $db->prepare("INSERT INTO `setting_spin` (`id`, `image`, `message`, `reward_type`, `reward_point`, `reward_itemcatalog`, `percent`, `name_spin`) VALUES (NULL, :image1, :message5, 'point', :creditpouint8, '', :percent11, :getvaluespinname1);");
	$stmt->execute([':image1'=>$_POST['image_spin51'],':message5'=>$_POST['name_spin1_name'],':creditpouint8'=>$_POST['credit_spin51'],':percent11'=>$_POST['percent10'],':getvaluespinname1'=>$_POST['getvaluespinname']]);
	echo json_encode(array('status'=>"success",'info'=>'success'));
}

?>
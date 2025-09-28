<?php
include '../connect.php';
$db = database();

if (!empty($_POST['name_website1'] and $_POST['phone_website1'])) {
	$stmt = $db->prepare("UPDATE `setting_website` SET `type1` = :name1,`type2` = :phone1 WHERE `setting_website`.`id` = 1;");
	$stmt->execute([':name1'=>$_POST['name_website1'],':phone1'=>$_POST['phone_website1']]);
	echo json_encode(array('status'=>"success"));
}elseif (!empty($_POST['pointuse1'] and $_POST['linkpage13'])) {
	$stmt1 = $db->prepare("UPDATE `config_web` SET `usepoint` = :usepoint2 WHERE `config_web`.`id` = 1;");
	$stmt1->execute([':usepoint2'=>$_POST['pointuse1']]);
	$stmt2 = $db->prepare("UPDATE `setting_website` SET `type3` = :pagefacebook WHERE `setting_website`.`id` = 1;");
	$stmt2->execute([':pagefacebook'=>$_POST['linkpage13']]);
	echo json_encode(array('status'=>"success"));
}elseif (!empty($_POST['image55'])) {
	$stmt = $db->prepare("UPDATE `setting_website` SET `type4` = :name1 WHERE `setting_website`.`id` = 1;");
	$stmt->execute([':name1'=>$_POST['image55']]);
	echo json_encode(array('status'=>"success"));
}elseif (!empty($_POST['image32'])) {
	$stmt = $db->prepare("UPDATE `setting_website` SET `type5` = :name1 WHERE `setting_website`.`id` = 1;");
	$stmt->execute([':name1'=>$_POST['image32']]);
	echo json_encode(array('status'=>"success"));
}elseif (!empty($_POST['image322'])) {
	$stmt = $db->prepare("UPDATE `setting_website` SET `type6` = :name1 WHERE `setting_website`.`id` = 1;");
	$stmt->execute([':name1'=>$_POST['image322']]);
	echo json_encode(array('status'=>"success"));
}

?>
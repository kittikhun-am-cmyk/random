

<?php 

include '../class.php';

$use = new HnawStudio;

if (empty($_POST['getvalueid'] and $_POST['name_spin1']  and $_POST['image_spin'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกข้อมูลให้ครบ'));

}elseif (!is_numeric($_POST['percent1'])) {

	echo json_encode(array('status'=>"error",'info'=>'กรุณากรอกเปอร์เซ็นต์ให้ถูกต้อง!'));

}elseif (empty($_POST['credit_spin'])) {

	$getvalueid = $_POST['getvalueid'];

	$name_spin1 = $_POST['name_spin1'];

	$percent1 = $_POST['percent1'];

	$image_spin = $_POST['image_spin'];

	$credit_spin = '0';

	$updatespindata = $use->updatespindata($getvalueid,$name_spin1,$percent1,$image_spin,$credit_spin);

}else{

	$updatespindata = $use->updatespindata($_POST['getvalueid'],$_POST['name_spin1'],$_POST['percent1'],$_POST['image_spin'],$_POST['credit_spin']);

}



?>
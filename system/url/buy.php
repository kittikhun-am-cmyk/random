
<?php
include '../class.php';
$use = new HnawStudio;
$resultadmincheck = $use->resultadmincheck();
$serchcatalog = $use->serchcatalog($_POST['idpack']);

if (empty($_POST['idpack'])) {
	$alert['status'] = "error";
	$alert['info'] = "ไม่พบสินค้านี้";
	echo json_encode($alert);
}elseif (empty($_SESSION['id'])) {
	$alert['status'] = "error";
	$alert['info'] = "กรุณาเข้าสู่ระบบ";
	echo json_encode($alert);
}elseif ($resultadmincheck['point'] < 0) {
	$alert['status'] = "error";
	$alert['info'] = "ยอดเงินของท่านไม่เพียงพอ";
	echo json_encode($alert);
}elseif ($_POST['pricepack'] <= 0) {
	$alert['status'] = "error";
	$alert['info'] = "จะเล่นบัคหรอออออออออ";
	echo json_encode($alert);
}elseif ($_POST['pricepack'] <= -0) {
	$alert['status'] = "error";
	$alert['info'] = "จะเล่นบัคหรอออออออออ";
	echo json_encode($alert);
}elseif ($_POST['pricepack'] !== $serchcatalog['price_catalog']) {
	$alert['status'] = "error";
	$alert['info'] = "จะเล่นบัคหรอออออออออ";
	echo json_encode($alert);
}else{
	if($use->checkPoint($_POST['pricepack'])){
		$transactions = $use->transactions($serchcatalog['price_catalog'],$serchcatalog['name_catalog']);
		echo $transactions;
	}else{
		$alert['status'] = "error";
		$alert['info'] = "ยอดเงินของคุณไม่เพียงพอ";
		echo json_encode($alert);
	}
}
?>



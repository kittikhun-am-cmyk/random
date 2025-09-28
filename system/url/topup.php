<?php 
if (!empty($_SESSION['id'])) {
	$alert['status'] = "error";
	$alert['info'] = "กรุณาเข้าสู่ระบบ";
	echo json_encode($alert);
}else{
	if (empty($_POST['link_topup'])) {
		$alert['status'] = "error";
		$alert['info'] = "กรุณากรอกอั่งเปา";
		echo json_encode($alert);
	}elseif ($_POST['link_topup'][0] !== "h") {
		$alert['status'] = "error";
		$alert['info'] = "กรุณากรอกอั่งเปาให้ถูกต้อง";
		echo json_encode($alert);
	}else{
		include '../truewallettrue1.php';
		$use = new truewallet;
		$string = "https://gift.truemoney.com/campaign/?v=";
		$voucher = $_POST['link_topup'];
		$output = explode("?v=", $voucher)[1];
		$redeem = $use->redeem($output);
		echo $redeem;
	}
}

?>

<?php 
if (empty($_POST['name_catalog1'] and $_POST['game_catalog1'] and $_POST['detail_catalog1'] and $_POST['item_catalog1'] and $_POST['price_catalog1'] and $_POST['link_catalog1'])) {
	$message['status'] = "error!";
	$message['info'] = "กรุณากรอกข้อมูลให้ครบ!";
	echo json_encode($message);
}else{
	include '../class.php';
	$use = new HnawStudio;
	
	$changdatacatalog = $use->changdatacatalog($_POST['id'], $_POST['name_catalog1'], $_POST['game_catalog1'], $_POST['detail_catalog1'], $_POST['item_catalog1'], $_POST['price_catalog1'], $_POST['link_catalog1']);
}


?>			
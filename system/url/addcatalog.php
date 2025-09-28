
<?php 
include '../class.php';
$use = new HnawStudio;
if (empty($_POST['game_catalog'] and $_POST['name_catalog'] and $_POST['image_catalog'] and $_POST['price_catalog'] and $_POST['detail_catalog'] and $_POST['item_catalog'])) {
	$alert['status'] = "error";
	$alert['info'] = "กรุณากรอกข้อมูลให้ครบ";
	echo json_encode($alert);
}else{
	$addcatalogad = $use->addcatalogad($_POST['game_catalog'],$_POST['name_catalog'], $_POST['image_catalog'], $_POST['price_catalog'], $_POST['detail_catalog'], $_POST['item_catalog']);
}



?>
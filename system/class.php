<?php 

require 'connect.php';

class HnawStudio

{

	

	function __construct()

	{

		$this->db = database();

	}

	public function resultyoutubepromote($id){

		$stmt = $this->db->prepare("SELECT * FROM youtube_promote WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();

		return $result;

	}
	function resultid($id = null){
		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	function resulthistory(){
		$stmt = $this->db->prepare("SELECT * FROM catalog WHERE name_buy = :username_buy");
		$stmt->execute([':username_buy'=>$_SESSION['username']]);
		$result = $stmt->fetchAll();
		return $result;
	}
	function fetcharray($id){
		$stmt = $this->db->prepare("SELECT * FROM catalog WHERE id = :id");
		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();
		echo  json_encode($result);
	}

	function resultcatalog(){
		$stmt = $this->db->prepare("SELECT * , SUM(id) AS total FROM catalog  WHERE   status = 0 GROUP BY id ORDER BY `total` ");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;

	}
	function addcatalogad($game_catalog, $name_catalog, $image_catalog, $price_catalog, $detail_catalog, $item_catalog){
		$stmt = $this->db->prepare("SELECT * FROM catalog WHERE name_catalog = :name_catalog");
		$stmt->execute([':name_catalog'=>$name_catalog]);
		if ($stmt->RowCount() > 0) {
			$response['status'] = "error";
			$response['info'] = "มีชื่อสินค้านี้อยู่แล้ว";
			echo  json_encode($response);
		}else{
			$stmt2 = $this->db->prepare("INSERT INTO `catalog` (`game`, `name_catalog`, `image_catalog`, `price_catalog`, `detail_catalog`, `item_catalog`, `class_catalog`, `status`) VALUES (:game, :name_catalog, :image_catalog, :price_catalog, :detail_catalog, :item_catalog, '1', '0');");
			$response['status'] = "success";
			$response['info'] = "สำเร็จ";
			echo   json_encode($response);	
			try {
				$stmt2->execute(array(
					':game'=>$game_catalog,
					':name_catalog'=>$name_catalog,
					':image_catalog'=>$image_catalog,
					':price_catalog'=>$price_catalog,
					':detail_catalog'=>$detail_catalog,
					':item_catalog'=>$item_catalog
				));
			} catch (Exception $e) {
				$response['status'] = "error";
				$response['info'] = $e->getMessage();
				echo  json_encode($response);
			}

		}
	}
	function delcatalog($id){
		$stmt = $this->db->prepare("SELECT * FROM catalog WHERE id = :id");
		$stmt->execute(array(':id'=>$id));
		if ($stmt->RowCount() > 0) {
			$stmt1 = $this->db->prepare("DELETE FROM `catalog` WHERE `catalog`.`id` = :id");
			try {
				$stmt1->execute([':id'=>$id]);
				$response['status'] = "success";
				$response['info'] = "สำเร็จ";
				echo   json_encode($response);
			} catch (Exception $e) {
				$response['status'] = "error";
				$response['info'] = $e->getMessage();
				return json_encode($response);
			}
		}
	}
	function changdatacatalog($id,$name_catalog1,$game_catalog1,$detail_catalog1,$item_catalog1,$price_catalog1,$link_catalog1){
		$stmt = $this->db->prepare("SELECT * FROM catalog WHERE name_catalog = :name_catalog");
		$stmt->execute(array(':name_catalog'=>$id));
		if ($stmt->RowCount() > 0) {
			$stmt1 = $this->db->prepare("UPDATE `catalog` SET `name_catalog` = :name_catalog1 WHERE `catalog`.`name_catalog` = :id;");
			$stmt2 = $this->db->prepare("UPDATE `catalog` SET `game` = :game_catalog1 WHERE `catalog`.`name_catalog` = :id;");
			$stmt3 = $this->db->prepare("UPDATE `catalog` SET `image_catalog` = :link_catalog1 WHERE `catalog`.`name_catalog` = :id;");
			$stmt4 = $this->db->prepare("UPDATE `catalog` SET `price_catalog` = :price_catalog1 WHERE `catalog`.`name_catalog` = :id;");
			$stmt5 = $this->db->prepare("UPDATE `catalog` SET `detail_catalog` = :detail_catalog1 WHERE `catalog`.`name_catalog` = :id;");
			$stmt6 = $this->db->prepare("UPDATE `catalog` SET `item_catalog` = :item_catalog1 WHERE `catalog`.`name_catalog` = :id;");
			try {
				$stmt1->execute([':name_catalog1'=>$name_catalog1,':id'=>$id]);
				$stmt2->execute([':game_catalog1'=>$game_catalog1,':id'=>$id]);
				$stmt3->execute([':link_catalog1'=>$link_catalog1,':id'=>$id]);
				$stmt4->execute([':price_catalog1'=>$price_catalog1,':id'=>$id]);
				$stmt5->execute([':detail_catalog1'=>$detail_catalog1,':id'=>$id]);
				$stmt6->execute([':item_catalog1'=>$item_catalog1,':id'=>$id]);
				$response['status'] = "success";
				$response['info'] = "สำเร็จ";
				echo   json_encode($response);
			} catch (Exception $e) {
				$response['status'] = "error";
				$response['info'] = $e->getMessage();
				echo  json_encode($response);
			}
			
		}else{
			$response['status'] = "error";
			$response['info'] = "ไม่พบสินค้านี้";
			echo  json_encode($response);
		}
	}
	function checkcatalog(){
		$stmt = $this->db->prepare("SELECT * , SUM(id) AS total FROM catalog  WHERE   status = 1 GROUP BY id ORDER BY `total` DESC ");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	function resultcatalog1LIMIT(){
		$stmt = $this->db->prepare("SELECT * , SUM(id) AS total FROM catalog  WHERE   status = 0 GROUP BY id ORDER BY `total` DESC LIMIT 0,3");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;

	}
	function serchcatalog($id){
		$stmt = $this->db->prepare("SELECT * FROM catalog WHERE id = :id");
		$stmt->execute(array(':id'=>$id));
		if ($stmt->RowCount() > 0) {
			$result = $stmt->fetch();
			return $result;
		}
	}
	function resultadmincheck(){
		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");
		$stmt->execute([':id'=>$_SESSION['id']]);
		return $stmt->fetch();
	}
	function checkPoint($point){
		$profile = $this->showprofile();
		if($profile['point']<$point){
			return 0;
		}elseif($profile['point']>=$point){
			return 1;
		}
	}
	function showprofile(){
		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");
		$stmt->execute([':id'=>$_SESSION['id']]);
		$result = $stmt->fetch();
		return $result;
	}
	function removepoint($point){
		$stmt = $this->db->prepare("UPDATE user_config SET point = (point - '$point') WHERE id = :id");
		$stmt->execute([':id'=>$_SESSION['id']]);
	}
	function searchcatalog($pack){
		$stmt = $this->db->query("SELECT item_catalog FROM catalog WHERE name_catalog = '$pack'");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	function transactions($pricepack,$pack){
		$stmt2 = $this->db->prepare("SELECT * FROM history_buy");
		$this->removepoint(floatval($pricepack));
		$buy1 = $this->searchcatalog($pack);
		$stmt3 = $this->db->prepare("UPDATE `catalog` SET `name_buy` = :name_buy WHERE `catalog`.`name_catalog` = :pack;
			");
		$stmt5 = $this->db->prepare("UPDATE `catalog` SET `status` = '1' WHERE `catalog`.`name_catalog` = :pack;");
		try {
			$stmt3->execute([':name_buy'=>$_SESSION['username'], ':pack'=>$pack]);
			$stmt5->execute([':pack'=>$pack]);	
			$alert['status'] = "success";
			return json_encode($alert);	
		} catch (Exception $e) {
			$alert['status'] = "error";
			$alert['info'] = $e->getMessage();
			return json_encode($alert);	
		}

	}

	public function fetchspindata($id){

		$stmt = $this->db->prepare("SELECT * FROM random_spin WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();

		return $result;

	}

	public function countusercoderegister($cehckcode){

		$stmt = $this->db->prepare("SELECT COUNT(id) FROM name_userpromote WHERE name_promote = :checkcode1");

		$stmt->execute([':checkcode1'=>$cehckcode]);

		$result = $stmt->fetch();

		return $result;

	}

	public function sumeusercoderegister($cehckcode){

		$stmt = $this->db->prepare("SELECT sum(amount) FROM sumhistory_topupcode WHERE name_promote = :checkcode1");

		$stmt->execute([':checkcode1'=>$cehckcode]);

		$result = $stmt->fetch();

		return $result;

	}

	public function authcheck(){

		if (empty($_SESSION['id'])) {

			echo "<script>window.location.href = '/home' </script>";

			exit();

		}

	}

	public function fetchall_promote(){

		$stmt = $this->db->prepare("SELECT * FROM youtube_promote");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;

	}

	public function checkauth1(){

		if (!empty($_SESSION['id'])) {

			echo "<script>window.location.href='/home'</script>";

			exit();

		}

	}

	public function fetchtopupall1(){

		$stmt = $this->db->prepare("SELECT * FROM topup ");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;

	}

	public function fetchtopupall12(){

		$stmt = $this->db->prepare("SELECT * FROM topup ORDER BY id DESC");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;

	}

	public function fetchsettingwebsitedata($id){

		$stmt = $this->db->prepare("SELECT * FROM setting_website WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();

		return $result;

	}

	public function fetchsettingwebsitedata1(){

		$stmt = $this->db->prepare("SELECT * FROM config_web");

		$stmt->execute();

		$result = $stmt->fetch();

		return $result;

	}

	public function summoeytopup(){

		$stmt = $this->db->prepare("SELECT sum(amount) as total FROM topup");

		$stmt->execute();

		$result = $stmt->fetch();

		return $result;

	}

	public function countuser(){

		$stmt = $this->db->prepare("SELECT count(id) as total FROM user_config");

		$stmt->execute();

		$result = $stmt->fetch();

		return $result;

	}

	public function register($username,$phone,$password_hash){

		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE username = :username");

		$stmt->execute(array(':username'=>$username));

		if ($stmt->RowCount() > 0) {

			echo json_encode(array('status'=>"error",'info'=>'มีชื่อผู้ใช้นี้แล้ว'));

		}else{

			$inseart = $this->db->prepare("INSERT INTO `user_config` (`username`, `phone`, `password`) VALUES (:username, :phone, :passworda);");

			try {

				$inseart->execute(array(':username'=>$username,':phone'=>$phone,':passworda'=>$password_hash));

				echo json_encode(array('status'=>"success"));

			} catch (Exception $e) {

				echo json_encode(array('status'=>"error",'info'=>$e->getmessage()));

			}

		}

	}

	public function register_code($username,$phone,$password_hash,$code1check3){

		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE username = :username");

		$stmt->execute(array(':username'=>$username));

		if ($stmt->RowCount() > 0) {

			echo json_encode(array('status'=>"error",'info'=>'มีชื่อผู้ใช้นี้แล้ว'));

		}else{

			$inseart = $this->db->prepare("INSERT INTO `user_config` (`username`, `phone`, `password`) VALUES (:username, :phone, :passworda);");

			$inseartcountcode = $this->db->prepare("INSERT INTO `name_userpromote` (`id`, `name`, `name_promote`) VALUES (NULL, :username555, :codecheck8);");

			try {

				$inseart->execute(array(':username'=>$username,':phone'=>$phone,':passworda'=>$password_hash));

				$inseartcountcode->execute([':username555'=>$username,':codecheck8'=>$code1check3]);

				echo json_encode(array('status'=>"success"));

			} catch (Exception $e) {

				echo json_encode(array('status'=>"error",'info'=>$e->getmessage()));

			}

		}

	}

	public function admin_updatedata($phone,$point,$classselect,$getidvalue){

		$update = $this->db->prepare("UPDATE `user_config` SET `phone` = :phone1, `point` = :point1, `rank` = :class WHERE `user_config`.`id` = :getid;");

		try {

			$update->execute([':phone1'=>$phone,':point1'=>$point,':class'=>$classselect,':getid'=>$getidvalue]);

			echo json_encode(array('status'=>"success"));

		} catch (Exception $e) {

			echo json_encode(array('status'=>"error",'info'=>$e->getmessage()));

		}

	}

	public function searchdatauserfetch($id){

		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();

		return $result;

	}

	public function fetchalluseradmin(){

		$stmt = $this->db->prepare("SELECT * FROM user_config");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;

	}

	public function changpassword($oldpassword, $newpassword, $confirmnewpassword){

		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");

		$stmt->execute([':id'=>$_SESSION['id']]);

		$result = $stmt->fetch();

		if(password_verify($oldpassword, $result['password'])){

			$stmt = $this->db->prepare("UPDATE user_config SET password = :newpassword WHERE id = :id");

			try {

				$stmt->execute([':newpassword'=>$newpassword,':id'=>$_SESSION['id']]);

				$message['status'] = "success";

			} catch (Exception $e) {

				$message = $e->getMessage();

			}

		}else{

			$message['status'] = "error!";

			$message['info'] = "รหัสผ่านเก่าไม่ถูกต้อง!";

		}

		echo  json_encode($message);

	}

	public function deletespin($id){

		$delete = $this->db->prepare("DELETE FROM `setting_spin` WHERE `setting_spin`.`id` = :id");

		$delete->execute([':id'=>$id]);

		echo json_encode(array('status'=>"success"));

	}

	public function deleteuser($id){

		$delete = $this->db->prepare("DELETE FROM `user_config` WHERE `user_config`.`id` = :id");

		$delete->execute([':id'=>$id]);

		echo json_encode(array('status'=>"success"));

	}

	public function updatespindata($getvalueid,$name_spin1,$percent1,$image_spin,$credit_spin){

		$stmt = $this->db->prepare("UPDATE `setting_spin` SET `message` = :name_spin12, `percent` = :percent1, `image` = :image_spin, `reward_point` = :credit_spin WHERE `setting_spin`.`id` = :getid;");

		try {

			$stmt->execute([':name_spin12'=>$name_spin1,':percent1'=>$percent1,':image_spin'=>$image_spin,':credit_spin'=>$credit_spin,':getid'=>$getvalueid]);

			echo json_encode(array('status'=>"success"));

		} catch (Exception $e) {

			echo json_encode(array('status'=>"error",'info'=>$e->getmessage()));

		}

	}

	public function inseartspin($image,$name){

		$stmt = $this->db->prepare("SELECT * FROM random_spin WHERE name_spin = :namespin");

		$stmt->execute([':namespin'=>$name]);

		if ($stmt->RowCount() > 0) {

			echo json_encode(array('status'=>"error",'info'=>"มีชื่อ Spinนี้แล้ว"));

		}else{

			$inseart = $this->db->prepare("INSERT INTO `random_spin` (`id`, `image`, `name_spin`) VALUES (NULL, :image1, :name_spin1);");

			$inseart->execute([':image1'=>$image,':name_spin1'=>$name]);

			echo json_encode(array('status'=>"success"));

		}



	}

	public function serachsettingspin($id){

		$stmt = $this->db->prepare("SELECT * FROM setting_spin WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();

		return $result;

	}

	public function fetchallsettingspin(){

		$stmt = $this->db->prepare("SELECT * FROM random_spin");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;

	}

	public function fetchallsettingspin1($name){

		$stmt = $this->db->prepare("SELECT * FROM setting_spin WHERE name_spin = :name");

		$stmt->execute([':name'=>$name]);

		$result = $stmt->fetchAll();

		return $result;

	}

	public function deletecode($id){

		$stmt = $this->db->prepare("DELETE FROM `stock_catalog` WHERE `stock_catalog`.`id` = :iddelete");

		$stmt->execute([':iddelete'=>$id]);

		echo json_encode(array('status'=>"success"));

	}

	public function inseartdatacode($postdata5,$itemstock){

		$string = preg_replace('~\R~u', "\n", $itemstock);

		$exp_lines = explode("\n", $string);

		if (is_array($exp_lines)) {

			foreach ($exp_lines as $each_line) {

				if (trim($each_line) == '') {

					continue;

				}

				$stmt = $this->db->prepare("INSERT INTO `stock_catalog` (`name_get`, `type`, `item`) VALUES ('0', :postdata, :each);");

				$stmt->execute([':postdata'=>$postdata5,':each'=>$each_line]);

			}

			$message['status'] = "success";

			echo  json_encode($message);

		}

	}

	public function fetchcatalogspin($id){

		$stmt = $this->db->prepare("SELECT * FROM stock_catalog WHERE type = :id and name_get = '0'");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetchAll();

		return $result;

	}

	public function fetchcatalog(){

		$stmt = $this->db->prepare("SELECT * FROM setting_spin WHERE reward_type = 'item'");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;

	}

	public function resultspin($name_spin1){

		$stmt = $this->db->prepare("SELECT * FROM setting_spin WHERE name_spin = :name_spin1");

		$stmt->execute([':name_spin1'=>$name_spin1]);

		$result = $stmt->fetchAll();

		return $result;

	}

	public function login($username,$password,$ip_address){

		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE username = :username");

		$stmt->execute([':username'=>$username]);

		$result = $stmt->fetch();

		if ($stmt->RowCount() > 0) {

			if (password_verify($password, $result['password'])) {

				$updateip = $this->db->prepare("UPDATE `user_config` SET `ip` = :ip_add WHERE `user_config`.`username` = :username;");

				try {

					$updateip->execute([':ip_add'=>$ip_address,':username'=>$username]);

					$_SESSION['id'] = $result['id'];

					$_SESSION['username'] = $result['username'];

					echo json_encode(array('status'=>"success"));

				} catch (Exception $e) {

					echo json_encode(array('status'=>"error",'info'=>$e->getmessage()));

				}

			}else{

				echo json_encode(array('status'=>"error",'info'=>'รหัสผ่านไม่ถูกต้อง'));

			}

		}else{

			echo json_encode(array('status'=>"error",'info'=>'ไม่พบชื่อผู้ใช้นี้'));

		}

	}

	public function resultuser($id){

		$stmt = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();

		return $result;

	}

	public function configweb(){

		$stmt = $this->db->prepare("SELECT * FROM config_web");

		$stmt->execute();

		if ($stmt->rowcount() > 0) {

			return $stmt->fetch();

		}else{

			return 0;

		}

	}

	public function random_code($name){

		$stmt = $this->db->prepare("SELECT * FROM stock_catalog WHERE type = :nametype and name_get = '0'");

		$stmt->execute([':nametype'=>$name]);

		if ($stmt->RowCount() > 0) {

			$result = $stmt->fetch();

			return $result;

		}else{

			return 0;

		}

	}

	public function spin($idspin){

		$getdatauser = $this->resultuser($_SESSION['id']);

		$configweb = $this->configweb();

		$searchdataspin = $this->searchdataspin($idspin);

		$getdataslice_wheel = $this->getdataslice_wheel($idspin);

		if ($getdatauser['point'] >= $configweb['usepoint']) {

			foreach ($getdataslice_wheel as $key) {

				$random[$key['id']] = $key['percent'];

			}

			$newrandom = array();

			foreach ($random as $fruit=>$value)

			{

				$newrandom = array_merge($newrandom, array_fill(0, $value, $fruit));

			}

			$myrandom = $newrandom[array_rand($newrandom)];

			$nextrandom = $myrandom + 1;

			$updatepointuser1 = $this->db->prepare("UPDATE user_config SET point = (point - :usepoint1) WHERE id = :id");

			$updatepointuser1->execute([':usepoint1'=>$searchdataspin['point'],':id'=>$getdatauser['id']]);

			$dataslicerandom = $this->getdataslice_wheel_only($myrandom); //สปินที่เราได้

			$rewardpointhistory = 0;

			$statushistory = 0;

			if ($dataslicerandom['reward_type'] == "point") {

				$rewardpointhistory = $dataslicerandom['reward_point'];

				$statushistory = 3;

				$updatepointuser = $this->db->prepare("UPDATE user_config SET point = point+:usepoint WHERE id = :id");

				$updatepointuser->execute([':usepoint'=>$dataslicerandom['reward_point'],':id'=>$getdatauser['id']]);

				$message['status'] = "success";

				$message['spin_value'] = $myrandom;

				$message['pointnow'] = $getdatauser['point'];

				$this->insearthistoryrandom($myrandom);

			}else{

				$random_code = $this->random_code($dataslicerandom['message']);

				if ($random_code) {

					$updateitemhistory = $this->db->prepare("UPDATE `stock_catalog` SET `name_get` = :name_get1,`date`= CURRENT_TIMESTAMP  WHERE `stock_catalog`.`id` = :idcode;");

					$updateitemhistory->execute([':name_get1'=>$_SESSION['username'],':idcode'=>$random_code['id']]);

					$message['status'] = "success";

					$message['spin_value'] = $myrandom;

					$message['pointnow'] = $getdatauser['point'];

					//$this->insearthistoryrandom($myrandom);

				}else{

					$updatepointuser2 = $this->db->prepare("UPDATE user_config SET point = (point + :usepoint1) WHERE id = :id");

					$updatepointuser2->execute([':usepoint1'=>$configweb['usepoint'],':id'=>$getdatauser['id']]);

					$message['status'] = "error";

					$message['info'] = "ของในStockหมด กรุณาติดต่อเพจ";

				}

			}

		}else{

			$message['status'] = "error";

			$message['info'] = "ยอดเงินไม่เพียงพอ";

		}

		echo json_encode($message);

	}

	public function insearthistoryrandom($id){

		$stmt = $this->db->prepare("SELECT * FROM setting_spin WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		$result = $stmt->fetch();

		if ($stmt->RowCount() > 0) {

			$inseart = $this->db->prepare("INSERT INTO `stock_catalog` (`name_get`, `type`, item,`date`) VALUES (:username, 'point', :itemget,CURRENT_TIMESTAMP);");

			try {

				$inseart->execute([':username'=>$_SESSION['username'],':itemget'=>$result['reward_point']]);

			} catch (Exception $e) {

				$message['status'] = "error";

				$message['info'] = $e->getmessage();

				echo json_encode($message);

			}

		}

	}

	public function searchdataspin($id){

		$stmt = $this->db->prepare("SELECT * FROM random_spin WHERE name_spin = :namespin");

		$stmt->execute([':namespin'=>$id]);

		$result = $stmt->fetch();

		return $result;

	}

	public function fetchAllhistory(){

		$stmt = $this->db->prepare("SELECT * FROM history_all WHERE username = :usernamesession");

		$stmt->execute([':usernamesession'=>$_SESSION['username']]);

		$result = $stmt->fetchAll();

		return $result;

	}

	public function fetchAllspin(){

		$stmt = $this->db->prepare("SELECT * FROM stock_catalog WHERE name_get = :usernamesession ORDER BY id DESC LIMIT 0,10");

		$stmt->execute([':usernamesession'=>$_SESSION['username']]);

		$result = $stmt->fetchAll();

		return $result;

	}

	public function getdataslice_wheel_only($id){

		$stmt = $this->db->prepare("SELECT * FROM setting_spin WHERE id = :id");

		$stmt->execute([':id'=>$id]);

		if ($stmt->rowcount() > 0) {

			return $stmt->fetch();

		}else{

			return 0;

		}

	}

	public function getdataslice_wheel($name_spin1){

		$stmt = $this->db->prepare("SELECT * FROM setting_spin WHERE name_spin = :name_spin1");

		$stmt->execute([':name_spin1'=>$name_spin1]);

		if ($stmt->rowcount() > 0) {

			while ($row = $stmt->fetch()) {

				$response[] = $row;

			}

			return $response;

		}else{

			return 0;

		}

	}

	public function auth(){

		if (empty($_SESSION['id'])) {

			echo "<script>window.location.href='/login';</script>";

			exit();

		}

	}

}



?>
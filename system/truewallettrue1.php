<?php 
require 'connect.php';
class truewallet
{
	
	function __construct()
	{
		$this->db = database();
	}
	public function fetchsettingwebsitedata(){
		$stmt = $this->db->prepare("SELECT * FROM setting_website WHERE id = '1'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function redeem($voucher_hash){
		$fetchsettingwebsitedata = $this->fetchsettingwebsitedata();
		$phone = $fetchsettingwebsitedata['type2'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://gift.truemoney.com/campaign/vouchers/'.$voucher_hash.'/redeem',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode(array('mobile' => $phone,'voucher_hash' => $voucher_hash)),
			CURLOPT_HTTPHEADER => array(
				'accept: application/json',
				'accept-encoding: gzip, deflate, br',
				'accept-language: en-US,en;q=0.9',
				'content-length: 59',
				'content-type: application/json',
				'origin: https://gift.truemoney.com',
				'referer: https://gift.truemoney.com/campaign/?v='.$voucher_hash,
				'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36 Edg/87.0.664.66',
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($response);
		if (isset($result->status->code)) {
			$codestatus = $result->status->code;
			if ($codestatus == "VOUCHER_OUT_OF_STOCK") {
				$alert['status'] = "error";
				$alert['info'] = "ซองอั๋งเปานี้ถูกใช้งานไปแล้ว";
				return json_encode($alert);
			}elseif ($codestatus == "VOUCHER_NOT_FOUND") {
				$alert['status'] = "error";
				$alert['info'] = "ไม่พบซองอั๋งเปานี้";
				return json_encode($alert);
			}elseif ($codestatus == "VOUCHER_EXPIRED"){
				$alert['status'] = "error";
				$alert['info'] = "ซองอั๋งเปาหมดอายุ";
				return json_encode($alert);
				
			}elseif ($codestatus == "SUCCESS"){
				$balance = $result->data->voucher;
				$ownerprofile = $result->data->owner_profile;
				if ($balance->amount_baht == $balance->redeemed_amount_baht) {


					$message['amount_baht'] = $balance->redeemed_amount_baht;
					$message['voucher_owner'] = $ownerprofile->full_name;

					$checkdatabase = $this->db->prepare("SELECT * FROM name_userpromote WHERE name = :name");
					$checkdatabase->execute([':name'=>$_SESSION['username']]);
					$result5 = $checkdatabase->fetch();
					if ($checkdatabase->RowCount() > 0) {
						
						$stmt = $this->db->prepare("SELECT * FROM user_config");
						$stmt->execute();
						$stmt = $this->db->prepare("UPDATE user_config SET point = point + '".$message['amount_baht']."' WHERE id = :id");
						$stmt->execute([':id'=>$_SESSION['id']]);

						$stmt2 = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");
						$stmt2->execute([':id'=>$_SESSION['id']]);
						$stmt34 = $this->db->prepare("INSERT INTO `topup` (`id`, `username`, `username_user`, `amount`, `date`) VALUES (NULL, :name1, :username_user3, :amount50, CURRENT_TIMESTAMP);");
						$insearttopupcode = $this->db->prepare("INSERT INTO `sumhistory_topupcode` (`id`, `name_topup`, `amount`, `name_promote`) VALUES (NULL, :sessiionname, :amount1, :name_promote10);");
						try {
							$stmt34->execute([':name1'=>$message['voucher_owner'], ':username_user3'=>$_SESSION['username'], ':amount50'=>$message['amount_baht']]);
							$insearttopupcode->execute([':sessiionname'=>$_SESSION['username'],':amount1'=>$message['amount_baht'],':name_promote10'=>$result5['name_promote']]);
						} catch (Exception $e) {
							$alert['status'] = "error";
							$alert['info'] = $e->getmessage();
							return json_encode($alert);
						}

						$alert['status'] = "success";
						$alert['info'] = $message['amount_baht'];
						return json_encode($alert);


					}else{

						$stmt = $this->db->prepare("SELECT * FROM user_config");
						$stmt->execute();
						$stmt = $this->db->prepare("UPDATE user_config SET point = point + '".$message['amount_baht']."' WHERE id = :id");
						$stmt->execute([':id'=>$_SESSION['id']]);

						$stmt2 = $this->db->prepare("SELECT * FROM user_config WHERE id = :id");
						$stmt2->execute([':id'=>$_SESSION['id']]);
						$stmt34 = $this->db->prepare("INSERT INTO `topup` (`id`, `username`, `username_user`, `amount`, `date`) VALUES (NULL, :name1, :username_user3, :amount50, CURRENT_TIMESTAMP);");
						try {
							$stmt34->execute([':name1'=>$message['voucher_owner'], ':username_user3'=>$_SESSION['username'], ':amount50'=>$message['amount_baht']]);
						} catch (Exception $e) {
							$alert['status'] = "error";
							$alert['info'] = $e->getmessage();
							return json_encode($alert);
						}

						$alert['status'] = "success";
						$alert['info'] = $message['amount_baht'];
						return json_encode($alert);
					}





				}else{
					$alert['status'] = "error";
					$alert['info'] = "กรุณาแบ่งอั๋งเปาแค่1คน";
					return json_encode($alert);
				}

			}else{
				$alert['status'] = "error";
				$alert['info'] = "ไม่ทราบสาเหตุ";
				return json_encode($alert);
			}
		}else{
			$alert['status'] = "error";
			$alert['info'] = "ลิ้งอั๋งเปาไม่ถูกต้อง";
			return json_encode($alert);
		}
		return $message;
	}
}
?>
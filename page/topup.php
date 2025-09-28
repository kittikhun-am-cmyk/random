<?php 

$use = new HnawStudio;

$auth = $use->authcheck();

?>

<div class="page-banner-section-lg bg-image" data-bg="./assets/ปก9999.png" style="background-image: url(./assets/bg-sub.jpg);">

	<!--<div class="page-banner-section-lg" style="background-color: #009cde;background-image: radial-gradient(circle farthest-side at center bottom,#009cde,#003087 125%);">-->

		<div class="container">

			<div class="row">

				<div class="col">

					<div class="page-banner text-center">

						<h2 class="white"><a href="#">เติมเงิน</a></h2>

						<ul class="page-breadcrumb">

							<li><a href="?page=home">Home</a></li>

							<li>topup</li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>



	<div class="container">

		<div class="card mt-5 mx-auto col-xl-9" style="border-bottom:#333 solid;">

			<div class="card-body">

				<h3 class="">โอนผ่านแอพ <img style="width:54px;" src="https://cdn6.aptoide.com/imgs/c/e/b/cebf5ce73494140a71efee3eb1c26a28_icon.png"> เท่านั้น ( ระบบเติมเงินอัติโนมัติ )</h3>

				<hr>

				<div class="mx-auto text-center">

					<a href="#" class="btn btn-warning text-light btn-block mx-auto text-center col-6" data-bs-toggle="modal" data-bs-target="#exampleModal">ดูวิธีการใช้งาน</a>

				</div>

				<div class="col-xl-12  mx-auto">

					<div class="form-fild">

						<p><label>ลิ้งซองของขวัญ</label></p>

						<input type="text" id="link_topup" class="form-control">

					</div>

					<a class="btn btn-success col-12 text-center mx-auto mt-3 submit_topup text-light" style="background-color:#28a745">เติมเงิน</a>

				</div>

			</div>

		</div>

	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel"></h5>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

				</div>

				<div class="modal-body">

					<div class="row">

						<div class="clearfix"></div>

						<div class="col-12 col-lg-6 mt-3 mb-2 text-center">

							<p class="red">1 . เปิดแอพทรูมันนี่วอลเล็ท</p>

							<img src="https://www.idff-shop.net/assets/image/wallet/wallet1.jpg" alt="ขั้นตอน 1 เปิดแอพทรูมันนี่วอลเล็ท" style="width: 250px;border: 1px solid #ddd;">

						</div>

						<div class="col-12 col-lg-6 mt-3 mb-2 text-center">

							<p class="red">2 . กดส่งซองของขวัญ</p>

							<img src="https://www.idff-shop.net/assets/image/wallet/wallet2.jpg" alt="ขั้นตอน 2 กดส่งซองของขวัญ" style="width: 250px;border: 1px solid #ddd;">

						</div>

						<div class="col-12 col-lg-6 mt-3 mb-2 text-center">

							<p class="red">3 . กรอกจำนวนเงิน และ เลือกตามตัวอย่าง</p>

							<img src="https://www.idff-shop.net/assets/image/wallet/wallet3.jpg" alt="ขั้นตอน 3 ช่อง 1 กรอกจำนวนเงิน" style="width: 250px;border: 1px solid #ddd;">

						</div>

						<div class="col-12 col-lg-6 mt-3 mb-2 text-center">

							<p class="red">4 . กดปุ่มยืนยัน</p>

							<img src="https://www.rahadthep.net/assets/image/wallet/wallet4.jpg" alt="ขั้นตอน 4 กดปุ่มยืนยัน" style="width: 250px;border: 1px solid #ddd;">

						</div>

						<div class="col-12 col-lg-6 mt-3 mb-2 text-center">

							<p class="red">5 . กดคักลอกลิ้งมาใส่ที่หน้าเว็บและกดเติมเงิน</p>

							<img src="https://www.idff-shop.net/assets/image/wallet/wallet5.jpg" alt="ขั้นตอน 5 กดคักลอกลิ้งมาใส่ที่หน้าเว็บและกดเติมเงิน" style="width: 250px;border: 1px solid #ddd;">

						</div>

					</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-warning text-light" data-bs-dismiss="modal">ปิด</button>

				</div>

			</div>

		</div>

	</div>

	<script type="text/javascript">

		$(".submit_topup").click(function(){

			var link_topup = $("#link_topup").val();

			$.ajax({

				type:"POST",

				url:"./system/url/topup.php",

				dataType:"json",

				data:{

					link_topup:link_topup,

				},success:function(data){

					if (data.status == "success") {

						swal("เข้าสู่ระบบ", data.info, "success").then(function(){

							window.location.reload();

						})

					}else{

						swal({

							icon: 'error',

							title: 'เติมเงิน',

							text: data.info

						})

					}

				}

			})

		})

	</script>
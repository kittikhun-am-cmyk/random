<?php 

$use = new HnawStudio;

$checkauth1 = $use->checkauth1();

?>

<div class="page-banner-section-lg bg-image" data-bg="./assets/bg-sub.jpg" style="background-image: url(./assets/bg-sub.jpg);">

	<!--<div class="page-banner-section-lg" style="background-color: #009cde;background-image: radial-gradient(circle farthest-side at center bottom,#009cde,#003087 125%);">-->

		<div class="container">

			<div class="row">

				<div class="col">

					<div class="page-banner text-center">

						<h2 class="white"><a href="#">สมัครสมาชิก</a></h2>

						<ul class="page-breadcrumb">

							<li><a href="?page=home">Home</a></li>

							<li>register</li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="container">

		<div class="login-register-section section pb-20">

			<div class="container">

				<div class="row">

					<!--Login Form Start-->

					<div class="col-lg-8 offset-sm-2">

						<div class="customer-login-register">



							<div class="bg_contentwhite">

								<h3 class="">สมัครสมาชิก</h3>

								<hr>







								<div onclick="swal('ตอนนี้ระบบสมัครเฟสปิดให้สมัครอยู่', 'กรุณาสมัครแบบปกติไปก่อนนะคะ', 'info');">สมัครสมาชิกด้วย Facebook&gt;

									<div id="error">



										<!-- ตรวจเช็ค Register & Error -->







									</div>

									<a href="javascript:void(0);" class="fb-login social-login">

										<i class="fas fa-user-plus"></i> &nbsp; <b onclick="">สมัครสมาชิกด้วย Facebook</b>

									</a>

								</div>





								<input type="hidden" value="0123456789" id="phone" name="txt_password" placeholder="เบอร์โทรติดต่อ" required="">

								<form method="POST">

									<div class="row">

										<div class="col-lg-12">

											<div class="form-fild">

												<input type="hidden" id="affiliate" name="affiliate" value="">

												<p><label>Username <span class="required">*</span></label></p>

												<input type="text" id="username" name="txt_username" placeholder="ชื่อบัญชีผู้ใช้งาน" required="">

											</div>

										</div>

										<div class="col-lg-6">

											<div class="form-fild">

												<p><label>Password <span class="required">*</span></label></p>

												<input type="password" id="password" name="txt_password" placeholder="รหัสผ่าน" required="">

											</div>

										</div>

										<div class="col-lg-6">

											<div class="form-fild">

												<p><label>Password Confirm <span class="required">*</span></label></p>

												<input type="password" id="confirm" name="txt_passwordc" placeholder="ยืนยันรหัสผ่าน" required="">

											</div>

										</div>





										<br>











										<div class="container">

											<div class="row">

												<div class="col-xl-6">

													<div class="login-submit mt-15">

														<a type="submit" name="btn_register"  style="background-color:#28a745;color:#fff;border-color: #28a745;"class="btn btn-block col-12 submit_register">สมัครสมาชิก</a>

													</div>

												</div>

												<div class="col-xl-6">

													<div class="login-submit mt-15">

														<button type="reset" class="btn btn-danger btn-block col-12 reinpit">ยกเลิก</button>

													</div>

												</div>

											</div>

										</div>

									</div>

								</form>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>





	</div>

	<style type="text/css">

		.btn-success{

			background-color:#28a745;

		}

	</style>

	<input type="hidden" value="<?php echo $_GET['code']; ?>" id="code1">

	<script type="text/javascript">

		$(".reinpit").click(function(){

			$("#username").val('');

			$("#phone").val('');

			$("#password").val('');

			$("#confirm").val('');

		})

		var code1check = $("#code1").val();

		if (code1check == "") {

			$(".submit_register").click(function(){

				var username = $("#username").val();

				var phone = $("#phone").val();

				var password = $("#password").val();

				var confirm = $("#confirm").val();

				$.ajax({

					type:"POST",

					url:"./system/url/register.php",

					dataType:"json",

					data:{username,phone,password,confirm},

					success:function(data){

						if (data.status == "success") {

							swal("สมัครสมาชิก", "สมัครสมาชิก สำเร็จ!", "success").then(function(){

								window.location.href = '/login';

							})

						}else{

							swal({

								icon: 'error',

								title: 'ระบบ',

								text: data.info,

							})

						}

					}

				})

			})

		}else{

			$(".submit_register").click(function(){

				var username = $("#username").val();

				var phone = $("#phone").val();

				var password = $("#password").val();

				var confirm = $("#confirm").val();

				var code1check3 = $("#code1").val();

				$.ajax({

					type:"POST",

					url:"./system/url/register_code.php",

					dataType:"json",

					data:{username,phone,password,confirm,code1check3},

					success:function(data){

						if (data.status == "success") {

							swal("สมัครสมาชิก", "สมัครสมาชิก สำเร็จ!", "success").then(function(){

								window.location.href = '/login';

							})

						}else{

							swal({

								icon: 'error',

								title: 'ระบบ',

								text: data.info,

							})

						}

					}

				})

			})

		}

	</script>
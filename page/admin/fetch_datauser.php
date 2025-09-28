<?php 

$use = new HnawStudio;

$searchdatauserfetch = $use->searchdatauserfetch($_GET['id']);

?>

<div class="container">

	<div class="card mt-5 col-xl-7 mx-auto">

		<div class="card-body">

			<h2><i class="fas fa-user-edit"></i>&nbsp;แก้ไขข้อมูลUser</h2>

			<hr>

			<div class="card-body">

				<form>

					<div class="mb-3">

						<label for="exampleInputEmail1" class="form-label">ชื่อผู้ใช้</label>

						<input type="text" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $searchdatauserfetch['username']; ?>">

					</div>

					<div class="mb-3">

						<label for="exampleInputPassword1" class="form-label">เบอร์โทร</label>

						<input type="text" class="form-control" id="phone" value="<?php echo $searchdatauserfetch['phone']; ?>">

					</div>

					<div class="container">

						<div class="row">

							<div class="col-6">

								<div class="mb-3">

									<label for="exampleInputPassword1" class="form-label">เครดิตคงเหลือ</label>

									<input type="text" class="form-control" id="point" value="<?php echo $searchdatauserfetch['point']; ?>">

								</div>

							</div>

							<div class="col-6">

								<label for="exampleInputPassword1" class="form-label">ยศ</label>

								<select class="form-select" id="classselect">

									<?php if ($searchdatauserfetch['rank'] == "1") {  ?>

										<option selected value="1">ADMIN</option>

									<?php }else{ ?>

										<option selected value="-0">USER</option>

									<?php } ?>

									<option value="1">ADMIN</option>

									<option value="-0">USER</option>

								</select>

							</div>

						</div>

					</div>

					<a type="submit" class="btn btn-primary col-12 savedatauser">บันทึกข้อมูล</a>

				</form>

			</div>

		</div>

	</div>

</div>

<input type="hidden" id="getidvalue" value="<?php echo $_GET['id']; ?>"> 

<script type="text/javascript">

	$(".savedatauser").click(function(){

		var phone = $("#phone").val();

		var point = $("#point").val();

		var classselect = $("#classselect").val();

		var getidvalue = $("#getidvalue").val();

		$.ajax({

			type:"POST",

			url:"./system/url/savedatauser.php",

			dataType:"json",

			data:{phone,point,classselect,getidvalue},

			success:function(data){

				if (data.status == "success") {

					swal({

						icon: 'success',

						title: 'ระบบ',

						text: 'อัพเดทข้อมูล สำเร็จ!',

					}).then(function(){

						window.location.href = "/user_setting";

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

</script>
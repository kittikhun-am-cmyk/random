<?php 

$use = new HnawStudio;

$serachsettingspin = $use->serachsettingspin($_GET['id']);

?>

<input type="hidden" value="<?php echo $_GET['id']; ?>" id="getvalueid">

<div class="container">

	<div class="card mt-5 col-xl-5 mx-auto">

		<div class="card-body">

			<h4><?php echo $serachsettingspin['message']; ?> <img src="<?php echo $serachsettingspin['image']; ?>" width="50"></h4>

			<hr>

			<form>

				<div class="mb-3">

					<label for="exampleInputEmail1" class="form-label">ชื่อสินค้า</label>

					<input type="text" class="form-control" id="name_spin1" value="<?php echo $serachsettingspin['message']; ?>">

				</div>

				<div class="container">

					<div class="row">

						<?php if ($serachsettingspin['reward_type'] == "point") {  ?>

							<div class="col-6">

								<div class="mb-3">

									<label for="exampleInputEmail1" class="form-label">เครดิตที่ได้รับ</label>

									<input type="text" class="form-control" id="credit_spin" value="<?php echo $serachsettingspin['reward_point']; ?>">

								</div>

							</div>

							<div class="col-6">

								<div class="mb-3">

									<label for="exampleInputEmail1" class="form-label">เปอร์เซ็นต์การออก</label>

									<input type="text" class="form-control" id="percent1" value="<?php echo $serachsettingspin['percent']; ?>">

								</div>

							</div>

						<?php }else{ ?>

							<div class="col-6">

								<div class="mb-3">

									<label for="exampleInputEmail1" class="form-label">สามารถเพิ่มของในstock</label>

									<input type="text" disabled class="form-control" id="credit_spin" aria-describedby="emailHelp">

								</div>

							</div>

							<div class="col-6">

								<div class="mb-3">

									<label for="exampleInputEmail1" class="form-label">เปอร์เซ็นต์การออก</label>

									<input type="text" class="form-control" id="percent1" value="<?php echo $serachsettingspin['percent']; ?>">

								</div>

							</div>

						<?php } ?>

						<div class="mb-3">

							<label for="exampleInputEmail1" class="form-label">รูปถาพสินค้า</label>

							<input type="text" class="form-control" id="image_spin" value="<?php echo $serachsettingspin['image']; ?>">

						</div>

					</div>

					<a type="submit" class="btn btn-primary col-12 savedataspin">บันทึก&nbsp;<i class="far fa-save"></i></a>

				</div>

			</form>



		</div>

	</div>

</div>

<script type="text/javascript">

	$(".savedataspin").click(function(){

		var getvalueid = $("#getvalueid").val();

		var name_spin1 = $("#name_spin1").val();

		var credit_spin = $("#credit_spin").val();

		var percent1 = $("#percent1").val();

		var image_spin = $("#image_spin").val();

		$.ajax({

			type:"POST",

			url:"./system/url/savedataspin.php",

			dataType:"json",

			data:{getvalueid,name_spin1,credit_spin,percent1,image_spin},

			success:function(data){

				if (data.status == "success") {

					swal({

						icon: 'success',

						title: 'ระบบ',

						text: 'บันทึกข้อมูล สำเร็จ!',

					}).then(function(){

						window.location.reload();

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
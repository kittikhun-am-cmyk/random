<?php 

$use = new HnawStudio;

$fetchspindata = $use->fetchspindata($_GET['id']);

?>

<input type="hidden" id="getvalueid" value="<?php echo $_GET['id']; ?>">

<div class="container">

	<div class="card mt-5">

		<div class="card-body">

			<label class="h3"><i class="far fa-edit"></i>&nbsp;แก้ไข Spin</label>

			<hr>

			<form>

				<div class="mb-3">

					<label for="exampleInputEmail1" class="form-label">ชื่อ Spin</label>

					<input type="email" class="form-control" id="spin_name" value="<?php echo $fetchspindata['name_spin']; ?>" aria-describedby="emailHelp">

				</div>

				<div class="mb-3">

					<label for="exampleInputEmail1" class="form-label">สุ่มเสียครั้งละ</label>

					<input type="email" class="form-control" id="spin_name5" value="<?php echo $fetchspindata['point']; ?>" aria-describedby="emailHelp">

				</div>

				<div class="mb-3">

					<label for="exampleInputPassword1" class="form-label">Link รูปภาพ</label>

					<div class="form-floating">

						<textarea class="form-control"  id="floatingTextarea2" style="height: 100px"><?php echo $fetchspindata['image']; ?></textarea>

						<label for="floatingTextarea2">รูปภาพ</label>

					</div>

				</div>

				<a type="submit" class="btn btn-primary savedataspin">บันทึก</a>

			</form>

		</div>

	</div>

</div>

<script type="text/javascript">

	$(".savedataspin").click(function(){

		var spin_name = $("#spin_name").val();

		var floatingTextarea2 = $("#floatingTextarea2").val();

		var spin_name5 = $("#spin_name5").val();

		var getvalueid = $("#getvalueid").val();

		$.ajax({

			type:"POST",

			dataType:"json",

			url:"./system/url/save_spindata.php",

			data:{spin_name,floatingTextarea2,spin_name5,getvalueid},

			success:function(data){

				if (data.status == "success") {

					swal("แก้ไข", "แก้ไข สำเร็จ!", "success")

					.then(function(){

						window.location.href = '/setting_website';

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
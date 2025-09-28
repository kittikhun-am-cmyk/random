<?php 

$use = new HnawStudio;

$resultyoutubepromote = $use->resultyoutubepromote($_GET['id']);

?>

<input type="hidden" value="<?php echo $resultyoutubepromote['id']; ?>" id="getid">

<div class="container">

	<div class="card mt-5 mx-auto col-xl-7">

		<div class="card-body">

			<h3>แก้ไข</h3>

			<hr>

			<form>

				<div class="mb-3">

					<label for="exampleInputEmail1" class="form-label">ชื่อช่อง</label>

					<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $resultyoutubepromote['name_code']; ?>">

				</div>

				<div class="mb-3">

					<label for="exampleInputPassword1" class="form-label">เริ่มทำวันที่</label>

					<input type="text" class="form-control" disabled value="<?php echo $resultyoutubepromote['date']; ?>">

				</div>

				<a type="submit" class="btn btn-primary col-12 savedata">บันทึก</a>

			</form>

		</div>

	</div>

</div>

<script type="text/javascript">

	$(".savedata").click(function(){

		var exampleInputEmail1 = $("#exampleInputEmail1").val();

		var getid = $("#getid").val();

		$.ajax({

			type:"POST",

			url:"./system/url/savedatapromotedit.php",

			dataType:"json",

			data:{exampleInputEmail1,getid},

			success:function(data){

				if (data.status == "success") {

					Swal.fire({

						icon: 'success',

						title: 'ระบบ',

						text: 'อัพเดทข้อมูลสำเร็จ!',

					})

				}else{	

					Swal.fire({

						icon: 'error',

						title: 'ระบบ',

						text: data.info,

					})

				}

			}

		})

	})

</script>
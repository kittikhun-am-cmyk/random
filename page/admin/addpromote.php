<?php 

$use = new HnawStudio;

$fetchall_promote = $use->fetchall_promote();

?>

<div class="container">

	<div class="card mx-auto  mt-5">

		<div class="card-body">

			<h3><i class="fas fa-ad"></i>&nbsp;จำนวนการโปรโมท</h3>

			<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+ เพิ่มคนโปรโมท</a>

			<hr>	

			<div class="container">

				<div class="row">

					<?php foreach ($fetchall_promote as $row) { 

						$countusercoderegister = $use->countusercoderegister($row['name_code']);

						$sumeusercoderegister = $use->sumeusercoderegister($row['name_code']);

						?>

						<div class="col-xl-4">

							<div class="card">

								<div class="card-header">

									<?php echo $row['name_code']; ?>

								</div>

								<div class="card-body">

									<h5 class="card-title"><i class="far fa-calendar-alt"></i>&nbsp;เริ่มทำยอดวันที่ :&nbsp;<?php echo $row['date']; ?></h5>

									<h6><i class="fas fa-code"></i>&nbsp;รหัสCode :&nbsp;https://demo.hnawstudio.com/register?code=<?php echo $row['name_code']; ?></h6>

									<p class="card-text"><i class="fas fa-users"></i>&nbsp;จำนวนคนที่สมัครเข้ามา : <b class="text-danger"><?php print_r($countusercoderegister['COUNT(id)']); ?> คน</b></p>

									<p class="card-text"><i class="fas fa-coins"></i>&nbsp;จำนวนเงินรวม : <b class="text-danger"><?php print_r($sumeusercoderegister['sum(amount)']); ?> บาท</b></p>

									<a class="btn btn-warning" href="/promote_edit?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i>&nbsp;แก้ไข</a>&nbsp;<a class="btn btn-warning cleaarpromote" name="<?php echo $row['name_code']; ?>"><i class="fas fa-edit"></i>&nbsp;เคลียร์ยอด</a> <a deleteid="<?php echo $row['id']; ?>" class="btn btn-danger delete5"><i class="far fa-trash-alt"></i>&nbsp;ลบ</a>

								</div>

							</div>

						</div>	

					<?php } ?>



				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript">

	$(".cleaarpromote").click(function(){

		var name = $(this).attr("name")

		swal({

			title: 'Are you sure?',

			text: "คุณต้องการเคลียร์ยอดหรือไม่?",

			icon: "warning",

			buttons: true,

			dangerMode: true,

		}).then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type:"POST",

					url:"./system/url/clearpromote.php",

					dataType:"json",

					data:{

						name

					},success:function(data){

						if (data.status == "success") {

							swal(

								'Deleted!',

								'ล้างยอด สำเร็จ',

								'success'

								).then(function(){

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

			}

		})

	})

	$(".delete5").click(function(){

		var deleteid = $(this).attr("deleteid")

		swal({

			title: 'Are you sure?',

			text: "You won't be able to Delete this!",

			icon: "warning",

			buttons: true,

			dangerMode: true,

		}).then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type:"POST",

					url:"./system/url/deletepromote.php",

					dataType:"json",

					data:{

						deleteid

					},success:function(data){

						if (data.status == "success") {

							swal(

								'Deleted!',

								'ลบสินค้า สำเร็จ',

								'success'

								).then(function(){

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

			}

		})

	})

</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title" id="exampleModalLabel"></h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

			</div>

			<div class="modal-body">

				<form>

					<div class="mb-3">

						<label for="exampleInputEmail1" class="form-label">ชื่อช่อง</label>

						<input type="email" class="form-control" placeholder="กรุณาใส่ชื่อช่อง" id="exampleInputEmail1" aria-describedby="emailHelp">

					</div>

				</form>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

				<button type="button" class="btn btn-primary addpromteuser">+ เพิ่ม</button>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript">

	$(".addpromteuser").click(function(){

		var exampleInputEmail1 = $("#exampleInputEmail1").val();

		$.ajax({

			type:"POST",

			url:"./system/url/addpromote.php",

			dataType:"json",

			data:{exampleInputEmail1},

			success:function(data){

				if (data.status == "success") {

					swal({

						icon: 'success',

						title: 'ระบบ',

						text: 'เพิ่มช่อง สำเร็จ',

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
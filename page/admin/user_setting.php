<?php 

$use = new HnawStudio;

$fetchallsettingspin = $use->fetchallsettingspin();

$fetchalluseradmin = $use->fetchalluseradmin();

?>

<div class="container">

	<div class="card mt-5">

		<div class="card-body">

			<h2>จัดการระบบ</h2>

			<a class="btn btn-secondary" href="/setting_website">กลับหน้าแรก</a>

			<a class="btn btn-danger" href="/user_setting">จัดการ User</a>

			<a class="btn btn-warning" href="/datawebsite">ข้อมูล Websiteทั้งหมด</a>

			<hr>	

			<div class="container">

				<table class="table text-center">

					<thead>

						<tr>

							<th scope="col">ID</th>

							<th scope="col">ชื่อผู้ใช้</th>

							<th scope="col">เบอร์โทรศัพท์</th>

							<th scope="col">IP</th>

							<th scope="col">ยศ</th>

							<th scope="col">Action</th>

						</tr>

					</thead>

					<tbody>

						<?php foreach ($fetchalluseradmin as $row) { ?>

							<tr>

								<th scope="row"><?php echo $row['id']; ?></th>

								<td><?php echo $row['username']; ?></td>

								<td><?php echo $row['phone']; ?></td>

								<td><?php echo $row['ip']; ?></td>

								<td><?php if ($row['rank'] == "1") {

									echo "ADMIN";

								}else{

									echo "USER";

								} ?></td>

								<td><a class="btn btn-warning" href="/fetch_datauser?id=<?php echo $row['id']; ?>">แก้ไขข้อมูล</a>&nbsp;<a class="btn btn-danger deleteuser1" 50id="<?php echo $row['id']; ?>">ลบผู้ใช้</a></td>

							</tr>

						<?php } ?>

					</tbody>

				</table>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript">

	$(".deleteuser1").click(function(){

		var id = $(this).attr("50id");

		swal({

			title: "Are you sure?",

			text: "คุณต้องการลบผู้ใช้นี้หรือไม่",

			icon: "warning",

			buttons: true,

			dangerMode: true,

		}).then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type:"POST",

					url:"./system/url/deleteuser.php",

					dataType:"json",

					data:{id},

					success:function(data){

						if (data.status == "success") {

							swal({

								icon: 'success',

								title: 'ระบบ',

								text: 'ลบผู้ใช้นี้สำเร็จ!',

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

			}

		})

	})



</script>
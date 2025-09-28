	<?php 

	$use = new HnawStudio;

	$fetchallsettingspin = $use->fetchallsettingspin();

	?>

	<div class="container">

		<div class="card mt-5">

			<div class="card-body">

				<h2>จัดการระบบ</h2>

				<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+ เพิ่มSpin</a>

				<a class="btn btn-danger" href="/user_setting">จัดการ User</a>

				<a class="btn btn-warning text-light" href="/datawebsite">ข้อมูล Websiteทั้งหมด</a>

				<hr>	

				<div class="container">

					<div class="row">

						<?php if (empty($fetchallsettingspin)) {  ?>

							<h1 class="mt-5 text-center">ยังไม่มีการเพิ่มSPIN</h1>

						<?php }else{ ?>

							<?php foreach ($fetchallsettingspin as $row) { ?>

								<div class="col-xl-6">

									<a href="/add_stockspin?namespin=<?php echo $row['name_spin']; ?>"><img style="border-radius:25px;width:500px;height: 350; display: block;

									margin-left: auto;

									margin-right: auto;" src="<?php echo  $row['image']; ?>"  class="mx-auto text-center img-thumbnail img-responsive" alt="..."></a>

									<div class="container">

										<div class="row">

											<div class="col-xl-6">

												<a href="/fetch_spin1?id=<?php echo $row['id']; ?>" class="btn btn-warning text-light col-xl-12"  style="border-radius:25px;"><i class="fas fa-edit"></i>&nbsp;แก้ไข Spin</a>

											</div>

											<div class="col-xl-6">

												<a class="btn btn-danger text-light col-xl-12 delete_spin" idattr="<?php echo $row['id']; ?>" style="border-radius:25px;"><i class="fas fa-trash-alt"></i>&nbsp;ลบ Spin</a>

											</div>

										</div>

									</div>

								</div>



							<?php } ?>

						<?php } ?>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">เพิ่มSpin</h5>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

				</div>

				<div class="modal-body">

					<form>

						<div class="mb-3">

							<label for="exampleInputEmail1" class="form-label">ชื่อ Spin</label>

							<input type="text" class="form-control" id="name_spin1_name" aria-describedby="emailHelp">

						</div>

						<div class="mb-3">

							<label for="exampleInputEmail1" class="form-label">รูปภาพ</label>

							<div class="form-floating">

								<textarea class="form-control" id="image_spin51" style="height: 150px;resize: none;"></textarea>

								<label for="floatingTextarea2">ลิ้งรูปภาพ</label>

							</div>

						</div>

					</form>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary saveaddcatalog">Save changes</button>

				</div>

			</div>

		</div>

	</div>

	<script type="text/javascript">

		$(".delete_spin").click(function(){

			var idattr = $(this).attr("idattr")

			swal({

				title: "แน่ใจหรือไม่?",

				text: "ต้องการลบ SPIN หรือไม่?",

				icon: "warning",

				buttons: true,

				dangerMode: true,

			})

			.then((willDelete) => {

				if (willDelete) {

					$.ajax({

						type:"POST",

						url:"./system/url/delete_spin.php",

						dataType:"json",

						data:{idattr},

						success:function(data){

							if (data.status == "success") {

								swal({

									icon: 'success',

									title: 'ลบ SPIN',

									text: 'ลบ SPIN สำเร็จ!',

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

			});

		})

		$(".saveaddcatalog").click(function(){

			var name_spin1_name = $("#name_spin1_name").val();

			var image_spin51 = $("#image_spin51").val();

			$.ajax({

				type:"POST",

				url:"./system/url/inseartspin.php",

				dataType:"json",

				data:{name_spin1_name,image_spin51},

				success:function(data){

					if (data.status == "success") {

						swal({

							icon: 'success',

							title: 'ระบบ',

							text: 'เพิ่มSpinสำเร็จ!',

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

		$(".deletecatalog").click(function(){

			var id = $(this).attr("50id");

			swal({

				title: 'คุณแน่ใจหรือไม่?',

				text: "คุณต้องการลบสินค้าตัวนี้หรือไม่!",

				icon: "warning",

				buttons: true,

				dangerMode: true,

			}).then((willDelete) => {

				if (willDelete) {

					$.ajax({

						type:"POST",

						url:"./system/url/deletespin.php",

						dataType:"json",

						data:{id},

						success:function(data){

							if (data.status == "success") {

								swal({

									icon: 'success',

									title: 'ระบบ',

									text: 'ลบสินค้าชิ้นนี้สำเร็จ!',

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
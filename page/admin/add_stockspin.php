<?php 

$use = new HnawStudio;

$fetchallsettingspin = $use->fetchallsettingspin1($_GET['namespin']);

?>

<div class="container">

	<div class="card mt-5">

		<div class="card-body">

			<h2>จัดการระบบ</h2>

			<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+ เพิ่มสินค้า</a>

			<hr>	

			<div class="container">

				<div class="row">

					<?php if (empty($fetchallsettingspin)) {  ?>

						<h1 class="mt-5 text-center">ยังไม่มีการเพิ่มของในSPIN</h1>

					<?php }else{ ?>

						<?php foreach ($fetchallsettingspin as $row) { ?>

							<div class="col-xl-6">

								<div class="card w-100 mx-auto mb-3">

									<div class="card-body">

										<div class="container">

											<div class="row">

												<div class="col-xl-6">

													<h5 class="card-title"><?php echo $row['message']; ?></h5>

													<?php if ($row['reward_type'] == "point") {  ?>

														<p class="card-text">ของที่ได้รับประเภท : <?php echo $row['reward_type']; ?></p>

														<p class="card-text">ได้รับ : <?php echo $row['reward_point']; ?> เครดิต</p>

													<?php }else{ ?>

														<p class="card-text">ของที่ได้รับประเภท : <?php echo $row['reward_type']; ?> <a href="/add_stock?id=<?php echo $row['message']; ?>" class="btn  btn-success">เพิ่มของ</a></p>

													<?php } ?>

													<p class="card-text">เปอร์เซ็นต์การออก : <?php echo $row['percent']; ?>&nbsp;%</p>

													<a  class="btn btn-primary" href="/fetch_spin?id=<?php echo $row['id']; ?>">แก้ไขสินค้า</a> <a  class="btn btn-danger deletecatalog" 50id="<?php echo $row['id']; ?>">ลบสินค้า</a>

												</div>

												<div class="col-xl-6">

													<img src="<?php echo $row['image']; ?>" class="w-50">

												</div>

											</div>

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

				<h5 class="modal-title" id="exampleModalLabel">เพิ่มของใน Spin</h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

			</div>

			<div class="modal-body">

				<form>

					<div class="mb-3">

						<label for="exampleInputEmail1" class="form-label">ชื่อสินค้า</label>

						<input type="text" class="form-control" id="name_spin1_name" aria-describedby="emailHelp">

					</div>

					<div class="container">

						<div class="row">

							<div class="col-6">

								<div class="mb-3">

									<label for="exampleInputPassword1" class="form-label">เครดิตที่ได้รับ</label>

									<input type="text" class="form-control" id="credit_spin51">

									<p class="text-muted">* ถ้าเป็นItemไม่ต้องใส่</p>

								</div>

							</div>

							<div class="col-6">

								<div class="mb-3">

									<label for="exampleInputPassword1" class="form-label">เปอร์เซ็นต์ %</label>

									<input type="text" class="form-control" id="percent10">

								</div>

							</div>

						</div>

					</div>

					<div class="container">

						<div class="row mt-3">

							<div class="col-6">

								<input type="text" class="form-control" id="image_spin51" placeholder="กรุณากรอกLinkรูปภาพ">

							</div>

							<div class="col-6">

								<select class="form-select" id="select16">

									<option selected>กรุณาเลือกรูปแบบสินค้า</option>

									<option value="1">Item</option>

									<option value="2">Point</option>

								</select>

							</div>

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

<input id="getvaluespinname" type="hidden" value="<?php echo $_GET['namespin']; ?>">

<script type="text/javascript">

	$(".saveaddcatalog").click(function(){

		var name_spin1_name = $("#name_spin1_name").val();

		var credit_spin51 = $("#credit_spin51").val();

		var percent10 = $("#percent10").val();

		var image_spin51 = $("#image_spin51").val();

		var select16 = $("#select16").val();

		var getvaluespinname = $("#getvaluespinname").val();

		$.ajax({

			type:"POST",

			url:"./system/url/inseartdataspin.php",

			dataType:"json",

			data:{name_spin1_name,credit_spin51,percent10,image_spin51,select16,getvaluespinname},

			success:function(data){

				if (data.status == "success") {

					swal({

						icon: 'success',

						title: 'ระบบ',

						text: 'เพิ่มสินค้าสำเร็จ!',

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
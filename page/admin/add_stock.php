<?php 

$use = new HnawStudio;

$fetchcatalogspin = $use->fetchcatalogspin($_GET['id']);

?>



<div class="container">

	<div class="card mt-5">

		<div class="card-body table-reponsive">

			<table class="table table-bordered mt-3 text-center">

				<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addcodecatalog">+ เพิ่มสินค้า</a>

				<thead>

					<tr>

						<th scope="col">ID</th>

						<th scope="col">ชื่อสินค้า</th>

						<th scope="col">ของที่ให้</th>

						<th scope="col">จัดการ</th>

					</tr>

				</thead>

				<tbody>

					<?php foreach ($fetchcatalogspin as $type) {  ?>

						<tr>

							<th scope="row"><?php echo $type['id']; ?></th>

							<td><?php echo $type['type']; ?></td>

							<td><?php echo $type['item']; ?></td>

							<td><a class="btn btn-danger deletecatalog" 50id="<?php echo $type['id']; ?>">ลบสินค้า</a></td>

						</tr>

					<?php } ?>

				</tbody>

			</table>

		</div>

	</div>

</div>

<script type="text/javascript">

	$(".deletecatalog").click(function(){

		var id = $(this).attr("50id");

		swal({

			title: 'คุรแน่ใจหรือไม่?',

			text: "คุณต้องการลบสินค้าชิ้นนี้หรือไม่?",

			icon: "warning",

			buttons: true,

			dangerMode: true,

		}).then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type:"POST",

					url:"./system/url/deletecatalog.php",

					dataType:"json",

					data:{id},

					success:function(data){

						if (data.status == "success") {

							swal("ลบสินค้า", "ลบสินค้า สำเร็จ!", "success").then(function(){

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

<div

class="modal fade"

id="addcodecatalog"

tabindex="-1"

aria-labelledby="exampleModalLabel"

aria-hidden="true"

>

<div class="modal-dialog">

	<div class="modal-content">

		<div class="modal-header">

			<h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้าใน STOCK</h5>

			<button

			type="button"

			class="btn-close"

			data-mdb-dismiss="modal"

			aria-label="Close"

			></button>

		</div>

		<div class="modal-body">

			<form>

				<input type="hidden" name="" id="namebuy" value="0">

				<input type="hidden" name="" id="typedata" value="<?php echo $_GET['id']; ?>">

				<div class="form mb-4">

					<input type="text" id="namestock" disabled class="form-control" value="<?php echo $_GET['id']; ?>" />

				</div>

				<div class="form mb-4">

					<div class="form">

						<label class="form-label" for="textAreaExample">สินค้าที่จะให้</label>

						<textarea class="form-control" id="itemstock" rows="4"></textarea>

					</div>

				</div>









			</form>

		</div>

		<div class="modal-footer">

			<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">

				Close

			</button>

			<button type="button" class="btn btn-primary col-3 addcodecatalog1">เพิ่มสินค้า</button>

		</div>

	</div>

</div>

</div>

<script type="text/javascript">

	$(".addcodecatalog1").click(function(){

		var typedata =$("#typedata").val();

		var itemstock =$("#itemstock").val();

		$.ajax({

			type:"POST",

			url:"./system/url/addcodecatalog.php",

			dataType:"json", 

			data:{typedata,itemstock},

			success:function(data){

				if (data.status == "success") {

					swal({

						title: "เพิ่มสินค้าในSTOCK",

						text: "เพิ่มสินค้าในSTOCK สำเร็จ!",

						icon: "success",

						button: "OK",

					}).then(function(){

						window.location.reload();

					})

				}else{

					swal({

						title: "ระบบ",

						text: data.info,

						icon: "error",

						button: "OK",

					})

				}

			}

		})



	})

</script>
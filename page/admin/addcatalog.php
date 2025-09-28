<?php 
$new = new HnawStudio;
/*$authadmin = $new->authadmin();*/
$resultcatalog = $new->resultcatalog();
$checkcatalog = $new->checkcatalog();
/*$resultcatalognormal = $new->resultcatalognormal();*/
$resultcatalog1LIMIT = $new->resultcatalog1LIMIT();
?>


<div class="container">
	<div class="card mt-5">
		<div class="card-title bg-dark text-dark h1 text-center">
			<label>
				จัดการสินค้า
			</label>
			<span class="d-block p-1 bg-dark text-white mx-auto btn-block"></span>
		</div>

		<div class="card-body">
			<form class="col-md-6 mx-auto text-dark mx-auto">
				<!-- Email input -->
				<div class="form mb-4 h5">
					<label class="form-label badge bg-dark text-light " for="form1Example1">ชื่อสินค้า</label>
					<input type="text" id="name_catalog" class="form-control" placeholder="กรุณากรอก ชื่อสินค้า" />
				</div>
				<div class="form mb-4 h5">
					<label class="form-label badge bg-dark text-light " for="form1Example1">Game</label>
					<input type="text" id="game_catalog" oninput="this.value = this.value.toUpperCase()" class="form-control" placeholder="กรุณากรอก ชื่อ Game หรือชื่อ map" />
				</div>
				<div class="form mb-4 h5">
					<label class="form-label badge bg-dark text-light" for="form1Example1">LINK รูปภาพสินค้า</label>
					<input type="text" id="image_catalog" class="form-control" placeholder="กรุณากรอก ชื่อสินค้า" />
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md">
							<div class="form mb-4">
								<label class="form-label badge bg-dark text-light" for="form1Example1">ราคาสินค้า</label>
								<input type="number" id="price_catalog" class="form-control" placeholder="กรุณากรอกราคาสินค้า" />
							</div>
						</div>
						<div class="row">
							<div class="col-md">
								<div class="form mb-4">
									<label class="form-label badge bg-dark text-light" for="form1Example1">ข้อมูลสินค้า</label>
									<textarea class="form-control" id="detail_catalog" rows="4" style=" resize: none;
									height: 100px;
									width: 250px;"
									placeholder="กรุณากรอกข้อมูลสินค้า
									" 
									></textarea>

								</div>
							</div>
							<div class="col-md">
								<div class="form mb-4">
									<label class="form-label badge bg-dark text-light" for="form1Example1">สินค้าที่จะให้</label>
									<div class="form">
										<textarea class="form-control" id="item_catalog" rows="4" style=" resize: none;
										height: 100px;
										width: 250px;"
										placeholder="กรุณากรอกสินค้า เช่น 
										ID:6814 | PASSWORD:9999
										" 
										></textarea>

									</div>

								</div>

							</div>

						</div>
					</div>


					<a type="submit" class="btn btn-warning btn-block text-dark addcatalog" style="font-size:14px">เพิ่มสินค้า</a>
				</div>

			</form>
		</div>
	</div>
	<script type="text/javascript">
		$(".addcatalog").click(function(){
			var game_catalog = $("#game_catalog").val();
			var name_catalog = $("#name_catalog").val();
			var image_catalog = $("#image_catalog").val();
			var price_catalog = $("#price_catalog").val();
			var detail_catalog = $("#detail_catalog").val();
			var item_catalog = $("#item_catalog").val();
			$.ajax({
				type:"POST",
				url:"./system/url/addcatalog.php",
				dataType:"json",
				data:{
					game_catalog:game_catalog,
					name_catalog:name_catalog,
					image_catalog:image_catalog,
					price_catalog:price_catalog,
					detail_catalog:detail_catalog,
					item_catalog:item_catalog,
				},success:function(data){
					if (data.status == "success") {
						swal({
							title: "ระบบ",
							text: "เพิ่มสินค้าสำเร็จ",
							icon: "success",
							button: "OK",
						}).them(function(){
							window.location.reload();
						})
						
					}else{	
						swal({
							title: "เกิดข้อผิดพลาด",
							text: data.info,
							icon: "error",
							button: "OK",
						});
						
					}
				}
			})
		});
	</script>

	<hr class="col-md-10 mx-auto bg-dark">
	<div class="container h1">
		<label class="card-title h1  mt-3 text-dark  h1">สินค้าคงเหลือ</label>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($resultcatalog as $row) { ?>
				<div class="col-md-4">


					<div class="card mx mb-3" style="border-radius:10px">
						<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
							<img
							src="<?php echo $row['image_catalog']; ?>"
							class="img-fluid w-100"

							/>
							<a href="#!">
								<div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
							</a>
							<span class="d-block p-1 bg-dark text-white mx-auto btn-block"></span>
						</div>
						<div class="card-body">
							<small><strong><?php echo $row['game']; ?></strong></small>
							<h5 class="card-title mt-1"><strong><?php echo $row['name_catalog']; ?></strong></h5>
							<div class="form-outline">
								<textarea class="form-control bg-light" disabled id="textAreaExample" rows="5" style="resize:none;"><?php echo $row['detail_catalog']; ?></textarea>
							</div>
							<p class="text-center h5"><?php echo $row['price_catalog']; ?> -. บาท</p>
							<center> <a href="#!" class="btn btn-danger text-light col-md-5 me-4 submit_del" namepack="<?php echo $row['id']; ?>"  style="font-size:14px">ลบสินค้านี้</a>
								<a href="#!" class="btn  btn-warning text-light col-md-5 mr-4 sasdad" id="<?php echo $row['id'] ?>"  style="font-size:14px">แก้ไขสินค้า</a></center>
							</div>
						</div>



					</div>


					<div
					class="modal fade"
					id="add_data_Modal"
					tabindex="-1"
					aria-labelledby="exampleModalLabel"
					aria-hidden="true"
					>
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">แก้ไขสินค้า</h5>
								<button
								type="button"
								class="btn-close"
								data-mdb-dismiss="modal"
								aria-label="Close"
								></button>
							</div>
							<div class="modal-body">
								<form>
									<!-- Email input -->
									<div class="form mb-4">
										<label class="form-label" for="form1Example1">ชื่อสินค้า</label>
										<input type="email" id="name_catalog1" class="form-control" value="<?php echo   $row['name_catalog'];?>" />
									</div>

									<!-- Password input -->
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">GAME</label>
										<input type="text" id="game_catalog1" class="form-control" value="<?php echo   $row['game'];?>"/>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">รายละเอียดสินค้า</label>
										<textarea class="form-control bg-light"  id="detail_catalog1" rows="5" style="resize:none;"><?php echo $row['detail_catalog']; ?></textarea>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">สินค้าที่ให้</label>
										<textarea class="form-control bg-light"  id="item_catalog1" rows="5" style="resize:none;"><?php echo $row['item_catalog']; ?></textarea>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">ราคาสินค้า</label>
										<input type="number" id="price_catalog1" class="form-control" value="<?php echo   $row['price_catalog'];?>"/>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">LINK รูปภาพสินค้า</label>
										<input type="text" id="link_catalog1" class="form-control" value="<?php echo   $row['image_catalog'];?>"/>
									</div>
								</form>


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
									Close
								</button>
								<button type="button" class="btn btn-primary savechang" id="<?php echo $row['name_catalog'] ?>">Save changes</button>
							</div>
						</div>
					</div>
				</div>









				<script type="text/javascript">
					$(".sasdad").click(function(){
						var employee_id = $(this).attr("id"); 
						$.ajax({  
							url:"./system/url/fetch.php",  
							method:"POST",  
							data:{employee_id:employee_id},  
							dataType:"json",  
							success:function(data){  
								$('#name_catalog1').val(data.name_catalog);  
								$('#game_catalog1').val(data.game);  
								$('#detail_catalog1').val(data.detail_catalog)
								$('#item_catalog1').val(data.item_catalog);   
								$('#price_catalog1').val(data.price_catalog);  
								$('#link_catalog1').val(data.image_catalog);  
								$('#employee_id').val(data.id);  
								$('#add_data_Modal').modal('show');  
								
							}  
						});  
					})


					
				</script>
			<?php } ?>
		</div>

		<script type="text/javascript">
			$(".savechang").click(function(){
				var id = $(this).attr("id"); 
				var name_catalog1 =	$('#name_catalog1').val();  
				var game_catalog1 =	$('#game_catalog1').val();  
				var detail_catalog1 =	$('#detail_catalog1').val(); 
				var item_catalog1 =	$('#item_catalog1').val();   
				var price_catalog1 =	$('#price_catalog1').val();  
				var link_catalog1 =	$('#link_catalog1').val();  
				$.ajax({
					type:"POST",
					url:"./system/url/savechang.php",
					dataType:"json",  
					data:{
						id:id,
						name_catalog1:name_catalog1,
						game_catalog1:game_catalog1,
						detail_catalog1:detail_catalog1,
						item_catalog1:item_catalog1,
						price_catalog1:price_catalog1,
						link_catalog1:link_catalog1,
					},success:function(data){
						if (data.status == "success") {
							swal({
								title: "อัพเดทข้อมูล",
								text: "อัพเดทข้อมูล สำเร็จ!",
								icon: "success",
								button: "OK",
							}).then(function(){
								window.location.reload();
							})
						}else{
							swal({
								title: "อัพเดทข้อมูล",
								text: data.info,
								icon: "error",
								button: "OK",
							});
						}
					}
				}) 
			})
		</script>

	</div>
</div>

</div>


<div class="container">
	<div class="card-body mt-5">
		<div class="card-title">
			<h1 class="text-dark">สินค้าที่ขายไปแล้ว</h1>
		</div>
		<div class="container">
			<div class="row">
				<?php foreach ($checkcatalog as $row) {  ?>
					<div class="col-md-4">


						<div class="card mx mb-3" style="border-radius:10px">
							<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
								<img
								src="<?php echo $row['image_catalog']; ?>"
								class="img-fluid w-100"

								/>
								<a href="#!">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
								</a>
								<span class="d-block p-1 bg-dark text-white mx-auto btn-block"></span>
							</div>
							<div class="card-body">
								<small><strong><?php echo $row['game']; ?></strong></small>
								<h5 class="card-title mt-1"><strong><?php echo $row['name_catalog']; ?></strong></h5>
								<div class="form-outline">
									<textarea class="form-control bg-light" disabled id="textAreaExample" rows="5" style="resize:none;"><?php echo $row['detail_catalog']; ?></textarea>
								</div>

								<p class="text-center h5"><?php echo $row['price_catalog']; ?> -. บาท</p>
								<a href="#!" class="btn  btn-warning text-light btn-block checkcatalogbuy" id="<?php echo $row['id'] ?>"  style="font-size:14px">ดูสินค้าที่ขายไป</a>
								<p class="text-center h3 badge bg-danger ">ขายแล้ว</p>
							</div>
						</div>



					</div>

					<div
					class="modal fade"
					id="add_data_Modal1"
					tabindex="-1"
					aria-labelledby="exampleModalLabel"
					aria-hidden="true"
					>
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">ข้อมูลสินค้า</h5>
								<button
								type="button"
								class="btn-close"
								data-mdb-dismiss="modal"
								aria-label="Close"
								></button>
							</div>
							<div class="modal-body">
								<form>
									<!-- Email input -->
									<div class="form mb-4">
										<label class="form-label" for="form1Example1">ชื่อสินค้า</label>
										<input type="email" id="name_catalog1" disabled class="form-control" value="<?php echo   $row['name_catalog'];?>" />
									</div>

									<!-- Password input -->
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">GAME</label>
										<input type="text" id="game_catalog1" disabled class="form-control" value="<?php echo   $row['game'];?>"/>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">รายละเอียดสินค้า</label>
										<textarea class="form-control bg-light"  id="detail_catalog1" disabled rows="5" style="resize:none;"><?php echo $row['detail_catalog']; ?></textarea>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">สินค้าที่ให้</label>
										<textarea class="form-control bg-light"  id="item_catalog1" disabled rows="5" style="resize:none;"><?php echo $row['item_catalog']; ?></textarea>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">ราคาสินค้า</label>
										<input type="number" id="price_catalog1" disabled class="form-control" value="<?php echo   $row['price_catalog'];?>"/>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">LINK รูปภาพสินค้า</label>
										<input type="text" id="link_catalog1" disabled class="form-control" value="<?php echo   $row['image_catalog'];?>"/>
									</div>
									<div class="form mb-4">
										<label class="form-label" for="form1Example2">ชื่อผู้ซื้อสินค้า</label>
										<input type="text" id="name_buy1" disabled class="form-control" value="<?php echo   $row['name_buy'];?>"/>
									</div>
								</form>


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary"  data-mdb-dismiss="modal">OK</button>
							</div>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					$(".checkcatalogbuy").click(function(){
						var employee_id = $(this).attr("id"); 
						$.ajax({  
							url:"./system/url/fetch.php",  
							method:"POST",  
							data:{employee_id:employee_id},  
							dataType:"json",  
							success:function(data){  
								$('#name_catalog1').val(data.name_catalog);  
								$('#game_catalog1').val(data.game);  
								$('#detail_catalog1').val(data.detail_catalog);
								$('#item_catalog1').val(data.item_catalog);    
								$('#price_catalog1').val(data.price_catalog);  
								$('#link_catalog1').val(data.image_catalog);
								$('#name_buy1').val(data.name_buy);    
								$('#employee_id').val(data.id);  
								$('#add_data_Modal1').modal('show');  

							}  
						});  
					})
				</script>
			<?php } ?>
		</div>
	</div>

</div>
</div>



</div>
<script type="text/javascript">
	$(".submit_del").click(function(){
		var namepack = $(this).attr("namepack")
		swal({
			title: "แน่ใจหรือไม่?",
			text: "คุณต้องการลบสินค้านี้หรือไม่?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type:"POST",
					url:"./system/url/delcatalog.php",
					dataType:"json",
					data:{
						namepack:namepack,
					},success:function(data){
						if (data.status == "success") {
							swal({
								icon: 'success',
								title: 'ลบสินค้า',
								text: 'ลบสินค้า สำเร็จ!'
							}).then(function(){
								window.location.reload();
							})
						}else{
							swal({
								icon: 'error',
								title: 'ลบสินค้า',
								text: data.info
							})
						}
					}
				})
			}
		});
	})


</script>
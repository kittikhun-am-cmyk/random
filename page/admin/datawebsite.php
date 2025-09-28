<?php 
$use = new HnawStudio;
$fetchallsettingspin = $use->fetchallsettingspin();
$fetchalluseradmin = $use->fetchalluseradmin();
$fetchsettingwebsitedata = $use->fetchsettingwebsitedata('1');
$fetchsettingwebsitedata1 = $use->fetchsettingwebsitedata1();
$fetchtopupall12 = $use->fetchtopupall1();
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
				<div class="row mx-auto">
					<div class="col-xl-6">
						<div class="card w-75 mx-auto">
							<div class="card-body">
								<h5 class="card-title"><i class="fas fa-coins"></i>&nbsp;ยอดเติมเงินทั้งหมด</h5>
								<p class="card-text"><h3><?php print_r($summoeytopup['total']); ?> </h3></p>
								<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal12">ดูประวัติการเติมเงินทั้งหมด</a>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card w-75 mx-auto">
							<div class="card-body">
								<h5 class="card-title"><i class="fas fa-users"></i>&nbsp;ผู้ใช้งานทั้งหมด</h5>
								<p class="card-text"><h3><?php print_r($countuser['total']); ?></h3></p>
								<a href="/user_setting" class="btn btn-primary">จัดการ User</a>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="container">
			<div class="row mb-5 mx-auto">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<div class="text-muted">
								<h2><i class="fas fa-cogs"></i>&nbsp;ตั้งค่า Website</h2>
							</div>
							<hr>
							<form>
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">ชื่อWebsite</label>
									<input type="text" class="form-control" id="name_website1" value='<?php echo $fetchsettingwebsitedata['type1']; ?>'>
								</div>
								<div class="mb-3">
									<label for="exampleInputPassword1" class="form-label">เบอร์มือถือรับเงิน</label>
									<input type="text" class="form-control" id="phone_website1"  value="<?php echo $fetchsettingwebsitedata['type2']; ?>">
								</div>
								<a type="submit" class="btn btn-primary col-12 savedata1">บันทึก</a>
							</form>
						</div>
					</div>
					<div class="card mt-3">
						<div class="card-body">
							<div class="text-muted">
								<h2><i class="fas fa-cogs"></i>&nbsp;ตั้งค่า Website</h2>
							</div>
							<hr>
							<form>
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Link LOGO Website</label>
									<input type="email" class="form-control" id="image32" value='<?php echo $fetchsettingwebsitedata['type5']; ?>'>
								</div>
								<a type="submit" class="btn btn-primary col-12 savedata4">บันทึก</a>
							</form>

						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<div class="text-muted">
								<h2><i class="fas fa-cogs"></i>&nbsp;ตั้งค่า Website</h2>
							</div>
							<hr>
							<form>
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">สุ่มแล้วเสียครั้งละ ( เครดิต )</label>
									<input type="email" class="form-control" id="pointuse1" value='<?php echo $fetchsettingwebsitedata1['usepoint']; ?>'>
								</div>
								<div class="mb-3">
									<label for="exampleInputPassword1" class="form-label">Link เพจ</label>
									<input type="text" class="form-control" id="linkpage13" value='<?php echo $fetchsettingwebsitedata['type3']; ?>'>
								</div>
								<a type="submit" class="btn btn-primary col-12 savedata2">บันทึก</a>
							</form>
						</div>
					</div>
					<div class="card mt-3">
						<div class="card-body">
							<div class="text-muted">
								<h2><i class="fas fa-cogs"></i>&nbsp;ตั้งค่า Website</h2>
							</div>
							<hr>
							<form>
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Link รูปปกกลาง Spin</label>
									<input type="email" class="form-control" id="image55" value='<?php echo $fetchsettingwebsitedata['type4']; ?>'>
								</div>
								<a type="submit" class="btn btn-primary col-12 savedata3">บันทึก</a>
							</form>
						</div>
					</div>
				</div>
				<div class="card mt-3">
					<div class="card-body">
						<div class="text-muted">
							<h2><i class="fas fa-cogs"></i>&nbsp;ตั้งค่า Website</h2>
						</div>
						<hr>
						<form>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Link ปกหน้า Website</label>
								<input type="email" class="form-control" id="image322" value='<?php echo $fetchsettingwebsitedata['type6']; ?>'>
							</div>
							<a type="submit" class="btn btn-primary col-12 savedata6">บันทึก</a>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade table-responsive" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog table-responsive">
		<div class="modal-content table-responsive">
			<div class="modal-header table-responsive">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-striped text-center table-responsive">
					<thead class="table-responsive">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">ชื่อผู้เติม</th>
							<th scope="col">จำนวน</th>
							<th scope="col">วันที่ - เวลา</th>
						</tr>
					</thead>
					<tbody class="table-responsive">
						<?php foreach ($fetchtopupall12 as $row) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['amount']; ?></td>
								<td><?php echo $row['date']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ออก</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".savedata6").click(function(){
		const image322 = $("#image322").val();
		$.ajax({
			type:"POST",
			url:"./system/url/updatedatawebsite.php",
			dataType:"json",
			data:{image322},
			success:function(data){
				if (data.status == "success") {
					swal({
						icon: 'success',
						title: 'ระบบ',
						text: 'อัพเดทข้อมูล สำเร็จ!',
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
	$(".savedata4").click(function(){
		const image32 = $("#image32").val();
		$.ajax({
			type:"POST",
			url:"./system/url/updatedatawebsite.php",
			dataType:"json",
			data:{image32},
			success:function(data){
				if (data.status == "success") {
					swal({
						icon: 'success',
						title: 'ระบบ',
						text: 'อัพเดทข้อมูล สำเร็จ!',
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
	$(".savedata3").click(function(){
		const image55 = $("#image55").val();
		$.ajax({
			type:"POST",
			url:"./system/url/updatedatawebsite.php",
			dataType:"json",
			data:{image55},
			success:function(data){
				if (data.status == "success") {
					swal({
						icon: 'success',
						title: 'ระบบ',
						text: 'อัพเดทข้อมูล สำเร็จ!',
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
	$(".savedata2").click(function(){
		const pointuse1 = $("#pointuse1").val();
		const linkpage13 = $("#linkpage13").val();
		$.ajax({
			type:"POST",
			url:"./system/url/updatedatawebsite.php",
			dataType:"json",
			data:{pointuse1,linkpage13},
			success:function(data){
				if (data.status == "success") {
					swal({
						icon: 'success',
						title: 'ระบบ',
						text: 'อัพเดทข้อมูล สำเร็จ!',
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
	$(".savedata1").click(function(){
		const name_website1 = $("#name_website1").val();
		const phone_website1 = $("#phone_website1").val();
		$.ajax({
			type:"POST",
			url:"./system/url/updatedatawebsite.php",
			dataType:"json",
			data:{name_website1,phone_website1},
			success:function(data){
				if (data.status == "success") {
					swal({
						icon: 'success',
						title: 'ระบบ',
						text: 'อัพเดทข้อมูล สำเร็จ!',
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
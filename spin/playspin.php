<?php

$use = new HnawStudio;

$getdataslice_wheel = $use->getdataslice_wheel($_GET['namespin']);

$searchdataspin = $use->searchdataspin($_GET['namespin']);

$resultuser = $use->resultuser($_SESSION['id']);

$configweb = $use->configweb();

$resultspin = $use->resultspin($_GET['namespin']);

$fetchAllspin = $use->fetchAllspin();

$fetchsettingwebsitedata = $use->fetchsettingwebsitedata('1');

?>

<div class="page-banner-section-lg bg-image" data-bg="./assets/bg.rahadrare.png" style="background-image: url(./assets/bg-sub.jpg);">

	<!--<div class="page-banner-section-lg" style="background-color: #009cde;background-image: radial-gradient(circle farthest-side at center bottom,#009cde,#003087 125%);">-->

		<div class="container">

			<div class="row">

				<div class="col">

					<div class="page-banner text-center">

						<h2 class="white"><a href="#">เกมสุ่มของ</a></h2>

						<ul class="page-breadcrumb">

							<li><a href="?page=home">Home</a></li>

							<li>play_spin</li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="card my-5 shadow-lg col-xl-7 mx-auto mt-5 table-responsive">

		<div class="card-body text-center col-12 mx-auto table-responsive">

			<h1 style="color:#000000"></h1>

			<br>

			<div class="superwheel"></div>

			<?php if (!empty($_SESSION['id'])) {  ?>

				<p class="text-center text-muted"><i class="fas fa-coins"></i>&nbsp;เครดิตคงเหลือ : <b><?php echo $resultuser['point']; ?> เครดิต</b></p>

			<?php }else{ ?>

				<p class="text-center text-muted">กรุณาเข้าสู่ระบบ</b></p>

			<?php } ?>

			<a class="spin-button btn btn-warning mark text-white col-5" spin-buttonid="<?php echo $_GET['namespin']; ?>" style="background-color:#FFCC00;border-radius:25px;">สุ่มเลย  <?php echo $searchdataspin['point']; ?> เครดิต</a>

			<hr>

			<div class="container">

				<div class="row">

					<div class="col-6">	

						<a style="border-radius:25px;" class="btn col-12 btn-danger text-white mt-3" href="/select_topup"><i class="fas fa-coins"></i>&nbsp;เติมเงินตอนนี้</a>

					</div>

					<div class="col-6">

						<a style="border-radius:25px;" class="btn col-12 btn-info text-white mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-search"></i>&nbsp;ดูของในสปิน</a>

					</div>

				</div>



			</div>

		</div>

	</div>

	<style type="text/css">

		.btn-mark {

			/* background-color: #440614; */

			background-color: #F3CF38;

		}

		.btn {

			display: inline-block;

			font-weight: 400;

			text-align: center;

			white-space: nowrap;

			vertical-align: middle;

			-webkit-user-select: none;

			-moz-user-select: none;

			-ms-user-select: none;

			user-select: none;

			border: 1px solid transparent;

			padding: .375rem .75rem;

			font-size: 1rem;

			line-height: 1.5;

			outline: 0;

			border-radius: .25rem;

			transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;

		}

	</style>

	<div class="container">

		<div class="card mb-5 table-responsive">

			<div class="card-body text-muted">

				<label class="h2 text-muted"><i class="fas fa-history"></i>&nbsp;ประวัติการสุ่ม</label>

				<hr>

				<table class="table text-muted">

					<thead>

						<tr class="text-muted">

							<th scope="col">ชื่อผู้ใช้</th>

							<th scope="col">ของ</th>

							<th scope="col">ของที่สุ่มได้</th>

							<th scope="col">วัน - เวลา</th>

						</tr>

					</thead>

					<tbody>

						<?php foreach ($fetchAllspin as $row) {  



							?>



							<tr class="text-muted">

								<td><?php echo $row['name_get']; ?></td>

								<td><?php echo $row['type']; ?></td>

								<td><?php if ($row['type'] == "point") {

									$row['item'] .= " เครดิต";

									echo $row['item'];

								}else{

									echo $row['item'];

								} ?></td>

								<td><?php echo $row['date']; ?></td>

							</tr>

						<?php } ?>

					</tbody>

				</table>

			</div>

		</div>

	</div>

	<div class="modal fade table-responsive" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

								<th scope="col">รูปภาพ</th>

								<th scope="col">ชื่อของ</th>

							</tr>

						</thead>

						<tbody class="table-responsive">

							<?php foreach ($resultspin as $row) { ?>

								<tr>

									<td><img src="<?php echo $row['image']; ?>" width="70"></td>

									<td><?php echo $row['message']; ?></td>

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

		$('.superwheel').superWheel({

			slices: [

			<?php foreach ($getdataslice_wheel as $data) { ?>

				{

					text: "<?php echo $data['image']; ?>",

					value: <?php echo $data['id']; ?>,

					message: "<?php echo $data['message']; ?>",

					background: "#00A005 ",

					color: "#00A005 "

				},

			<?php } ?>

			],

			width: 600,

			frame: 1,

			type: "spin",

			text: {

				type:"image",

				color: "#333",

				size: 10,

				offset: 4,

				orientation: "h",

				arc: false

			},

			line: {
				width: 2,
				color: "#001B2C  "

			},

			outer: {
				width: 6,
				color: "#001B2C "

			},

			inner: {

				color: "#001B2C "

			},

			center: {

				rotate: true,

				image: {

					url: "<?php echo $fetchsettingwebsitedata['type4']; ?>"

				}

			},

			marker: {

				animate: "true"

			}

		});

		var tick = new Audio('https://www.22codes.com/demo/javascript/superwheel/dist/tick.mp3');

		$(document).on('click','.spin-button',function(e){

			e.preventDefault();	

			var id = $(this).attr("spin-buttonid")

			$.ajax({

				type:'post',

				data:{id},

				url:'./spin/spin2.php',

			}).then((res)=>{

				var obj = JSON.parse(res);

				if (obj.status == "success"){

					$('.superwheel').superWheel('start','value',obj.spin_value);

					setTimeout(function(){

						$('#pointnow').html(obj.pointnow);

					}, 5000);

				}else{

					swal({

						icon: 'error',

						title: 'ระบบ',

						text: obj.info,

					})

				}

			});

		});

		$('.superwheel').superWheel('onComplete',function(results){

			swal({

				icon: 'success',

				title: 'คุณได้รับ',

				text: results.message,

			}).then(function(){

				window.location.reload();

			})

			$('.spin-button').removeAttr("disabled");

			console.log(results)

		});

		$('.superwheel').superWheel('onStep',function(results){



			if (typeof tick.currentTime !== 'undefined')

				tick.currentTime = 0;



			tick.play();



		});



	</script>


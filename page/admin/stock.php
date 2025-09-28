<?php 

$use = new HnawStudio;

$fetchcatalog = $use->fetchcatalog();

?>

<div class="container">

	<div class="card mt-5">

		<div class="card-body">

			<div class="container">

				<div class="row">

					<?php if (empty($fetchcatalog)) {  ?>

						<h1 class="text-center mt-5 mb-5"><i class="fas fa-info-circle"></i>&nbsp;ยังไม่มีสินค้าที่เป็นรูปแบบ Item</h1>

					<?php }else{ ?>

						<?php foreach ($fetchcatalog as $row) { ?>

							<div class="col-xl-4 mb-3 mt-3 ">

								<div class="card" style="width: 15rem;">

									<img src="<?php echo $row['image']; ?>" class="card-img-top" alt="...">

									<div class="card-body">

										<h5 class="card-title"><?php echo $row['message']; ?></h5>

										<a href="/add_stock?id=<?php echo $row['message']; ?>" class="btn btn-primary col-12">เพิ่มของ</a>

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
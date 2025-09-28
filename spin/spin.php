<?php

$use = new HnawStudio;

$fetchallsettingspin = $use->fetchallsettingspin();

?>

<div class="page-banner-section-lg bg-image" data-bg="./assets/bg.rahadrare.png" style="background-image: url(./assets/bg-sub.jpg);">

	<!--<div class="page-banner-section-lg" style="background-color: #009cde;background-image: radial-gradient(circle farthest-side at center bottom,#009cde,#003087 125%);">-->

		<div class="container">

			<div class="row">

				<div class="col">

					<div class="page-banner text-center">

						<h2 class="white"><a href="#">เลือกเกมสุ่มของ</a></h2>

						<ul class="page-breadcrumb">

							<li><a href="?page=home">Home</a></li>

							<li>SELECT SPIN</li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="card my-5 shadow-lg col-xl-7 mx-auto mt-5 table-responsive">

		<div class="card-body">

			<div class="container">

				<div class="row">

					<?php foreach ($fetchallsettingspin as $row) { ?>

						<div class="col-xl-4">

							<div class="single-banner-item text-center mx-auto">

								<div class="banner-image text-center mx-auto mb-3">

									<a href="/playspin?namespin=<?php echo $row['name_spin']; ?>"><img style="display: block;

									margin-left: auto;

									margin-right: auto;

									width:100%;" src="<?php echo  $row['image']; ?>"  class="img-responsive" alt="..."></a>

								</div>

							</div>

						</div>

					<?php } ?>

				</div>

			</div>

		</div>

	</div>

	<style type="text/css">

		.single-banner-item .banner-image a img {

			width: 80%;

			-webkit-border-radius: 5px;

			transition: all .5s ease;

			border-radius: 25px;

		}

		.single-banner-item {

			position: relative;

		}

		.single-banner-item {

			position: relative

		}



		.single-banner-item .banner-image a {

			display: block;

		}



		.single-banner-item .banner-image a img {

			width: 500px;

			-webkit-border-radius: 5px;

			transition: all .5s ease;

			border-radius: 25px;

		}



		.single-banner-item .banner-image a:hover img {

    /*-webkit-filter: brightness(120%);

    filter: brightness(120%);*/

    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */

    filter: grayscale(100%);

    box-shadow: 0 px 0 6px rgba(0,0,0,.7);

    /*-webkit-transform: scale(1.02);

    transform: scale(1.02)*/

    border-radius: 15px;

}



</style>
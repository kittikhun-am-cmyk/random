<!-- Rahadrare -->

<!DOCTYPE html>

<html>

<head style="overflow-x:hidden;">

	<?php 

	include 'system/class.php';

	$use = new HnawStudio;

	$fetchsettingwebsitedata = $use->fetchsettingwebsitedata('1');

	?>

	<meta charset="utf-8">

	<title><?php echo $fetchsettingwebsitedata['type1']; ?> | ซื้อ - ขายไอดีเกมออนไลน์ บัตรเติมเกม ไอเทมโค้ตเกมรวมไปถึง ระบบสุ่มรางวัล มากมาย - freeone-zone</title>



	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image" href="<?php echo $fetchsettingwebsitedata['type5']; ?>" />

	<div id="fb-root"></div>

	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="QymvDpEg"></script>

<style type="text/css">
.snowflake {
    position: fixed;
    top: -10%;
    z-index: 9999;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    -webkit-animation-name: snowflakes-fall,snowflakes-shake;
    -webkit-animation-duration: 10s,3s;
    -webkit-animation-timing-function: linear,ease-in-out;
    -webkit-animation-iteration-count: infinite,infinite;
    -webkit-animation-play-state: running,running;
    animation-name: snowflakes-fall,snowflakes-shake;
    animation-duration: 10s,3s;
    animation-timing-function: linear,ease-in-out;
    animation-iteration-count: infinite,infinite;
    animation-play-state: running,running;
}
	.snowflake {
		color: #fff;
		font-size: 1em;
		font-family: Arial;
		text-shadow: 0 0 1px #000;
	}
	.card-header {
		background-color: transparent;
		-webkit-box-align: stretch;
		-ms-flex-align: stretch;
		align-items: stretch;
		-webkit-box-shadow: 0 0.125em 0.25em rgb(10 10 10 / 10%);
		box-shadow: 0 0.125em 0.25em rgb(10 10 10 / 10%);
	}
	@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%{-webkit-transform:translateX(0px);transform:translateX(0px)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}100%{-webkit-transform:translateX(0px);transform:translateX(0px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%{transform:translateX(0px)}50%{transform:translateX(80px)}100%{transform:translateX(0px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}
	/* Demo Purpose Only*/
	.demo {
		font-family: 'Raleway', sans-serif;
		color:#fff;
		display: block;
		margin: 0 auto;
		padding: 15px 0;
		text-align: center;
	}
	.demo a{
		font-family: 'Raleway', sans-serif;
		color: #000;        
	}
</style>

</head>

<body style="overflow-x:hidden;"> 
<div class="snowflakes" aria-hidden="true">
<div class="snowflake">
❅
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❄
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❄
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❄
</div>
</div>
	<?php

	session_start();

	include 'assets/style.php';

	include 'assets/navbar.php';

	$resultuser = $use->resultuser($_SESSION['id']);

	use AltoRouter as Router;



	require __DIR__.'/vendor/autoload.php';



	$router = new Router();



	if (empty($_SESSION['id'])) {

		$router->map( "GET", "/register", function() {

			include 'page/register.php';

		} );

		$router->map( "GET", "/login", function() {

			include 'page/login.php';

		} );

	}else{

		$router->map( "GET", "/", function() {

			include 'page/home.php';

		} );



		$router->map( "GET", "/home", function() {

			include 'page/home.php';

		} );

		$router->map( "GET", "/play_spin", function() {

			include 'spin/spin.php';

		} );

		$router->map( "GET", "/playspin", function() {

			include 'spin/playspin.php';

		} );

		$router->map( "GET", "/changpassword", function() {

			include 'page/changpassword.php';

		} );

		$router->map( "GET", "/topup", function() {

			include 'page/topup.php';

		} );

		$router->map( "GET", "/select_topup", function() {

			include 'page/changtopup.php';

		} );
		$router->map( "GET", "/selectcatalog", function() {

			include 'page/selectcatalog.php';

		} );

	}

	if ($resultuser['rank'] == "1") {

		$router->map( "GET", "/setting_website", function() {

			include 'page/admin/setting_web.php';

		} );

		$router->map( "GET", "/stock", function() {

			include 'page/admin/stock.php';

		} );

		$router->map( "GET", "/add_stock", function() {

			include 'page/admin/add_stock.php';

		} );

		$router->map( "GET", "/fetch_spin", function() {

			include 'page/admin/fetch_spin.php';

		} );

		$router->map( "GET", "/user_setting", function() {

			include 'page/admin/user_setting.php';

		} );

		$router->map( "GET", "/fetch_datauser", function() {

			include 'page/admin/fetch_datauser.php';

		} );

		$router->map( "GET", "/datawebsite", function() {

			include 'page/admin/datawebsite.php';

		} );

		$router->map( "GET", "/promote", function() {

			include 'page/admin/addpromote.php';

		} );

		$router->map( "GET", "/promote_edit", function() {

			include 'page/admin/fetch_promoteuser.php';

		} );

		$router->map( "GET", "/fetch_spin1", function() {

			include 'page/admin/fetch_spin1.php';

		} );

		$router->map( "GET", "/add_stockspin", function() {

			include 'page/admin/add_stockspin.php';

		} );
		$router->map( "GET", "/addcatalog", function() {

			include 'page/admin/addcatalog.php';

		} );

	}











	$match = $router->match();



	if( is_array($match) && is_callable( $match['target'] ) ) {

		call_user_func_array( $match['target'], $match['params'] );

	} else {

		include 'page/login.php';

	}

	?>

	

</body>



</html>

<footer  style="background-color:#20c997" class="footer-section section mt-5">

	<!--Footer Top start-->

	<div class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-15 pb-xs-5">

		<div class="container">

			<div class="row mt-5 mb-5">



				<!--Footer Widget start-->

				<div class="footer-widget col-lg-4 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35 mt-5">

                    <!--<div class="footer-logo">

							<a href="https://www.IDFF-Shop.Com.in.th"><img src="https://www.IDFF-Shop.Com.in.th/assets/images/logo.png?v=3" width="150" height="75" alt=""></a>

						</div>-->

						<h4 class="title"><span class="text">About Us</span></h4>

						<div class="footer-p">

							<!--<p><i class="fas fa-exclamation-circle"></i> เกี่ยวกับเรา</p>-->

							<p>เว็บเติมเกมออนไลน์ สุ่มของรางวัลสุดแรร์มากมาย ออกง่ายได้จริง  ครบวงจร เปิดให้บริการแล้ววันนี้</p>

						</div>

					</div>

					<!--Footer Widget end-->





					<!--Footer Widget start-->

					<div class="footer-widget col mb-40 mb-xs-35 mt-5">

						<h4 class="title"><span class="text"></span></h4>

						<ul class="ft-menu">

							<!-- <li><a href="tel:012-345-6789" class="mb-15"><i class="fas fa-mobile-alt"></i> 012-345-6789</a></li> -->

							<!-- <li><a href="" target="_blank" class="mb-15"><i class="fab fa-line"></i> 012-345-6789</a></li> -->

							<li><a href="#" class="mb-15"></a></li>

						</ul>

					</div>

					<!--Footer Widget end-->





					<!--Footer Widget start-->

					<div class="footer-widget col mb-40 mb-xs-35 mt-5">

						<h4 class="title"><span class="text">Contact ?</span></h4>

						<ul class="ft-menu">

							<li><a href="#" class="mb-15"><i class="fas fa-mobile-alt"></i> 012-345-6789</a>

							</ul>

						</div>

						<!--Footer Widget end-->



						<!--Footer Widget start-->

						<div class="footer-widget col-lg-4 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35 mt-5">

							<h4 class="title"><span class="text">Facebook Fanpage</span></h4>

							<div class="fb-page" data-href="<?php echo $fetchsettingwebsitedata['type3']; ?>" data-tabs="timeline" data-width="" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $fetchsettingwebsitedata['type3']; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $fetchsettingwebsitedata['type3']; ?>">Luckyff-Shop</a></blockquote></div>

						<!--Footer Widget end-->

					</div>

				</div>

			</div>

			<!--Footer Top end-->



			<!--Footer bottom start-->

			<div class="footer-bottom section p-3 bs-teal" style="background-color: #28a745;">

				<div class="container">

					<div class="row no-gutters">

						<div class="col-12 pt-25 pb-25">

							<div class="row justify-content-between align-items-center text-center">

								<div class="col-lg-12 col-md-12 col-sm-12">

									<div class="copyright-f">

										<p>CopyRight © <?php echo $fetchsettingwebsitedata['type1']; ?> © 2021 AllRight.</p>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--Footer bottom end-->



		</footer>

		<style type="text/css">

			.swal2-confirm.swal2-styled {

				border-radius: .25em;

				background: initial;

				background-color: #28a745;

				font-size: 1em;

			}

		</style>


		<!-- ระบบขายไอดีเกม

		พัฒนาโดย HnawStudio

		ซื้อระบบได้ที่ https://dev.hnawstudio.com/Script/69 -->
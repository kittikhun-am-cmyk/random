<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard WEB - HNAWSTUDIO
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
<script>
    function showClockRealTime() {
        var d = new Date();
        document.getElementById("div").innerHTML = "เวลาปัจจุบัน คือ "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
    }
    setInterval("showClockRealTime()", 1000);
</script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="/" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="/" class="simple-text logo-normal">
          Dashboard By HNAWSTUDIO
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li>
            <a href="./icons.html">
              <i class="nc-icon nc-diamond"></i>
              <p>Icons</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="nc-icon nc-pin-3"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="nc-icon nc-tile-56"></i>
              <p>Table List</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Typography</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">WEB ALL</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
<a class="navbar-brand" href="javascript:;"><div id="div"></div></a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">

          					<div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL($url) {


							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							    

							}

							checkURL("https://hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL1($url1) {


							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url1);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url1 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url1 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							    

							}

							checkURL1("https://wallet.hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL2($url2) {

							
							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url2);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url2 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url2 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							    

							}

							checkURL2("https://store.hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL3($url3) {

							
							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url3);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                     <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url3 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url3 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							    

							}

							checkURL3("https://payment.hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL4($url4) {

							
							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url4);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url4 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url4 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							   

							}

							checkURL4("https://dev.hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL6($url6) {

							
							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url6);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                     <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url6 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url6 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							    

							}

							checkURL6("https://client.hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL7($url7) {

							
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url7);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url7 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url7 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							    

							}

							checkURL7("https://cdn.hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL8($url8) {

							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url8);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                    <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url8 
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url8 
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							  

							}

							checkURL8("https://app.hnawstudio.com/");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL9($url9) {

							
							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url9);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url9
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url9
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							   
							}

							checkURL9("https://api.hnawstudio.com");

							?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               <?php
							function checkURL10($url10) {

							
							//array of valid http codes
							$validStatus=array(200,301,302);
							//minimum filesize in bytes
							$minFileSize=100;

							if(!function_exists('curl_init')) die("Curl PHP package not installed!");

							$ch=curl_init();
							curl_setopt($ch, CURLOPT_URL, $url10);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response=curl_exec($ch);
							$info=curl_getinfo($ch);
							$statusCode=intval($info['http_code']);
							$filesize=$info['size_download'];

							if(!in_array($statusCode,$validStatus) || $filesize<$minFileSize) {
							    $message = "
							    <div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-danger'>
					                      <i class='nc-icon nc-minimal-down text-danger'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web ERROR - Status Code: $statusCode, Filesize: $filesize\r\n</p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url10
					                </div>
					              </div>
					            </div>";
							    echo($message);
							}else{
								$message1 = "

							<div class='card card-stats'>
					              <div class='card-body '>
					                <div class='row'>
					                  <div class='col-5 col-md-4'>
					                    <div class='icon-big text-center icon-success'>
					                      <i class='nc-icon nc-minimal-up text-success'></i>
					                    </div>
					                  </div>
					                  <div class='col-7 col-md-8'>
					                    <div class='numbers'>
					                      <p class='card-category'>Web The system works normally</p>
					                      <p class='card-title'><p>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <div class='card-footer '>
					                <hr>
					                <div class='stats'>
					                  $url10
					                </div>
					              </div>
					            </div>";
							    	echo($message1);
							    }
							   
							}

							checkURL10("https://link.hnawstudio.com");

							?>
                            </div>

        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <!-- <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul> -->
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> HNAWSTUDIO
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>

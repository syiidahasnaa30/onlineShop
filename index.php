<?php
	session_start();
    require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Toko KU</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="themes/css/bootstrappage.css" rel="stylesheet" />

	<!-- global styles -->
	<link href="themes/css/flexslider.css" rel="stylesheet" />
	<link href="themes/css/main.css" rel="stylesheet" />

	<!-- scripts -->
	<script src="themes/js/jquery-1.7.2.min.js"></script>
	<script src="admin/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="themes/js/superfish.js"></script>
	<script src="themes/js/jquery.scrolltotop.js"></script>
	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<div id="top-bar" class="container">
		<div class="row">
			<div class="span4">
				<h4>Toko KU</h4>
			</div>
			<div class="span8">
				<div class="account pull-right">
					<ul class="user-menu">
						<li><a href="index.php?halaman=produk">Home</a></li>
						<li><a href="index.php?halaman=keranjang">Keranjang</a></li>
						<li><a href="index.php?halaman=checkout">Checkout</a></li>
						<?php if(isset($_SESSION['pelanggan'])){?>
						<li><a href="index.php?halaman=logout">Logout</a></li>
						<?php }else{ ?>
						<li><a href="index.php?halaman=login">Login</a></li>
						<li><a href="index.php?halaman=daftar">Daftar Akun</a></li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="wrapper" class="container">
		<section class="navbar main-menu">
			<div class="navbar-inner main-menu">
				<a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo"
						alt=""></a>
			</div>
		</section>
		<section class="homepage-slider" id="home-slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="themes/images/carousel/rsz_toko.jpg" alt="" />
					</li>
					<li>
						<img src="themes/images/carousel/rsz_banner-2.jpg" alt="" />
						<div class="intro">
							<h1>Mid season sale</h1>
							<p><span>Up to 50% Off</span></p>
							<p><span>On selected items online and in stores</span></p>
						</div>
					</li>
				</ul>
			</div>
		</section>
		<section class="main-content">
			<?php
                    if(isset($_GET['halaman'])){
                        if($_GET['halaman']=="produk")
                        {
                            require_once('produk.php');
						}elseif ($_GET['halaman']=="detail") {
							require_once('detail.php');
						}
						elseif ($_GET['halaman']=="keranjang") {
							require_once('keranjang1.php');
						}
						elseif ($_GET['halaman']=="login") {
							require_once('login.php');
						}
						elseif ($_GET['halaman']=="daftar") {
							require_once('daftar.php');
						}
						elseif ($_GET['halaman']=="checkout") {
							require_once('checkout.php');
						}
						elseif ($_GET['halaman']=="logout") {
							require_once('logout.php');
						}
						elseif ($_GET['halaman']=="nota") {
							require_once('nota.php');
						}
                    }
                    else{
                        require_once('produk.php');
                    }
                ?>
		</section>
		<section id="footer-bar">
			<div class="row">
				<div class="span3">
					<h4>Navigation</h4>
					<ul class="nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?halaman=keranjang">Keranjang Belanja</a></li>
						
					</ul>
				</div>
				<div class="span4">
					<h4>Akun Saya</h4>
					<ul class="nav">
						<li><a href="index.php?halaman=login">Login</a></li>
						<li><a href="index.php?halaman=daftar">Daftar Akun</a></li>
						<li><a href="index.php?halaman=logout">Logout</a></li>
					</ul>
				</div>
				<div class="span5">
					<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
				</div>
			</div>
		</section>
	</div>
	<script src="themes/js/common.js"></script>
	<script src="themes/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
		$(function () {
			$(document).ready(function () {
				$('.flexslider').flexslider({
					animation: "fade",
					slideshowSpeed: 4000,
					animationSpeed: 600,
					controlNav: false,
					directionNav: true,
					controlsContainer: ".flex-container" // the container that holds the flexslider
				});
			});
		});
	</script>
</body>

</html>
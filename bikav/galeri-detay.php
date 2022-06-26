<?php 
@session_start();
@ob_start();
define("DATA","data/");
define("PAGE","include/");
define("SINIF","class/");
include_once(DATA."connection.php");
include("getdata.php");

$id = $_GET["id"];

$sorgu=$vt->prepare('SELECT *FROM fotografgalerisi WHERE id=?');
$sorgu->execute(array($id));
$galeridetay=$sorgu-> fetch(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="Keywords" content="Bitlis Kalkınma Vakfı, Bitlis, Bikav, ">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Author" content="Göktürk DOĞAN">
	<meta name="Description" content="Bitlis Kalkınma Vakfı">
	<!-- title -->
	<title><?php echo $galeridetay["baslik"] ?></title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    <?php
    include_once(DATA."nav.php");
    ?>
	
	
	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fotoğraf detayları</p>
						<h1><?php echo $galeridetay["baslik"] ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?php echo $galeridetay["resim"] ?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h2><?php echo $galeridetay["baslik"] ?></h2>
						<p class="">   <?php echo $galeridetay["tarih"] ?>  </p>
						<p><?php echo $galeridetay["metin"] ?></p>
						<div class="single-product-form">
							<a href="galeri.php" class="cart-btn"><i class="fas fa-plus"></i> Galeri Sayfası</a>
							<p><strong>Etiketler:  </strong><?php echo $galeridetay["anahtar"] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->



    <?php
    include_once(DATA."footer.php");
    ?>
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>
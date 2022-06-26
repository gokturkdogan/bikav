<?php 
@session_start();
@ob_start();
define("DATA","data/");
define("PAGE","include/");
define("SINIF","class/");
include_once(DATA."connection.php");
include("getdata.php");

$id = $_GET["id"];

$sorgu=$vt->prepare('SELECT *FROM vakifduyurulari WHERE id=?');
$sorgu->execute(array($id));
$duyurudetay=$sorgu-> fetch(PDO::FETCH_ASSOC); 

$sorgu1=$vt->prepare('SELECT *FROM vakifduyurulari WHERE durum=1 ORDER BY id DESC LIMIT 3');
$sorgu1->execute();
$duyurubenzer=$sorgu1-> fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Keywords" content="Bitlis Kalkınma Vakfı, Bitlis, Bikav, ">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Author" content="Göktürk DOĞAN">
	<meta name="Description" content="Bitlis Kalkınma Vakfı">

	<!-- title -->
	<title><?php echo $duyurudetay["baslik"] ?></title>

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
						<p>Duyuru detayları</p>
						<h1><?php echo $duyurudetay["baslik"] ?></h1>
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
						<img src="<?php echo $duyurudetay["resim"] ?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h2><?php echo $duyurudetay["baslik"] ?></h2>
						<p class="">   <?php echo $duyurudetay["tarih"] ?>  </p>
						<p><?php echo $duyurudetay["metin"] ?></p>
						<div class="single-product-form">
							<a href="vakifduyurulari.php" class="cart-btn"><i class="fas fa-plus"></i> Duyurular Sayfası</a>
							<p><strong>Etiketler:  </strong><?php echo $duyurudetay["anahtar"] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Benzer</span> Duyurular</h3>
						
					</div>
				</div>
			</div>
			<div class="row">
			<?php foreach($duyurubenzer as $duyuru){?>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="<?= $duyuru->resim?>" alt=""></a>
						</div>
						<h3><?= $duyuru->baslik?></h3>
						<p class="product-price"><span><?= $duyuru->aciklama?></span> </p>
						<a href="vakifduyurulari.php" class="cart-btn"><i class="fas fa-plus"></i> Duyurular Sayfası</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- end more products -->

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
<?php
@session_start();
@ob_start();
define("DATA", "data/");
define("PAGE", "include/");
define("SINIF", "class/");
include_once(DATA . "connection.php");
include("getdata.php");

$sorgu=$vt->prepare('SELECT *FROM projelerimiz WHERE durum=1');
$sorgu->execute();
$projeler=$sorgu-> fetchAll(PDO::FETCH_OBJ);
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
	<title>Projelerimiz</title>

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
include_once(DATA . "nav.php");
?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Küresel Vizyon & Yerel Kalkınma</p>
						<h1>Projelerimiz</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">



			<div class="row product-lists">
            <?php foreach($projeler as $proje){?>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href=""><img src="<?= $proje->resim?>" alt=""></a>
						</div>
						<h3><?= $proje->baslik?></h3>
						<p class="product-price"><span><?= $proje->aciklama?></span></p>
						<a href="proje-detay.php?id=<?= $proje->ID ?>" class="cart-btn"><i class="fas fa-plus"></i>Devamı</a>
					</div>
				</div>	
                <?php } ?>
			</div>

		</div>
	</div>
	<!-- end products -->

    <?php 
include_once(DATA . "footer.php");

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
<?php 
@session_start();
@ob_start();
define("DATA","data/");
define("PAGE","include/");
define("SINIF","class/");
include_once(DATA."connection.php");
include("getdata.php");

$id = $_GET["id"];

$sorgu=$vt->prepare('SELECT *FROM bitlishaberleri WHERE id=?');
$sorgu->execute(array($id));
$haberler=$sorgu-> fetch(PDO::FETCH_ASSOC); 

$sorgu1=$vt->prepare('SELECT *FROM bitlishaberleri ORDER BY id DESC LIMIT 5');
$sorgu1->execute();
$haberbenzer=$sorgu1-> fetchAll(PDO::FETCH_OBJ);
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
	<title><?php echo $haberler["baslik"] ?></title>

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
						<p>Haber Detayları</p>
						<h1><?php echo $haberler["baslik"] ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-article-section">
						<div class="single-article-text">
							<div class="single-artcile-bg"><img style="width:100%;height:100%" src="<?php echo $haberler["resim"] ?>"></div>
							<p class="blog-meta">
								
								<span class="date"><i class="fas fa-calendar"></i> <?php echo $haberler["tarih"] ?></span>
							</p>
							<h2><?php echo $haberler["baslik"] ?></h2>
							<p><?php echo $haberler["metin"] ?></p>
						</div>

					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="recent-posts">
							<h4>Güncel Haberler</h4>
							<ul>
							<?php foreach($haberbenzer as $haber){?>
								<li><a href="bitlishaber-detay.php?id=<?= $haber->ID ?>"><?= $haber->baslik ?></a></li>
								<?php } ?>
							</ul>
						</div>
						<div class="tag-section">
							<h4>Etiketler</h4>
							<ul>
							<?php foreach($haberbenzer as $haber){?>
								<li><a href="bitlishaberleri.php"><?= $haber->anahtar ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single article section -->

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
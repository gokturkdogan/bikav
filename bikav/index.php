<?php 
@session_start();
@ob_start();
define("DATA","data/");
define("PAGE","include/");
define("SINIF","class/");
include_once(DATA."connection.php");
include("getdata.php");
 
$sorgu=$vt->prepare('SELECT *FROM fotografgalerisi WHERE durum=1 ORDER BY id DESC LIMIT 3');
$sorgu->execute();
$gallery=$sorgu-> fetchAll(PDO::FETCH_OBJ);

$sorgu2=$vt->prepare('SELECT *FROM vakifduyurulari WHERE durum=1 ORDER BY id DESC LIMIT 3');
$sorgu2->execute();
$duyurular=$sorgu2-> fetchAll(PDO::FETCH_OBJ);

$sorgu3=$vt->prepare('SELECT *FROM vakifhaberleri WHERE durum=1 ORDER BY id DESC LIMIT 3');
$sorgu3->execute();
$haberler=$sorgu3-> fetchAll(PDO::FETCH_OBJ);
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
	<title>BİKAV | Anasayfa</title>

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
	

	
	

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Küresel Vizyon & Yerel Kalkınma</p>
							<h1>Bitlis Kalkınma Vakfı</h1>
							<div class="hero-btns">
								<a href="vakfimiz.php" class="boxed-btn">Vakıf Sayfası</a>
								<a href="iletisim.php" class="bordered-btn">İletişim</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->



	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Fotoğraf</span> Galerisi</h3>
						<p>Yurdumuzdan ve Etkinliklerimizden Fotoğraflar.</p>
					</div>
				</div>
			</div>

			<div class="row">
            <?php foreach($gallery as $photo){?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="galeri-detay.php?id=<?= $photo->ID ?>"><div class="latest-news-bg news-bg-2"><img style="width:100%;height:100%" src="<?= $photo->resim?>"></div></a>
						</div>
						<h3><?= $photo->baslik?></h3>
						<p class="product-price"><span><?= $photo->aciklama?></span>  </p>
						<a href="galeri-detay.php?id=<?= $photo->ID ?>" class="cart-btn"> Devamı...</a>
					</div>
				</div>
                <?php } ?>
			</div>
		</div>
	</div>
	<!-- end product section -->

	

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Vakıf</span> Duyurular</h3>
					
					</div>
					<div class="testimonial-sliders">
                    <?php foreach($duyurular as $duyuru){?>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="<?= $duyuru->resim?>" alt="">
							</div>
							<div class="client-meta">
								<h3><?= $duyuru->baslik?>  <span></span></h3>
								<p class="testimonial-body">
									<?= $duyuru->aciklama?>
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
                        <?php } ?>
							
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=_C--4MttmQM" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">2008</p>
						<h2>Bitlis <span class="orange-text">Kalkınma Vakfı</span></h2>
						<p>Geleceğin Bitlisini tasarlayan  öncü, Ulusal ve Uluslar arası ortamlarda söz sahibi olabilen;
							gelişime açık , yaratıcı ve topluma hizmeti ilke edinen, ayrıca toplumsal çıkarları gözeten bir vakıf olmaktır.</p>
						
						<a href="vakfimiz.php" class="boxed-btn mt-4">Fazlası</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	
	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Güncel</span> Haberler</h3>
						<p>Yurdumuzdan ve İlimizden Güncel Haberler.</p>
					</div>
				</div>
			</div>

			<div class="row">
            <?php foreach($haberler as $haber){?>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="haber-detay.php?id=<?= $haber->ID ?>"><div style="text-align: center;" class="latest-news-bg news-bg-2"><img style="width: 100%;height:100%;" src="<?= $haber->resim?>"></div></a>
						<div class="news-text-box">
							<h3><a href="haber-detay.php?id=<?= $haber->ID ?>"><?= $haber->baslik?></a></h3>
							<p class="blog-meta">
								
								<span class="date"><i class="fas fa-calendar"></i><?= $haber->tarih?></span>
							</p>
							<p class="excerpt"><?= $haber->aciklama?></p>
							<a href="haber-detay.php?id=<?= $haber->ID ?>" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
                <?php } ?>
				
			
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a style="margin-bottom:40px" href="vakifhaberleri.php" class="boxed-btn">Haber Sayfası</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	

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

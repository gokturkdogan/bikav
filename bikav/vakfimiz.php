<?php
@session_start();
@ob_start();
define("DATA", "data/");
define("PAGE", "include/");
define("SINIF", "class/");
include_once(DATA . "connection.php");
include("getdata.php");

$sorgu=$vt->prepare('SELECT *FROM projelerimiz WHERE durum=1 ORDER BY id DESC LIMIT 3');
$sorgu->execute();
$projects=$sorgu-> fetchAll(PDO::FETCH_OBJ);

$sorgu1=$vt->prepare('SELECT *FROM kurumsalyapi WHERE id=1');
$sorgu1->execute();
$mutevellibaskani=$sorgu1-> fetchAll(PDO::FETCH_OBJ);

$sorgu2=$vt->prepare('SELECT *FROM kurumsalyapi WHERE id=2');
$sorgu2->execute();
$kurulbaskani=$sorgu2-> fetchAll(PDO::FETCH_OBJ);

$sorgu3=$vt->prepare('SELECT *FROM kurumsalyapi WHERE id>2 AND id<15');
$sorgu3->execute();
$yonetimkurul=$sorgu3-> fetchAll(PDO::FETCH_OBJ);

$sorgu4=$vt->prepare('SELECT *FROM kurumsalyapi WHERE id=15');
$sorgu4->execute();
$yedekdenetleme=$sorgu4-> fetchAll(PDO::FETCH_OBJ);

$sorgu5=$vt->prepare('SELECT *FROM kurumsalyapi WHERE id=16');
$sorgu5->execute();
$iltemsilci=$sorgu5-> fetchAll(PDO::FETCH_OBJ);






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
	<title>Vakfımız</title>

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
						<p>Küresel Vizyon Yerel Kalkınma</p>
						<h1>Vakfımız Hakkında</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Vakfımızın <span class="orange-text">Vizyonu</span></h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-briefcase"></i>
									</div>
									<div class="content">
										<h3>BİKAV</h3>
										<p>Geleceğin Bitlisini tasarlayan  öncü, Ulusal ve Uluslar arası ortamlarda söz sahibi olabilen;
                                        gelişime açık , yaratıcı ve topluma hizmeti ilke edinen, ayrıca toplumsal çıkarları gözeten bir vakıf olmaktır..</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        <div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Vakfımızın <span class="orange-text">Vizyonu</span></h2>
						<div class="row">
							<div class="col-lg col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-briefcase"></i>
									</div>
									<div class="content">
										<h3>BİKAV</h3>
										<p>Bitlisin  Eğitim, öğretim, sanat, turizm, kültür ve sağlık konularında kamu yararına ve kamu hizmeti niteliğinde faaliyetler 
                                            yaparak  her yaştan çocuk, genç ve yetişkinlerin bilimsel ve rasyonel düşünceyi benimsemiş, bilgili, kültürlü ve çağdaş teknolojiye 
                                            hâkim, yüksek iş ahlâkına ve iş disiplinine sahip, ülkemize ve tüm insanlığa daha yararlı bireyler olarak yetişmesine; ayrıca yaşam 
                                            boyu eğitim anlayışına uygun olarak her yaş ve seviyedeki insanın bilgi ve kültür yönünden gelişmesine; daha sağlıklı, üretici ve 
                                            yaratıcı hâle gelmesine çalışmak, hizmet etmek ve katkıda bulunmaktır.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- team section -->
	<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Kurumsal <span class="orange-text">Yapı</span></h3>
						
					</div>
				</div>
			</div>
			<div style="margin-bottom:70px" class="row">
			<div class="col-lg-4 col-md-6">
				
				</div>
            <?php foreach($mutevellibaskani as $mutevellibaskan){?>
				<div class="col-lg-4 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"><img style="width:100%;height:100%" src="<?= $mutevellibaskan->resim?>"></div>
						<h4><?= $mutevellibaskan->baslik?> <span><?= $mutevellibaskan->metin?>  </span></h4>

					</div>
				</div>
                <?php } ?>
				<div class="col-lg-4 col-md-6">

				</div>
            </div>
			<div style="margin-bottom:70px" class="row">
			<div class="col-lg-4 col-md-6">
				
				</div>
            <?php foreach($kurulbaskani as $kurulbaskan){?>
				<div class="col-lg-4 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"><img style="width:100%;height:100%" src="<?= $kurulbaskan->resim?>"></div>
						<h4><?= $kurulbaskan->baslik?> <span><?= $kurulbaskan->metin?>  </span></h4>

					</div>
				</div>
                <?php } ?>
				<div class="col-lg-4 col-md-6">
				
				</div>
            </div>
			<div style="margin-bottom:70px" class="row">
            <?php foreach($yonetimkurul as $yonetimkuruluye){?>
				<div style="margin-top 70px;margin-bottom:70px" class="col-lg-4 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"><img style="width:100%;height:100%" src="<?= $yonetimkuruluye->resim?>"></div>
						<h4><?= $yonetimkuruluye->baslik?> <span><?= $yonetimkuruluye->metin?>  </span></h4>

					</div>
				</div>
                <?php } ?>
            </div>

			<div style="margin-bottom:70px" class="row">
			<div class="col-lg-4 col-md-6">
				
				</div>
            <?php foreach($yedekdenetleme as $yedekdenetlemeuye){?>
				<div style="margin-top 70px;margin-bottom:70px" class="col-lg-4 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"><img style="width:100%;height:100%" src="<?= $yedekdenetlemeuye->resim?>"></div>
						<h4><?= $yedekdenetlemeuye->baslik?> <span><?= $yedekdenetlemeuye->metin?>  </span></h4>

					</div>
				</div>
                <?php } ?>
				<div class="col-lg-4 col-md-6">
				
				</div>
            </div>

			<div style="margin-bottom:70px" class="row">
			<div class="col-lg-4 col-md-6">
				
				</div>
            <?php foreach($iltemsilci as $iltemsilciuye){?>
				<div style="margin-top 70px;margin-bottom:70px" class="col-lg-4 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"><img style="width:100%;height:100%" src="<?= $iltemsilciuye->resim?>"></div>
						<h4><?= $iltemsilciuye->baslik?> <span><?= $iltemsilciuye->metin?>  </span></h4>

					</div>
				</div>
                <?php } ?>
				<div class="col-lg-4 col-md-6">
				
				</div>
            </div>
           
           
               
			</div>
		</div>
	</div>
	<!-- end team section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div style="padding-top:150px; margin-bottom:60px" class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
                <h2 style="margin-bottom:100px" class="pb-3">Yapılmış <span class="orange-text">Projeler</span></h2>
					<div class="testimonial-sliders">
                    <?php foreach($projects as $project){?>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="<?= $project->resim?>" alt="">
							</div>
							<div class="client-meta">
								<h3><?= $project->baslik?> <span>Proje Açıklaması</span></h3>
								<p class="testimonial-body">
									"<?= $project->aciklama?>"
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
            <div class="row">
				<div class="col-lg-12 text-center">
					<a style="margin-bottom:40px" href="projeler.php" class="boxed-btn">Proje Sayfası</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->

	

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
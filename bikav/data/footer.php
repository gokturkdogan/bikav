<?php
$sorgu=$vt->prepare('SELECT *FROM ayarlar');
$sorgu->execute();
$ayarlar=$sorgu-> fetchAll(PDO::FETCH_OBJ);
?>
	
	
	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<a href="index.php"><img src="assets/img/logo.png"></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Hakkımızda</h2>
						<p>Geleceğin Bitlisini tasarlayan öncü, Ulusal ve Uluslar arası ortamlarda söz sahibi olabilen; gelişime açık , 
							yaratıcı ve topluma hizmeti ilke edinen, ayrıca toplumsal çıkarları gözeten bir vakıf olmaktır.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<a class="iletisim" href="iletisim.php"><h2 class="widget-title">İletişim</h2></a>
						<ul><?php foreach($ayarlar as $ayar){?>
							<li><?= $ayar->adres?></li>
							<li><?= $ayar->mail?></li>
							<li><?= $ayar->telefon?></li>
							<li><a href="iletisim.php" class="bordered-btn">İletişim Formu</a></li>
						<?php }?>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Sayfalar</h2>
						<ul>
							<li><a href="index.php">Anasayfa</a></li>
							<li><a href="bitlishaberleri.php">Bitlis Haberleri</a></li>
							<li><a href="vakfimiz.php">Vakfımız</a></li>
							<li><a href="vakifhaberleri.php">Vakıf haberleri</a></li>
							<li><a href="vakifduyurulari.php">Vakıf Duyuruları</a></li>
							<li><a href="galeri.php">Fotograf Galerisi</a></li>
							
							<li><a href="projeler.php">Projelerimiz</a></li>
							
						</ul>
					</div>
				</div>
				
			
			</div>
		</div>
	</div>
	<!-- end footer -->
    <!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
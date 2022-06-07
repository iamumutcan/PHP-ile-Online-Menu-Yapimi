<!DOCTYPE html>
<?php 
include 'inc/baglanti.php';
define("SITE", $siteURL);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$sitebaslik?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.transitions.css">
	<link rel="stylesheet" href="css/style.css">	
</head>
<body>

	<!-- navbar -->
	<div class="navbar">
		<div class="container">

			<div class="site-title">
				<a href="index.html" class="logo"><h1>Restaurant</h1></a>
			</div>

		</div>
	</div>
	<!-- end navbar -->

	
	
	<!-- slider -->
	<div class="slider-slick app-pages">
		<div class="slider-entry">
			
			<img src="img/slider1.jpg" alt="">
			<div class="overlay"></div>
			<div class="caption">
				<div class="container">
					<h2>Delicious Food & Drink</h2>
					<p>Find your need now</p>
					<a class="button" href="">Shop Now</a>
				</div>
			</div>
		</div>
		<div class="slider-entry">
			<div class="overlay"></div>
			<img src="img/slider2.jpg" alt="">
			<div class="caption">
				<div class="container">
					<h2>Cafe & Restaurant</h2>
					<p>Find your need now</p>
					<a class="button" href="">Shop Now</a>
				</div>
			</div>
		</div>
		<div class="slider-entry">
			<div class="overlay"></div>
			<img src="img/slider3.jpg" alt="">
			<div class="caption">
				<div class="container">
					<h2>Delicious & Tasteful</h2>
					<p>Find your need now</p>
					<a class="button" href="">Shop Now</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end slider -->
	<!-- menu -->
	<div class="menu app-section">
		<div class="container">
			<div class="app-title">
				<h4>Menu</h4>
				<ul class="line">
					<li><i class="fa fa-snowflake-o"></i></li>
					<li class="line-center"><i class="fa fa-snowflake-o"></i></li>
					<li><i class="fa fa-snowflake-o"></i></li>
				</ul>
			</div>
			<div class="content">
				<?php 
				$moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY sirano ASC");
                      if($moduller!=false)
                        { ?>	<ul class="tabs">
                        	<?php
                            for($i=0;$i<count($moduller);$i++)
                            {
                            	?>
					<li class="tab"><a href="#<?=$moduller[$i]["tablo"]?>"><?=$moduller[$i]["baslik"]?></a></li>
				<?php  } ?></ul><?php



for($i=0;$i<count($moduller);$i++)
                            {




                            	$tablo=$VT->filter($moduller[$i]["tablo"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY sirano ASC",1);
    if ($kontrol!=false) {

    	 $urunler=$VT->VeriGetir($tablo,"WHERE DURUM=?",array(),"ORDER BY sirano ASC");
                      if($urunler!=false)
                        {
                        	?>
                   
                   <div id="<?=$moduller[$i]["tablo"]?>">
					<div class="row">
                        	<?php
                            for($j=0;$j<count($urunler);$j++)
                            {
                            	?>
                  
						<div class="col s6">
							<div class="entry">
								<img style=" max-width: 300px;" src="images/<?=$moduller[$i]["tablo"]?>/<?=$urunler[$j]["resim"]?>" alt="">
								<h6><a><?=$urunler[$j]["baslik"]?></a></h6>
								<p> <?=$urunler[$j]["metin"]?></p>
								<div class="rating">
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
								</div>
								<div class="price">
									<h5><?=$urunler[$j]["fiyat"]?> TL</h5>
								</div>
							</div>
						</div>
                            	<?php
                            	if($j%2==1)
                            	{
                            		?>
                            	</div><div class="row">
                            		<?php
                            	}
                            }
                            
                           ?> </div><!-- row -->
				</div> <!-- t1 --><?php
                        }
                         }}
                        
                        }

 ?>
			</div><!-- content -->

		</div>
	</div>
	<!-- end menu -->
	
	<!-- footer -->
	<footer>
		<div class="container">
			<h6>Find & follow us</h6>
			<ul class="icon-social">
				<li class="facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
				<li class="google"><a href=""><i class="fa fa-google"></i></a></li>
				<li class="instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
				<li class="rss"><a href=""><i class="fa fa-rss"></i></a></li>
			</ul>
			<div class="tel-fax-mail">
				<ul>
					<li><span>Tel:</span> 900000002</li>
					<li><span>Fax:</span> 0400000098</li>
					<li><span>Email:</span> info@youremail.com</li>
				</ul>
			</div>
			<div class="ft-bottom">
				<span>Copyright © 2016 All Rights Reserved </span>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	
	<!-- script -->
	<script src="js/jquery.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>
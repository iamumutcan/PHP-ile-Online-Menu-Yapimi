<?php 

include 'inc/baglanti.php';
define("SAYFA", "inc/");
define("SITE", $siteURL."admin/");
$toplamUrun=0;
$urunlerTotalFiyat=0;
$urunlerTotalOrtalamaFiyat=0;
                      $moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC");
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
                  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
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
								<img src="../images/<?=$moduller[$i]["tablo"]?>/<?=$urunler[$j]["resim"]?>" alt="">
								<h6><a href=""><?=$urunler[$j]["baslik"]?></a></h6>
								<div class="rating">
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
								</div>
								<div class="price">
									<h5><?=$urunler[$j]["fiyat"]?></h5>
								</div>
							</div>
						</div>
                            	<?php
                       }
                           ?> </div><!-- row -->
				</div> <!-- t1 --><?php
                       }
                       }
                       }
                       }

 ?>
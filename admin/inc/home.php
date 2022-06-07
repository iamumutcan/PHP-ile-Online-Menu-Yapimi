<?php 
$toplamUrun=0;
$urunlerTotalFiyat=0;
$urunlerTotalOrtalamaFiyat=0;
                      $moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC");
                      if($moduller!=false)
                        {
                            for($i=0;$i<count($moduller);$i++)
                            {
                            	$tablo=$VT->filter($moduller[$i]["tablo"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) {

    	 $urunler=$VT->VeriGetir($tablo,"WHERE DURUM=?",array(),"ORDER BY sirano ASC");
                      if($urunler!=false)
                        {
                            for($j=0;$j<count($urunler);$j++)
                            {
                            	$toplamUrun++;
                            	$urunlerTotalFiyat+=$urunler[$j]["fiyat"];
                            }
                            
                          
                        }
                         }}
                        }
                         $urunlerTotalOrtalamaFiyat=$urunlerTotalFiyat/$toplamUrun;
                            $urunlerTotalOrtalamaFiyat=floor($urunlerTotalOrtalamaFiyat*100)/100;
 ?>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
           <div class="col">
              <div class="card radius-10 bg-primary">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <p class="mb-1 text-white">Çeşit Sayısı </p>
                      <h4 class="mb-0 text-white"><?=$i?></h4>
                    </div>
                    <div class="ms-auto text-white fs-2">
                      <ion-icon name="accessibility-sharp"></ion-icon>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card radius-10 bg-danger">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <p class="mb-1 text-white">Toplam Ürün Sayısı</p>
                      <h4 class="mb-0 text-white"><?=$toplamUrun?></h4>
                    </div>
                    <div class="ms-auto text-white fs-2">
                      <ion-icon name="leaf-sharp"></ion-icon>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card radius-10 bg-success">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <p class="mb-1 text-white">Ortalama Ürün Fiyatı</p>
                      <h4 class="mb-0 text-white"><?=$urunlerTotalOrtalamaFiyat?></h4>
                    </div>
                    <div class="ms-auto text-white fs-2">
                      <ion-icon name="shield-checkmark-sharp"></ion-icon>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>

        <h6 class="mb-0 text-uppercase">Kategori Bilgileri</h6>
              <hr>
              <div class="card info-table bg-info">
                <div class="card-body">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori Adı</th>
                        <th scope="col">Toplam Fiyat</th>
                        <th scope="col">Ortalama Fiyat</th>
                        <th scope="col">Adet Ürün</th>
                      </tr>
                    </thead>
                    <tbody>

                    	<?php
                    	
                      $moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC");
                      if($moduller!=false)
                        {
                            for($i=0;$i<count($moduller);$i++)
                            {
                            	$tablo=$VT->filter($moduller[$i]["tablo"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) {
      $urunlerToplamFiyat=0;$urunlerOrtalamaFiyat=0;$j=0;
    	 $urunler=$VT->VeriGetir($tablo,"WHERE DURUM=?",array(),"ORDER BY sirano ASC");
                      if($urunler!=false)
                        {
                            for($j=0;$j<count($urunler);$j++)
                            {
                            	
                            	$urunlerToplamFiyat+=$urunler[$j]["fiyat"];
                            }
                           
                            $urunlerOrtalamaFiyat=$urunlerToplamFiyat/$j;
                            $urunlerOrtalamaFiyat=floor($urunlerOrtalamaFiyat*100)/100;
                        }

                                ?>
           
                      <tr>
                        <th scope="row"><?=$moduller[$i]["ID"]?></th>
                        <td><?=$moduller[$i]["baslik"]?></td>
                        <td><?=$urunlerToplamFiyat?></td>
                        <td><?=$urunlerOrtalamaFiyat?></td>
                        <td><?=$j?></td>
                      </tr>
           
                                <?php
                            }}
                        }
                        ?>
                  </table>
                </div>
              </div>



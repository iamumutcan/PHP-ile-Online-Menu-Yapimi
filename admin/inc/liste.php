
<?php 
if (!empty($_GET["tablo"]))
 {
  $tablo=$VT->filter($_GET["tablo"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) {
   
 ?>
 <h1 class="m-0 text-dark"> <?=$kontrol[0]["baslik"]?> </h1>



<!--icerik girisss-->
         <div class="row">
            <div class="col-xl-12 mx-auto">
             
             <div class="card">
              <div class="card-body">
                <div> 
                   <h5>Ürünler </h5>
                   <a href="<?=SITE?>index.php?sayfa=ekle&tablo=<?=$tablo?>" > 
                   <input type="button" class="btn btn-success" style="float: right; " value="EKLE" name=""></a>
                  <br>
                </div>
                <div class="table-responsive mt-3">
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                     <tr>
                       <th>ID</th>
                       <th>FOTO</th>
                       <th>SIRA</th>
                       <th>AD</th>
                       <th>AÇIKLAMA</th>
                       <th>FİYAT</th>
                       <th>DURUM</th>
                       <th></th>
                     </tr>
                     </thead>

                     <tbody>
                      <?php
                      $urunler=$VT->VeriGetir($tablo,"WHERE DURUM=?",array(),"ORDER BY sirano ASC");
                      if($urunler!=false)
                        {
                            for($i=0;$i<count($urunler);$i++)
                            {


                              ?>

                      <tr>
                      <td><?=$urunler[$i]["ID"]?></td>
                      <td><img src="../images/<?=$tablo?>/<?=$urunler[$i]["resim"]?>" class="product-img-2" alt="product img"></td>
                      <td><?=$urunler[$i]["sirano"]?></td>
                      <td><?=$urunler[$i]["baslik"]?></td>
                      <td> <span style="display:block; width: 150px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"><?=$urunler[$i]["metin"]?></span></td>
                      <td><?=$urunler[$i]["fiyat"]?>₺</td>
                      <td>
                        <?php if($urunler[$i]["durum"]==1)
                        {
                          ?>
                          <span class="badge rounded-pill bg-success">Aktif</span>
                          <?php
                        }
                        else
                        {
                          ?>
                          <span class="badge rounded-pill bg-danger">Pasif</span>
                          <?php
                        }
                        ?>
                        
                      </td>
                      <td>
 
                        <a class="btn btn-warning px-5" href="<?=SITE?>index.php?sayfa=duzenle&tablo=<?=$tablo?>&urunid=<?=$urunler[$i]["ID"]?>">Duzenle</a> 
                      <a class="btn btn-danger px-5" href="<?=SITE?>index.php?sayfa=sil&urunsil=ok&tablo=<?=$tablo?>&urunid=<?=$urunler[$i]["ID"]?>">SİL</a> 
                      </td>

                     </tr>
              <?php    } } ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>

            </div>
          </div>
  
           <!-- /icerik girisss-->




  <?php 

    } 
    else{
      ?>
      <meta http-equiv="refresh" content="0;url=<?=SITE?>">
      
      <?php 
    }

}
else{

 ?>
 <meta http-equiv="refresh" content="0;url=<?=SITE?>">
       <?php 
}
?>
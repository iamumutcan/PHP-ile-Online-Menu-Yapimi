
<?php 
if ( !empty($_GET["urunid"])&& !empty($_GET["tabload"]))
 {
  $tablo=$VT->filter("moduller");
  $ID=$VT->filter($_GET["urunid"]);
  $EskiAd=$VT->SefLinkYap($_GET["tabload"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) 
    {
      $veri=$VT->VeriGetir("moduller","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);

      if($veri!=false)
      {
      
 ?>
   <!--icerik girisss-->
         <div class="row">
            <div class="col-xl-8 mx-auto">
             
              <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">Ürün Düzenleme Sayfası</h6>
                  <hr>
                  <form  action="#" method="post" enctype="multipart/form-data" class="row g-3">
                  	 <?php 

		if($_POST)
      {
        if(!empty($_POST["ad"]) && !empty($_POST["durum"]))
        {
          $ad=$VT->filter($_POST["ad"]);
          $durum=$VT->filter($_POST["durum"]);
          $sirano=$VT->filter($_POST["sirano"]);
          $YeniAd=$VT->SefLinkYap($_POST["ad"]);

         $ekle=$VT->SorguCalistir("UPDATE moduller","SET durum=?, baslik=?, sirano=?, tablo=? WHERE ID=?",array($durum,$ad,$sirano,$YeniAd,$veri[0]["ID"]));
          $tabloisimguncelle=$VT->TabloIsim($EskiAd,$YeniAd);
          $EskiAdKlasor='C:/xampp/htdocs/qrmenu/images/'.$EskiAd;
          $YeniAdKlasor='C:/xampp/htdocs/qrmenu/images/'.$YeniAd;
          $klasorDegistir = rename($EskiAdKlasor,$YeniAdKlasor);

          if ($ekle!=false)
           {
             ?>
                <div class="alert alert-success">İşleminiz başarı ile kaydedildi</div>
                <meta http-equiv="refresh" content="1;<?=SITE?>index.php?sayfa=moduller">
                 <?php 
           }
           else
           {
             ?>
                <div class="alert alert-danger">İşleminiz sırasında hata oluştu lütfen daha sonra tekrar deneyiniz.</div>
                <?php
           }

        }
        else
        {
          ?>
          <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
          <?php
        }
      }
 ?>

                     <div class="col-12">
                      <label class="form-label">Kategori Adı: </label>
                      <input type="text" class="form-control" placeholder="Site Url ..." value="<?=stripslashes($veri[0]["baslik"])?>" name="ad">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Kategori Adı: </label>
                      <input type="text" class="form-control" placeholder="Site Url ..." value="<?=stripslashes($veri[0]["sirano"])?>" name="sirano">
                    </div>
                    <div class="col-12">
                      <?php 
                      if($veri[0]["durum"]==1)
                        {
                          $checkbox1='checked="checked"'; 
                          $checkbox2='';
                        }
                        else{$checkbox1=''; $checkbox2='checked="checked"';}
                      ?>

                      <label class="form-label">Ürün Durum</label>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" <?=$checkbox1?>  type="radio" name="durum" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1"> Aktif</label>
                      </div>
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" <?=$checkbox2?> type="radio" name="durum" id="inlineRadio2" value="2">
                      <label class="form-check-label" for="inlineRadio2">Pasif</label>
                    </div>
                    

                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
                </div>
              </div>

            </div>
          </div>
  
             
           <!-- /icerik girisss-->
<?php 
}}}
?>
 <?php 
if (!empty($_GET["tablo"]))
 {
  $tablo=$VT->filter($_GET["tablo"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) {
   
 ?>
 <!--icerik girisss-->
         <div class="row">
            <div class="col-xl-8 mx-auto">
             
              <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">SİTE AYARLARI</h6>
                  <hr>
                  <form  action="#" method="post" enctype="multipart/form-data" class="row g-3">
                  	 <?php 

		if($_POST)
      {
        if(!empty($_POST["ad"]) && !empty($_POST["aciklama"]) && !empty($_POST["durum"]))
        {
          $ad=$VT->filter($_POST["ad"]);
          $aciklama=$VT->filter($_POST["aciklama"]);
          $durum=$VT->filter($_POST["durum"]);
          $fiyat=$VT->filter($_POST["fiyat"]);
          $sira=$VT->filter($_POST["sira"]);
          $durum=$VT->filter($_POST["durum"]);
          if(!empty($_FILES["resim"]["name"]))
          {
            $yukle=$VT->upload("resim","../images/".$kontrol[0]["tablo"]."/");

            if($yukle!=false)
            {
              $ekle=$VT->SorguCalistir("INSERT INTO ".$kontrol[0]["tablo"],"SET metin=?, durum=?, baslik=?, resim=?,fiyat=?,sirano=?",array($aciklama,$durum,$ad,$yukle,$fiyat,$sira));
               ?>
                <div class="alert alert-info">Resim BAŞARI İLE YÜKLENDİ</div>
                <?php
            }
             else
              {
                ?>
                <div class="alert alert-info">Resim yükleme BAŞARISIZ</div>
                <?php
              }
          }
          else
          {	
          	 $ekle=$VT->SorguCalistir("INSERT INTO ".$kontrol[0]["tablo"],"SET metin=?, durum=?, baslik=?,fiyat=?,sirano=?",array($aciklama,$durum,$ad,$fiyat,$sira));
          

          }

          if ($ekle!=false)
           {
             ?>
                <div class="alert alert-success">İşleminiz başarı ile kaydedildi</div>
                <meta http-equiv="refresh" content="1;<?=SITE?>index.php?sayfa=liste&tablo=<?=$kontrol[0]["tablo"]?>">
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
                      <label class="form-label">Ürün Adı: </label>
                      <input type="text" class="form-control" placeholder="Ürün Adı ..." name="ad">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Ürün Açıklama</label>
                      <input type="text" class="form-control" placeholder="Ürün Açıklama ..." name="aciklama">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Ürün Sırası</label>
                      <input type="text" class="form-control" placeholder="Ürün Sırası ..." name="sira">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Ürün Fiyatı (Küsaratlı fiyatları Nokta ile ayırın Örnek: <b>"27.50"</b>)</label>
                      <input type="text" class="form-control" placeholder="Ürün Fiyatı  ..." name="fiyat">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Ürün Durum</label>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" checked="checked" type="radio" name="durum" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1"> Aktif</label>
                      </div>
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="durum" id="inlineRadio2" value="2">
                      <label class="form-check-label" for="inlineRadio2">Pasif</label>
                    </div>
                    </div>
	              <div class="mb-3">
	                <label for="formFileMultiple" class="form-label">RESİM</label>
	                <input class="form-control" type="file" id="formFileMultiple" name="resim" multiple="">
	              </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary">KAYDET</button>
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
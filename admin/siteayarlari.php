<?php include 'inc/header.php'; ?>

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">SAYFALAR</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="index.php"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">SİTE AYARLARI</li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->


             <?php 


      if($_POST)
      {
        if(!empty($_POST["url"]) && !empty($_POST["baslik"]) && !empty($_POST["aciklama"]) && !empty($_POST["anahtar"]))
        {
          $siteURL=$VT->filter($_POST["url"]);
          $sitebaslik=$VT->filter($_POST["baslik"]);
          $siteaciklama=$VT->filter($_POST["aciklama"]);
          $siteanahtar=$VT->filter($_POST["anahtar"]);
       
              $guncele=$VT->SorguCalistir("UPDATE siteayarlari","SET siteurl=?, siteBaslik=?, siteAciklama=?, siteAnahtarKelime=? WHERE ID=?",array($siteURL,$sitebaslik,$siteaciklama,$siteanahtar,1),1);
          


          if ($guncele!=false)
           {
             ?>
                <div class="alert alert-success">İşleminiz başarı ile kaydedildi</div>
                 <meta http-equiv="refresh" content="2;url=<?=SITE?>iletisim-ayarlari">

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


          <!--icerik girisss-->
         <div class="row">
            <div class="col-xl-8 mx-auto">
             
              <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">SİTE AYARLARI</h6>
                  <hr>
                  <form  action="siteayarlari.php" method="post" class="row g-3">
                    <div class="col-12">
                      <label class="form-label">Site Adresi</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="url" value="<?=$siteURL?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Site Başlığı</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="baslik" value="<?=$sitebaslik?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Site Açıklaması</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="aciklama" value="<?=$siteaciklama?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Site Anahtar Kelimesi</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="anahtar" value="<?=$siteanahtar?>" >
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

          </div>
          <!-- end page content-->
         </div>
         

<?php include 'inc/footer.php'; ?>

  
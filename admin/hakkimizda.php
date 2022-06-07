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
        if(!empty($_POST["baslik"]) && !empty($_POST["baslik2"]) && !empty($_POST["yazi1"]) && !empty($_POST["yazi2"]) && !empty($_POST["yazi3"]) && !empty($_POST["yazi4"]))
        {
          $hakkimizdaTitle=$VT->filter($_POST["sayfa_title"]);
          $hakkimizdaDescription=$VT->filter($_POST["sayfa_description"]);
          $hakkimizdaKeywords=$VT->filter($_POST["sayfa_keywords"]);
          $hakkimizdaBaslik=$VT->filter($_POST["baslik"]);
          $hakkimizdaBaslik2=$VT->filter($_POST["baslik2"]);
          $hakkimizdayazi1=($_POST["yazi1"]);
          $hakkimizdayazi2=($_POST["yazi2"]);
          $hakkimizdayazi3=($_POST["yazi3"]);
          $hakkimizdayazi4=($_POST["yazi4"]);
       
              $guncele=$VT->SorguCalistir("UPDATE sayfahakkimizda","SET sayfa_title=?, sayfa_description=?, sayfa_keywords=?, baslik=?, baslik2=?, yazi1=?, yazi2=?, yazi3=?, yazi4=? WHERE ID=?",array($hakkimizdaTitle, $hakkimizdaDescription, $hakkimizdaKeywords, $hakkimizdaBaslik,$hakkimizdaBaslik2,$hakkimizdayazi1,$hakkimizdayazi2,$hakkimizdayazi3,$hakkimizdayazi4,1),1);
          


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
                  <h6 class="mb-0 text-uppercase">HAKKIMIZDA</h6>
                  <hr>
                  <form  action="hakkimizda.php" method="post" class="row g-3">
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Sayfa başlığı</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="sayfa_title" value="<?=$hakkimizdaTitle?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Sayfa Açıklaması</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="sayfa_description" value="<?=$hakkimizdaDescription?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Sayfa Anahtar kelimeleri 1</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="sayfa_keywords" value="<?=$hakkimizdaKeywords?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Başlık 1</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="baslik" value="<?=$hakkimizdaBaslik?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Başlık 2</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="baslik2" value="<?=$hakkimizdaBaslik2?>">
                    </div>

                     <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 1</label>
                      <textarea name="yazi1" > <?=$hakkimizdayazi1?></textarea>
                      <p>
                        <?=$hakkimizdayazi1?>
                      </p>
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 2</label>
                      <textarea name="yazi2"> <?=$hakkimizdayazi2?> </textarea>
                    </div>
                    
                    <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 3</label>
                      <textarea  name="yazi3"> <?=$hakkimizdayazi3?></textarea>
                    </div>
                    
                    <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 4</label>
                      <textarea  name="yazi4"> <?=$hakkimizdayazi4?></textarea>
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


                <script>
                        CKEDITOR.replace( 'yazi1' );
                        CKEDITOR.replace( 'yazi2' );
                        CKEDITOR.replace( 'yazi3' );
                        CKEDITOR.replace( 'yazi4' );
                </script>
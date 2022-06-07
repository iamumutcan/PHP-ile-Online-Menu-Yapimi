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
                  <li class="breadcrumb-item active" aria-current="page">HİZMETLER SAYFASI</li>
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
          $hizmetlerTitle=$VT->filter($_POST["sayfa_title"]);
          $hizmetlerDescription=$VT->filter($_POST["sayfa_description"]);
          $hizmetlerKeywords=$VT->filter($_POST["sayfa_keywords"]);
          $hizmetlerBaslik=$VT->filter($_POST["baslik"]);
          $hizmetlerBaslik2=$VT->filter($_POST["baslik2"]);
          $hizmetleryazi1=($_POST["yazi1"]);
          $hizmetleryazi2=($_POST["yazi2"]);
          $hizmetleryazi3=($_POST["yazi3"]);
          $hizmetleryazi4=($_POST["yazi4"]);
       
              $guncele=$VT->SorguCalistir("UPDATE sayfahizmetler","SET sayfa_title=?, sayfa_description=?, sayfa_keywords=?, baslik=?, baslik2=?, yazi1=?, yazi2=?, yazi3=?, yazi4=? WHERE ID=?",array($hizmetlerTitle, $hizmetlerDescription, $hizmetlerKeywords, $hizmetlerBaslik,$hizmetlerBaslik2,$hizmetleryazi1,$hizmetleryazi2,$hizmetleryazi3,$hizmetleryazi4,1),1);
          


          if ($guncele!=false)
           {
             ?>
                <div class="alert alert-success">İşleminiz başarı ile kaydedildi</div>
                 <meta http-equiv="refresh" content="2;url=hizmetler.php">

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
                  <h6 class="mb-0 text-uppercase">hizmetler</h6>
                  <hr>
                  <form  action="hizmetler.php" method="post" class="row g-3">
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Sayfa başlığı</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="sayfa_title" value="<?=$hizmetlerTitle?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Sayfa Açıklaması</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="sayfa_description" value="<?=$hizmetlerDescription?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Sayfa Anahtar kelimeleri 1</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="sayfa_keywords" value="<?=$hizmetlerKeywords?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımızda Başlık 1</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="baslik" value="<?=$hizmetlerBaslik?>">
                    </div>

                     <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 1</label>
                      <textarea name="yazi1" > <?=$hizmetleryazi1?></textarea>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Hakkımızda Başlık 2</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="baslik2" value="<?=$hizmetlerBaslik2?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 2</label>
                      <textarea name="yazi2"> <?=$hizmetleryazi2?> </textarea>
                    </div>
                     <div class="col-12">
                      <label class="form-label">Hakkımızda Başlık 3</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="baslik3" value="<?=$hizmetlerBaslik3?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 3</label>
                      <textarea  name="yazi3"> <?=$hizmetleryazi3?></textarea>
                    </div>
                     <div class="col-12">
                      <label class="form-label">Hakkımızda Başlık 4</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="baslik4" value="<?=$hizmetlerBaslik4?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Hakkımız Yazı 4</label>
                      <textarea  name="yazi4"> <?=$hizmetleryazi4?></textarea>
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
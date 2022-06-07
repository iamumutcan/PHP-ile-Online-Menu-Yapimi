<?php include 'inc/header.php'; ?>

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Pages</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">To Do</li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->



          <!--icerik girisss-->
         <div class="row">
            <div class="col-xl-8 mx-auto">
             
              <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">SİTE AYARLARI</h6>
                  <hr>
                  <form  action="#" method="post" class="row g-3">

             <?php 


      if($_POST)
      {
        if(!empty($_POST["telefon"]) && !empty($_POST["mail"]) && !empty($_POST["adres"]))
        {
          $iletisimTelefon=$VT->filter($_POST["telefon"]);
          $iletisimMail=$VT->filter($_POST["mail"]);
          $iletisimAdres=$VT->filter($_POST["adres"]);
       
              $guncele=$VT->SorguCalistir("UPDATE siteiletisim","SET telefon=?, mail=?, adres=? WHERE ID=?",array($iletisimTelefon,$iletisimMail,$iletisimAdres,1),1);
          


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

                     <div class="col-12">
                      <label class="form-label">Telefon Numaranız</label>
                      <input type="text" class="form-control" placeholder="Site Url ..." name="telefon" value="<?=$iletisimTelefon?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">E posta Adresiniz</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="mail" value="<?=$iletisimMail?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Adresiniz</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="adres" value="<?=$iletisimAdres?>">
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

  
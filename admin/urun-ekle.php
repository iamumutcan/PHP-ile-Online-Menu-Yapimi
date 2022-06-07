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
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                  <a class="dropdown-item" href="javascript:;">Another action</a>
                  <a class="dropdown-item" href="javascript:;">Something else here</a>
                  <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
              </div>
            </div>
          </div>
          <!--end breadcrumb-->

          <!--icerik girisss-->
        

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
        if(!empty($_POST["ad"]) && !empty($_POST["aciklama"]) && !empty($_POST["durum"])&&!empty($_FILES["resim"]["name"]))
        {
          $ad=$VT->filter($_POST["ad"]);
          $aciklama=$VT->filter($_POST["aciklama"]);
          $durum=$VT->filter($_POST["durum"]);
          if(!empty($_FILES["resim"]["name"]))
          {
            $yukle=$VT->upload("resim","../images/urunler/");

            if($yukle!=false)
            {
              $ekle=$VT->SorguCalistir("INSERT INTO urunler","SET aciklama=?, durum=?, ad=?, resim=?",array($aciklama,$durum,$ad,$yukle));
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
          	 $ekle=$VT->SorguCalistir("INSERT INTO urunler","SET aciklama=?, durum=?, ad=?",array($aciklama,$durum,$ad));
          

          }

          if ($ekle!=false)
           {
             ?>
                <div class="alert alert-success">İşleminiz başarı ile kaydedildi</div>
                <meta http-equiv="refresh" content="2;urunler.php">
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

          </div>
          <!-- end page content-->
         </div>
         

<?php include 'inc/footer.php'; ?>

  
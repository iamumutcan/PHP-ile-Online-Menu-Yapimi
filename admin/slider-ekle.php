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
                  <h6 class="mb-0 text-uppercase">Slider ekleme formu</h6>
                  <hr>
                  <form  action="#" method="post" enctype="multipart/form-data" class="row g-3">
                  	 <?php 

		if($_POST)
      {
       if(!empty($_POST["ad"]) && !empty($_POST["sira"]) && !empty($_POST["durum"]) && !empty($_POST["yazi1"]) && !empty($_POST["yazi2"]) && !empty($_POST["btn_yazi"]) && !empty($_POST["btn_link"]))
        {
          $ad=$VT->filter($_POST["ad"]);
          $sira=$VT->filter($_POST["sira"]);
          $durum=$VT->filter($_POST["durum"]);
          $yazi1=$VT->filter($_POST["yazi1"]);
          $yazi2=$VT->filter($_POST["yazi2"]);
          $btn_yazi=$VT->filter($_POST["btn_yazi"]);
          $btn_link=$VT->filter($_POST["btn_link"]);
          if(!empty($_FILES["resim"]["name"]))
          {
            $yukle=$VT->upload("resim","../images/slider/");

            if($yukle!=false)
            {
              $ekle=$VT->SorguCalistir("INSERT INTO slider","SET sira=?, durum=?, ad=?, resim=?, yazi1=?, yazi2=?, btn_yazi=?, btn_link=?",array($sira,$durum,$ad,$yukle,$yazi1,$yazi2,$btn_yazi,$btn_link));
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
          	 $ekle=$VT->SorguCalistir("INSERT INTO slider","SET sira=?, durum=?, ad=?, yazi1=?, yazi2=?, btn_yazi=?, btn_link=?",array($sira,$durum,$ad,$yazi1,$yazi2,$btn_yazi,$btn_link,));
          

          }

          if ($ekle!=false)
           {
             ?>
                <div class="alert alert-success">İşleminiz başarı ile kaydedildi</div>
                <meta http-equiv="refresh" content="2;slider.php">
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
                      <label class="form-label">Slider Adı: </label>
                      <input type="text" class="form-control" placeholder="Ürün Adı ..." name="ad">
                    </div>
                    <div class="col-3">
                      <label class="form-label">Slider Öncelik Sırası</label>
                      <input type="number" class="form-control col-3" placeholder="Ürün Sıra ..." name="sira">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Slider Yazısı 1</label>
                      <input type="text" class="form-control" placeholder="slider yazisi1 ..."  name="yazi1">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Slider Yazısı 2</label>
                      <input type="text" class="form-control" placeholder="slider yazisi2 ..."  name="yazi2">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Slider Buton Yazısı</label>
                      <input type="text" class="form-control" placeholder="slider buton yazisi ..."  name="btn_yazi">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Slider Buton Link</label>
                      <input type="text" class="form-control" placeholder="slider buton linki ..."  name="btn_link">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Slider Durum</label>
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

  
<?php include 'inc/header.php'; 
 ?>

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
                  <li class="breadcrumb-item active" aria-current="page">SLİDER SAYFASI</li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->




          <!--icerik girisss-->
         <div class="row">
            <div class="col-xl-12 mx-auto">
             
             <div class="card">
              <div class="card-body">
                <div> 
                   <h5>Slider </h5>
                   <a href="slider-ekle.php" > 
                   <input src="slider-ekle.php" type="button" class="btn btn-success" style="float: right; " value="EKLE" name=""></a>
                  <br>
                </div>
                <div class="table-responsive mt-3">
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                     <tr>
                       <th>ID</th>
                       <th>FOTO</th>
                       <th>AD</th>
                       <th>Sıra</th>
                       <th>DURUM</th>
                       <th></th>
                     </tr>
                     </thead>

                     <tbody>
                      <?php
                      $slider=$VT->VeriGetir("slider","WHERE DURUM=?",array(),"ORDER BY sira ASC");
                      if($slider!=false)
                        {
                            for($i=0;$i<count($slider);$i++)
                            {


                              ?>

                      <tr>
                      <td><?=$slider[$i]["ID"]?></td>
                      <td><img src="../images/slider/<?=$slider[$i]["resim"]?>" class="product-img-2" alt="product img"></td>
                      <td><?=$slider[$i]["ad"]?></td>
                      <td><?=$slider[$i]["sira"]?></td>
                      <td>
                        <?php if($slider[$i]["durum"]==1)
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
 
                        <a class="btn btn-warning px-5" href="slider-guncelle.php?sliderid=<?=$slider[$i]["ID"]?>">Duzenle</a> 
                      <a class="btn btn-danger px-5" href="class/fonk.php/?slidersil=ok&ID=<?=$slider[$i]["ID"]?>">SİL</a> 
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

          </div>
          <!-- end page content-->
         </div>
         



<?php include 'inc/footer.php'; ?>

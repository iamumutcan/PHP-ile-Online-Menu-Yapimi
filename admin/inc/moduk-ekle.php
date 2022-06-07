<div class="row">
            <div class="col-xl-8 mx-auto">
             
              <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">Kategori Ekle Sayfası</h6>
                  <hr>
                   <?php 

            if($_POST)
            {
             $calistir=$VT->ModukEkle();
             if($calistir!=false)
             {
               echo '<div class="alert alert-success"> Modülünüz başarıyla eklendi </div>';
               ?>
               <meta http-equiv="refresh" content="1;url=<?=SITE?>">
                <?php 
             }
             else
             {
              echo '<div class="alert alert-danger">Modülünüz oluştururken hata oldu. </div>';
             }
            }

          ?>
                  <form  action="#" method="post" enctype="multipart/form-data" class="row g-3">


                     <div class="col-12">
                      <label class="form-label">Kategori Adı: </label>
                      <input type="text" class="form-control" placeholder="Kategori Adı ..." name="baslik">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Kategori Sıra No: </label>
                      <input type="text" class="form-control" placeholder="Kategori Sıra No ..." name="sirano">
                    </div>
                 

                    <div class="col-12">
                      <label class="form-label">Kategori Durum</label>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" checked="checked" type="radio" name="durum" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1"> Aktif</label>
                      </div>
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="durum" id="inlineRadio2" value="2">
                      <label class="form-check-label" for="inlineRadio2">Pasif</label>
                    </div>
                    </div>
	             
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary">KATEGORİ EKLE</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
                </div>
              </div>

            </div>
          </div>
  
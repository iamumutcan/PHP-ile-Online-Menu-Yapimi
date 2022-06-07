


          <!--icerik girisss-->
         <div class="row">
            <div class="col-xl-12 mx-auto">
             
             <div class="card">
              <div class="card-body">
                <div> 
                   <h5>Ürünler </h5>
                   <a href="<?=SITE?>index.php?sayfa=moduk-ekle" > 
                   <input type="button" class="btn btn-success" style="float: right; " value="EKLE" name=""></a>
                  <br>
                </div>
                <div class="table-responsive mt-3">
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                     <tr>
                       <th>ID</th>
                       <th>AD</th>
                       <th>SIRA NO</th>
                       <th>DURUM</th>
                       <th></th>
                     </tr>
                     </thead>

                     <tbody>
                      <?php
                      $moduller=$VT->VeriGetir("moduller","WHERE DURUM=?",array(),"ORDER BY sirano ASC");
                      if($moduller!=false)
                        {
                            for($i=0;$i<count($moduller);$i++)
                            {


                              ?>

                      <tr>
                      <td><?=$moduller[$i]["ID"]?></td>
                      <td><?=$moduller[$i]["baslik"]?></td>
                      <td><?=$moduller[$i]["sirano"]?></td>
                      <td>
                        <?php if($moduller[$i]["durum"]==1)
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
 
                        <a class="btn btn-warning px-5" href="<?=SITE?>index.php?sayfa=modul-guncelle&tabload=<?=$moduller[$i]["baslik"]?>&urunid=<?=$moduller[$i]["ID"]?>">Duzenle</a> 
                      <a class="btn btn-danger px-5" href="<?=SITE?>index.php?sayfa=sil&tablosil=ok&urunid=<?=$moduller[$i]["ID"]?>&tablo=<?=$moduller[$i]["tablo"]?>">SİL</a> 
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

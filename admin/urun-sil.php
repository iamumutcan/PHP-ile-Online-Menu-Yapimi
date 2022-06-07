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
         
             
           <!-- /icerik girisss-->

          </div>
          <!-- end page content-->
         </div>

         <?php 
if (!empty($_GET["urunler"]) && !empty($_GET["ID"]))
 {
  $urunler=$VT->filter($_GET["urunler"]);
  $ID=$VT->filter($_GET["ID"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE urunler=? AND durum=?",array($urunler,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) 
    {
       $veri=$VT->VeriGetir($kontrol[0]["urunler"],"WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
      if($veri!=false)
      {
        $sil=$VT->SorguCalistir("DELETE FROM ".$urunler,"WHERE ID=?",array($ID),1);
         ?>
      <meta http-equiv="refresh" content="0;url=urunler.php">
      
      <?php  
      }
      else
      {
          ?>
      <meta http-equiv="refresh" content="0;url=urunler.php">
      
      <?php 

      }
    }
    else{

         ?>
         <meta http-equiv="refresh" content="0;url=urunler.php">
               <?php 
        }

}
else{

 ?>
 <meta http-equiv="refresh" content="0;url=urunler.php">
       <?php 
}
?>

<?php include 'inc/footer.php'; ?>

  
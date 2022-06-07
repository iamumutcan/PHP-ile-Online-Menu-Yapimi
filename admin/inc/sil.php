<?php 

if (!empty($_GET["tablo"]) && !empty($_GET["urunid"]) && $_GET['urunsil']=="ok")
 {
  $tablo=$VT->filter($_GET["tablo"]);
  $ID=$VT->filter($_GET["urunid"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) 
    {
       $veri=$VT->VeriGetir($kontrol[0]["tablo"],"WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
      if($veri!=false)
      {
        $sil=$VT->SorguCalistir("DELETE FROM ".$tablo,"WHERE ID=?",array($ID),1);
         ?>
       <meta http-equiv="refresh" content="0;<?=SITE?>index.php?sayfa=liste&tablo=<?=$kontrol[0]["tablo"]?>">
      
      <?php  
      }
      else
      {
          ?>
       <meta http-equiv="refresh" content="0;<?=SITE?>index.php?sayfa=liste&tablo=<?=$kontrol[0]["tablo"]?>">
      
      <?php 

      }
    }
    else{

         ?>
 <meta http-equiv="refresh" content="0;url=<?=SITE?>">
               <?php 
        }

}


if (!empty($_GET["tablo"]) && !empty($_GET["urunid"]) && $_GET['tablosil']=="ok")
 {
  $tablo=$VT->filter($_GET["tablo"]);
  $ID=$VT->filter($_GET["urunid"]);
  $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false) 
    {
       $VT->KategoriSil($tablo);
       $sil=$VT->SorguCalistir("DELETE FROM moduller","WHERE ID=?",array($ID),1);
       $AdKlasor='C:/xampp/htdocs/qrmenu/images/'.$tablo;
       if (file_exists($AdKlasor)){ //dosyalar dizininin içerisinde resimler klasörü mevcut ise
          array_map('unlink', glob($AdKlasor.'/*')); //bütün dosyalar siliniyor
          $sonuc = rmdir($AdKlasor); //klasör siliniyor
          if ($sonuc){
            echo 'Resim klasörü başarıyla silindi';
          }
        }else{
          echo 'Resim klasörü mevcut değil';
        } ?>
        <div class="alert alert-success">İşleminiz başarı yapılmıştır</div>
        <meta http-equiv="refresh" content="2;url=<?=SITE?>">
        <?php
    }
    else{

         ?>
         <div class="alert alert-danger">SİLİNEMEDİ</div>
 <meta http-equiv="refresh" content="2;url=<?=SITE?>">
               <?php 
        }

}



else{

 ?>
 <meta http-equiv="refresh" content="0;url=<?=SITE?>">
       <?php 
}
?>
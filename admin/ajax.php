<?php 
@session_start();
@ob_start();

include 'inc/baglanti.php';
if($_POST)
{
  if(!empty($_POST["tablo"]) && !empty($_POST["ID"]) && !empty($_POST["durum"]))
  {
    $tablo=$VT->filter($_POST["tablo"]);
    $ID=$VT->filter($_POST["ID"]);
    $durum=$VT->filter($_POST["durum"]);
    $guncelle=$VT->SorguCalistir("UPDATE ".$tablo,"SET durum=? WHERE ID=?",array($durum,$ID),1);
    if($guncelle!=false)
    {
      echo "TAMAM";
    }
    else{
      echo "HATA";
    }

  }
  else
  {
    echo "BOS";
  }
}
?>

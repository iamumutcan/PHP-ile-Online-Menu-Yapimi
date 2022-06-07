<?php
include 'class/VT.php';
include 'class/class.upload.php';
$VT=new VT();

$ayarlar=$VT->VeriGetir("ayarlar","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
if($ayarlar!=false)
{
	$sitebaslik=$ayarlar[0]['siteBaslik'];
	$siteanahtar=$ayarlar[0]["siteAnahtarKelime"];
	$siteaciklama=$ayarlar[0]["siteAciklama"];
	$siteURL=$ayarlar[0]["siteurl"];
}
$iletisim=$VT->VeriGetir("siteiletisim","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
if($iletisim!=false)
{
	$iletisimTelefon=$iletisim[0]['telefon'];
	$iletisimMail=$iletisim[0]["mail"];
	$iletisimAdres=$iletisim[0]["adres"];
}



?>
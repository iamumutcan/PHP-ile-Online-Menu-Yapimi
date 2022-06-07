<?php

try {

	$db=new PDO("mysql:host=localhost;dbname=ucypanel",'root','');
	//echo "veri tabanı başarılı";
}
catch (PDOExpception $e) {
	echo $e->getMessage();

}
if(isset($_GET['urunsil'])){
if($_GET['urunsil']=="ok"){
	$sil=$db->prepare("DELETE from urunler where ID=:ID");
	$kontrol=$sil->execute(array(
		'ID' => $_GET['ID']

	));

	if($kontrol){
		header("location:../../urunler.php?durum=ok");
	}
	else {
		header("location:../../urunler.php?durum=no");
	}
}}
if(isset($_GET['slidersil'])){
if($_GET['slidersil']=="ok"){
	$sil=$db->prepare("DELETE from slider where ID=:ID");
	$kontrol=$sil->execute(array(
		'ID' => $_GET['ID']

	));

	if($kontrol){
		header("location:../../slider.php?durum=ok");
	}
	else {
		header("location:../../slider.php?durum=no");
	}
}}

?>


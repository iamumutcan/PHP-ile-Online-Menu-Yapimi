<!doctype html>
<?php 
@session_start();
@ob_start();
include_once("inc/baglanti.php");
define("SITE", $siteURL."admin/");
if(!empty($_SESSION["ID"]) && !empty($_SESSION["adsoyad"]) && !empty($_SESSION["mail"]) )
{
  ?>
   <meta http-equiv="refresh" content="0;url=<?=SITE?>">
  <?php
  exit();
}
else
{
  
}
 ?>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <title>Dashkote - Bootstrap5 Admin Template</title>
</head>

<body class="bg-white">

  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <h4>Join us today</h4>
                </div>
<?php
                  
      if($_POST)
      {
        if(!empty($_POST["kullanici"]) && !empty($_POST["sifre"]))
        {
          $kullanici=$VT->filter($_POST["kullanici"]);
          $sifre=md5($VT->filter($_POST["sifre"]));
          $kontrol=$VT->VeriGetir("kullanicilar","WHERE kullanici=? AND sifre=?", array($kullanici,$sifre),"ORDER BY ID ASC",1);
          if($kontrol!=false)
          {
            $_SESSION["kullanici"]=$kontrol[0]["kullanici"];
            $_SESSION["adsoyad"]=$kontrol[0]["adsoyad"];
            $_SESSION["mail"]=$kontrol[0]["mail"];
            $_SESSION["ID"]=$kontrol[0]["ID"];
            ?>
                 <meta http-equiv="refresh" content="0;url=<?=SITE?>">
                <?php
                exit();
          }
          else
          {
            echo '<div class="alert alert-danger"> Kullanıcı adı ve şifre hatalı </div>';
          }

        }
        else
        {
          echo '<div class="alert alert-danger"> Boş bıraktığınız alanları doldurunuz. </div>';
        }
      }
      ?>
                <form action="#" method="post" class="form-body row g-3">
                  <div class="col-12">
                    <label for="inputName" class="form-label">Kullanıcı Adınız</label>
                    <input  type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adınız">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Şifreniz</label>
                    <input type="password" class="form-control" name="sifre" placeholder="Şifreniz">
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-warning">Giriş Yap</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none register-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->


</body>

</html>
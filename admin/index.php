<?php include 'inc/header.php'; ?>

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

         
          <!--icerik girisss-->
         <?php 
if($_GET && !empty($_GET["sayfa"]))
{
  $sayfa=$_GET["sayfa"].".php";
  if(file_exists(SAYFA.$sayfa))
    { 
      include_once(SAYFA.$sayfa);
    }
    else{
      include_once(SAYFA."home.php");
    }
}
else
{
  include_once(SAYFA."home.php");
}
          ?>
            
           <!-- /icerik girisss-->

          </div>
          <!-- end page content-->
         </div>




<?php include 'inc/footer.php'; ?>

  
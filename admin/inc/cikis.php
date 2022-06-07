<?php
@session_destroy();
@ob_end_flush();
?>
  <meta http-equiv="refresh" content="2;url=<?=SITE?>giris-yap.php">
<?php
exit();
?>
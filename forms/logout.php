
<?php  
  
@session_destroy();
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
  //echo "Success";
  
?>
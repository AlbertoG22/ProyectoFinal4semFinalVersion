<?php
  session_start();

  if(!$_SESSION['telefono'])
  {
    header('location: login.php');
  } else {
    echo "You are logged in";
  }

?>

<?php
  session_start();
  if(!$_SESSION['telefono'])
  {
    header('location: login.php');
  } else {
    echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
    echo "Volviendo al loggin...";
    //echo "<form class='col-12' action='login.php' method='POST'>
    //<button type='submit' class='btn btn-primary' name='submit'><i class='fas fa-sign-in-alt'></i>  Regresar</button>";
  }
?>

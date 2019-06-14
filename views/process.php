<?php
    session_start();

    if(isset($_POST['submit']))
    {

    $conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

    $number = $_POST['telefono'];
    $password = $_POST['password'];

    if($number != 1234554321 && $password != "qweRty789")
    {
      $sql = "SELECT * FROM deudor WHERE Telefono = '$number' AND Password = '$password' ";
      $result = $conn->query($sql);
      if($result->num_rows > 0)
      {
        $_SESSION['telefono'] = $number;
        header("location: deudor.php");
      } else{
        header("location: user.php");
      }
    }

    $sql = "SELECT * FROM propietario WHERE Telefono = '$number' AND Password = '$password' ";
    $result = $conn->query($sql);

      if($result->num_rows > 0)
      {
          $_SESSION['telefono'] = $number;
          header("location: admin.php");
      }

    }

   ?>

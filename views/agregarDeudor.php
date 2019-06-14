<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton'])) {
  $nombre = $_POST['NombreDeu'];
  $telefono = $_POST['TelefonoDeu'];
  $correo = $_POST['CorreoDeu'];
  $password = $_POST['ContraseñaDeu'];

  if (empty($nombre) OR empty($telefono) OR empty($correo) OR empty($password)) {
    echo "<p class='error'>Llena todos los campos<p/>";
  }
  else{
    $sql="SELECT * FROM deudor WHERE Telefono=$telefono";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) >= 1) {
      echo "<p class='error'>Ya existe un usuario con este número telefónico<p/>";
    }
    else{
      $sql = "INSERT INTO deudor (`Nombre`, `Telefono`, `Correo`, `Password`, `Deuda_total`)
      VALUES ('$nombre', '$telefono', '$correo', '$password', 0)";

      if ($conn->query($sql) === TRUE) {
        echo "<p class='correcto'>¡Usuario creado!<p/>";

        $id = "SELECT MAX(idDeudor) FROM deudor WHERE Telefono = '$telefono'";
        $result = $conn->query($id);
        $dato = mysqli_fetch_array($result);
        $noCliente = $dato['MAX(idDeudor)'];

        echo "<p class='correcto'>El no. Cliente es: $noCliente<p/>";
      }
    }
    mysqli_close($conn);
    mysqli_free_result($result);
  }
}

?>

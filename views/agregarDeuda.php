<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton2'])) {
  $deudor = $_POST['idDeudor'];
  $fecha = $_POST['FechaDeu'];
  $concepto = $_POST['ConceptoDeu'];
  $monto = $_POST['MontoDeu'];

  if (empty($deudor) OR empty($fecha) OR empty($concepto) OR empty($monto)) {
    echo "<p class='error'>Llena todos los campos<p/>";
  }
  else{
    $sql = "SELECT * FROM deudor WHERE idDeudor='$deudor'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) < 1) {
      echo "<p class='error'>El usuario no existe<p/>";
    }
    else {
      $sql = "INSERT INTO deudas (`idDeudor`, `Fecha`, `Concepto`, `Monto`)
      VALUES ('$deudor', '$fecha', '$concepto', '$monto')";

      if ($conn->query($sql) === TRUE) {
        echo "<p class='correcto'>Deuda agregada correctamente!<p/>";

        $id = "SELECT MAX(idDeudas) FROM deudas WHERE idDeudor = '$deudor'";
        $result = $conn->query($id);
        $dato = mysqli_fetch_array($result);
        $noDeuda = $dato['MAX(idDeudas)'];

        echo "<p class='correcto'>El no. de la deuda es: $noDeuda<p/>";
      }
    }

  }
}

?>

<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton3'])) {
  $deuda = $_POST['idDeuda'];
  $deudor = $_POST['DeudorId'];
  $fecha = $_POST['FechaPag'];
  $monto = $_POST['MontoPag'];

  if (empty($deuda) OR empty($deudor) OR empty($fecha) OR empty($monto)) {
    echo "<p class='error'>Llena todos los campos<p/>";
  }
  else{
    $sql = "SELECT * FROM deudas WHERE idDeudas='$deuda'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) < 1) {
      echo "<p class='error'>La deuda no existe<p/>";
    }
    else {
      $sql = "INSERT INTO pagos (`idDeudas`, `idDeudor`, `Fecha`, `Monto`)
      VALUES ('$deuda', '$deudor', '$fecha', '$monto')";

      if ($conn->query($sql) === TRUE) {
        echo "<p class='correcto'>Pago realizado correctamente!<p/>";

        $id = "SELECT MAX(idPagos) FROM pagos WHERE idDeudas = '$deuda'";
        $result = $conn->query($id);
        $dato = mysqli_fetch_array($result);
        $noPago = $dato['MAX(idPagos)'];

        echo "<p class='correcto'>El no. de la deuda es: $noPago<p/>";
      }
    }

  }
}

?>

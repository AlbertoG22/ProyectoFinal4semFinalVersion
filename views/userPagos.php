<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton1'])) {
  $deudor = $_POST['idUsuarioPagos'];
  

  if (empty($deudor)) {
    echo "<p class='error'>El dato deudor no puede estar vacío<p/>";
  }
  else{
    //---------------TABLA PAGOS-----------------------------
    $sql2 = "SELECT * FROM pagos WHERE idDeudor='$deudor'";
    $result2 = $conn->query($sql2);

    echo "<h3>Tabla pagos</h3><br>";
    echo "<table border='1'>
    <tr>
      <th>ID Deudor</th>
      <th>ID Pago</th>
      <th>ID Deuda</th>
      <th>Fecha</th>
      <th>Abono</th>
    </tr>";
      
    while($pay=mysqli_fetch_array($result2)){
      echo "<tr>";
      echo "<td>" .$pay['idDeudor']."</td>";
      echo "<td>" .$pay['idPagos']."</td>";
      echo "<td>" .$pay['idDeudas']."</td>";
      echo "<td>" .$pay['Fecha']."</td>";
      echo "<td>" .$pay['Monto']."</td>";

    }
    echo "</table><br>";

    mysqli_free_result($result2);
  }
}

?>
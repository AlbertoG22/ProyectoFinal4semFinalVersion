<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton5'])) {
  $deudorE = $_POST['idDeudorE'];
  

  if (empty($deudorE)) {
    echo "<p class='error'>El dato deudor no puede estar vacío<p/>";
  }
  else{
    //---------------TABLA DEUDAS-----------------------------
    $sql1 = "SELECT * FROM deudas WHERE idDeudor='$deudorE'";
    $result1 = $conn->query($sql1);

    echo "<h3>Tabla deudas</h3><br>";
    echo "<table border='1'>
    <tr>
      <th>ID Cliente</th>
      <th>ID Deudas</th>
      <th>Fecha</th>
      <th>Concepto</th>
      <th>Deuda</th>
    </tr>";
      
    while($debt=mysqli_fetch_array($result1)){
      echo "<tr>";
      echo "<td>" .$debt['idDeudor']."</td>";
      echo "<td>" .$debt['idDeudas']."</td>";
      echo "<td>" .$debt['Fecha']."</td>";
      echo "<td>" .$debt['Concepto']."</td>";
      echo "<td>" .$debt['Monto']."</td>";

    }
    echo "</table><br>";

    //---------------TABLA PAGOS-----------------------------
    $sql2 = "SELECT * FROM pagos WHERE idDeudor='$deudorE'";
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

    //-----------------DEUDA TOTAL--------------------
    $sql3 = "SELECT * FROM deudor WHERE idDeudor='$deudorE'";
    $result3 = $conn->query($sql3);

    echo "<h3>FALTANTE</h3><br>";
    echo "<table border='1'>
    <tr>
      <th>Deuda Faltante</th>
    </tr>";

    while($totalDebt=mysqli_fetch_array($result3)){
      echo "<tr>";
      echo "<td>" .$totalDebt['Deuda_total']."</td>";

    }
    echo "</table>";

    mysqli_free_result($result1);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
  }
}

?>
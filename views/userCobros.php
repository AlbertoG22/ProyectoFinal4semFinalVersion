<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton2'])) {
  $deudor = $_POST['idUsuarioCobro'];
  

  if (empty($deudor)) {
    echo "<p class='error'>El dato deudor no puede estar vacío<p/>";
  }
  else{
    //---------------TABLA DEUDAS-----------------------------
    $sql1 = "SELECT * FROM deudas WHERE idDeudor='$deudor'";
    $result1 = $conn->query($sql1);

    echo "<h3>Tabla Cobros</h3><br>";
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
    
    mysqli_free_result($result1);
  }
}

?>
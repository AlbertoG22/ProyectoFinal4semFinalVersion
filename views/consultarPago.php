<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

$meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

if (isset($_POST['boton4'])) {
  $deudorP = $_POST['idDeudorC'];
  $fecha = $_POST['FechaC'];
  
  $month = $fecha[date("m")]; //numero
  $mes = "%-0".$month."-%";

  if (empty($fecha) AND empty($deudorP)) {
    echo "<p class='error'>El dato fecha no puede estar vacío<p/>";
  }
  elseif (!empty($deudorP) AND empty($fecha)) {
    echo "<p class='error'>El dato fecha no puede estar vacío<p/>";      
  }
  elseif (empty($deudorP) AND !empty($fecha)) {
      //echo "<div>".$month."</div>";
    
      $sql1 = "SELECT * FROM pagos WHERE Fecha LIKE '$mes'";
      $result1 = $conn->query($sql1);

      echo "<h3>Tabla pagos por fecha</h3><br>";
      echo "<p>Escogiste el mes: ".$meses[$month-1]. "</p>";
      echo "<table border='1'>
      <tr>
        <th>ID Pago</th>
        <th>ID Deuda</th>
        <th>ID deudor</th>
        <th>Fecha</th>
        <th>Monto</th>
      </tr>";
      
    while($pay1=mysqli_fetch_array($result1)){
      echo "<tr>";
      echo "<td>" .$pay1['idPagos']."</td>";
      echo "<td>" .$pay1['idDeudas']."</td>";
      echo "<td>" .$pay1['idDeudor']."</td>";
      echo "<td>" .$pay1['Fecha']."</td>";
      echo "<td>" .$pay1['Monto']."</td>";

    }
    echo "</table><br>";
    mysqli_free_result($result1);

    
  }
  elseif (!empty($deudorP) AND !empty($fecha)){
    
    $sql2 = "SELECT * FROM pagos WHERE Fecha LIKE '$mes' AND idDeudor='$deudorP'";
    $result2 = $conn->query($sql2);

    echo "<h3>Tabla pagos por fecha y usuario</h3><br>";
    echo "<p>Escogiste el mes: ".$meses[$month-1]. "</p>";
    echo "<p>Del usuario con no. cliente: ".$deudorP. "</p>";
    echo "<table border='1'>
    <tr>
      <th>ID Pago</th>
      <th>ID Deuda</th>
      <th>ID deudor</th>
      <th>Fecha</th>
      <th>Monto</th>
    </tr>";
      
    while($pay2=mysqli_fetch_array($result2)){
      echo "<tr>";
      echo "<td>" .$pay2['idPagos']."</td>";
      echo "<td>" .$pay2['idDeudas']."</td>";
      echo "<td>" .$pay2['idDeudor']."</td>";
      echo "<td>" .$pay2['Fecha']."</td>";
      echo "<td>" .$pay2['Monto']."</td>";

    }
    echo "</table><br>"; 
    
    mysqli_free_result($result2);
  }
}

?>
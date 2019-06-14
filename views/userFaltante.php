<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton3'])) {
  $deudor = $_POST['idUsuarioFaltante'];
  

  if (empty($deudor)) {
    echo "<p class='error'>El dato deudor no puede estar vacío<p/>";
  }
  else{
    //-----------------DEUDA FALTANTE--------------------
    $sql3 = "SELECT * FROM deudor WHERE idDeudor='$deudor'";
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

    mysqli_free_result($result3);
  }
}

?>
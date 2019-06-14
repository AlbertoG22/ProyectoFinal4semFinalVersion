<?php

$conn = new mysqli('localhost:3307', 'root', '', 'sistema_cobranza');

if (isset($_POST['boton0'])) {
  $telefonoBus = $_POST['TelefonoCons'];
  

  if (empty($telefonoBus)) {
    echo "<p class='error'>El dato teléfono no puede estar vacío<p/>";
  }
  else{
    //---------------DATOS CLIENTE-----------------------------
    $sql = "SELECT * FROM DEUDOR WHERE Telefono='$telefonoBus'";
    $result = $conn->query($sql);

    echo "<h3>Datos</h3><br>";
    echo "<table border='1'>
    <tr>
      <th>ID Deudor</th>
      <th>Nombre</th>
      <th>Teléfono</th>
      <th>Correo</th>
    </tr>";
      
    while($info=mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" .$info['idDeudor']."</td>";
      echo "<td>" .$info['Nombre']."</td>";
      echo "<td>" .$info['Telefono']."</td>";
      echo "<td>" .$info['Correo']."</td>";

    }
    echo "</table><br>";

    mysqli_free_result($result);
  }
}

?>
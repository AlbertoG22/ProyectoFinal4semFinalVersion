<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="static/css/styleFront.css" th:href="@{/css/index.css}">
    <link rel="stylesheet" type="text/css" href="static/css/style2.css" th:href="@{/css/index.css}">

    <style>
        .error{
            background-color: #ff9185;
            font-size: 12px;
            padding: 10px;
        }
        .correcto{
            background-color: #a0dea7;
            font-size: 12px;
            padding: 10px;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="static/img/logo2.png" width="30" height="30"> Cuenta Administrador</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#registro" class="nav-link">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a href="#agregarDeuda" class="nav-link">Agregar deuda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#agregarPagos" class="nav-link">Pagar deuda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#consultarPagos" class="nav-link">Consultar pagos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#consultarEstado" class="nav-link">Consultar deudas</a>
                    </li>
                    <a href="logout.php" class="btn btn-danger btn-md" role="button" aria-pressed="true">
                    <span class="form-group" ></span> Log out
                    </a>
                </ul>
            </div>
        </div>
    </nav>
    <div class="car-caption">
        <br>
        <h3>Bienvenido Administrador</h3><br>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slides-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slides-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slides-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div align="center"><img src="static/img/fondoadmin1.jpg"></div>

            </div>
            <div class="carousel-item">
                <div align="center"><img src="static/img/fondoadmin2.jpg"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br><br>



    <div class="modal-dialog text-center">
        <h2 id="registro">CONSULTAR DATOS</h2>
        <p>Si desea consultar los datos de algún cliente deudor, escriba el número de teléfono</p>
        <div class="col-sm-7 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                  <img src="static/img/search.png">
                  <form class="col-12" action="" method="POST">
                    <div class="form-group" id="tel-group">
                        <input type="number" class="form-control" placeholder="Teléfono" name="TelefonoCons">
                    </div>
                    <button type="submit" class="btn btn-primary" name="boton0"><i class="fas fa-sign-in-alt"></i>  Buscar</button>
                  </form>
                </div>
            </div>
        </div>
        <?php
          include('buscarDatos.php');
        ?>
    </div>



    <hr>
    <div class="modal-dialog text-center">
        <h2 id="registro">REGISTRO DEUDORES</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                  <img src="static/img/employee2.png">
                  <form class="col-12" action="" method="POST">
                    <?php
                    if(isset($_POST['NombreDeu'])){
                      $nombre = $_POST['NombreDeu'];
                      $telefono = $_POST['TelefonoDeu'];
                      $correo = $_POST['CorreoDeu'];
                      $password = $_POST['ContraseñaDeu'];

                      $campos = array();

                      if($nombre == ""){
                        array_push($campos, "El campo nombre no puede estar vacío.");
                      }
                      if($telefono == "" || strlen($telefono) < 10){
                        array_push($campos, "El campo teléfono no puede estar vacío ni tener menos de 10 dígitos.");
                      }
                      if($correo == "" || strpos($correo, "@") === false){
                        array_push($campos, "Dirección de correo no válida.");
                      }
                      if($password == "" || strlen($password) < 6){
                        array_push($campos, "El campo contraseña no puede estar vacío ni tener menos de 6 caracteres.");
                      }
                      if(count($campos) > 0){
                        echo "<div class='error'>";
                        for($a = 0; $a < count($campos); $a++){
                          echo "<li>".$campos[$a]."</li>";
                        }
                      }
                      else{
                        echo "<div class='correcto'> Datos correctos";
                      }
                      echo "</div>";
                    }
                    ?>
                    <div class="form-group" id="user-group">
                      <input type="text" class="form-control" placeholder="Nombre de usuario" name="NombreDeu">
                    </div>
                    <div class="form-group" id="tel-group">
                        <input type="number" class="form-control" placeholder="Teléfono" name="TelefonoDeu">
                    </div>
                    <div class="form-group" id="email-group">
                        <input type="email" class="form-control" placeholder="Correo" name="CorreoDeu">
                    </div>
                    <div class="form-group" id="contraseña-group">
                      <input type="password" class="form-control" placeholder="Contraseña" name="ContraseñaDeu">
                    </div>
                    <button type="submit" class="btn btn-primary" name="boton"><i class="fas fa-sign-in-alt"></i>  Registrar</button>
                    <?php
                      include('agregarDeudor.php');
                     ?>
                  </form>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <hr>
    <div class="modal-dialog text-center">
        <h2 id="agregarDeuda">ASIGNAR DEUDA</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/debt.png">
                    <form class="col-12" action="" method="POST">
                        <?php
                        if(isset($_POST['idDeudor'])){
                          $deudor = $_POST['idDeudor'];
                          $fecha = $_POST['FechaDeu'];
                          $concepto = $_POST['ConceptoDeu'];
                          $monto = $_POST["MontoDeu"];

                          $campos = array();

                          if($deudor == ""){
                            array_push($campos, "El campo deudor no puede estar vacío.");
                          }
                          if($fecha == ""){
                            array_push($campos, "El campo fecha no puede estar vacío.");
                          }
                          if($concepto == ""){
                            array_push($campos, "El campo ceoncepto no puede estar vacío.");
                          }
                          if($monto == "" ){
                            array_push($campos, "El campo monto no puede estar vacío.");
                          }
                          if(count($campos) > 0){
                            echo "<div class='error'>";
                            for($b = 0; $b < count($campos); $b++){
                              echo "<li>".$campos[$b]."</li>";
                            }
                          }
                          else{
                            echo "<div class='correcto'> Datos correctos";
                          }
                          echo "</div>";
                        }
                        ?>
                        <div class="form-group" id="user-group">
                          <input type="number" class="form-control" placeholder="ID Deudor" name="idDeudor">
                        </div>
                        <div class="form-group" id="date-group">
                            <input type="date" class="form-control" placeholder="Fecha" name="FechaDeu">
                        </div>
                        <div class="form-group" id="conc-group">
                            <input type="text" class="form-control" placeholder="Concepto" name="ConceptoDeu">
                        </div>
                        <div class="form-group" id="monto-group">
                          <input type="number" class="form-control" placeholder="Monto" name="MontoDeu">
                        </div>
                        <button type="submit" class="btn btn-primary" name="boton2"><i class="fas fa-sign-in-alt"></i>  Agregar</button>
                        <?php
                          include('agregarDeuda.php');
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <hr>
    <div class="modal-dialog text-center">
        <h2 id="agregarPagos">REALIZAR PAGOS</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/logo.png">
                    <form class="col-12" action="" method="POST">
                        <?php
                        if(isset($_POST['idDeuda'])){
                          $deudaP = $_POST['idDeuda'];
                          $deudorP = $_POST['DeudorId'];
                          $fechaP = $_POST['FechaPag'];
                          $montoP = $_POST["MontoPag"];

                          $campos = array();

                          if($deudaP == ""){
                            array_push($campos, "El campo deuda no puede estar vacío.");
                          }
                          if($deudorP == ""){
                            array_push($campos, "El campo deudor no puede estar vacío.");
                          }
                          if($fechaP == ""){
                            array_push($campos, "El campo fecha no puede estar vacío.");
                          }
                          if($montoP == "" ){
                            array_push($campos, "El campo monto no puede estar vacío.");
                          }
                          if(count($campos) > 0){
                            echo "<div class='error'>";
                            for($c = 0; $c < count($campos); $c++){
                              echo "<li>".$campos[$c]."</li>";
                            }
                          }
                          else{
                            echo "<div class='correcto'> Datos correctos";
                          }
                          echo "</div>";
                        }
                        ?>
                        <div class="form-group" id="coi-group">
                          <input type="number" class="form-control" placeholder="ID Deuda" name="idDeuda">
                        </div>
                        <div class="form-group" id="user-group">
                            <input type="number" class="form-control" placeholder="ID Deudor" name="DeudorId">
                        </div>
                        <div class="form-group" id="date-group">
                            <input type="date" class="form-control" placeholder="Fecha" name="FechaPag">
                        </div>
                        <div class="form-group" id="monto-group">
                          <input type="number" class="form-control" placeholder="Monto" name="MontoPag">
                        </div>
                        <button type="submit" class="btn btn-primary" name="boton3"><i class="fas fa-sign-in-alt"></i>  Abonar</button>
                        <?php
                          include('pagarDeuda.php');
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <hr>
    <div class="modal-dialog text-center">
        <h2 id="consultarPagos">CONSULTAR PAGOS</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/boubt.png">
                    <form class="col-12" action="" method="POST">
                        
                        <!--//if(isset($_POST['idDeudorC'])){
                          //$deudorC = $_POST['idDeudorC'];
                          //$fechaC = $_POST['FechaC'];

                          //$campos = array();

                          //if($deudorC == "" && $fechaC==""){
                            //array_push($campos, "El campo fecha no puede estar vacío.");
                          //}
                          //elseif($deudorC == "" && $fechaC != ""){
                            //array_push($campos, "Datos correctos.");
                         // }
                          //elseif($fechaC == "" && $deudorC != ""){
                            //array_push($campos, "El campo fecha no puede estar vacío.");
                          //}

                          //if(count($campos) > 0){
                            //echo "<div class='error'>";
                            //for($d = 0; $d < count($campos); $d++){
                             // echo "<li>".$campos[$d]."</li>";
                            //}
                          //}
                          //else{
                            //echo "<div class='correcto'> Datos correctos";
                          //}
                          //echo "</div>";
                        //}
                        -->
                        <div class="form-group" id="user-group">
                          <input type="number" class="form-control" placeholder="ID Deudor" name="idDeudorC">
                        </div>
                        <div class="form-group" id="date-group">
                            <input type="date" class="form-control" placeholder="Fecha" name="FechaC">
                        </div>
                        <button type="submit" class="btn btn-primary" name="boton4"><i class="fas fa-sign-in-alt"></i>  Buscar</button>
                        <div class="text-light">
                        <p>Nota: si no seleccionas el cliente, se muestran todos los registros</p>                            
                        </div>
                      </form>
                </div>
            </div>
        </div>
        <br>
        <?php
          include('consultarPago.php');
        ?>
    </div>

    <br><br>
    <hr>
    <div class="modal-dialog text-center">
        <h2 id="consultarEstado">ESTADO DE LA DEUDA</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/report.png">
                    <form class="col-12" action="" method="POST">
                        <?php
                        if(isset($_POST['idDeudorC'])){
                          $deudorC = $_POST['idDeudorC'];

                          $campos = array();

                          if($deudorC == ""){
                            array_push($campos, "El campo deudor no puede estar vacío.");
                          }

                          if(count($campos) > 0){
                            echo "<div class='error'>";
                            for($d = 0; $d < count($campos); $d++){
                              echo "<li>".$campos[$d]."</li>";
                            }
                          }
                          else{
                            echo "<div class='correcto'> Datos correctos";
                          }
                          echo "</div>";
                        }
                        ?>
                        <div class="form-group" id="user-group">
                          <input type="number" class="form-control" placeholder="ID Deudor" name="idDeudorE">
                        </div>
                        <!--<div class="form-group" id="date-group">
                            <input type="date" class="form-control" placeholder="Fecha" name="FechaC">
                        </div>-->
                        <button type="submit" class="btn btn-primary" name="boton5"><i class="fas fa-sign-in-alt"></i>  Buscar</button>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
        <table>
          <?php
            include("estadoPago.php");
          ?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

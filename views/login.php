<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="static/css/style.css" th:href="@{/css/index.css}">

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
    <div class="modal-dialog text-center">
      <div class="col-sm-8 main-section">
        <div class="modal-content">
          <div class="col-12 user-img">
            <img src="static/img/user.png">
            <form class="col-12" action="process.php" method="POST">
              <?php
              if(isset($_POST['usuario'])){
                $usuario = $_POST['usuario'];
                $password = $_POST["contraseña"];

                $campos = array();

                if($usuario == ""){
                  array_push($campos, "El campo usuario no puede estar vacío.");
                }
                if($password == "" || strlen($password) < 6){
                  array_push($campos, "El campo contraseña no puede estar vacío ni tener menos de 6 caracteres.");
                }
                if(count($campos) > 0){
                  echo "<div class='error'>";
                  for($i = 0; $i < count($campos); $i++){
                    echo "<li>".$campos[$i]."</li>";
                  }
                }
                else{
                  echo "<div class='correcto'> Datos correctos";
                }
                echo "</div>";
              } 
              ?>
              <div class="form-group" id="tel-group">
                <input type="text" class="form-control" placeholder="Teléfono" name="telefono">
              </div>
              <div class="form-group" id="contraseña-group">
                <input type="password" class="form-control" placeholder="Contraseña" name="password">
              </div>
              <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-sign-in-alt"></i>  Ingresar</button>
            </form>
            <div class="col-12 forgot">
              <a href="#">Recordar contraseña</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

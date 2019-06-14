<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sistema de cobranza</title>
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
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="static/img/logo2.png" width="30" height="30" class="d-inline-block align-top">
          Sistema de cobranza
        </a>
      </div>
      <!--<div class="navbar-nav">
        <a class="nav-item nav-link" href="index.html">Login</a>
      </div>-->
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slides-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slides-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slides-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div align="center"><img src="static/img/cobro5.jpg" width="1100" height="500"></div>
          <div class="carousel-caption">
            <h1 class="display-2" style="color:black">Sistema Cobranza</h1>
            <h3 style="color:black">Tu mejor opción</h3>
            <a href="login.php">
              <button type="button" class="btn btn-primary btn-lg">Login</button>
            </a>
          </div>
        </div>
        <div class="carousel-item">
          <div align="center"><img src="static/img/cobro8.jpg" width="1100" height="500"></div>
        </div>
        <div class="carousel-item">
          <div align="center"><img src="static/img/cobro7.jpg" width="1100" height="550"></div>
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
    <br><br><br><br>
    <div class="container-fluid padding">
      <div class="row text-center padding">
        <div class="col-12">
          <h2>Contáctanos</h2>
        </div>
        <div class="col-12 social padding">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-google-plus-g"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
    <br><br><br>
    <footer>
      <div class="container-fluid padding">
        <div class="row text-center">
          <div class="col-md-4">
            <img src="static/img/logo2.png" width="50" height="50">
            <h5>Sistema de cobranza</h5>
            <hr class="light">
            <p>044-312-548-69-12</p>
            <p>finanzasfinaciaras@economia.com</p>
          </div>
          <div class="col-md-4">
            <hr class="light">
            <h5>Horarios</h5>
            <hr class="light">
            <p>Todos los días</p>
            <p>Los 365 días del año</p>
            <p>24/7</p>
          </div>
          <div class="col-md-4">
            <hr class="light">
            <h5>Ubicación</h5>
            <hr class="light">
            <p>Colima, Col.</p>
            <p>México</p>
          </div>
          <div class="col-12">
            <hr class="light">
            <h5>&copy;sistemacobranza.com</h5>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>

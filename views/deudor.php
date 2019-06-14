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
            <a class="navbar-brand" href="#"><img src="static/img/logo2.png" width="30" height="30"> Cuenta Usuario</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#registro" class="nav-link">Pagos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#agregarDeuda" class="nav-link">Cobros</a>
                    </li>
                    <li class="nav-item">
                        <a href="#agregarPagos" class="nav-link">Faltante</a>
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
        <h3>Bienvenido Usuario</h3><br>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slides-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slides-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slides-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div align="center"><img src="static/img/fondousuario1.jpg"></div>

            </div>
            <div class="carousel-item">
                <div align="center"><img src="static/img/fondousuario2.jpg"></div>
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
    <hr>
    <div class="modal-dialog text-center">
        <h2 id="registro">CONSULTAR PAGOS REALIZADOS</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                  <img src="static/img/checked.png">
                  <form class="col-12" action="" method="POST">

                    <div class="form-group" id="user-group">
                      <input type="number" class="form-control" placeholder="No. Cliente" name="idUsuarioPagos">
                    </div>
                    <button type="submit" class="btn btn-primary" name="boton1"><i class="fas fa-sign-in-alt"></i>  Consultar</button>
                  </form>
                </div>
            </div>
        </div>
        <br><br>
        <table>
        <?php
            include("userPagos.php");
        ?>
        </table>
    </div>

    <br><br>
    <hr>
    <div class="modal-dialog text-center">
        <h2 id="agregarDeuda">CONSULTAR COBROS</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/debt2.png">
                    <form class="col-12" action="" method="POST">

                        <div class="form-group" id="user-group">
                          <input type="number" class="form-control" placeholder="No. Cliente" name="idUsuarioCobro">
                        </div>
                        <button type="submit" class="btn btn-primary" name="boton2"><i class="fas fa-sign-in-alt"></i>  Consultar</button>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
        <table>
        <?php
            include("userCobros.php");
        ?>
        </table>
    </div>

    <br><br>
    <hr>

    <div class="modal-dialog text-center">
        <h2 id="agregarPagos">CONSULTAR FALTANTE</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/coin.png">
                    <form class="col-12" action="" method="POST">

                        <div class="form-group" id="user-group">
                          <input type="number" class="form-control" placeholder="No. Cliente" name="idUsuarioFaltante">
                        </div>
                        <button type="submit" class="btn btn-primary" name="boton3"><i class="fas fa-sign-in-alt"></i>  Consultar</button>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
        <table>
        <?php
            include("userFaltante.php");
        ?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

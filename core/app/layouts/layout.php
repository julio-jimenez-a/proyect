<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Dashboard</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>

<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
<link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/fullcalendar/moment.min.js'></script>
<script src='assets/fullcalendar/fullcalendar.min.js'></script>
<?php endif; ?>

</head>

<body>
<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
  <div class="wrapper">

      <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="./ventas" class="simple-text logo-normal">
          Farmacia
        </a>
      </div>

        <div class="sidebar-wrapper">
              <ul class="nav">

                <li class="nav-item active">
            <a class="nav-link" href="./?view=home">
              <i class="fa fa-home"></i>
              <p>Inicio</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./?view=reservations">
              <i class="fa fa-calendar"></i>
              <p>Citas</p>
            </a>
          </li>

                  <li class="nav-item ">
            <a class="nav-link" href="./?view=pacients">
                          <i class="fa fa-male"></i>
                          <p>Pacientes</p>
                      </a>
                  </li>

                  <li class="nav-item ">
            <a class="nav-link" href="./?view=medics">
                          <i class="fa fa-support"></i>
                          <p>Medicos</p>
                      </a>
                  </li>

                  <li class="nav-item ">
            <a class="nav-link" href="./?view=categories">
                          <i class="fa fa-th-list"></i>
                          <p>Areas</p>
                      </a>
                  </li>

                  <li class="nav-item ">
            <a class="nav-link" href="./?view=reports">
                          <i class="fa fa-area-chart"></i>
                          <p>Reporte de Citas</p>
                      </a>
                  </li>

                  <li class="nav-item ">
            <a class="nav-link" href="./?view=users">
                          <i class="fa fa-users"></i>
                          <p>Usuarios</p>
                      </a>
                  </li>

                  <li class="nav-item ">
            <a class="nav-link" href="./?view=configuration">
                          <i class="fa fa-configuration"></i>
                          <p>Configuracion</p>
                      </a>
                  </li>

              </ul>
        </div>
      </div>

      <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><b>Sistema de Citas Medicas</b></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Salir</a></li>
                </ul>
              </li>
            </ul>
<!--
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group  is-empty">
                <input type="text" class="form-control" placeholder="Search">
                <span class="material-input"></span>
              </div>
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="fa fa-search"></i><div class="ripple-container"></div>
              </button>
            </form>
            -->
          </div>
        </div>
      </nav>

      <div class="content">
      <div class="container-fluid">
<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("index");

?>
</div>
      </div>

      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul>
                            
        <!--
              <li>
                <a href="#">
                  Company
                </a>
              </li>
              <li>
                <a href="#">
                  Portfolio
                </a>
              </li>
              <li>
                <a href="#">
                   Blog
                </a>
              </li>
          -->
            </ul>
          </nav>
          <p class="copyright pull-right">
            <a target="_blank">Julio</a> &copy; 2019
          </p>
        </div>
      </footer>
    </div>
  </div>
<?php else:?>
<br><br><br><br><br>
<div class="content">
<div class="container">
<div class="row">
      <div class="col-md-4 col-md-offset-4">
      <?php if(isset($_COOKIE['password_updated'])):?>
        <div class="alert alert-success">
        <p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
        <p>Inicie sesion con su nueva contraseña.</p>

        </div>
      <?php setcookie("password_updated","",time()-18600);
       endif; ?>

<div class="card">
<div class="card-header" data-background-color="green">
<h4 class="title">Acceder al Sistema</h4>
</div>

<div class="card-content table-responsive">
<form accept-charset="UTF-8" role="form" method="post" action="./?action=processlogin">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Usuario" name="mail" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
              </div>
              <input class="btn btn-primary btn-block" type="submit" value="Iniciar Sesion">
            </fieldset>
              </form>
              </div>
              </div>
    </div>
  </div>
</div>


<?php endif;?>
</body>

  <!--   Core JS Files   -->
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>

  <!--  Charts Plugin -->
  <script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  <!-- Material Dashboard javascript methods -->
  <script src="assets/js/material-dashboard.js"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){

      // Javascript method's body can be found in assets/js/demos.js
          demo.initDashboardPageCharts();

      });
  </script>

</html>

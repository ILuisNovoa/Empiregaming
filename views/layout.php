<?php
if(isset($_SESSION["users"])){
    
}
else    
{
         header('location:?controller=login');
}
$ocultar1="block";
$ocultar2="block";

if($_SESSION["users"]->id_rol == 2)
{
      $ocultar1="none";
}else{ 
$ocultar2="none";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>
    EMPIRE GAMING
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="icon" type="image/png" href="assets/images/icons/joy.ico"/>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/css/local.css">
  <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="assets/datatables/Datatables-1.10.22/css/dataTables.bootstrap4.min">
</head>

<body >
  <div class="wrapper">
    <div class="sidebar">
     
        <div class="sidebar-wrapper">
        <div class="logo">
          <a href="" class="simple-text logo-mini">
            rol
          </a>
          <a href="" class="simple-text logo-normal">
            <?php echo $_SESSION['users']->roles  ?>                                               
          </a>
        </div>
        <ul class="nav">
          <li class="">
            <a href="?controller=home">
              <i class="tim-icons icon-single-02" ></i>
              <p>Perfil</p>
            </a>
          </li>
          <li>
            <a href="?controller=gamer">
              <i class="tim-icons icon-satisfied"></i>
              <p>Jugadores</p>
            </a>
          </li>
          <li>
            <a href="?controller=tournament">
              <i class="tim-icons icon-trophy"></i>
              <p>Torneos</p>
            </a>
          </li>
          <li>
            <a href="?controller=tournament&method=getByIdUser&id=<?php echo $_SESSION['users']->id ?>" 
              style="display: <?php echo  $ocultar2;?>">
              <i class="tim-icons icon-trophy" ></i>
              <p>Mi torneo </p>
            </a>
          </li>
          <li>
            <a href="?controller=team">
              <i class="tim-icons icon-heart-2"></i>
              <p>Equipos</p>
            </a>
          </li>
          <li>
            <a  href="?controller=team&method=viewTeamId&id=<?php echo $_SESSION['users']->id ?>"style="display: <?php echo  $ocultar2;?>">
              <i class="tim-icons icon-heart-2"></i>
              <p>Mi equipo</p>
            </a>
          </li>
          <li>
            <a href="?controller=tournament&method=getById&id=<?php echo $_SESSION['users']->id ?>" 
              style="display: <?php echo  $ocultar1;?>">
              <i class="tim-icons icon-trophy" ></i>
              <p>Mi torneo</p>
            </a>
          </li>
          <li>
            <a href="?controller=game" style="display: <?php echo  $ocultar1;?>">
              <i class="tim-icons icon-controller" ></i>
              <p>Juegos</p>
            </a>
          </li>
          <li>
            <a href="?controller=result">
              <i class="tim-icons icon-align-left-2"></i>
              <p>Resultados</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent   ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
           <a href="?controller=home"><img class="as" src="assets/images/loginlogo.png"></a> 
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto ">
              <div class="search-bar input-group">
              </div>         
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                   <?php    echo '<img src="data:url/jpeg;base64,'.base64_encode( $_SESSION['users']->imagess ).'"/>';?>

                  </div>
                 <?php echo $_SESSION['users']->name  ?>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Cerrar sesión
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">

                    <a href="?controller=user&method=edit&id" class="nav-item dropdown-item">Configurar perfil </a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li class="nav-link">
                    <a href="?controller=login&method=logout" class="nav-item dropdown-item">Cerrar sesión</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- End Navbar -->
        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/black-dashboard.min.js?v=1.0.0" type="text/javascript"></script>
        <!-- Black Dashboard DEMO methods, don't include it in your project! -->
        <script src="assets/demo/demo.js"></script>
        <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="assets/js/localmain.js"></script>

       
  </body>

  </html>
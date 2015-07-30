<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistema</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/lineicons/style.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">

    <script src="{{ asset('/js/chart-master/Chart.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      body {overflow-x:hidden;}
    </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">

            <!--logo start-->
            <a href="index.html" class="logo">{!!HTML::image('utem.png')!!}</a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->

                    <!-- settings end -->
                    <!-- inbox dropdown start-->

                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              <br><br>

                  <h5 class="centered">Menú Alumno</h5>

                  <li class="mt">
                      <a class="active" href="alumno">
                          <span>INICIO</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="buscar" >
                          <span>BUSCAR</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
              <div class="row">

                        <div class="row mtbox">
                        <!--  @if ( !Auth::guest() )
                        <center><h1>Bienvenido {{Auth::user("")->nombres}}</h1></center>
                        @endif-->
                        <center><h1>Bienvenido {{$nombreCompleto}}</h1></center>
                        <center><h4>Contectado como:
                          @foreach($usuario->roles as $rol)
                            @if($rol->nombre == 'Administrador')
                            <a href="/admin/inicio" >
                                <span>Administrador</span>
                            </a>
                            @endif
                            @if($rol->nombre == 'Encargado')
                            <a href="/encargado/menu" >
                                <span>Encargado</span>
                            </a>
                            @endif
                            @if($rol->nombre == 'Docente')
                            <a href="#" >
                                <span>Docente</span>
                            </a>
                            @endif
                            @if($rol->nombre == 'Estudiante')
                            <a href="/alumno" >
                                >><u><b><span>Alumno</span></b></u><<
                            </a>
                            @endif
                          @endforeach</h3></center>
                        </div><!-- /row mt -->
                        <div class="row mt">
                        <center><h3>Tu horario para este semestre es el siguiente.</h3></center>

                        </div><!-- /row -->
                          <table class="calendar table table-bordered">
                            <thead>
                              <tr>
                                <th>&nbsp;</th>
                                <th width="20%">Lunes</th>
                                <th width="20%">Martes</th>
                                <th width="20%">Miércoles</th>
                                <th width="20%">Jueves</th>
                                <th width="20%">Viernes</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($periodos as $periodo)
                              <tr>
                                <td>{{ $periodo->inicio }} - {{ $periodo->fin }}</td>
                                 <td class=" has-events" rowspan="1">
                                  <div style="width: 99%; height: 100%;">
                                    Asignatura 1 <br> Sala M3-101
                                  </div>
                                </td>
                                <td class=" no-events" rowspan="1"></td>
                                <td class=" no-events" rowspan="1"></td>
                                <td class=" no-events" rowspan="1"></td>
                                <td class=" no-events" rowspan="1"></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>

                        <div class="row">

                        </div><!-- /row -->

                        <div class="row mt">

                        </div><!-- /row -->

              </div>
        </section>
      </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('/js/common-scripts.js"></script>




    <!--script for this page-->




  </body>
</html>

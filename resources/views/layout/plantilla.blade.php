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

    <script src="{{ asset('/js/chart-master/Chart.js') }}"></script>

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
                
            <div class="btn-group">
            Roles: 
              @foreach($usuario->roles as $rol)
                            @if($rol->nombre == 'Administrador')
                            <a href="/admin/inicio" >
                              <button type="button" class="btn btn-default">Administrador</button>
                            </a>
                            @endif
                            @if($rol->nombre == 'Encargado')
                            <a href="/encargado/menu" >
                              <button type="button" class="btn btn-default">Encargado</button>
                            </a>
                            @endif
                            @if($rol->nombre == 'Docente')
                            <a href="#" >
                                <button type="button" class="btn btn-default">Docente</button>
                            </a>
                            @endif
                            @if($rol->nombre == 'Estudiante')
                            <a href="/alumno" >
                                <button type="button" class="btn btn-default">Alumno</button>
                            </a>
                            @endif
              @endforeach
            </div>              
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{ action('Auth\AuthController@getLogout') }}">Cerrar Sesión</a></li>
              </ul>
            </div>
        </header>

        @yield('contenido')

        </body>
</html>
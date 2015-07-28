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
    <link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
    $(function() {
   //Array para dar formato en español
    $.datepicker.regional['es'] =
    {
    closeText: 'Cerrar',
    prevText: 'Previo',
    nextText: 'Próximo',

    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
    dateFormat: 'yy-mm-dd', firstDay: 0,
    initStatus: 'Selecciona la fecha', isRTL: false};
   $.datepicker.setDefaults($.datepicker.regional['es']);

      
    });
    </script>

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

                  <h5 class="centered">Menú Encargado</h5>

                  <li class="mt">
                      <a href="encargado/menu">
                          <span>INICIO</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/asignaturas" >
                          <span>ASIGNATURAS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/cursos" >
                          <span>CURSOS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="/horarios" >
                          <span>HORARIO</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/salas" >
                          <span>SALAS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/tiposdesalas" >
                          <span>TIPOS DE SALAS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/periodos" >
                          <span>PERIODOS</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          <br>
            <h3> Registrar Horario</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                    @if (count($errors) > 0)
	                    <div class="alert alert-danger">
	                      <ul>
	                        @foreach ($errors->all() as $error)
	                           <li>{{ $error }}</li>
                          @endforeach
	                      </ul>
                      </div>
                    @endif
                      <h4 class="mb">Ingrese la información del horario</h4>
                      {!! Form::open(['route' => 'horarios.store']) !!}
                      <form class="form-horizontal style-form" method="get">
                      		<div class="form-group">Fecha inicial del semestre
								            {!! Form::text('fechaInicial', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder'=>'Dia de Inicio']) !!}
							            <script>
                  $(function() {
                    $("#datepicker").datepicker();
                  });
                </script>
                          </div>
							            <div class="form-group"><p>Sala:
								            {!! Form::select('salas_id', $salas) !!}</p>
							            </div>
							            <div class="form-group"><p>Período:
							            	{!! Form::select('periodo_id', $periodo) !!}</p>
							            </div>
							            <div class="form-group"><p>Curso:
								            {!! Form::select('curso_id', $curso) !!}</p>
							            </div>
                          <div class="form-group">Fecha final del semestre
								            {!! Form::text('fechaFinal', null, ['id' => 'datepicker2', 'class' => 'form-control', 'placeholder'=>'Dia de termino']) !!}
                            <script>
                  $(function() {
                    $("#datepicker2").datepicker();
                  });
                </script>
							            </div>
							            <div class="form-group">
								            {!! Form::submit('Registrar', ["class" => "btn btn-success btn-block"]) !!}
							            </div>

					          </form>
							      {!! Form::close() !!}
      						  <p>
	    						    @if(Session::has('message'))
          						  <div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        						  @endif
      						</p>
                  </div>
              </div>
            </div>

<center>
<br>
</center>
    </section>
      </section>

	</body>

</html>

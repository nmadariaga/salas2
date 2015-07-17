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
                    <li><a class="logout" href="login.html">Logout</a></li>
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
                      <a class="active" href="/cursos" >
                          <span>CURSOS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/horarios" >
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
      <!--sidebar end-->
      <section id="main-content">
          <section class="wrapper">
          <br>
            <h3> Registrar Curso</h3>

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
                      <h4 class="mb">Ingrese la información del Curso</h4>
                      {!! Form::open(['route' => 'cursos.store']) !!}
                      <form class="form-horizontal style-form" method="get">
                      		<label class="col-sm-2 col-sm-2 control-label">Semestre: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('semestre', null, ['class' => 'form-control', 'placeholder'=>'Semestre']) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Año: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('anio', null, ['class' => 'form-control', 'placeholder'=>'Año']) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Sección: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('seccion', null, ['class' => 'form-control', 'placeholder'=>'Sección']) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Asignatura: </label>
                              <div class="col-sm-10">
                                  {!! Form::select('asignatura_id', $asignaturas) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Docente: </label>
                              <div class="col-sm-10">
                                  {!! Form::select('docente_id', $docente) !!}
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
              </div><!-- col-lg-12-->
            </div><!-- /row -->

<center>
<br>
</center>
    </section>
      </section>

	</body>

</html>



@extends('encargado.plantillaEncargado')
@section('contenido')
<ul class="nav nav-tabs">
  <li class=""><a aria-expanded="true" href="/encargado/menu" data-toggle="tab">Principal</a></li>
  <li class=""><a aria-expanded="false" href="/asignaturas" data-toggle="tab">Asignaturas</a></li>
  <li class="active"><a aria-expanded="false" href="/cursos" data-toggle="tab">Cursos</a></li>
  <li class=""><a aria-expanded="false" href="/horarios" data-toggle="tab">Horario</a></li>
  <li class=""><a aria-expanded="false" href="/salas" data-toggle="tab">Salas</a></li>
  <li class=""><a aria-expanded="false" href="/tiposdesalas" data-toggle="tab">Tipos de Salas</a></li>
  <li class=""><a aria-expanded="false" href="/periodos" data-toggle="tab">Periodos</a></li>
    <li class="dropdown">
      <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">Opciones <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
        <li class="divider"></li>
        <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
      </ul>
    </li>
  </ul>
	<table>
		<td width=505><h2>Registro de Cursos</h2></td>
		<td><a href="/cursos" class="btn btn-default btn-sm">Volver</a>
		<td><a href="/cursos/create" class="btn btn-warning btn-sm">Agregar curso</a></td>
	</table>
</p>
<h4>Nuevo curso</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'cursos.store']) !!}
			<div class="form-group">
				{!! Form::select('asignatura_id', $asignatura) !!}
				</div>
				<div class="form-group">
					{!! Form::text('semestre', null, ['class' => 'form-control', 'placeholder'=>'Semestre al que pertenece']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('anio', null,['class'=>'form-control', 'placeholder'=>'Año academico'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('seccion', null,['class'=>'form-control', 'placeholder'=>'Seccion'])!!}
				</div>

        <div class="form-group">
				{!! Form::select('docente_id', $docente) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
				</div>
			{!! Form::close() !!}
      <p>
	    	@if(Session::has('message'))
          <div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        @endif
        @if (count($errors) > 0)
	                    <div class="alert alert-danger">
	                      <ul>
	                        @foreach ($errors->all() as $error)
	                           <li>{{ $error }}</li>
                          @endforeach
	                      </ul>
                      </div>
                    @endif
      </p>
@stop

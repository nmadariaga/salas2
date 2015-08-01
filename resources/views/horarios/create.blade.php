@extends('layout.plantilla')
@section('contenido')


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
                      <a href="/encargado/menu">
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

@endsection
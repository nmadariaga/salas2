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
                      <a  class="active" href="/asignaturas" >
                          <span>ASIGNATURAS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/cursos" >
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
      <section id="main-content">
          <section class="wrapper">
          <br>
            <h3> Registrar asignatura</h3>

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
                      <h4 class="mb">Ingrese la información de la asignatura</h4>
                      {!! Form::open(['route' => 'asignaturas.store']) !!}
                      <form class="form-horizontal style-form" method="get">
                      		<div class="form-group"><p>Seleccione Departamento:
								{!! Form::select('departamento_id', $departamento, ['class' => 'form-control']) !!}<p>
							</div>
							<div class="form-group">
								{!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder'=>'Código']) !!}
							</div>
							<div class="form-group">
								{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
							</div>
							<div class="form-group">
								{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripción'])!!}
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

@endsection
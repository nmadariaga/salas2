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
      <section id="main-content">
          <section class="wrapper">
          <br>
            <h3> Detalle del Curso</h3>

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
                      <h4 class="mb">Edite la información del curso "({{$curso->seccion }})" </h4>
                      {!! Form::model($curso, ['route' => ['cursos.update', $curso->id], 'method' => 'patch']) !!}
                      <form class="form-horizontal style-form" method="get">
                          <div class="form-group">
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
                              <br><br><br>
                                {!! Form::submit('Actualizar', ["class" => "btn btn-success btn-block"]) !!}
                          </div>
                      </form>
                      {!! Form::close() !!}
                      <p>
        @if(Session::has('message'))
          <div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
          @endif
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->
            <center>
<br>
<table>
              <td><a href="/cursos" class="btn btn-default btn-sm">Volver</a></td>
</table>
</center>
    </section>
      </section>

@endsection
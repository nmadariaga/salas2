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

                  <h5 class="centered">Menú Administrador</h5>

                  <li class="mt">
                      <a href="/admin/inicio">
                          <span>INICIO</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/campus" >
                          <span>CAMPUS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/facultades" >
                          <span>FACULTADES</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/departamentos" >
                          <span>DEPARTAMENTOS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/escuelas" >
                          <span>ESCUELAS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/carreras" >
                          <span>CARRERAS</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/funcionarios" >
                          <span>FUNCIONARIOS</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a href="/docentes" >
                          <span>DOCENTES</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a class="active" href="/estudiantes" >
                          <span>ESTUDIANTES</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          <br>
            <h3> Detalle del Estudiante</h3>

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
                      <h4 class="mb">Edite la información del Estudiante "{{$estudiante->nombres}} {{$estudiante->apellidos}}" </h4>
                      {!! Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante->id], 'method' => 'patch'])
                      !!}
                      <form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Carrera: </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::select('nombre', $carrera) !!}
                              <br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Carrera: </label>
                              <div class="col-sm-10">
                                 {!! Form::text('carrera_id', null, ['class' => 'form-control', 'placeholder'=>'Carrera']) !!}
                                 </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">RUT: </label>
                              <div class="col-sm-10">
                                 {!! Form::text('rut', null, ['class' => 'form-control', 'placeholder'=>'RUT sin digito verificador']) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Nombres: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder'=>'Nombres']) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Apellidos: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder'=>'Apellidos']) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">E-mail: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'E-mail']) !!}
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
                </p>
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->
<center>
<br>
<table>
              <td><a href="/estudiantes" class="btn btn-default btn-sm">Volver</a></td>
</table>
</center>
    </section>
      </section>

@endsection
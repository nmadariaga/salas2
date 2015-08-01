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
                      <a href="/horarios" >
                          <span>HORARIO</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="/salas" >
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
            <h3> Detalle de la sala</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb">Edite la información de la sala "{{$sala->nombre}}" </h4>
                      {!! Form::model($sala, ['route' => ['salas.update', $sala->id], 'method' => 'patch']) !!}
                      <form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Campus: </label>
                              <div class="col-sm-10">
                                  {!! Form::select('campus_id', $campus) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Tipo de Sala: </label>
                              <div class="col-sm-10">
                                  {!! Form::select('tipo_sala_id', $tiposdesala) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Nombre: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Descripción']) !!}
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Descripción: </label>
                              <div class="col-sm-10">
                                  {!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripción'])!!}
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
              <td><a href="/salas" class="btn btn-default btn-sm">Volver</a></td>
</table>
</center>
    </section>
      </section>

@endsection
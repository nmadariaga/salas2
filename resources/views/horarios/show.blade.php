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
                      <a  href="/asignaturas" >
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
            <h3> Detalle del Horario</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb">Información del Horario</h4>
                      <form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Fecha: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$horario->fecha}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Sala: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$sala->nombre}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Período: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$periodo->bloque }}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Curso: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$horario->curso_id}}" disabled>
                              </div>
                          </div>

                      </form>
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->

<center>
<br>
<table>
              <td><a href="/horarios" class="btn btn-default btn-sm">Volver</a>
                {!! Html::link(route('horarios.edit', $horario->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
</table>
</center>
    </section>
      </section>

@endsection
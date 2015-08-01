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
            <h3> Detalle del Curso</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb">Información del Curso "{{$asignaturas->nombre}} ({{$curso->seccion }})" </h4>
                      <form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Asignatura: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$asignaturas->nombre}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Semestre: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$curso->semestre}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Sección: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$curso->seccion}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Docente: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$docente->nombres}} {{$docente->apellidos}}" disabled>
                              </div>
                          </div>

                      </form>
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->

<center>
<br>
<table>
              <td><a href="/cursos" class="btn btn-default btn-sm">Volver</a>
                {!! Html::link(route('cursos.edit', $curso->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
</table>
</center>
    </section>
      </section>

@endsection
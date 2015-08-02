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
      <!--sidebar end-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <div class="head-table">
                            <h4>Listado de Asignaturas<a href="/asignaturas/create" style="position: absolute; right: 30px" class="btn btn-warning btn-sm">Agregar Asignaturas</a>
                            </h4>
                          </div>
                            <hr>
                            {!! Form::open(['route' => 'asignaturas.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                          <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Asignatura']) !!}

                          </div>
                          <button type="submit" class="btn btn-default">Buscar</button>
                          {!! Form::close() !!}
                          <hr>

                              
                              <thead>
                              <tr>
                                  <th> Nombre</th>
                                  <th> Código</th>
                                  <th> Descripción</th>
                                  <th> Departamento</th>
                                  <th></th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($asignaturas as $asignatura)
                              <tr>
                                  <td>{{ $asignatura->nombre }}</td>
                                  <td>{{ $asignatura->codigo }}</td>
                                  <td>{{ $asignatura->descripcion }}</td>
                                  <td>{{ $asignatura->departamento->nombre }}</td>
                                  <td>{!! Html::link(route('asignaturas.show', $asignatura->id), 'Detalles', array('class' => 'label label-info')) !!}</td>
                                  <td>{!! Html::link(route('asignaturas.edit', $asignatura->id), 'Editar', array('class' => 'label label-success')) !!}</td>
                                  <td>
                                        {!! Form::open(array('route' => array('asignaturas.destroy', $asignatura->id), 'method' => 'DELETE')) !!}
                                        <button class="label label-danger">Eliminar</button>
                                        {!! Form::close() !!}
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
              </section>
              </section>
@endsection
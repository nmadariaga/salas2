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
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <div class="head-table">
                            <h4>Listado de Estudiantes<a href="/estudiantes/create" style="position: absolute; right: 30px" class="btn btn-warning btn-sm">Agregar Estudiante</a>
                            </h4>
                          </div>
                            <hr>
                            {!! Form::open(['route' => 'estudiantes.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                          <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del estudiante para buscar..']) !!}

                          </div>
                          <button type="submit" class="btn btn-default">Buscar</button>
                          {!! Form::close() !!}
                          <hr>
                              <thead>
                              <tr>
                                  <th> Carrera</th>
                                  <th> RUT</th>
                                  <th> Nombres</th>
                                  <th> Apellidos</th>
                                  <th> E-mail</th>
                                  <th></th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($estudiantes as $estudiante)
                              <tr>
                                  <td>{{ $estudiante->carrera->nombre }}</td>
                                  <td>{{ $estudiante->rut }}</td>
                                  <td>{{ $estudiante->nombres }}</td>
                                  <td>{{ $estudiante->apellidos }}</td>
                                  <td>{{ $estudiante->email }}</td>
                                  <td>{!! Html::link(route('estudiantes.show', $estudiante->id), 'Detalles', array('class' => 'label label-info')) !!}</td>
                                  <td>{!! Html::link(route('estudiantes.edit', $estudiante->id), 'Editar', array('class' => 'label label-success')) !!}</td>
                                  <td>{!! Html::link(route('estudiantes.asignaturascursadas.index', $estudiante->id), 'Asignaturas', array('class' => 'label label-success')) !!}</td>
                                  <td>
                                        {!! Form::open(array('route' => array('estudiantes.destroy', $estudiante->id), 'method' => 'DELETE')) !!}
                                        <button class="label label-danger">Eliminar</button>
                                        {!! Form::close() !!}
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <center>{!!$estudiantes->render()!!}</center>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
              <p>
                @if(Session::has('message'))
                  <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
                @endif
                <td width= 505><a href="/descargarEstudiantes" class="btn btn-danger btn-xs">Descargar Registros</a></td>
              </p>
              </section>
              </section>
@endsection

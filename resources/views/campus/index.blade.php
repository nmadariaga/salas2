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
                      <a class="active" href="/campus" >
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
                      <a href="/estudiantes" >
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
                            <h4>Listado de Campus<a href="/campus/create" style="position: absolute; right: 30px" class="btn btn-warning btn-sm">Agregar Campus</a>
                            </h4>
                          </div>
                            <hr>
                            {!! Form::open(['route' => 'campus.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                          <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del campus para buscar..']) !!}

                          </div>
                          <button type="submit" class="btn btn-default">Buscar</button>
                          {!! Form::close() !!}
                          <hr>
                              <thead>
                              <tr>
                                  <th> Nombre</th>
                                  <th> Dirección</th>
                                  <th> Descripción</th>
                                  <th> Encargado</th>
                                  <th></th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($campus as $campu)
                              <tr>
                                  <td>{{ $campu->nombre }}</td>
                                  <td>{{ $campu->direccion }}</td>
                                  <td>{{ $campu->descripcion }}</td>
                                  <td>{{ $campu->rut_encargado }}</td>
                                  <td>{!! Html::link(route('campus.show', $campu->id), 'Detalles', array('class' => 'label label-info')) !!}</td>
                                  <td>{!! Html::link(route('campus.edit', $campu->id), 'Editar', array('class' => 'label label-success')) !!}</td>
                                  <td>
                                        {!! Form::open(array('route' => array('campus.destroy', $campu->id), 'method' => 'DELETE')) !!}
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

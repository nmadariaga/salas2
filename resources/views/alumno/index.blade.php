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

                  <h5 class="centered">Menú Alumno</h5>

                  <li class="mt">
                      <a class="active" href="alumno">
                          <span>INICIO</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="buscar" >
                          <span>BUSCAR</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
              <div class="row">

                        <div class="row mtbox">
                        <!--  @if ( !Auth::guest() )
                        <center><h1>Bienvenido {{Auth::user("")->nombres}}</h1></center>
                        @endif-->
                        <center><h1>Bienvenido {{$nombreCompleto}}</h1></center>
                        <center><h4>Contectado como:
                          @foreach($usuario->roles as $rol)
                            @if($rol->nombre == 'Administrador')
                            <a href="/admin/inicio" >
                                -<span>Administrador</span>-
                            </a>
                            @endif
                            @if($rol->nombre == 'Encargado')
                            <a href="/encargado/menu" >
                                -<span>Encargado</span>-
                            </a>
                            @endif
                            @if($rol->nombre == 'Docente')
                            <a href="#" >
                                -<span>Docente</span>-
                            </a>
                            @endif
                            @if($rol->nombre == 'Estudiante')
                            <a href="/alumno" >
                                >><u><b><span>Alumno</span></b></u><<
                            </a>
                            @endif
                          @endforeach</h3></center>
                        </div><!-- /row mt -->
                        <div class="row mt">
                        <center><h3>Tu horario para este semestre es el siguiente.</h3></center>

                        </div><!-- /row -->
                          <table class="calendar table table-bordered">
                            <thead>
                              <tr>
                                <th>&nbsp;</th>
                                <th width="20%">Lunes {{$semana[0]}}</th>
                                <th width="20%">Martes {{$semana[1]}}</th>
                                <th width="20%">Miércoles {{$semana[2]}}</th>
                                <th width="20%">Jueves {{$semana[3]}}</th>
                                <th width="20%">Viernes {{$semana[4]}}</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($periodos as $periodo)
                              <tr>
                                <td>{{ $periodo->inicio }} - {{ $periodo->fin }}</td>
                                    @foreach($cursos as $curso)
                                        <td class=" has-events" rowspan="1"><!-- lunes-->
                                        <div style="width: 99%; height: 100%;">
                                            @foreach($curso->horarios as $horario)
                                              @if($horario->fecha == $semana[0])
                                                {{$curso->asignatura->nombre}}
                                                {{$horario->fecha}}
                                              @endif
                                            @endforeach
                                        </div>
                                      </td>
                                      <td class=" no-events" rowspan="1"></td><!-- martes-->
                                      <td class=" no-events" rowspan="1"></td><!-- miercoles-->
                                      <td class=" no-events" rowspan="1"></td><!-- jueves-->
                                      <td class=" no-events" rowspan="1"></td><!-- viernes-->
                                    @endforeach
                              </tr>
                              @endforeach
                            </tbody>
                          </table>

                        <div class="row">

                        </div><!-- /row -->

                        <div class="row mt">

                        </div><!-- /row -->

              </div>
        </section>
      </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('/js/common-scripts.js"></script>




    <!--script for this page-->
@endsection

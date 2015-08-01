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
                      <a class="active" href="menu">
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
                          <span>HORARIOS</span>
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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
              <div class="row">

                        <div class="row mtbox">
                        <!--@if ( !Auth::guest() )
                        <center><h1>Bienvenido {{Auth::user()->nombres}}</h1></center>
                        @endif
                      </div>--><!-- /row mt -->
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
                              >><u><b> <span>Encargado</span></b></u><<
                            </a>
                            @endif
                            @if($rol->nombre == 'Docente')
                            <a href="#" >
                                -<span>Docente</span>
                            </a>
                            @endif
                            @if($rol->nombre == 'Estudiante')
                            <a href="/alumno" >
                              -<span>Alumno</span>-
                            </a>
                            @endif
                          @endforeach</h3></center>
                        <div class="row mt">
                        <center><p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p></center>

                        <center><p>An abbreviation of the word attribute is attr.</p></center>
                        </div><!-- /row -->


                        <div class="row">
                          <center><p>This line of text is meant to be treated as fine print.</p></center>

                          <center><p>The following snippet of  text is rendered as bold text.</p></center>
                        </div><!-- /row -->

                        <div class="row mt">
                          <center><p>The following snippet of text is rendered as italicized text.</p></center>
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
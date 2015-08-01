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
          <br>
            <h3> Detalle del Campus</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb">Información del campus "{{$campu->nombre}}" </h4>
                      <form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$campu->nombre}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Dirección: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$campu->direccion}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Descripción: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$campu->descripcion}}" disabled>
                              </div>
                              <br><br><br>
                              <label class="col-sm-2 col-sm-2 control-label">Encargado: </label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="{{$campu->rut_encargado}}" disabled>
                              </div>
                          </div>
                          
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->  
            <script>
  $(document).ready(function(){
   var url =GMaps.staticMapURL({
     size: [610, 350],
     lat:{{$campu->latitud}},
     lng:{{$campu->longitud}},
     markers: [
      {lat:{{$campu->latitud}}, lng:{{$campu->longitud}}, color:'blue'}
     ]
   });
  $('<img/>').attr('src', url).appendTo('#map');
  });
  </script>
<center><div id="map"></div>
<br>
<table>
              <td><a href="/campus" class="btn btn-default btn-sm">Volver</a>
                {!! Html::link(route('campus.edit', $campu->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
</table>
</center>
    </section>
      </section>

@endsection
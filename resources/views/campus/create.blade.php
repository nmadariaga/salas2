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
            <h3> Registrar Campus</h3>

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
                      <h4 class="mb">Ingrese la información del Campus</h4>
                      {!! Form::open(['route' => 'campus.store']) !!}
                      <form class="form-horizontal style-form" method="get">
							<div class="form-group">
								{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
							</div>
							<div class="form-group">
								{!! Form::text('direccion', null,['class'=>'form-control', 'placeholder'=>'Dirección'])!!}
							</div>
							<div class="form-group">
								{!! Form::text('latitud', null,['class'=>'form-control', 'placeholder'=>'Latitud'])!!}
							</div>
							<div class="form-group">
								{!! Form::text('longitud', null,['class'=>'form-control', 'placeholder'=>'Longitud'])!!}
							</div>
							<div class="form-group">
								{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripción'])!!}
							</div>
							<div class="form-group">
								{!! Form::text('rut_encargado', null,['class'=>'form-control', 'placeholder'=>'Rut Encargado sin digito verificador'])!!}
							</div>
							<div class="form-group">
								{!! Form::submit('Registrar', ["class" => "btn btn-success btn-block"]) !!}
							</div>
					</form>
							{!! Form::close() !!}
      						<p>
	    						@if(Session::has('message'))
          						<div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        						@endif
      						</p>
                  
                  <form class="form-horizontal style-form" method="post" action="/hola" enctype="multipart/form-data">
                  <input type="file" id="archivo" name="archivo" accept=".csv" />
                  <br>
                  <input type="submit" value="Cargar Archivo">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  </form>

                 
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->

<center>
<br>

</center>
    </section>
      </section>

@endsection

@extends('encargado.plantillaEncargado')
@section('contenido')
<ul class="nav nav-tabs">
  <li class=""><a aria-expanded="true" href="/encargado/menu" data-toggle="tab">Principal</a></li>
  <li class=""><a aria-expanded="false" href="/asignaturas" data-toggle="tab">Asignaturas</a></li>
  <li class=""><a aria-expanded="false" href="/cursos" data-toggle="tab">Cursos</a></li>
  <li class=""><a aria-expanded="false" href="/horarios" data-toggle="tab">Horario</a></li>
  <li class=""><a aria-expanded="false" href="/salas" data-toggle="tab">Salas</a></li>
  <li class="active"><a aria-expanded="false" href="/tiposdesalas" data-toggle="tab">Tipos de Salas</a></li>
  <li class=""><a aria-expanded="false" href="/periodos" data-toggle="tab">Periodos</a></li>
    <li class="dropdown">
      <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">Opciones <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
        <li class="divider"></li>
        <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
      </ul>
    </li>
  </ul>
	<table>
		<td width=505><h2>Registro de Tipos de Salas</h2></td>
		<td><a href="/tiposdesalas" class="btn btn-default btn-sm">Volver</a>
		<td><a href="/tiposdesalas/create" class="btn btn-warning btn-sm">Agregar Tipo de Sala</a></td>
	</table>
</p>
<h4>Nuevo Tipo de Sala</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'tiposdesalas.store']) !!}
				<div class="form-group">
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripción'])!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
				</div>
			{!! Form::close() !!}
      <p>
	    	@if(Session::has('message'))
          <div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        @endif
      </p>
@stop

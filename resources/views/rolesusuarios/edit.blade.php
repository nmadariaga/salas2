@extends('administrador.plantillaAdmin')')
@section('contenido')
<p>
	<ul class="nav nav-tabs">
  <li class=""><a aria-expanded="true" href="/admin/menu" data-toggle="tab">Principal</a></li>
  <li class=""><a aria-expanded="false" href="/campus" data-toggle="tab">Campus</a></li>
  <li class=""><a aria-expanded="false" href="/facultades" data-toggle="tab">Facultades</a></li>
  <li class=""><a aria-expanded="false" href="/departamentos" data-toggle="tab">Departamentos</a></li>
  <li class=""><a aria-expanded="false" href="/escuelas" data-toggle="tab">Escuelas</a></li>
  <li class=""><a aria-expanded="false" href="/carreras" data-toggle="tab">Carreras</a></li>
  <li class=""><a aria-expanded="false" href="/funcionarios" data-toggle="tab">Funcionarios</a></li>
  <li class=""><a aria-expanded="false" href="/docentes" data-toggle="tab">Docentes</a></li>
  <li class=""><a aria-expanded="false" href="/estudiantes" data-toggle="tab">Estudiantes</a></li>
  <li class=""><a aria-expanded="false" href="/roles" data-toggle="tab">Roles</a></li>
  <li class="active"><a aria-expanded="false" href="/rolesusuarios" data-toggle="tab">Roles de usuarios</a></li>
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
		<td width=505><h2>Registro de roles</h2></td>
		<td><a href="/rolesusuarios" class="btn btn-default btn-sm">Volver</a>
		<a href="/rolesusuarios/create" class="btn btn-warning btn-sm">Agregar asignacion</a></td>
</table>
</p>
  <h4>Actualizar Asignacion "{{$rolesusuario->rut}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
    	{!! Form::model($rolesusuario, ['route' => ['rolesusuarios.update', $rolesusuario->id], 'method' => 'patch']) !!}
			<div class="form-group">
				{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder'=>'Rut']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('rol_id', null,['class'=>'form-control', 'placeholder'=>'Rol'])!!}
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

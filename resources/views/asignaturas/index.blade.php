@extends('encargado.plantillaEncargado')
@section('contenido')
<ul class="nav nav-tabs">
  <li class=""><a aria-expanded="true" href="/encargado/menu" data-toggle="tab">Principal</a></li>
  <li class="active"><a aria-expanded="false" href="/asignaturas" data-toggle="tab">Asignaturas</a></li>
  <li class=""><a aria-expanded="false" href="/cursos" data-toggle="tab">Cursos</a></li>
  <li class=""><a aria-expanded="false" href="/horarios" data-toggle="tab">Horario</a></li>
  <li class=""><a aria-expanded="false" href="/salas" data-toggle="tab">Salas</a></li>
  <li class=""><a aria-expanded="false" href="/tiposdesalas" data-toggle="tab">Tipos de Salas</a></li>
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
    <td width=505>
      <h2>Listado de Asignaturas</h2>
    </td>
    <td>
      <a href="/asignaturas/create" class="btn btn-warning btn-sm">Agregar Asignatura</a>
    </td>
  </table>
</p>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($asignaturas as $asignatura)
    <tr>
      <td width=450>{{ $asignatura->nombre }}</td>
      <td>
        {!! Html::link(route('asignaturas.show', $asignatura->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('asignaturas.edit', $asignatura->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('asignaturas.destroy', $asignatura->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td width= 505><a href="/encargado/menu" class="btn btn-danger btn-xs">Cerrar</a></td>
    <div class="col-md-12">
</table>
@stop

@extends('encargado.plantillaEncargado')
@section('contenido')
<ul class="nav nav-tabs">
  <li class=""><a aria-expanded="true" href="/encargado/menu" data-toggle="tab">Principal</a></li>
  <li class=""><a aria-expanded="false" href="/asignaturas" data-toggle="tab">Asignaturas</a></li>
  <li class=""><a aria-expanded="false" href="/cursos" data-toggle="tab">Cursos</a></li>
  <li class=""><a aria-expanded="false" href="/horarios" data-toggle="tab">Horario</a></li>
  <li class=""><a aria-expanded="false" href="/salas" data-toggle="tab">Salas</a></li>
  <li class=""><a aria-expanded="false" href="/tiposdesalas" data-toggle="tab">Tipos de Salas</a></li>
  <li class="active"><a aria-expanded="false" href="/periodos" data-toggle="tab">Periodos</a></li>
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
	   <td width=505><h2>Periodo elegido: "{{$periodo->bloque}}"</h2></td>
	    <td><a href="/periodos" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('periodos.edit', $periodo->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
</p>

  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($periodo))
            <tr height= 10>
              <td width=100>
                <h5><b>Bloque:</b></h5>
              </td>
              <td>{{$periodo->bloque}}</td>
            <tr>
              <td width=250><h5><b>Comienza a las:</b></h5></td>
              <td>{{$periodo->inicio }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Termina a las:</b></h5></td>
              <td>{{$periodo->fin}}</td>
          </tr>
          @else
          <p>
            No existe información de este periodo.
          </p>
          @endif
      </tbody>
  </table>
@stop

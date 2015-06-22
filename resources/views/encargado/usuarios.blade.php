@extends('administrador.plantillaAdmin')
@section('contenido')
<ul class="nav nav-tabs">
  <li class=""><a aria-expanded="true" href="/admin/menu" data-toggle="tab">Principal</a></li>
  <li class=""><a aria-expanded="false" href="/campus" data-toggle="tab">Campus</a></li>
  <li class="active"><a aria-expanded="false" href="/admin/usuarios" data-toggle="tab">Usuarios</a></li>
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
      <h2>Opciones de Usuarios</h2>
      </td>
      <td>
        <a href="/usuarios/create" class="btn btn-warning btn-sm">Agregar Usuario</a>
      </td>
    </table>
    </p>
  <table class="table table-striped table-hover ">
  <tbody>
      <tr>
      <td width=500>usuario uno</td>
      <td>
          <a href="/usuario/show/"><span class="label label-info">Ver</span></a>
          <a href="/usuario/edit/"><span class="label label-success">Editar</span></a>
          <a href="{{url('/usuario/destroy',"><span class="label label-danger">Eliminar</span></a>
      </td>
      </tr>
      <tr>
      <td width=500>usuario dos</td>
      <td>
          <a href="/usuario/show/"><span class="label label-info">Ver</span></a>
          <a href="/usuario/edit/"><span class="label label-success">Editar</span></a>
          <a href="{{url('/usuario/destroy',"><span class="label label-danger">Eliminar</span></a>
      </td>
      </tr>
  </tbody>
</table>
<a href="#" class="btn btn-success">Archivar usuario</a>
@endsection

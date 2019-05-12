@extends('layouts.app')

@section('styles')
<style media="screen">
    .teal.segment{
      width: 70%;
      margin-left: auto;
      margin-right: auto;
    }
    th#des {
        width: 45%;
    }
    .ui.teal.segment {
        width: 90%;
    }
</style>
@endsection
@section('content')
<div class="ui teal segment">
  <!-- Alerta de memnsaje cuando se guarda o no el usuario -->
  @if(session('mensaje'))
  <div class="ui {{session('tipo')?'success':'error'}} message">
    <!-- <i class="close icon"></i> -->
    <div class="header">
      {{session('tipo')?'Genial!':'Ups!'}}
    </div>
    <ul class="list">
      <li>{{session('mensaje')}}</li>
    </ul>
  </div>
  @endif
  <!-- Alerta de las validaciones del formulario -->
  @if(count($errors) > 0)
  <div class="ui error message">
    <!-- <i class="close icon"></i> -->
    <div class="header">
      Ups! A ocurrido un error.
    </div>
    <ul class="list">
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="ui form" action="/usuarios" method="post">
    <div class="field">
      <label for="">Nombre</label>
      <input type="text" name="name" value="{{old('name')}}">
    </div>
    <div class="field">
      <label for="">Descripción</label>
      <input type="text" name="description" value="{{old('description')}}">
    </div>
    <div class="field">
      <label for="">Fecha de inicio</label>
      <input type="date" name="start" value="{{old('start', date('Y-m-d'))}}">
    </div>
    {{csrf_field()}}
    <!-- <button type="button" name="button" class="ui right labeled teal button"></button> -->
    <button type="submit"class="ui left labeled teal icon button"><i class="ui save icon"></i>Registrar proyecto</button>

  </form>
  <table class="ui table celled">
    <thead>
      <tr>

        <th>Nombre</th>
        <th id="des">Descripción</th>
        <th>Fecha de inicio</th>
        <th style="text-align:center">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $project)
      <tr>
        <td>{{$project->name}}</td>
        <td>{{$project->descripcion}}</td>
        <td>{{$project->start?: "No se ha indicado"}}</td>
        <td style="text-align:center">
          <a href="/proyecto/{{$project->id}}" class="ui mini button blue icon"><i class="ui edit icon" title="Editar"></i> </a>
          <a href="/proyecto/{{$project->id}}/eliminar" class="ui mini button red icon"><i class="ui trash icon" title="Borrar"></i> </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
@section('scripts')
<!-- <script type="text/javascript">
  $('.ui.dropdown').dropdown();
</script> -->
@endsection

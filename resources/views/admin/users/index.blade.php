@extends('layouts.app')

@section('styles')
<style media="screen">
    .teal.segment{
      width: 70%;
      margin-left: auto;
      margin-right: auto;
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
      <label for="">E-mail</label>
      <input type="text" name="email" value="{{old('email')}}">
    </div>
    <div class="field">
      <label for="">Nombre</label>
      <input type="text" name="name" value="{{old('name')}}">
    </div>
    <div class="field">
      <label for="">Contraseña</label>
      <input type="text" name="password" value="{{old('password', str_random(8))}}">
    </div>
    {{csrf_field()}}
    <!-- <button type="button" name="button" class="ui right labeled teal button"></button> -->
    <button type="submit"class="ui left labeled teal icon button"><i class="ui save icon"></i>Guardar</button>

  </form>
  <table class="ui table celled">
    <thead>
      <tr>
        <th>E-mail</th>
        <th>Nombre</th>
        <th style="text-align:center">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->email}}</td>
        <td>{{$user->name}}</td>
        <td style="text-align:center">
          <a href="/usuario/{{$user->id}}" class="ui mini button blue icon"><i class="ui edit icon" title="Editar"></i> </a>
          <a href="/usuario/{{$user->id}}/eliminar" class="ui mini button red icon"><i class="ui trash icon" title="Borrar"></i> </a>
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

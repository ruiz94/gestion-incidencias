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
  <form class="ui form" action="" method="post">
    <div class="field">
      <label for="">Nombre</label>
      <input type="text" name="name" value="{{old('name', $project->name)}}">
    </div>
    <div class="field">
      <label for="">Descripción</label>
      <input type="text" name="description" value="{{old('description', $project->descripcion)}}">
    </div>
    <div class="field">
      <label for="">Fecha de inicio</label>
      <input type="date" name="start" value="{{old('start', $project->start)}}">
    </div>
    {{csrf_field()}}
    <!-- <button type="button" name="button" class="ui right labeled teal button"></button> -->
    <button type="submit"class="ui left labeled teal icon button"><i class="ui save icon"></i>Guardar proyecto</button>

  </form>


  <div class="ui grid">
  <div class="eight wide column">
    <p>Categorías</p>
    <form class="ui form" action="/categorias" method="post">
      <div class="field">
        <div class="ui left labeled button" tabindex="0">
          <input type="text" name="category" placeholder="Ingresa el nombre" value="">
          <button class="ui teal basic left pointing label">
            <i class="add icon"></i> Agregar
          </button>
        </div>
      </div>
    </form>
    <table class="ui table celled">
      <thead>
        <tr>
          <th>Categorìa</th>
          <th style="text-align:center">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Proyecto A</td>
          <td>1</td>
          <td style="text-align:center">
            <a href="" class="ui mini button blue icon"><i class="ui edit icon" title="Editar"></i> </a>
            <a href="" class="ui mini button red icon"><i class="ui trash icon" title="Borrar"></i> </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="eight wide column">
    <p>Niveles</p>
    <form class="ui form" action="/niveles" method="post">
      <div class="field">
        <div class="ui left labeled button" tabindex="0">
          <input type="text" name="category" placeholder="Ingresa el nombre" value="">
          <button class="ui teal basic left pointing label">
            <i class="add icon"></i> Agregar
          </button>
        </div>
      </div>
    </form>
    <table class="ui table celled">
      <thead>
        <tr>
          <th>#</th>
          <th>Nivel</th>
          <th style="text-align:center">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Proyecto A</td>
          <td>1</td>
          <td style="text-align:center">
            <a href="" class="ui mini button blue icon"><i class="ui edit icon" title="Editar"></i> </a>
            <a href="" class="ui mini button red icon"><i class="ui trash icon" title="Borrar"></i> </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection
@section('scripts')
<!-- <script type="text/javascript">
  $('.ui.dropdown').dropdown();
</script> -->
@endsection

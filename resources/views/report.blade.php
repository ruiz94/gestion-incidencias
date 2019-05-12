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
  <form class="ui form" action="/reportar" method="post">
    <div class="field">
      <label>Categoría</label>
      <div class="ui selection dropdown">
        <input name="category" type="hidden" value="">
        <i class="dropdown icon"></i>
        <div class="default text">General</div>
        <div class="menu">
          <!-- <div class="item" data-value="0">General</div> -->
          @foreach($categories as $category)
          <div class="item" data-value="{{$category->id}}">{{$category->name}}</div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="field">
      <label>Severidad</label>
      <div class="ui selection dropdown">
        <input name="severity" type="hidden">
        <i class="dropdown icon"></i>
        <div class="default text">Selecciona una opción</div>
        <div class="menu">
          <div class="item" data-value="M">Menor</div>
          <div class="item" data-value="N">Normal</div>
          <div class="item" data-value="A">Alta</div>
        </div>
      </div>
    </div>
    <div class="field">
      <label for="">Título</label>
      <input type="text" name="title" value="{{old('title')}}">
    </div>
    <div class="field">
      <label for="">Descripcón</label>
      <textarea name="description" rows="8" cols="80">{{old('description')}}</textarea>
    </div>
    {{csrf_field()}}
    <!-- <button type="button" name="button" class="ui right labeled teal button"></button> -->
    <button type="submit"class="ui left labeled teal icon button"><i class="ui save icon"></i>Guardar</button>

  </form>
</div>

@endsection
@section('scripts')
<!-- <script type="text/javascript">
  $('.ui.dropdown').dropdown();
</script> -->
@endsection

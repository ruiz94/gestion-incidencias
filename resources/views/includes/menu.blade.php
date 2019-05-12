<div class="ui vertical fluid tabular menu">
  @if(auth()->check())
    <a class="item {{request()->is('home')?'active':''}}" href="/home">Dashboard</a>
    @if(!auth()->user()->is_client)<a class="item" href="">Ver Incidencias</a>@endif
    <a class="item {{request()->is('reportar')?'active':''}}" href="/reportar">Reportar Incidencias</a>
    @if(auth()->user()->is_admin)
    <a class="item">
      <div class="ui dropdown">
        <div class="text">{{isset($nombre_label)?$nombre_label:"Administración"}}</div>
        <i class="dropdown icon"></i>
        <div class="menu admin">
          <div class="item" data-id='1'>Usuario</div>
          <div class="item" data-id='2'>Proyectos</div>
          <div class="item" data-id='3'>Configuraciòn</div>
        </div>
      </div>
    </a>
    @endif
  @else
  <a class="item active {{request()->is('bienvenido')?'active':''}}">Bienvenido</a>
  <a class="item {{request()->is('instrucciones')?'active':''}}">Instrucciones</a>
  <a class="item {{request()->is('creditos')?'active':''}}">Créditos</a>

  @endif
</div>

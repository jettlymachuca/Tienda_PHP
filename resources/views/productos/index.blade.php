@extends('layouts.principal')

@section('contenido')

<div class="container">
<div class="row">
    <h1 class="light-blue-text text-darken-4"> Catalogo de Productos </h1>
</div>
      @if(session('mensaje'))
      <div class="row">
          <div class="col s8">
            <span class="green-text text-darken-1">
              {{ session('mensaje') }} 
              <a href="{{ route('cart.index') }}">
                Ir al Carrito
              </a>
            </span>
          </div>
        </div>
      @endif
     @foreach($productos as $producto)
    <div class="row">
    <div class="col s12 m5">
      <div class="card">
        <div class="card-image">
          <img src="{{ asset('img/'.$producto->imagen) }}" width="100px" height="300px">
          <span class="card-title grey-text text-darken-4">{{ $producto->nombre }}</span>
        </div>
        <div class="card-content">
            <ul>
                <li> Descripcion: {{ $producto->descripcion }} </li>
                <li> Precio: {{ $producto->precio }} </li>
            </ul>
          </div>
        <div class="card-action">
          <a href="{{ route('productos.show' , $producto->id) }}">VER DETALLES</a>
        </div>
      </div>
    </div>
    @endforeach
    </div>
</div>
@endsection
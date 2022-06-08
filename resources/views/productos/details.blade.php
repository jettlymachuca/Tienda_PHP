@extends('layouts.principal')

@section('contenido')
<div class="row">
    <h1>{{ $producto->nombre }}</h1>
</div>
<div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
        <img src="{{ asset('img/'.$producto->imagen) }}" >
          <span class="card-title light-blue darken-4">{{ $producto->nombre }}</span>
        </div>
        <div class="card-content  light-blue accent-3">
         <ul class="white-text">
            <li><strong>Marca:  </strong>{{ $producto->marca->nombre }}</li>
            <li><strong>Categoria:  </strong>{{ $producto->categoria->nombre }}</li>
            <li><strong>Descripcion:  </strong>{{ $producto->descripcion }}</li>
            <li><strong>Precio:  </strong>{{ $producto->precio }}</li>
         </ul>
        </div>
      </div>
    </div>
  </div>
    <div class="col s4">
        <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <div class="row">
                <h3>Añadir al Carrito</h3>
            </div>
            <input type="hidden" name="prod_id" value="{{ $producto->id }}">
            <div class="row">
                <div class="col s4 input-field">
                    <select name="cantidad" id="cantidad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="cantidad">Cantidad</label>
                </div>
            </div>
            <div class="row">
                <div class="col s4 input-field">
                    <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
                        Añadir
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
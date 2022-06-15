@extends('layouts.principal')

@section('contenido')
<div class="row">
    <h1 class="light-blue-text text-darken-4">Carrito de compras</h1>
</div>
@if(!session('cart'))
<div class="row">
    <p class="red-text text-darken-2">No Hay Productos en el Carrito</p>
</div>
@else
<div class="row">
    <div class="col s12">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                   @foreach(session('cart') as $index => $prod)
                    <tr>
                        <td>{{ $prod[0]['nombre_prod'] }}</td>
                        <td>{{ $prod[0]['cantidad'] }}</td>
                        <td>{{ $prod[0]['total'] }}</td>
                    </tr>
                   @endforeach
                </tbody>
        </table>
    </div>
</div>
<div class="row">
    <form action="{{ route('cart.destroy', 1) }}" method="POST">
    @method('DELETE')    
    @csrf
    <button class="btn waves-effect waves-light light-blue darken-4" type="submit">Vaciar Carrito</button>
    </form>
</div>
@endif
@endsection
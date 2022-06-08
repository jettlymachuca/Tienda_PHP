<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session('cart')){
            echo "No hay items en el carrito";
        }else{
        return view('cart.index');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //estructura de producto
        $producto = [   [
                              "prod_id" => $request->prod_id,
                              "cantidad" => $request->cantidad,
                              "nombre_prod" => Producto::find($request->prod_id)->nombre
                        ]
                    ]; 

        if( !session('cart') ){

            $aux[] = $producto;
            //1. el primer producto en el carrito
            session(['cart'=> $aux]);    
        }else{
            // extraer los datos del carrito de la vsariable de session
            $aux = session('cart');
            // eliminar la variable sesison
            session()->forget('cart');
            // agregar eñ nuevo producto a los ya existenetes
            $aux[] = $producto;
            // volver a crear la variable session con el nuevo producto
            session(['cart' => $aux]);
        }

        //redireccion al catalogo de productos
        //con mensaje de añadido con exito
        return redirect('productos')->with("mensaje", "Su producto a sido añadido");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session()->forget('cart');
    }
}

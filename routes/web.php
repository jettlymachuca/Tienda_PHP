<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('paises', function(){
    $paises = [

        "Colombia" => [

            "Capital" => "Bogotá",
            "Moneda" => "Peso",
            "Poblacion" => 50.88,
            "Ciudades" => [

                "Medellin",
                "Cali",
                "Barranquilla"

            ],

        ],
        "Peru" => [

            "Capital" => "Lima",
            "Moneda" => "Sol",
            "Poblacion" => 32.97,
            "Ciudades" => [

                "Cusco",
                "Arequipa",
                "Trujillo"

            ],
        ],
        "Paraguay" => [

            "Capital" => "Asunsion",
            "Moneda" => "Guarani",
            "Poblacion" => 7.1,
            "Ciudades" => [

                "Encarnacion",
                "Villarica",
                "Aregua"

            ],
        ],
        "Venezuela" => [

            "Capital" => "Caracas",
            "Moneda" => "Dolar",
            "Poblacion" => 28.44,
            "Ciudades" => [

                "Maracaibo",
                "Valencia",
                "Barinas"

            ],
        ],
        "España" => [

            "Capital" => "Madrid",
            "Moneda" => "Euro",
            "Poblacion" => 47.35,
            "Ciudades" => [

                "Barcelona",
                "Sevilla",
                "Mallorca",
                "Valencia",
                "Toledo"

            ],
        ],
        "Afganistan" => [

            "Capital" => "Kabul",
            "Moneda" => "Afgani afgano",
            "Poblacion" => 38.93,
            "Ciudades" => [

                "Herat",
                "Zaranj",
                "Kandahar"

            ],
        ],

    ];
    return view('paises')->with('paises', $paises);
});

Route::get('prueba', function () {
    return view('productos.create');
});

/**
 * Rutas REST de Producto
 */

 Route::resource('productos', ProductoController::class);

 Route::resource('cart', CartController::class, [ 'only' => [ 'index', 'store', 'destroy' ] ]);
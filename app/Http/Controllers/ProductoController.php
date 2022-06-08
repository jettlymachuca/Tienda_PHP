<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use App\Http\Requests\StoreProductoRequest;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //selecciono todos los productos en un arreglo
        $productos = Producto::all();
        //mostrar la vista del catalogo
        return view('productos.index')->with('productos' , $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar marcas de la base de datos: model marca
        $marcas = Marca::all();
        //seleccionar categorias de la base de datos: model categorias
        $categorias = Categoria::all();
        //mostrar el formulario, enviando los datos
        return view('productos.create')
        ->with("marcas", $marcas)
        ->with("categorias", $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {

        $p = new Producto();
        $p->nombre = $request->nombre;
        $p->descripcion = $request->desc;
        $p->precio = $request->precio;
        $p->marca_id = $request->marca;
        $p->categoria_id = $request->categoria;
        //Mover el archivo cargado(Upload) a la carpeta public/img
        //objeto file
        $archivo = $request->imagen;
        $p->imagen = $archivo->getClientOriginalName();
        //ruta donde se almacena el archivo
        $ruta = public_path()."/img";
        //movemos archivo aruta
        $archivo->move($ruta, $archivo->getClientOriginalName());
        $p->save();
        //redireccionar: a una ruta disponible
        return redirect('productos/create')->with('mensaje' , "Producto Registrado Exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        //seleccionar producto a mostrar
        $p = Producto::find($producto);
        //mostrar el detalle del producto
        //enviandole el producto seleccionado
        return view('productos.details')->with('producto' , $p);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui se muestra el form de editar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        echo "aqui se va a guardar el producto editado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        echo "aqui se elimina el producto";
    }
}

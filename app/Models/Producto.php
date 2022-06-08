<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //relacion con productos 1-M
    public function marca(){
        // belongsTo: relacion m -1
        return $this->belongsTo( Marca::class );
    }

    //relacion con productos 1-M
    public function categoria(){
        // belongsTo: relacion m -1
        return $this->belongsTo( Categoria::class );
    }
}

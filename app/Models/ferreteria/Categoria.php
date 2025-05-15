<?php

namespace App\Models\ferreteria;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $connection = 'mysql';
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion'
        ];

    // RELACION: UNA CATEGORIA TIENE MUCHOS PRODCUTOS
    public function productos(){
        return $this->hasMany(Producto::class, 'categoria_id');

    }
}

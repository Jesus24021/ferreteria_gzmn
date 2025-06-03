<?php

namespace App\Models\ferreteria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use PDOException;

class Categoria extends Model
{
    protected $connection = 'mysql';
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // RELACIÓN: UNA CATEGORÍA TIENE MUCHOS PRODUCTOS
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }

    // Método para obtener todas las categorías con manejo de errores
    public static function getAllCategorias()
    {
        $resCategoria = null;
        $status = 500;

        try {
            $resCategoria = self::all();
        } catch (PDOException $e) {
            Log::emergency('Error al conectar con la base de datos de categorías', [
                'exception' => $e->getMessage(),
                'status' => $status
            ]);

            return response()->json([
                'data' => null,
                'message' => 'No se pudo conectar con el servidor de base de datos',
                'status' => $status
            ], $status);
        } catch (QueryException $e) {
            Log::emergency('Error en la consulta SQL de categorías', [
                'exception' => $e->getMessage(),
                'status' => $status
            ]);

            return response()->json([
                'data' => null,
                'message' => 'Error con la consulta a la base de datos',
                'status' => $status
            ], $status);
        }

        if (!is_null($resCategoria)) {
            $status = 200;
            Log::info('Mostrando todas las categorías', ['status' => $status]);

            return response()->json([
                'data' => $resCategoria,
                'message' => 'Lista de categorías',
                'status' => $status
            ], $status);
        } else {
            $status = 200;
            Log::error('No hay categorías registradas', ['status' => $status]);

            return response()->json([
                'message' => 'No se encontraron categorías',
                'status' => $status
            ], $status);
        }
    }
}

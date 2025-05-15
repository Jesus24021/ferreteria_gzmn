<?php

namespace App\Models\ferreteria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use PDOException;

class Producto extends Model
{
    protected $connection = 'mysql';
    protected $table = 'productos';

    protected $fillable = [
        'clave_p',
        'nombre_p',
        'descripcion_p',
        'categoria_id',
        'precioc_p',
        'preciov_p',
        'unidadM_p',
        'stock_p',
        'fingreso_p',
        'fcadu_p',
    ];

    // Relación categoria-producto
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Obtener todos los productos con manejo de errores y logs
    public function getAllProductos()
    {
        $resProducto = null;
        $status = 500;

        try {
            $resProducto = $this->all();
        } catch (PDOException $e) {
            $status = 500;
            $data = [
                'data' => $resProducto,
                'message' => 'No se pudo conectar con el servidor de base de datos',
                'status' => $status
            ];

            Log::emergency('No se pudo conectar con el servidor de base de datos', [
                'message' => 'Error en la conexión con el servidor MySQL',
                'category' => 'server',
                'exception' => $e->getMessage(),
                'status' => $status
            ]);

            return response()->json($data, $status);
        } catch (QueryException $e) {
            $status = 500;
            $data = [
                'data' => $resProducto,
                'message' => 'Error con la consulta a la base de datos',
                'status' => $status
            ];

            Log::emergency('Error con la consulta a la base de datos', [
                'message' => 'Error en la consulta SQL',
                'category' => 'server',
                'exception' => $e->getMessage(),
                'status' => $status
            ]);

            return response()->json($data, $status);
        }

        if (!is_null($resProducto)) {
            $status = 200;
            $data = [
                'data' => $resProducto,
                'message' => 'Muestra la lista de productos registrados',
                'status' => $status
            ];

            Log::info('Mostrando todos los productos registrados', [
                'message' => 'Muestra la lista de productos registrados',
                'category' => 'data base',
                'exception' => 'null',
                'status' => $status
            ]);

            return response()->json($data, $status);
        } else {
            $status = 200;
            $data = [
                'message' => 'No se encontraron productos registrados',
                'status' => $status
            ];

            Log::error('No hay productos registrados', [
                'message' => 'No se encontraron productos registrados',
                'category' => 'data base',
                'exception' => 'null',
                'status' => $status
            ]);

            return response()->json($data, $status);
        }
    }
}

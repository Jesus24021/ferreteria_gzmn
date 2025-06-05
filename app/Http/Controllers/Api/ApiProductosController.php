<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\ferreteria\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiProductosController extends Controller
{
    private Producto $producto;
    public function __construct(Producto $producto) //Concepto de inyeción de dependencias
    {
        $this->producto = $producto;
    }
    public function index()
    {
        $DatosProducto = $this->producto->getAllProductos();
        return response()->json($DatosProducto);


//        $productos = Producto::with('categoria')->get();
//        return response()->json($productos);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Request Headers:', ['headers' => $request->headers->all()]);
        Log::info('Request Content:', ['content' => $request->getContent()]);

        if (!$request->isJson()) {
            return response()->json(['message' => 'La solicitud debe ser en formato JSON', 'status' => 415], 415);
        }

        $data = $request->json()->all();
        Log::info('Datos JSON recibidos:', ['data' => $data]);

        $validarDatos = Validator::make($data, [
            'clave_p' => 'required|unique:productos',
            'nombre_p' => 'required',
            'descripcion_p' => 'nullable',
            'categoria_id' => 'required|exists:categorias,id',
            'precioc_p' => 'required|numeric',
            'preciov_p' => 'required|numeric',
            'unidadM_p' => 'required',
            'stock_p' => 'required|integer',
            'fingreso_p' => 'required|date',
            'fcadu_p' => 'nullable|date|after_or_equal:fingreso_p',
        ]);

        if ($validarDatos->fails()) {
            $errorData = [
                'message' => 'Error en la validación de datos',
                'error' => $validarDatos->errors(),
                'status' => 400,
            ];
            Log::error('Errores de validación:', $validarDatos->errors()->toArray());
            return response()->json($errorData, 400);
        }

        try {
            $producto = Producto::create([
                'clave_p' => $data['clave_p'],
                'nombre_p' => $data['nombre_p'],
                'descripcion_p' => $data['descripcion_p'] ?? null,
                'categoria_id' => $data['categoria_id'],
                'precioc_p' => $data['precioc_p'],
                'preciov_p' => $data['preciov_p'],
                'unidadM_p' => $data['unidadM_p'],
                'stock_p' => $data['stock_p'],
                'fingreso_p' => $data['fingreso_p'],
                'fcadu_p' => $data['fcadu_p'] ?? null,
            ]);

            if ($producto) {
                $successData = [
                    'Producto' => $producto,
                    'message' => 'Producto creado correctamente',
                    'status' => 201,
                ];
                Log::info('Producto creado:', $producto->toArray());
                return response()->json($successData, 201);
            } else {
                Log::error('Error al crear el producto en la base de datos');
                return response()->json(['message' => 'Error al crear el producto', 'status' => 500], 500);
            }
        } catch (QueryException $e) {
            Log::error('Error de base de datos al crear producto:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Error de base de datos al crear el producto', 'error' => $e->getMessage(), 'status' => 500], 500);
        } catch (\Exception $e) {
            Log::error('Error inesperado al crear producto:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Error inesperado al crear el producto', 'error' => $e->getMessage(), 'status' => 500], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Obtener el ID de la query string
        $id = $request->query('id');

        // Validar los datos de la petición
        $validarDatos = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:productos,id',
        ]);

        if ($validarDatos->fails()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'error' => $validarDatos->errors(),
                'status' => 400
            ], 400);
        }

        // Buscar el producto
        $producto = Producto::find($id);

        if ($producto) {
            return response()->json([
                'Producto' => $producto,
                'message' => 'Producto encontrado correctamente',
                'status' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function partialUpdate(Request $request, $id)
    {
        // Validar solo los campos que se pueden actualizar
        $validarDatos = Validator::make($request->all(), [
            'nombre_p'     => 'required|string',
            'descripcion_p'=> 'required|string',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'precioc_p'    => 'required|numeric|min:0',
            'preciov_p'    => 'required|numeric|min:0',
            'unidadM_p'    => 'required|string',
            'stock_p'      => 'required|integer|min:0',
            'fcadu_p'      => 'sometimes|nullable|date',
        ]);

        $data = $request->json()->all();

        if ($validarDatos->fails()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'error' => $validarDatos->errors(),
                'status' => 400
            ], 400);
        }

        try {
            $producto = Producto::find($id);

            if ($producto) {
                // Solo actualiza los campos enviados en el JSON (evita campos no permitidos)
                foreach ($data as $key => $value) {
                    if (in_array($key, [
                        'nombre_p', 'descripcion_p', 'categoria_id',
                        'precioc_p', 'preciov_p', 'unidadM_p', 'stock_p', 'fcadu_p'
                    ])) {
                        $producto->$key = $value;
                    }
                }

                $producto->save();

                return response()->json([
                    'message' => 'Producto actualizado correctamente',
                    'producto' => $producto,
                    'status' => 200
                ], 200);
            } else {
                Log::warning('Producto no existente con ID: ' . $id);
                return response()->json([
                    'message' => 'Producto no existente',
                    'status' => 404
                ], 404);
            }

        } catch (QueryException $e) {
            Log::error('Error de base de datos al actualizar producto:', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error de base de datos al actualizar el producto',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        } catch (\Exception $e) {
            Log::error('Error inesperado al actualizar producto:', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error inesperado al actualizar el producto',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $producto = Producto::find($id);

            if (!$producto) {
                Log::warning('Producto no existente con ID: ' . $id);

                return response()->json([
                    'message' => 'Producto no existente',
                    'status' => 404
                ], 404);
            }

            $producto->delete();

            Log::info('Producto eliminado correctamente', ['id' => $id]);

            return response()->json([
                'message' => 'Producto eliminado correctamente',
                'status' => 200
            ], 200);

        } catch (QueryException $e) {
            Log::error('Error de base de datos al eliminar producto:', ['error' => $e->getMessage()]);

            return response()->json([
                'message' => 'Error de base de datos al eliminar el producto',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);

        } catch (\Exception $e) {
            Log::error('Error inesperado al eliminar producto:', ['error' => $e->getMessage()]);

            return response()->json([
                'message' => 'Error inesperado al eliminar el producto',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}

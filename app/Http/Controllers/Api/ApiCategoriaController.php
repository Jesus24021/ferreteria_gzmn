<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ferreteria\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiCategoriaController extends Controller
{
    private Categoria $categoria;

    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    // Obtener todas las categorías
    public function index()
    {
        $datosCategoria = $this->categoria->getAllCategorias();
        return response()->json($datosCategoria);
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        Log::info('Request Headers:', ['headers' => $request->headers->all()]);
        Log::info('Request Content:', ['Content' => $request->getContent()]);

        if (!$request->isJson()) {
            return response()->json([
                'message' => 'La solicitud debe ser en formato JSON',
                'status' => 415
            ], 415);
        }

        $data = $request->json()->all();
        Log::info('Datos JSON recibidos:', ['data' => $data]);

        $validarDatos = Validator::make($data, [
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        if ($validarDatos->fails()) {
            Log::error('Errores de validación:', $validarDatos->errors()->toArray());
            return response()->json([
                'message' => 'Error al validar los datos',
                'errors' => $validarDatos->errors(),
                'status' => 400
            ], 400);
        }

        try {
            $categoria = Categoria::create([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion']
            ]);

            Log::info('Categoría creada:', $categoria->toArray());
            return response()->json([
                'categoria' => $categoria,
                'message' => 'Categoría creada correctamente',
                'status' => 201
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error al crear la categoría', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error inesperado al crear la categoría',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // Mostrar una categoría por ID
    public function show($id)
    {
        $validarDatos = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:categorias,id'
        ]);

        if ($validarDatos->fails()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errors' => $validarDatos->errors(),
                'status' => 400
            ], 400);
        }

        $categoria = Categoria::find($id);

        if ($categoria) {
            return response()->json([
                'categoria' => $categoria,
                'message' => 'Categoría encontrada correctamente',
                'status' => 200
            ], 200);
        }

        return response()->json([
            'message' => 'Categoría no encontrada',
            'status' => 404
        ], 404);
    }

    // Actualización parcial de una categoría
    public function partialUpdate(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoría no encontrada',
                'status' => 404
            ], 404);
        }

        $data = $request->only(['nombre', 'descripcion']);

        $validarDatos = Validator::make($data, [
            'nombre' => 'sometimes|required|string',
            'descripcion' => 'sometimes|required|string'
        ]);

        if ($validarDatos->fails()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errors' => $validarDatos->errors(),
                'status' => 400
            ], 400);
        }

        try {
            $categoria->update($data);

            return response()->json([
                'categoria' => $categoria,
                'message' => 'Categoría actualizada correctamente',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error al actualizar la categoría', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error al actualizar la categoría',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // Eliminar una categoría
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoría no encontrada',
                'status' => 404
            ], 404);
        }

        try {
            $categoria->delete();

            return response()->json([
                'message' => 'Categoría eliminada correctamente',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error al eliminar la categoría', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error al eliminar la categoría',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}

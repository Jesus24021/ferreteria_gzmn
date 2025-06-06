<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\ferreteria\Usuario;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ApiUsuariosController extends Controller
{
    private Usuario $usuario;
    public function __construct(Usuario $usuario) //Concepto de inyeción de dependencias
    {
        $this->usuario = $usuario;
    }

    public function index(){

        $DatosUsuario = $this->usuario->getAllUsuarios();

        return response()->json($DatosUsuario);
    }

    public function show(Request $request){
        // Obtener el ID de la query string
        $id = $request->query('id');

        // Validar los datos de la petición (incluyendo el ID de la query)
        $validarDatos = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:usuarios,id',
        ]);

        if ($validarDatos->fails()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'error' => $validarDatos->errors(),
                'status' => 400
            ], 400);
        }
        // Buscar el usuario utilizando el ID obtenido de la query
        $usuario = Usuario::find($id);

        if ($usuario) {
            return response()->json([
                'Usuario' => $usuario,
                'message' => 'Usuario encontrado correctamente',
                'status' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => 404
            ], 404);
        }
    }

    public function store(Request $request){
        Log::info('Request Headers:', ['headers' => $request->headers->all()]); // Registra las cabeceras de la solicitud para depuración. El segundo argumento debe ser un array.
        Log::info('Request Content:', ['content' => $request->getContent()]); // Registra el cuerpo de la solicitud para depuración. El segundo argumento debe ser un array.

        // Asegurarse de que la solicitud sea en formato JSON
        if (!$request->isJson()) { // Verifica si la cabecera 'Content-Type' de la solicitud es 'application/json'.
            return response()->json(['message' => 'La solicitud debe ser en formato JSON', 'status' => 415], 415); // Devuelve una respuesta JSON con código de estado 415 (Unsupported Media Type) si no es JSON.
        }

        $data = $request->json()->all(); // Obtiene todos los datos JSON del cuerpo de la solicitud como un array asociativo.
        Log::info('Datos JSON recibidos:', ['data' => $data]); // Registra los datos JSON recibidos para depuración.

        // Define las reglas de validación para los campos requeridos en la solicitud JSON.
        $validarDatos = Validator::make($data, [
            'nombre_completo' => 'required',
            'nombre_usuario' => 'required',
            'correo_electronico' => 'required|email|unique:usuarios',
            'contrasennia' => 'required',
        ]);

        // Verifica si la validación de los datos ha fallado.
        if ($validarDatos->fails()) {
            $errorData = [
                'message' => 'Error en la validación de datos',
                'error' => $validarDatos->errors(),
                'status' => 400,
            ];
            Log::error('Errores de validación:', $validarDatos->errors()->toArray()); // Registra los errores de validación detallados en el log.
            return response()->json($errorData, 400);
        } else {
            // Si la validación pasa, intenta crear un nuevo usuario en la base de datos.
            try {
                $resUsuario = Usuario::create([
                    'nombre_completo' => $data['nombre_completo'],
                    'nombre_usuario' => $data['nombre_usuario'],
                    'correo_electronico' => $data['correo_electronico'],
                    'contrasennia' => Hash::make($data['contrasennia']),
                    'activo' => false,
                    'id_rol' => 4,
                ]);

                // Verifica si el usuario fue creado exitosamente.
                if ($resUsuario) {
                    $successData = [
                        'Usuario' => $resUsuario,
                        'message' => 'Usuario creado correctamente',
                        'status' => 201,
                    ];
                    Log::info('Usuario creado:', $resUsuario->toArray()); // Registra la información del usuario creado en el log.
                    return response()->json($successData, 201);
                } else {
                    $errorData = [
                        'message' => 'Error al crear el usuario', // Mensaje de error genérico al crear el usuario.
                        'status' => 500, // Código de estado HTTP 500 (Internal Server Error) indicando un problema del lado del servidor.
                    ];
                    Log::error('Error al crear el usuario en la base de datos'); // Registra un error en el log si la creación del usuario falla.
                    return response()->json($errorData, 500);
                }
            } catch (QueryException $e) {
                // Captura excepciones relacionadas con la base de datos (por ejemplo, violación de clave única no capturada por la validación).
                Log::error('Error de base de datos al crear usuario:', ['error' => $e->getMessage()]); // Registra el error de la base de datos con el mensaje de la excepción.
                return response()->json(['message' => 'Error de base de datos al crear el usuario', 'error' => $e->getMessage(), 'status' => 500], 500); // Devuelve una respuesta JSON con el error de la base de datos y el código de estado 500.
            } catch (\Exception $e) {
                // Captura otras excepciones inesperadas que puedan ocurrir durante el proceso.
                Log::error('Error inesperado al crear usuario:', ['error' => $e->getMessage()]); // Registra el error inesperado con el mensaje de la excepción.
                return response()->json(['message' => 'Error inesperado al crear el usuario', 'error' => $e->getMessage(), 'status' => 500], 500); // Devuelve una respuesta JSON con el error inesperado y el código de estado 500.
            }
        }
    }


    public function update(Request $request, $id){
        return response()->json(['error' => 'end point para actualizar todo el registro '. $id], 200);
    }

    public function partialUpdate(Request $request, $id)

        {
            $validarDatos = Validator::make($request->all(), [
                'nombre_usuario' => 'required',
                'contrasennia' => 'required',
            ]);

            $data = $request->json()->all();

            if ($validarDatos->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de datos',
                    'error' => $validarDatos->errors(),
                    'status' => 400
                ], 400);
            } else {
                try {
                    $usuario = Usuario::find($id);
                    if ($usuario) {
                        $usuario->nombre_usuario = $data['nombre_usuario'];
                        $usuario->contrasennia = Hash::make($data['contrasennia']);
                        $usuario->save();

                        return response()->json(['message' => 'Usuario actualizado correctamente'], 200);
                    } else {
                        Log::warning('Usuario no existente con ID: ' . $id);
                        return response()->json([
                            'message' => 'Usuario no existente',
                            'status' => 404
                        ], 404);
                    }
                } catch (QueryException $e) {
                    Log::error('Error de base de datos al actualizar usuario:', ['error' => $e->getMessage()]);
                    return response()->json([
                        'message' => 'Error de base de datos al actualizar el usuario',
                        'error' => $e->getMessage(),
                        'status' => 500
                    ], 500);
                } catch (\Exception $e) {
                    Log::error('Error inesperado al actualizar usuario:', ['error' => $e->getMessage()]);
                    return response()->json([
                        'message' => 'Error inesperado al actualizar el usuario',
                        'error' => $e->getMessage(),
                        'status' => 500
                    ], 500);
                }
            }
        }
    public function destroy($id){
        try {
            $usuario = Usuario::find($id);

            if (!$usuario) {
                Log::warning('Usuario no encontrado con su id : ' . $id);

                return response()->json([
                    'message' => 'Usuario no existente',
                    'status' => 404
                ], 404);
            }
            $usuario->delete();

            Log::info('Usuario eliminado correctamente', ['id' => $id]);

            return response()->json([
                'message' => 'Usuario eliminado correctamente',
                'status' => 200
            ], 200);

        } catch (QueryException $e) {
            Log::error('Error de base de datos al eliminar producto:', ['error' => $e->getMessage()]);

            return response()->json([
                'message' => 'Error de base de datos al eliminar usuario',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);

        } catch (\Exception $e) {
            Log::error('Error inesperado al eliminar usuario:', ['error' => $e->getMessage()]);

            return response()->json([
                'message' => 'Error inesperado al eliminar el usuario',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}

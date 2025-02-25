<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
     /**
     * login api
     *
     */
    public function login(Request $request)
    {
        //dd($request);
        $request->validate([
            'nombreUsuario' => 'required',
            'contrasenia' => 'required'
        ]);

        $credentials = $request->except('_token');

        $empleado = User::where('nombreUsuario', $request->nombreUsuario)->first();

        if ($empleado && Hash::check($request->contrasenia, $empleado->contrasenia)) {
            Log::info($request);
            Auth::login($empleado);
            return redirect()->route('opticas');
        } else {
            Log::info("hola");
            session()->flash('message', 'Nombre de usuario o contraseña incorrectos');
            echo "no funciona";
            return redirect()->back();
        }
    }

     /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
    // Validar los datos recibidos
    $validatedData = $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'dni' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'correo' => 'required',
        'nombreUsuario' => 'required',
        'rol' => 'required',
        'contrasenia' => 'required', // Usamos confirmed para comparar con password_confirmation
    ]);

    try {
        // Crear el usuario con la contraseña cifrada
        $user = User::create([
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'dni' => $validatedData['dni'],
            'direccion' => $validatedData['direccion'],
            'telefono' => $validatedData['telefono'],
            'correo' => $validatedData['correo'],
            'nombreUsuario' => $validatedData['nombreUsuario'],
            'rol' => $validatedData['rol'],
            'contrasenia' => Hash::make($validatedData['contrasenia']),
        ]);

        // Generar un token de acceso
        $token = $user->createToken('MyApp')->accessToken;

        // Preparar la respuesta de éxito
        return response()->json([
            'success' => [
                'token' => $token,
                'nombre' => $user->nombre,
            ]
        ], 201); // Código HTTP 201: Creado
    } catch (\Exception $e) {
        // Manejar errores inesperados
        return response()->json([
            'error' => 'No se pudo registrar el usuario.',
            'details' => $e->getMessage(),
        ], 500); // Código HTTP 500: Error interno del servidor
    }
    }

      /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }


    public function logout(Request $request)
    {

        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return response()->json(['success' => $isUser], 200);
        }
        else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }


    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Optica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();

        return response()->json($user);
    }


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
            session(['idAdmin' => $empleado->id]);
            return redirect()->route('opticas');
        } else {
            Log::info("hola");
            session()->flash('message', 'Nombre de usuario o contraseña incorrectos');
            echo "no funciona";
            return redirect()->back();
        }
    }

    public function loginAngular(Request $request)
    {
        $request->validate([
            'nombreUsuario' => 'required',
            'contrasenia' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $empleado = User::with('optica')->where('nombreUsuario', $request->nombreUsuario)->first();

        if ($empleado && Hash::check($request->contrasenia, $empleado->contrasenia)) {
            //Log::info($request);
            Auth::login($empleado);
            //dd($empleado);
            return response()->json([
                'id' => $empleado->id,
                'nombreUsuario' => $empleado->nombreUsuario,
                'apellido' => $empleado->apellido,
                'nombre' => $empleado->nombre,
                'rol' => $empleado->rol,
                'dni' => $empleado->dni,
                'direccion' => $empleado->direccion,
                'telefono' => $empleado->telefono,
                'correo' => $empleado->correo,
                'optica' => [
                    'id' => $empleado->optica->id ?? 1,
                    'nombre' => $empleado->optica->nombre ?? null,
                ]
            ]);
        } else {
            return response()->json('message', 'Nombre de usuario o contraseña incorrectos');
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
        if ($isUser) {
            $success['message'] = "Successfully logged out.";
            return response()->json(['success' => $isUser], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function guardarSesion(Request $request)
    {
        $datos =  $request->validate([
            'nombreE' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'direccionE' => 'required|string|max:255',
            'telefonoE' => 'integer',
            'correoE' => 'required|string|max:255',
            'rol' => 'required|in:auxiliar,optometrista',
            'nombreUsuario' => 'required|string|max:255',
            'contrasenia' => 'required|string|max:255',
        ]);
        /* $usuarios=[]; */
        session([
            'nombreE' => $datos['nombreE'],
            'apellido' => $datos['apellido'],
            'dni' => $datos['dni'],
            'direccionE' => $datos['direccionE'],
            'telefonoE' => $datos['telefonoE'],
            'correoE' => $datos['correoE'],
            'rol' => $datos['rol'],
            'nombreUsuario' => $datos['nombreUsuario'],
            'contrasenia' => $datos['contrasenia'],
        ]);
        //session($usuarios);

        session('nombreH', 'horaApertura', 'horaCierre');

        /*  $horario = Horario::create([
            'nombre' => session('nombreH'),
            'horaApertura' => session('horaApertura'),
            'horaCierre' => session('horaCierre'),
            //'idHorario' => $horario->id,

        ]); */

        $optica = Optica::create([
            'nombre' => session('nombre'),
            'telefono' => session('telefono'),
            'direccion' => session('direccion'),
            'correo' => session('correo'),
            'num_Maquinas' => session('num_Maquinas'),
            'horaApertura' => session('horaApertura'),
            'horaCierre' => session('horaCierre'),
            'idAdmin' => session('idAdmin'),
            //'idHorario' => $horario->id,
        ]);

        $user = User::create([
            'nombre' => $datos['nombreE'],
            'apellido' => session('apellido'),
            'dni' => session('dni'),
            'direccion' => session('direccionE'),
            'telefono' => session('telefonoE'),
            'correo' => session('correoE'),
            'rol' => session('rol'),
            'nombreUsuario' => session('nombreUsuario'),
            'contrasenia' => session('contrasenia'),
            //'idOptica' => $optica->id,
        ]);

        $opticas = Optica::all();

        return view('opticas', compact('opticas'));
    }


    public function buscarEmpleado(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);
    }

    public function empleadosOptica(Request $request){

      /*   $request->validate([
            'idOptica' => 'required|string|max:255',
        ]); */

        if (!$request->has('idOptica')) {
            return response()->json([
                'message' => 'El parámetro idOptica es requerido'
            ], 400);
        }

        $idOptica=$request->query('idOptica');

        $empleados = User::where('idOptica', $idOptica)->get();

        if($empleados==null){
            return response()->json(['message' => 'Citas no encontrado'])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        return response()->json($empleados)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}

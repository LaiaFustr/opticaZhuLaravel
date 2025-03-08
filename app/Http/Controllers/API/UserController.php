<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Optica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



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

            $logeado = User::find($empleado->id);


            if ($logeado->rol == 'admin') {
                $ruta = redirect()->route('opticas');
            } elseif ($logeado->rol == 'auxiliar' || $logeado->rol == 'optometrista') {
                $ruta = redirect()->route('home');
            }
            return $ruta;
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
        //dd($empleado);

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
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'nombreUsuario' => 'required',
            'rol' => 'required',
            'contrasenia' => 'required',
            'idOptica' => 'required|integer',
        ]);

        try {
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
                'idOptica' => $validatedData['idOptica'],
            ]);

            $token = $user->createToken('MyApp')->accessToken;

            return response()->json([
                'success' => [
                    'token' => $token,
                    'nombre' => $user->nombre,
                ]
            ], 201);
        } catch (\Exception $e) {
            return redirect()->route('opticas');
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
            'activo' => '1',
            'idOptica' => Optica::orderBy('id', 'desc')->value('id'),
        ]);

        $opticas = Optica::all();

        return view('opticas', compact('opticas'));
    }



    public function buscarEmpleadoApi(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:255',
        ]);

        $dni = $request->query('dni');

        $empleado = DB::table('users')->where('dni', $dni)->first();

        if ($empleado == null) {
            return response()->json(['message' => 'Empleado no encontrado']);
        }
        //dd($cliente);
        return response()->json($empleado);
    }

    public function guardarEmpleadoApi(Request $request)
    {
        $id = $request['id'];
        $usuarioCambiado = User::find($id);

        $usuarioCambiado->nombre = $request->nombre;
        $usuarioCambiado->apellido = $request->apellido;
        $usuarioCambiado->direccion = $request->direccion;
        $usuarioCambiado->telefono = $request->telefono;
        $usuarioCambiado->correo = $request->correo;
        $usuarioCambiado->nombreUsuario = $request->nombreEmpleado;
    }




    public function buscarEmpleadoLaravel(Request $request)
    {
        $request->validate([
            'nombreUsuario' => 'required|string|max:255',
        ]);

        $nombreUsuario = $request->query('nombreUsuario');

        $empleado = DB::table('users')->where('nombreUsuario', $nombreUsuario)->first();

        if ($empleado == null) {
            return response()->json(['message' => 'Empleado no encontrado']);
        }
        //dd($cliente);
        return view('perfilEmp', compact('empleado'));
    }



    public function empleadosOptica(Request $request)
    {

        /*   $request->validate([
            'idOptica' => 'required|string|max:255',
        ]); */

        if (!$request->has('idOptica')) {
            return response()->json([
                'message' => 'El parámetro idOptica es requerido'
            ], 400);
        }

        $idOptica = $request->query('idOptica');

        $empleados = User::where('idOptica', $idOptica)->where('activo', 1)->get();

        if ($empleados == null) {
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

    public function desactivarEmpleado($id){
        $empleado= User::find($id);
        $empleado->activo=0;
        $empleado->update();

        return redirect()->route('opticas');
    }

    public function activarEmpleado($id){
        $empleado= User::find($id);
        $empleado->activo=1;
        $empleado->update();

        return redirect()->route('opticas');
    }

}

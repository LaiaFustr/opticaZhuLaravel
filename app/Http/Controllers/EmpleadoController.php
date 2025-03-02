<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Optica;
use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;






class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        $empleados = Empleado::all();

        return response()->json($empleados);
    }

    public function empleadoID($id)
    {
        $empleado = Empleado::where("id", $id)->get();
        return response()->json($empleado);
    }

    /*  public function mostrar(Request $request)
    {
        $empleados = Empleado::all();

        return view('opticas', compact('opticas'));
    }
 */

    public function login(Request $request){
        $request->validate([
            'nombreUsuario' => 'required',
            'contrasenia' => 'required'
        ]);
 
        $credentials = $request->except('_token');

        $empleado = Empleado::where('nombreUsuario', $request->nombreUsuario)->first();

        if ($empleado && Hash::check($request->contrasenia, $empleado->contrasenia)) {
            Auth::login($empleado);
            return redirect()->route('opticas');
        } else {
            session()->flash('message', 'Nombre de usuario o contraseña incorrectos');
            return redirect()->back();
        }
    }

    public function logout(Request $request){
     //   Session::flush();
        Auth::logout();
        return redirect('home');
    }

    public function guardar(Request $request)
    {
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'integer',
            'correo' => 'required|string|max:255',
            'rol' => 'required|in:auxiliar,optometrista',
            'nombreUsuario' => 'required|string|max:255',
            'contrasenia' => 'required|string|max:255',
        ]);
        //dd($validateData);
        Empleado::create($validateData);

        return redirect()->route('opticas');
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

        $empleado = Empleado::create([
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
        $request->validate([
            'dni' => 'required|string|max:255',
        ]);

        $dni = $request->query('dni');

        $empleado = DB::table('empleados')->where('dni', $dni)->first();

        if($empleado==null){
            return response()->json(['message' => 'Empleado no encontrado']);
        }
        //dd($cliente);
        return view('perfilEmp', compact('empleado'));
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Optica;
use App\Models\Admin;


class AdminController extends Controller
{
    /*public function mostrarOpticas(){

        $admins=Admin::with('opticas')->get();

        foreach ($admins as $key => $admin) {
            echo $admin->opticas;
        }
    }*/

    public function buscarAdmin($idAdmin){

        $admin=Admin::where('id', $idAdmin)->get();

        return response()->json($admin);
    }

    public function index(Request $request)
    {
        $admin = Admin::all();
        return response()->json($admin);
        //Devuelve un listado con todos los admins
    }

    public function mostrarAdmins(Request $request)
    {
        $task = Admin::all();
        return $task;
        //Devuelve un listado con todos los admins
    }

    public function crearAdmin(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'dni' => 'required|string|min:9', 
            'direccion'=> 'required|string|max:40',
            'telefono'=> 'required|integer|max:15',
            'correo'=> 'required|email',
            'nombreUsuario'=> 'required|string',
            'contrasenia'=> 'required|string|max:',
        ]);

        $admin = Admin::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($admin, 201);
    }
}
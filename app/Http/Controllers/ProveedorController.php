<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Optica;
use App\Models\Articulo;
use DataTables;

class ProveedorController extends Controller
{
    public function indexproveedor(){
        $proveedores = Proveedor::all();
        return view("proveedores", compact("proveedores"));
    }
    

    public function getProveedores(){
        $prove = Proveedor::query();

        return DataTables::eloquent($prove)
        ->addColumn('nif', function ($prov) {
            return '<a class="nav-link" href="'.route('proveedor', $prov->id).'">'.$prov->nif.'</a>';
        })
        ->addColumn('nombre', function ($prov) {
            return '<a class="nav-link" href="'.route('proveedor', $prov->id).'">'.$prov->nombre.'</a>';
        })
        ->addColumn('direccion', function ($prov) {
            return '<a class="nav-link" href="'.route('proveedor', $prov->id).'">'.$prov->direccion.'</a>';
        })
        ->addColumn('correo', function ($prov) {
            return '<a class="nav-link" href="'.route('proveedor', $prov->id).'">'.$prov->correo.'</a>';
        })
        ->addColumn('telefono', function ($prov) {
            return '<a class="nav-link" href="'.route('proveedor', $prov->id).'">'.$prov->telefono.'</a>';
        })
        ->addColumn('codPostal', function ($prov) {
            return '<a class="nav-link" href="'.route('proveedor', $prov->id).'">'.$prov->codPostal.'</a>';
        })
        ->addColumn('action', function($prov){
            return '
                <button type="button" class="btn dropdown" id="opcionesProveedor" data-bs-toggle="dropdown" aria-expanded="false">
                    ☰
                </button>
                <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="opcionesProveedor">
                    <button class="btn btn-sm btn-primary btn-borrar-proveedor botonNuevaCita" data-id="'.$prov->id.'">Borrar</button>
                    <button class="btn btn-sm btn-primary btn-editar-proveedor botonNuevaCita" 
                        data-id="'.$prov->id.'" data-nif="'.$prov->nif.'" data-nombre="'.$prov->nombre.'" 
                        data-direccion="'.$prov->direccion.'" data-correo="'.$prov->correo.'"  
                        data-telefono="'.$prov->telefono.'" data-codPostal="'.$prov->codPostal.'" 
                        data-bs-toggle="modal" data-bs-target="#editProveedor">Editar</button>
                </div>';
        })
        ->rawColumns(['nif', 'nombre', 'direccion', 'correo', 'telefono', 'codPostal', 'action'])
        ->toJson();
    }

    public function proveedor($id){
        $proveedor = Proveedor::find($id);
        $articulos = Articulo::where('idProveedor', $id)->with('optica')->get();
        $opticas = Optica::all();
        //dd($articulos);
        return view('proveedor', compact( "articulos", "proveedor", "opticas"));
    }

    public function crearProveedor(Request $request){
        $datos = $request->validate([
            'nif' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'codPostal' => 'required'
        ], [
            'nif.required' => "El NIF es obligatorio",
            'nif.max' => 'El NIF no puede tener mas de 9 caracteres',
            'nombre.required' => 'El nombre es obligario',
            'correo.required' => 'el correo es obligatorio',
            'telefono.required' => 'El telefono es obligatorio',
            'codPostal.required' => 'El codigo postal es obligatorio',
        ]);

        try{
            Proveedor::create($datos);
            return redirect()->back()->with("provcreado", "Proveedor creado con exito");;  
        }catch(\Exception $e){
            console.log($e);
            return redirect()->back()->withErrors(['error'=>'Fallo al crear el proveedor']);
        }

    }

    public function editarProveedor(Request $request){
        $datos = $request->validate([
            'nif' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'codPostal' => 'required'
        ], [
            'nif.required' => "El NIF es obligatorio",
            'nif.max' => 'El NIF no puede tener mas de 9 caracteres',
            'nombre.required' => 'El nombre es obligario',
            'direccion.required' => "La direccion es obligatoria",
            'correo.required' => 'el correo es obligatorio',
            'telefono.required' => 'El telefono es obligatorio',
            'codPostal.required' => 'El codigo postal es obligatorio',
        ]);
        try{
            $proveedor = Proveedor::findOrFail($request->id);
            $proveedor->update($datos);

            return redirect()->back()->with("proveditado", "Proveedor editado con exito");
        }catch(\Exception $e){
            console.log($e);
            return redirect()->back()->withErrors(['error'=>'Fallo al editar el proveedor']);
        }
    }

    public function borrarProveedor($id){
        //dd($id);
        $proveedores = Proveedor::all();
        $proveedor = Proveedor::destroy($id);

        return redirect()->route("indexproveedor", compact("proveedores"))->with("eliminado", "Proveedor eliminado con exito");
    }

    public function crearArticulo(Request $request){
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio' => 'required',
            'idProveedor' => 'required',
            'idOptica' => 'required'
        ]);

        Articulo::create($datos);
        return redirect()->back();
    }
}

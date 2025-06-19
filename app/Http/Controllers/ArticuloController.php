<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Proveedor;
use App\Models\Optica;
use DataTables;

class ArticuloController extends Controller
{
    public function getArticulos(){
        $articulos = Articulo::query();
        
        return DataTables::eloquent($articulos)
        ->toJson();
    }

    public function cargarArticulos($idOptica, $idProveedor){
        $articulos = Articulo::where('idOptica', $idOptica)->where('idProveedor', $idProveedor)->get();

        return response()->json($articulos);
    }

    public function editarArticulo(Request $request){
        
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio' => 'required',
            'idOptica' => 'required',
            'idProveedor' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'stock.required' => 'El stock es obligatorio',
            'precio.required' => 'El precio es obligatorio',
            'descripcion.required' => 'La descripcion es obligatoria',

        ]);
        /*$arti = Articulo::findOrFail($request->editId);
        dd($arti);*/
        try{
            $articulo = Articulo::findOrFail($request->editId);
            $articulo->update($datos);
            return redirect()->back()->with("artieditado", "Articulo editado con exito");
        }catch(\Exception $e){
             return redirect()->back()->withErrors(['error'=>'Fallo al editar el articulo: '. $e]);
        }
    }

    public function borrarArticulo($id){
        //dd($id);
        $articulo = Articulo::destroy($id);

        return redirect()->back()->with("eliminado", "Articulo eliminado con exito");
    }
}

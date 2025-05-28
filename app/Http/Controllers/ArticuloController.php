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
}

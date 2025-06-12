<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Optica;
use App\Models\Articulo;
use App\Models\DetallePedido;
use App\Models\Proveedor;
use DataTables;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;


class PedidoController extends Controller{

    public function indexpedidos(){
        $pedidos = Pedido::with(['optica', 'proveedor'])->get();
        $proveedores = Proveedor::all();
        $opticas = Optica::all();

        return view("pedidos", compact('pedidos', "opticas", 'proveedores'));
    }

    public function getPedidos(){
        $pedido = Pedido::query();

        return DataTables::eloquent($pedido)
        ->addColumn('id', function ($ped) {
            return '<a class="nav-link" href="' . route('detallespedido', $ped->id) . '">' . $ped->id . '</a>';
        })
        ->addColumn('fecha', function ($ped) {
            return '<a class="nav-link" href="' . route('detallespedido', $ped->id) . '">' . $ped->fecha . '</a>';
        })
        ->addColumn('estado', function ($ped) {
            return '<a class="nav-link" href="' . route('detallespedido', $ped->id) . '">' . $ped->estado . '</a>';
        })
        ->addColumn('total', function ($ped) {
            return '<a class="nav-link" href="' . route('detallespedido', $ped->id) . '">' . $ped->total . '</a>';
        })
        ->addColumn('proveedor', function ($ped) {
            return '<a class="nav-link" href="' . route('detallespedido', $ped->id) . '">' . $ped->proveedor->nombre . '</a>';
        })
        ->addColumn('optica', function ($ped) {
            return '<a class="nav-link" href="' . route('detallespedido', $ped->id) . '">' . $ped->optica->nombre . '</a>';
        })
        ->addColumn('pdf', function ($ped) {
            return '<a class="nav-link" href="' . route('pdfpedido', $ped->id) . '">PDF</a>';
        })
        ->rawColumns(['id', 'fecha', 'estado', 'total', 'proveedor', 'optica', 'pdf'])
        ->toJson();
    }

    public function cancelarPedido($id){
        $pedido = Pedido::with(['optica', 'proveedor'])->findOrFail($id);

        $pedido->update(["estado"=>"cancelado"]);

        return redirect()->route("indexpedidos")->with("success", "Pedido cancelado");
    }

    public function detallespedido($id){
        $detalles = DetallePedido::where('idPedido', $id)->with(['articulo', 'pedido'])->get();

        $pedido = Pedido::find($id);
        
        return view('detallespedido', compact("detalles", "pedido"));
    }

    public function pdf(){

        $pedidos = Pedido::all();
        $pdf = Pdf::loadView("pdf", compact("pedidos"));
        //return view("pdf");
        return $pdf->stream();
    }

    public function confirmarPedido(Request $request){
        $optica  = Optica::find($request->idOptica);
        $proveedor= Proveedor::find($request->idProveedor);
        $TOTAL= 0;
        $articulos = [];
        //Aer, ha sido una fumada, y como no me acordare para la presentacion, lo anoto aqui
        foreach($request->all() as $arti => $value){ //Segun laraveldaily no es seguro usar all(), pero nomas lo usare pa esto asi que x
        /*Ejemplo: tengo cantidad_12(el numero se refiere a la id
        a la que se asocia, osea, que es la cantidad del articulo 12)
        Un poco enrebesado pero bueno, esto lo ves tu nomas*/
            if(str_starts_with($arti, 'cantidad_') && $value>0){
                $idArti = str_replace('cantidad_', '', $arti); //le quita todo el "cantidad_"
                $articulo = Articulo::find($idArti);

                $subtotal = $value * $articulo->precio;
                $TOTAL= $TOTAL + $subtotal;
                //dd($articulo);
                if($articulo){
                    $articulo->cantidad = $value; //Po ahora le danos la cantidad
                    $articulos[] = [
                        'id' => $articulo->id,
                        'nombre' => $articulo->nombre,
                        'cantidad' => $value,
                        'precio' => $articulo->precio,
                        'subtotal' => $subtotal,
                    ];
                }
            }
        }
        //dd($articulos);
        return view("confirmarPedido", compact("articulos", "optica", "proveedor", "TOTAL"));
    }

    public function crearPedido(Request $request){

        $idOptica = $request->input('idOptica'); 
        $idProveedor = $request->input('idProveedor');
        $totalPedido = 0;

        //dd($request->all());
        //dd($idOptica);
        $pedido= Pedido::create([
            'fecha' => today(), //today para fecha de 'today'xd, now para fecha Y hora
            'estado' => 'pendiente',
            'total' => $totalPedido,
            'idProveedor' => $idProveedor,
            'idOptica' => $idOptica, 
        ]);   

        foreach($request->all() as $arti => $value){    
        
            if(str_starts_with($arti, 'cantidad_') && $value>0){
                $idArti = str_replace('cantidad_', '', $arti); //le quita todo el "cantidad_"
                $precio = $request->input("precio_$idArti");
                $subtotal = $request->input("subtotal_$idArti") ?? ($value*$precio); //PORQUE ahora no quiere cojer este subtotal?=?? no se
                //dd($subtotal);
                $articulo = Articulo::find($idArti);

                DetallePedido::create([
                    'idPedido' => $pedido->id,  
                    'idArticulo' => $articulo->id,
                    'cantidad' => $value,
                    'precio' => $precio,
                    'subtotal' => $subtotal,
               ]);
               $totalPedido += $subtotal;
            }
        }

        $pedido->update([
            'total' =>$totalPedido
        ]);

        return redirect()->route('indexpedidos');
    }

    public function pagarPedido(Request $request){
        $datos = $request->validate([
            'datos' => 'required',
            'direccion' => 'required',
            'correo'  => 'required',
            'telefono'  => 'required',
            'tarjeta'  => 'required',
            'caducidad'  => 'required',
            'cvv' => 'required',
        ], [
            'datos' => "El titular de la tarjeta es obligatorio",
            'direccion' => 'La direccion es obligatoria',
            'correo' => 'El correo es obligatorio',
            'telefono' => 'El numero de telefono es obligatorio',
            'tarjeta' => 'El numero de tarjeta es obligatorio',
            'tarjeta.max' => 'El numero de tarjeta no debe tener mas de 16 caracteres',
            'caducidad' => 'La fecha de caducidad es obligatoria',
            'cvv' => 'El CVV es obligatorio',
        ]);

        try{
            $pedido = Pedido::with(['optica', 'proveedor'])->findOrFail($request->input('pedido'));
            $detalles = DetallePedido::with('articulo')->where('idPedido', $pedido->id)->get();
            $numFactura = date('Y') . "A". "00" .$pedido->id;

            foreach($detalles as $det){
                $articulo = $det->articulo;
                $stock = $articulo->stock + $det->cantidad;
                $articulo->update(['stock' => $stock]);
            }

            /*
            $total = $detalles->sum('subtotal');
            $iva = round($detalles->sum('subtotal') *(21 / 100), 2);
            $totaliva = round($total + $iva, 2);

            $datosTotal= [
                'total' => $total,
                'iva' => $iva,
                'totaliva' => $totaliva,
            ];
            
            $datosPago = [
                'datos' => $request->input('datos'),
                'fecha' => now(), //date('Y')."-".date('m')."-".date('d')
                'direccion' => $request->input('direccion'),
                'correo' => $request->input('correo'),
                'telefono' => $request->input('telefono'),
                'tarjeta' => $request->input('tarjeta'),
                'caducidad' => $request->input('caducidad'),
                'cvv' => $request->input('cvv'),
            ];*/

            $pedido->update(["estado"=>"pagado"]);

            //$pdf = Pdf::loadView("pdf", compact("detalles", "pedido", "numFactura", "datosTotal"));
            
            //return view("pdf");
            //return $pdf->download("Factura".$numFactura.$pedido->id.".pdf");
            return redirect()->route("indexpedidos")->with("success", "Pedido pagado");
        }catch(\Exception $e){
            console.log($e);
            return redirect()->back()->withErrors(['error'=>'Fallo al pagar el pedido']);
        }
    
    }

    public function pdfpedido($ped){
        $pedido = Pedido::with(['optica', 'proveedor'])->findOrFail($ped);
        $detalles = DetallePedido::with('articulo')->where('idPedido', $pedido->id)->get();
        $numFactura = date('Y') . "A". "00" .$pedido->id;

        $total = $detalles->sum('subtotal');
        $iva = round($detalles->sum('subtotal') *(21 / 100), 2);
        $totaliva = round($total + $iva, 2);

        $datosTotal= [
            'total' => $total,
            'iva' => $iva,
            'totaliva' => $totaliva,
        ];

        $pdf = Pdf::loadView("pdf", compact("detalles", "pedido", "numFactura", "datosTotal"));
        return $pdf->download("Factura".$numFactura.$pedido->id.".pdf");
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;

use App\PedidosUsuario;
use App\ProductosPedido;



class PedidosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function grabarListaPedido(Request $request)
    {
        
       // return $cadena;
        
         DB::beginTransaction();
        try {

            $pedido = new PedidosUsuario();
            $pedido->usua_id = Auth::user()->id;
            $pedido->nombre  = date("Y-m-d")." - ".$request->total;
    
            $pedido->save();
            
            
    
      
            foreach ( $request->listaProductos  as $key => $fila) 
            {  
                 $fila2 = json_decode($fila);
    
                 $query[] = [
                    'pedido_id'         => $pedido->id,
                    'prod_id'           => $fila2->id,
                    'prod_nombre'       => $fila2->pp_nombre,
                    'prov_code'         => $fila2->prov_code,
                    'pp_laboratorio'    => $fila2->pp_laboratorio,
                    'pp_precio'         => $fila2->pp_precio,
                    'pp_cantidad'       => $fila2->cantidad
                    ];             
                 
            } 
    
            ProductosPedido::insert($query);
 
         DB::commit();
        return "OK";
        
        } catch (Exception $e) {
            DB::rollBack(); 
            report($e);
            return $e;
        } 

    }
}

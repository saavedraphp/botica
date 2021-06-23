<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;


class PedidosController extends Controller
{
    public function grabarListaPedido(Request $request)
    {
        DB::beginTransaction();
        try {
         //        DB::enableQueryLog();
        $productos = Producto::where('pp_nombre', 'LIKE', '%' . trim($request->input('palabra')). '%')->orderBy('pp_precio', 'asc')->get();
        
        //$productos = DB::table('productos_precio')
          //              ->where('pp_nombre','LIKE','%'.trim($request->palabra).'%')->orderBy('pp_precio', 'asc')->get();
         //dd(DB::getQueryLog());
         DB::commit();
        return $productos;
        
        } catch (Exception $e) {
            DB::rollBack(); 
            report($e);
            return $e;
        }

    }
}

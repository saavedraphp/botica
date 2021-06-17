<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Maatwebsite\Excel\Facades\Excel;


use App\Imports\Productosimport;

class ProductosController extends Controller
{

    
    public function __construct()
    {
        // LSL PARA LA VALIDACION
        $this->middleware('auth');
        //$this->foo = $foo;
    }

 

    public function importExcel(Request $request)
    {
        
        $file = $request->file('img');

        Excel::import(new Productosimport,$file);
        
        return redirect('admin/importar')->with('message','La operacion se realizo con Exito')->with('operacion','1');
    }
    
    
    public function buscarProduco(Request $request)
    {
        try {
         //        DB::enableQueryLog();
        $productos = Producto::where('pp_nombre', 'LIKE', '%' . trim($request->input('palabra')). '%')->orderBy('pp_precio', 'asc')->get();
        
        //$productos = DB::table('productos_precio')
          //              ->where('pp_nombre','LIKE','%'.trim($request->palabra).'%')->orderBy('pp_precio', 'asc')->get();
         //dd(DB::getQueryLog());
        return $productos;
        
        } catch (Exception $e) {
            report($e);
            return $e;
        }

    }


}

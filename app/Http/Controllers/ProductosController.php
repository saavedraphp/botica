<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{

    
    public function __construct()
    {
        // LSL PARA LA VALIDACION
        $this->middleware('auth');
        //$this->foo = $foo;
    }

 

    public function store(Request $request)
    {
        $producto                   = new Producto();
        
        $producto->empr_id          = $request->get('cbo_empresa');
        $producto->prod_nombre      = $request->get('producto');
        $producto->prod_codigo      = $request->get('codigo_producto');
        $producto->prod_sku         = $request->get('sku');
        $producto->prod_ean         = $request->get('ean');
        $producto->pres_id          = $request->get('cbo_presentacion');
        $producto->prod_lote         = $request->get('lote');
        $producto->prod_serie       = $request->get('serie');
        $producto->prod_precio  =   (float)$request->get('precio');
        $producto->prod_comentario  = $request->get('comentario');
        
        $producto->save();

        //return redirect('admin/productos');
        return redirect('admin/productos')->with('message','La operacion se realizo con Exito')->with('operacion','1');
    }
    
     

}

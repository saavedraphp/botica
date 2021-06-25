<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidosUsuario extends Model
{
    use SoftDeletes;
    protected $table = 'pedidos_usuario';
    protected $primaryKey = 'id';
}

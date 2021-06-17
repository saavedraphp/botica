<?php

namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;

class Productosimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producto([
            'pp_nombre' => trim($row[0]),
            'pp_laboratorio' => trim($row[1]),
            'prov_code' => trim($row[2]),
            'pp_presentacion' => trim($row[3]),
            'pp_composicion' => trim($row[4]),
            'pp_precio' => (float)$row[5],
            'pp_fecha' => $row[6]
            
            

        ]);
    }
}

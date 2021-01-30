<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompraInsumo extends Model
{
    use SoftDeletes;
    protected $dates = ['fecha_compra'];

    public function insumo() //se usa en comprainsumo.index | no borrar
    {
        return $this->belongsTo('App\Insumo');
    }
}

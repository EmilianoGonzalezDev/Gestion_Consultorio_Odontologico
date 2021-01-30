<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insumo extends Model
{
    use SoftDeletes;

    public function comprainsumos()
    {
        return $this->hasMany('App\CompraInsumo');
    }

    /*public function stock() //informa el stock restante del insumo
    {
        return Insumo::find($this->id)->comprainsumos()->sum('cantidad_restante');
    }*/
}

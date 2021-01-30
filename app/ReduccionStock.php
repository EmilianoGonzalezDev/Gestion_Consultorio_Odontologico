<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReduccionStock extends Model
{
    use SoftDeletes;
    protected $table = 'reduccion_stock'; //es necesaria esta línea porque de lo contrario buscaría la tabla "stocks" y daría error
    protected $dates = ['fecha'];

    /*public function insumo()
    {
        return $this->belongsTo('App\Insumo');
    }*/
}

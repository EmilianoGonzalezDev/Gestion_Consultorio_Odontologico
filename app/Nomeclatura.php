<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nomeclatura extends Model
{
    use SoftDeletes;

    public function atenciones()
    {
        return $this->belongsToMany('App\Atencion','servicio_prestados','nomeclatura_id','atencion_id');
    }
}

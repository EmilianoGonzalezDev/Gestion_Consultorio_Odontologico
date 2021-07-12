<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Atencion extends Model
{
    use SoftDeletes;
    protected $dates = ['fecha']; //para evitar error "Call to a member function formatLocalized() on string" en el index de Atenciones

    protected $table = 'atenciones'; //en este caso es necesaria esta línea porque de lo contrario buscaría la tabla "atencions" y daría error

    public function nomeclaturas()
    {
        return $this->belongsToMany('App\Nomeclatura','servicio_prestados','atencion_id','nomeclatura_id');
    }

    /*public function user() //esto andaba para buscar con find() pero daba error en la lista de eliminados, y tambien si se eliminaba un paciente
    {
        return $this->belongsTo('App\User');
    }
    
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }*/

    /*public static function listaEmpleados()
    {
        return User::get();
    }*/

    /*public static function listaPacientes()
    {
        return Paciente::get();
    }*/

    /*public static function paciente($id)
    {
        return Paciente::withTrashed()->where('id', '=', $id)->first();
    }*/

    /*public static function empleado($id)
    {
        return User::withTrashed()->where('id', '=', $id)->first();
    }*/
}

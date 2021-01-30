<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB; //para que funcione la consulta DB
use App\Atencion;

class Paciente extends Model
{
    use SoftDeletes;
    //protected $dates = ['fechanacimiento'];   //evita error call to undefined method, al usar una función como "formatLocalized"
                                                //pero da problemas en otros lugares (por ej al editar). No usar.
                                                //mejor usar \Carbon\Carbon::parse($valor->fechaAConvertir)->formatLocalized()...
    
    //protected $fillable = ['nombre', 'apellido','etc' }}];
   

    public function atenciones()
    {
        return $this->hasMany('App\Atencion');
    }

    /*public function ortodoncia()
    {
        return $this->hasOne('App\Ortodoncia');
    }*/

    public static function deuda($id)
    {
         //crear consulta db
         $deuda = DB::select('SELECT SUM(importe - pago) as saldo FROM atenciones WHERE paciente_id = :idpaciente AND deleted_at IS NULL', ['idpaciente' => $id])[0]->saldo;
            //estas consultas devuelven un conjunto de arreglos, con el [0] tomo el primer arreglo y con ->saldo obtengo el valor asociado a ese atributo. En este caso un número
         if(!$deuda) $deuda = 0;
         return $deuda;
    }


    public static function paciente($id)
    {
        return Paciente::withTrashed()->where('id', '=', $id)->first();
    }

    /*public static function atenciones($id) //PROBANDO
    {
        return Atencion::withTrashed()->where('id_paciente', '=', $id);
    }*/
}

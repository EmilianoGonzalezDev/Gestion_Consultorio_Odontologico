<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Paciente;

class Ortodoncia extends Model
{
    use SoftDeletes;
}

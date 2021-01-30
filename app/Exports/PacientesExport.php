<?php

namespace App\Exports;

use App\Paciente;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PacientesExport implements FromView,ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('reportes.pacientesatendidosfecha', [
            'pacientes' => Paciente::get()
        ]);
    }
}
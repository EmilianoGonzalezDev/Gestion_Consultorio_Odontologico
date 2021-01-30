<?php

namespace App\Exports;

use App\Insumo;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InsumosExport implements FromView,ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('reportes.insumosbajostock', [
            'insumos' => Insumo::get()
        ]);
    }
}
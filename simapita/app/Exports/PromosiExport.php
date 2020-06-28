<?php

namespace App\Exports;

use App\Promosi;
use Maatwebsite\Excel\Concerns\FromCollection;

class PromosiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Promosi::all();
    }
}

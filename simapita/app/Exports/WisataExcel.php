<?php

namespace App\Exports;

use App\Wisata;
use Maatwebsite\Excel\Concerns\FromCollection;

class WisataExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Wisata::all();
    }
}

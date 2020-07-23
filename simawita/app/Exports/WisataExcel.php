<?php

namespace App\Exports;

use App\Wisata;
use App\Pendapatan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class WisataExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendapatan::all();
    }
}

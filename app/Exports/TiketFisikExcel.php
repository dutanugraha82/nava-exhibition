<?php

namespace App\Exports;

use App\Models\TiketFisik;
use Maatwebsite\Excel\Concerns\FromCollection;

class TiketFisikExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TiketFisik::all();
    }
}

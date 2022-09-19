<?php

namespace App\Exports;

use App\Quotation;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuotationExport1 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Quotation::all();
    }
}

<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class NedraImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            /*0 => new FirstSheetImport(),
            2 => new SecondSheetImport(),
            4 => new RegionSubjectImport(),*/
            3 => new DepositImport(),
            /*1 => new LicenseAreaImport(),*/
        ];
    }
} 

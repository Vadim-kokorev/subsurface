<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class NedraImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            /*0 => new FirstSheetImport(),
            1 => new SecondSheetImport(),*/
            2 => new LicenseAreaImport(),
            4 => new RegionSubjectImport(),
            3 => new DepositImport(),
        ];
    }
} 

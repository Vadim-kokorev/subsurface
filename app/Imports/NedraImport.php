<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
class NedraImport implements WithMultipleSheets
{
     public function sheets():  array
    {
        return
          [
            /*0 => new SubsurfaceImport(),
            4 => new RegionSubjectImport(),*/
            2 => new LicenseImport(),
            //3 => new DepositImport(),
         ];
    }
}; 
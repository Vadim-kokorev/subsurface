<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class LicenseAreaImport implements WithHeadingRow, ToModel/*, WithValidation*/
{
    public $deposit;
    public $area;
    public function model(array $row)
    {
        DB::table('license_area')->upsert([
            ['area' => trim($row['area'])],
        ], ['area']);
    }
}

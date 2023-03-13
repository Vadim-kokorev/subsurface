<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class DepositImport implements WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        DB::table('deposit')->insert([
            ['deposit' => trim($row['deposit']), 'development' => trim($row['development']), 'license_area' => trim($row['license_area']),],
        ]);
    }
}

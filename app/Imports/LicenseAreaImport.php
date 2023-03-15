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
        $this->deposit = DB::table('deposit')
            ->select('deposit', 'id_deposit')
            ->get();
        $this->area = DB::table('license_area')
            ->select('id_area', 'area')
            ->get();

        $deposit = $this->deposit->where('deposit', trim($row['deposit']))->first();

        $area = $this->area->where('short_name', trim($row['subject']))->first();
    }
}

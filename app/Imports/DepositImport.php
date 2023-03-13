<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
/*use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;*/
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class DepositImport implements WithHeadingRow, ToModel/*, WithValidation*/
{
    /*public function rules(): array
    {
        return [
            'deposit' => 
        ];
    }*/
    public function model(array $row)
    {
        DB::table('deposit')->insert([
            ['deposit' => trim($row['deposit']), 'development' => trim($row['development']), 'license_area' => trim($row['license_area']),],
        ]);
    }
}

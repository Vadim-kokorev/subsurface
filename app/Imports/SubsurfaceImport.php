<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class SubsurfaceImport implements WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        DB::table('subsurface_user')->insert([
            ['subsurface_user' => str_replace("СП ", "", trim($row['subsurface_user'])),
            'address' => trim($row['address']),
            'inn' => trim($row['inn']),
            'okpo' => trim($row['okpo']),
            'okato' => trim($row['okato']),
            'ogrn' => trim($row['ogrn']),
            'note' => trim($row['note']),
            'status' => trim($row['status']),
            'management' => trim($row['management'])],
        ]);
    }
}
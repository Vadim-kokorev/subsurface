<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class LicenseImport implements WithChunkReading, WithHeadingRow, ToModel/*, WithValidation*/
{
    public $user;
    public $area;
    public function model(array $row)
    {

        $area = DB::table('license_area')
            ->select('area', 'id_area')
            ->where('area', trim($row['area']))->first();
        var_dump($area);
        $user = DB::table('subsurface_user')
            ->select('subsurface_user', 'id_user')
            ->where('subsurface_user', trim($row['user']))->first();
        if ($area === NULL) {
            var_dump(trim($row['area'],));
        }

        DB::table('license')->insert([
            [
                'target' => trim($row['target']),
                'mineral' => trim($row['mineral']),
                'status' => trim($row['status']),
                'condition' => trim($row['condition']),
                'date_reg' => (trim($row['date_reg'])),
                'date_end' => (trim($row['date_end'])),
                'date_close' => (trim($row['date_close'])),
                'issuing' => trim($row['issuing']),
                'pre_license' => trim($row['pre_license']),
                'series' => trim($row['series']),
                'number' => trim($row['number']),
                'type' => trim($row['type']),
                'user_id' => $user->id_user,
                'area_id' => $area->id_area
            ],
        ]);
    }
    public function chunkSize(): int
    {
        return 500;
    }
}

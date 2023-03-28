<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class LicenseImport implements WithHeadingRow, ToModel/*, WithValidation*/
{
    public $user;
    public $area;
    public function model(array $row)
    {
        DB::table('license_area')->upsert([
            ['area' => trim($row['area'])],
        ], ['area']);

        $area = DB::table('license_area')
            ->select('area', 'id_area')
            ->where('area', trim($row['area']))->first();

        $user = DB::table('subsurface_user')
            ->select('subsurface_user', 'id_user')
            ->where('subsurface_user', trim($row['user']))->first();
        if ($user === NULL) {
            var_dump($user, trim($row['user'],));
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
}

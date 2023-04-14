<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class LicenseImport implements WithChunkReading, WithHeadingRow, ToModel
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
        /*var_dump(Date::excelTodateTimeObject($row['date_close'])
    ->format('d.m.Y'));*/
        /*DB::table('license')->insert([
            [
                'target' => trim($row['target']),
                'mineral' => trim($row['mineral']),
                'status' => trim($row['status']),
                'condition' => trim($row['condition']),
                'issuing' => trim($row['issuing']),
                'pre_license' => trim($row['pre_license']),
                'series' => trim($row['series']),
                'number' => trim($row['number']),
                'type' => trim($row['type']),
                'user_id' => $user->id_user,
                'area_id' => $area->id_area,
                'date_reg' => (Date::excelTodateTimeObject($row['date_reg'])->format('d/m/Y')),
                'date_end' => (Date::excelTodateTimeObject($row['date_end'])->format('d/m/Y')),
                'date_close' => (Date::excelTodateTimeObject($row['date_close'])->format('d/m/Y')),
            ],
        ]);*/
        $datereg = (Date::excelTodateTimeObject($row['date_reg'])->format('d.m.Y'));
        $dateend = (Date::excelTodateTimeObject($row['date_end'])->format('d.m.Y'));
        $dateclose = (Date::excelTodateTimeObject($row['date_close'])->format('d.m.Y'));
        $datestyle = 'dd.mm.yyyy';
        DB::table('license')->insert([
            [
                'target' => trim($row['target']),
                'mineral' => trim($row['mineral']),
                'status' => trim($row['status']),
                'condition' => trim($row['condition']),
                'issuing' => trim($row['issuing']),
                'pre_license' => trim($row['pre_license']),
                'series' => trim($row['series']),
                'number' => trim($row['number']),
                'type' => trim($row['type']),
                'user_id' => $user->id_user,
                'area_id' => $area->id_area,
                'date_reg' => DB::raw("to_date('{$datereg}','{$datestyle}')"),
                'date_end' => DB::raw("to_date('{$dateend}','{$datestyle}')"),
                'date_close' => DB::raw("to_date('{$dateclose}','{$datestyle}')"),
            ],
        ]);
    }
    public function chunkSize(): int
    {
        return 500;
    }
}

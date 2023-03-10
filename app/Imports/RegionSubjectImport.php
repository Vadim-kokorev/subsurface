<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class RegionSubjectImport implements WithHeadingRow, ToModel
{
    protected $region;
    public function model(array $row)
    {
        DB::table('region')->upsert([
            ['region' => trim($row['region'])],
        ], ['region']);

        $this->region = DB::table('region')
            ->select('region', 'id_region')
            ->get();

        $region = $this->region->where('region', trim($row['region']))->first();

        DB::table('subject')->insert([
            ['name' => trim($row['name']), 'short_name' => trim($row['short_name']), 'region_id' => $region->id_region]
        ]);
    }
}
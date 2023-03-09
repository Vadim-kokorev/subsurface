<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class RegionSubjectImport implements WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        DB::table('region')->upsert([
            ['region' => trim($row['region'])],
        ], ['region']);
        
       
        DB::table('subject')->insert([
        ['name' => trim($row['name']), 'short_name' => trim($row['short_name'])/*, 'region_id' => trim($row['region'])*/],
        ]);
    
    }
}
   /* public function model(array $row)
    {

        return new Region([
            'region' => trim($row['region']),
        ]);

        $region = Region::where('region', trim($row['region']))->first();

        if ($region && $region->id_region) {
            return new Subject([
                'name'    => $row["name"],
                'short_name' => $row["short_name"],
                'region_id' => $region->id_region,
            ]);
        }
    }
    public function uniqueBy()
    {
        return 'region';
    }
}*/
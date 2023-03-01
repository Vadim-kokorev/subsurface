<?php

namespace App\Imports;

use App\Models\Subject;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class NedraImport implements WithMultipleSheets, WithHeadingRow
{

    public function sheets(): array
    {
        return [
            /*0 => new FirstSheetImport(),
            1 => new SecondSheetImport(),
            2 => new ThirdSheetImport(),
            3 => new FourthSheetImport(),*/
            4 => new FifthSheetImport(),
        ];
    }
} 

   /* public function subject(array $row)
    {
        $region = Region::where('region', trim($row[2]))->first();
        
        if($region && $region->id_region) {
            return new Subject([
                'name'    => $row[0],
                'short_name' => $row[1],
                 'region_id' => $region->id_region,
           ]);
        }

    }   
}
class SecondSheetImport implements ToModel
{
    public function model(array $row)
    {

    }
}
class ThirdSheetImport implements ToModel
{
    public function model(array $row)
    {

    }
}
class FourthSheetImport implements ToModel
{
    public function model(array $row)
    {

    }
}
class FifthSheetImport implements ToModel
{
    public function model(array $row)
    {

    }
}*/
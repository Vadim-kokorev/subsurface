<?php
namespace App\Imports;
use App\Models\Subject;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
class FifthSheetImport implements ToModel, WithHeadingRow, WithUpserts
{

    public function model(array $row)
    {
            
        return new Region([
                'region' => $row['region'],]);
        }
    
        public function uniqueBy()
        {
            return 'region';
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
}*/
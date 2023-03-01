<?php
namespace App\Imports;
use App\Models\Subject;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
class RegionSubjectImport implements ToModel, WithHeadingRow, WithUpserts
{

    public function model(array $row)
    {
            
        return new Region([
                'region' => trim($row['region']),]);
    
       $region = Region::where('region', trim($row['region']))->first();
            
            if($region && $region->id_region) {
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
}
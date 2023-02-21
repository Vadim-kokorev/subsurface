<?php
namespace App\Imports;
use App\Models\Subject;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Imports\NedraImport;

class FifthSheetImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
            return new Region([
                'region'    => $row['region'],
           ]);
        }  
}
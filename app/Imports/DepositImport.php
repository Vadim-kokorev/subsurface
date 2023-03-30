<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;


class DepositImport implements WithHeadingRow, ToModel/*, WithValidation*/
{
    protected $deposit;
    public $subject;
    public $area;
  
    public function model(array $row)
    {
        $reg = trim($row['license_area']);
        $regex = "/(.*?) \((.*)/";
        $reg = preg_replace($regex, "$1", $reg);
        $strarea = array_values(array_unique(explode("\n", $reg)));
        for ($i = 0; $i < count($strarea); $i++){

        DB::table('license_area')->upsert([
            ['area' => $strarea[$i]],
        ], ['area']);
    }
        /*DB::table('deposit')->upsert(
            ['deposit' => Str::before($row['deposit'], "("), 'development' => trim($row['development'])],
            ['deposit']
        );
        $subject = DB::table('subject')
    ->select('short_name', 'id_subject')
    ->where('short_name',trim($row['subject']))->first();

        $deposit = $this->deposit = DB::table('deposit')
            ->select('deposit', 'id_deposit')
            ->where('deposit', Str::before($row['deposit'], "("))->first();
        $reg = trim($row['license_area']);
        $regex = "/(.*?) \((.*)/";
        $reg = preg_replace($regex, "$1", $reg);
        $strarea = array_values(array_unique(explode("\n", $reg)));
        var_dump($strarea);
        for ($i = 0; $i < count($strarea); $i++){
            $vararea = $this->area = DB::table('license_area')
            ->select('id_area', 'area')
            ->where('area', 'like', $strarea[$i].'%')->first();
        
            DB::table('deposit_area')->insert([
                ['area_id' => $vararea->id_area, 'deposit_id' => $deposit->id_deposit]
            ]);
        }
    
        DB::table('subject_deposit')->insert([
            ['deposit_id' => $deposit->id_deposit, 'subject_id' => $subject->id_subject]
        ]);*/
    }
}

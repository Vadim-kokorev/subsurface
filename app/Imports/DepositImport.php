<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class DepositImport implements WithHeadingRow, ToModel/*, WithValidation*/
{
    protected $deposit;
    public $subject;
    public $area;

    public function model(array $row)
    {
       /* DB::table('deposit')->upsert(
            ['deposit' => trim($row['deposit']), 'development' => trim($row['development'])],
            ['deposit']
        );
        $this->subject = DB::table('subject')
            ->select('short_name', 'id_subject')
            ->get();
            $subject = $this->subject->where('short_name', trim($row['subject']))->first();*/
        $this->deposit = DB::table('deposit')
            ->select('deposit', 'id_deposit')
            ->get();
        $this->area = DB::table('license_area')
            ->select('id_area', 'area')
            ->get();

        $deposit = $this->deposit->where('deposit', trim($row['deposit']))->first();

        $area = $this->area->where('area', trim($row['license_area']))->first();

        if ($area === NULL) {
            var_dump($area, trim($row['license_area']));
        }

        /*DB::table('subject_deposit')->upsert([
            ['deposit_id' => $deposit->id_deposit, 'subject_id' => $subject->id_subject]
        ], ['deposit_id', 'subject_id']);*/

        DB::table('deposit_area')->insert([
            ['area_id' => $area->id_area, 'deposit_id' => $deposit->id_deposut]
        ]);
    }
}

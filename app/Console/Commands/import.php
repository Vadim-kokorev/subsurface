<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NedraImport;
class import extends Command
{
    protected $signature = 'import';
    protected $description = 'Import data in DB';

    public function handle()
    {
        Excel::import(new NedraImport, 'C:\OSPanel\domains\example-app\app\users.xlsx');
    }
}

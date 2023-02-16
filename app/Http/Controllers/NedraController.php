<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Imports\NedraImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class NedraController extends Controller
{
   
    public function import_nedra(Request $request) 
    {
        Excel::import(new NedraImport, 'C:\OSPanel\domains\example-app\app\users.xlsx');
    }
    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }    
}
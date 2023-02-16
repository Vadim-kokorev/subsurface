<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NedraController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/nedra', [NedraController::class, 'import_nedra']);
Route::get('/import/nedra', [NedraController::class, 'import_nedra'])->name('import_nedra');
Route::post('/import/nedra', [NedraController::class, 'import_nedra'])->name('import_user.nedra');
Route::get('/', function () {
    return view('welcome');
});

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License_area extends Model
{
    use HasFactory;

    protected $table = 'license_area';

    protected $primaryKey = 'id_area';

    public $timestamps = false;

    protected $fillable = ['id_area', 'area'];
}

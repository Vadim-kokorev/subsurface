<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deposit_area extends Model
{
    use HasFactory;

    protected $table = 'deposit_area';

    protected $primaryKey = 'id_deposit_area';

    public $timestamps = false;

    protected $fillable = ['deposit_id', 'area_id'];
}

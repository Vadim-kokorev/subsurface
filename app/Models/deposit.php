<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    use HasFactory;

    protected $table = 'deposit';

    protected $primaryKey = 'deposit';

    public $timestamps = false;

    protected $fillable = ['deposit', 'development', 'lisense_area', 'subject_id'];
}

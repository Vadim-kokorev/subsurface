<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $table = 'license';

    protected $primaryKey = 'id_license';

    public $timestamps = false;

    protected $fillable = ['target', 'mineral', 'status', 'condition', 'date_reg', 'date_close', 'issuing', 'user_id', 'area_id', 'series', 'number', 'type', 'pre_license'];
}

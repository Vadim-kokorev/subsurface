<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsurface_user extends Model
{
    use HasFactory;

    protected $table = 'subsurface_user';

    protected $primaryKey = 'id_user';

    public $timestamps = false;

    protected $fillable = ['subsurface_user', 'adress', 'note', 'status', 'management', 'inn', 'okpo', 'okato', 'ogrn'];
}

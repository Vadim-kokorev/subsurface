<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject_deposit extends Model
{
    use HasFactory;

    protected $table = 'subject_deposit';

    protected $primaryKey = 'id_subject_deposit';

    public $timestamps = false;

    protected $fillable = ['subject_id', 'deposit_id'];
}

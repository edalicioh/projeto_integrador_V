<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'data',
        'presence',
        'period_id',
    ];
}

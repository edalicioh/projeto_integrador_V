<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'date',
        'grade',
        'periods_id',
    ];
}

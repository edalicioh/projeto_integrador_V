<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'period',
        'class_number',
        'begins_class',
        'end_classes',
        'class_cycle',
    ];
}

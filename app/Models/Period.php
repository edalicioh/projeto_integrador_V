<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'begins_class ',
        'end_classes ',
        'class_cycle ',
        'student_class_id ',
    ];
}

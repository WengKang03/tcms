<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table = "timetable_record";

    protected  $primaryKey = 'timetable_id';

    public $timestamps = true;

    protected $fillable = [
        'timetable_grade',
        'timetable_year',
        'timetable_image',
    ];
}

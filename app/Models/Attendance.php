<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance_record";

    protected  $primaryKey = 'attendance_id';

    public $timestamps = true;

}

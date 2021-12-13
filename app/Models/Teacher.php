<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher_record";

    protected  $primaryKey = 'teacher_id';

    public $timestamps = true;
}


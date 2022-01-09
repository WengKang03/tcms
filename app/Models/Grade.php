<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "grade_record";

    protected  $primaryKey = 'grade_id';

    public $timestamps = true;

}

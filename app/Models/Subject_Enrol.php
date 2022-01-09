<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_Enrol extends Model
{
    protected $table = "subject_enrol_record";

    protected  $primaryKey = 'enrol_id';

    public $timestamps = true;
}

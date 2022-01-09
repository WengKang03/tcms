<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subject_record";

    protected  $primaryKey = 'subject_id';

    public $timestamps = true;
}

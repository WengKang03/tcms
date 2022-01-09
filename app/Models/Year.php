<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = "year_record";

    protected  $primaryKey = 'year_id';

    public $timestamps = true;

}

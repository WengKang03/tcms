<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "material_record";

    protected  $primaryKey = 'material_id';

    public $timestamps = true;

    protected $fillable = [
        'material_grade',
        'material_year',
        'material_subject',
        'material_desc',
        'material_file',
    ];
}

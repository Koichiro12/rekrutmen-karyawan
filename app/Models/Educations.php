<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'educations';

    protected $fillable = [
        'user_id',
        'last_education',
        'school_name',
        'city',
        'major_education',
        'start_year',
        'end_year',
        'average_value',
        'created_at',
        'updated_at'
    ];
}

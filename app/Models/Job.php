<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'jobs';

    protected $fillable = [
        'job_name',
        'departement_id',
        'position_id',
        'max_age',
        'min_education',
        'major_education',
        'salary',
        'job_desc',
        'job_criteria',
        'status',
        'open_date',
        'close_date',
        'created_at',
        'updated_at'
    ];
}

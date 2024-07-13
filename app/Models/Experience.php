<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'experiences';

    protected $fillable = [
        'user_id',
        'last_job_departement',
        'company_name',
        'last_job_position',
        'start_job',
        'end_job',
        'salary',
        'intensive_pay',
        'last_job_facility',
        'reason_stop_working',
        'created_at',
        'updated_at'
    ];
}

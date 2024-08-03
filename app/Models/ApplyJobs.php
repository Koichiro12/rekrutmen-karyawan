<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJobs extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'apply_jobs';

    protected $fillable = [
        'user_id',
        'jobseeker_id',
        'job_id',
        'test_result',
        'test_status',
        'psikotes_result',
        'psikotes_status',
        'status_apply',
        'date_apply',
        'can_apply_job',
        'created_at',
        'updated_at'
    ];
}

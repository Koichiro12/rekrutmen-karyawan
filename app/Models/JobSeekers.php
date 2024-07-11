<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekers extends Model
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'job_seekers';

    protected $fillable = [
        'user_id',
        'jobseeker_image',
        'nik',
        'name',
        'date_birth',
        'place_birth',
        'gender',
        'address',
        'domisili',
        'phone_number',
        'email',
        'status_residence',
        'married_status',
        'citizen',
        'relegion',
        'npwp',
        'created_at',
        'updated_at'
    ];
}

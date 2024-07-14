<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikotes extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'psikotes';

    protected $fillable = [
        'jobs_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
        'created_at',
        'updated_at'
    ];
}

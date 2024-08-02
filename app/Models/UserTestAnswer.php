<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTestAnswer extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'user_test_answers';

    protected $fillable = [
        'apply_job_id',
        'test_id',
        'answer_test',
        'user_answer',
    ];
}

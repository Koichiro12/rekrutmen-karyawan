<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainings extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'trainings';

    protected $fillable = [
        'user_id',
        'training',
        'certification',
        'organizer',
        'year_of_training',
        'created_at',
        'updated_at'
    ];
}

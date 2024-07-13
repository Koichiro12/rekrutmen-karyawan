<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Appmodel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'skills';

    protected $fillable = [
        'user_id',
        'skills',
        'skill_level',
        'created_at',
        'updated_at'
    ];
}

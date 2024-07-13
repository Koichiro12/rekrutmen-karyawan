<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageSkills extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'language_skills';

    protected $fillable = [
        'user_id',
        'language_skil',
        'language_skil_level',
        'created_at',
        'updated_at'
    ];
}

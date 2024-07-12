<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'positions';

    protected $fillable = [
        'position',
        'created_at',
        'updated_at'
    ];
  
}

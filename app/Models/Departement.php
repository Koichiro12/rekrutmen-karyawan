<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends AppModel
{
    use HasFactory;
    protected static $_primaryKey = 'id';
    protected $table = 'departements';

    protected $fillable = [
        'departement',
        'created_at',
        'updated_at'
    ];


}

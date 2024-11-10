<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triage extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'prioridad',
        'tiempo',
        'hospital',
    ];
}

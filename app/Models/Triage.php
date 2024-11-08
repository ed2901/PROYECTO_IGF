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
        'hospital_id', // Asegúrate de incluir este campo
    ];

    /**
     * Relación "muchos a uno" con el modelo Hospital.
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}

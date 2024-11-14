<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteTriage extends Model
{
    public $table = 'pacientes_triage';
    use HasFactory;

    protected $fillable = [
        'paciente',
        'temperatura',
        'antecedentes',
        'frec_cardiaca',
        'observaciones',
        'glicemia',
        'glasgow',
        'triage',

    ];

    public function triageRel()
    {
        return $this->belongsTo(Triage::class, 'triage');
    }
}

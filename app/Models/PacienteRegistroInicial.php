<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteRegistroInicial extends Model
{
    public $table = 'pacientes_reg_inicial';
    use HasFactory;
    protected $fillable = [
        'nombre',
        'genero',
        'edad',
        'fecha',
        'sintomas',
        'registrante',
        'hospital',
        'estado',
        'codigo',


    ];

    //public function hospital()
    //{
    //    return $this->belongsTo(Hospital::class, 'hospital');
    //}
}

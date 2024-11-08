<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    // Especificar la tabla si el nombre no sigue la convención
    public $table = 'hospitales';

    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'descripcion',
        'logo',
    ];

    /**
     * Relación "uno a muchos" con el modelo Triage.
     * Un hospital puede tener muchos triages.
     */
    public function triages()
    {
        return $this->hasMany(Triage::class, 'hospital_id');
    }
}

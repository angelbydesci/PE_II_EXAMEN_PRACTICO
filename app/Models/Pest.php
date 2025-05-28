<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pest extends Model
{
    use HasFactory;

    protected $table = 'pest';

    protected $fillable = [
        'proyecto_id',
        'pregunta1',
        'pregunta2',
        'pregunta3',
        'pregunta4',
        'pregunta5',
        'pregunta6',
        'pregunta7',
        'pregunta8',
        'pregunta9',
        'pregunta10',
        'pregunta11',
        'pregunta12',
        'pregunta13',
        'pregunta14',
        'pregunta15',
        'pregunta16',
        'pregunta17',
        'pregunta18',
        'pregunta19',
        'pregunta20',
        'pregunta21',
        'pregunta22',
        'pregunta23',
        'pregunta24',
        'pregunta25',
        'sumatorio',
        'RFAmbientales', // Asegúrate que coincida con el nombre en el formulario si es diferente a la columna
        'RFPoliticos',   // Asegúrate que coincida con el nombre en el formulario
        'RFEconomicos',  // Asegúrate que coincida con el nombre en el formulario
        'RFTecnologicos', // Asegúrate que coincida con el nombre en el formulario
        'RFSocialesDemograficos' // Campo del formulario para reflexión, no directamente en la tabla pest como columna separada, revisar si se guarda en otro lado o se omite. Por ahora lo incluyo si se decide añadir una columna.
    ];

    /**
     * Get the proyecto that owns the pest analysis.
     */
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}

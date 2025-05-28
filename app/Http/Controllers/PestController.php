<?php

namespace App\Http\Controllers;

use App\Models\Pest;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Proyecto $proyecto)
    {
        $validator = Validator::make($request->all(), [
            'pregunta1' => 'required|integer|min:0|max:4',
            'pregunta2' => 'required|integer|min:0|max:4',
            'pregunta3' => 'required|integer|min:0|max:4',
            'pregunta4' => 'required|integer|min:0|max:4',
            'pregunta5' => 'required|integer|min:0|max:4',
            'pregunta6' => 'required|integer|min:0|max:4',
            'pregunta7' => 'required|integer|min:0|max:4',
            'pregunta8' => 'required|integer|min:0|max:4',
            'pregunta9' => 'required|integer|min:0|max:4',
            'pregunta10' => 'required|integer|min:0|max:4',
            'pregunta11' => 'required|integer|min:0|max:4',
            'pregunta12' => 'required|integer|min:0|max:4',
            'pregunta13' => 'required|integer|min:0|max:4',
            'pregunta14' => 'required|integer|min:0|max:4',
            'pregunta15' => 'required|integer|min:0|max:4',
            'pregunta16' => 'required|integer|min:0|max:4',
            'pregunta17' => 'required|integer|min:0|max:4',
            'pregunta18' => 'required|integer|min:0|max:4',
            'pregunta19' => 'required|integer|min:0|max:4',
            'pregunta20' => 'required|integer|min:0|max:4',
            'pregunta21' => 'required|integer|min:0|max:4',
            'pregunta22' => 'required|integer|min:0|max:4',
            'pregunta23' => 'required|integer|min:0|max:4',
            'pregunta24' => 'required|integer|min:0|max:4',
            'pregunta25' => 'required|integer|min:0|max:4',
            'RFSocialesDemograficos' => 'nullable|string',
            'RFAmbientales' => 'nullable|string', // Asumiendo que estos son los textareas de reflexión
            'RFPoliticos' => 'nullable|string',
            'RFEconomicos' => 'nullable|string',
            'RFTecnologicos' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('proyectos.showPest', $proyecto->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->only([
            'pregunta1', 'pregunta2', 'pregunta3', 'pregunta4', 'pregunta5',
            'pregunta6', 'pregunta7', 'pregunta8', 'pregunta9', 'pregunta10',
            'pregunta11', 'pregunta12', 'pregunta13', 'pregunta14', 'pregunta15',
            'pregunta16', 'pregunta17', 'pregunta18', 'pregunta19', 'pregunta20',
            'pregunta21', 'pregunta22', 'pregunta23', 'pregunta24', 'pregunta25',
            // Los campos de reflexión se manejarán según la definición de la tabla
            // Si no son columnas directas en 'pest', se deben guardar en otro lugar o ajustar el modelo/tabla
            'RFAmbientales', 'RFPoliticos', 'RFEconomicos', 'RFTecnologicos'
        ]);

        // Calcular sumatorio
        $sumatorio = 0;
        for ($i = 1; $i <= 25; $i++) {
            $sumatorio += (int)$request->input('pregunta'.$i);
        }
        $data['sumatorio'] = $sumatorio;

        // Añadir RFMedioA si existe en el formulario y tabla
        if ($request->has('RFMedioA')) {
            $data['RFMedioA'] = $request->input('RFMedioA');
        }


        Pest::updateOrCreate(
            ['proyecto_id' => $proyecto->id],
            $data
        );

        return redirect()->route('proyectos.showPest', $proyecto->id)->with('success', 'Análisis PEST guardado con éxito.');
    }
}

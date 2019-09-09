<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenalStoreResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha_asignacion' => 'required',
            'servidor_publico'  => 'required',
            'denunciante'  => 'required|string|max:30',
            'delito'  => 'required|string|max:50',
            'poligono' => 'required',
            'estado_procesal' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fecha_asignacion.required' => 'La :attribute es obligatoria.',
            'servidor_publico.required' => 'EL :attribute es obligatorio.',
            'denunciante.required' => 'El :attribute es obligatorio.',
            'denunciante.max' => 'El :attribute no debe contener mas de 30 caracteres',
            'delito' => 'El delito es obligatorio',
            'delito.max' => 'El delito no debe tener mas de 50 caracteres',
            'poligono.required' => 'El poligono es obligatorio',
            'estado_procesal.required' => 'El :attribute es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'fecha_asignacion' => 'fecha de asignación',
            'servidor_publico' => 'servidor publico',
            'denunciante' => 'denunciante',
            'estado_procesal' => 'estado procesal'
        ];
    }
}

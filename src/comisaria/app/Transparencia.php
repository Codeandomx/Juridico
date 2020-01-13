<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Observaciones;

class Transparencia extends Model
{
    protected $table = "tb_transparencia";
    protected $primaryKey = 'id';

    protected $fillable = [
        'Folio',
        'Expediente',
        'Solicitante',
        'Recepcion',
        'Informacion',
        'Derivado',
        'Canalizacion',
        'Respuesta',
        'Envio_UT',
        'Fecha',
        'idObservacion'
    ];

    protected $appends = ['nobservacion'];

    /**
     * Get the empleado.
     *
     * @return object
     */
    public function getNobservacionAttribute()
    {
        if($this->idObservacion != null){
            $observacion = Observaciones::where('id', $this->idObservacion)->first();

            return $observacion->nombre;
        } else {
            return '';
        }
    }

    public function scopeListado($query){
        return $query->select(
            'id',
            'Folio',
            'Expediente',
            'Solicitante',
            'Recepcion',
            'Informacion',
            'Derivado',
            'Canalizacion',
            'Respuesta',
            'Envio_UT',
            'Fecha',
            'idObservacion'
        )->where('activo', 1);
    }
}

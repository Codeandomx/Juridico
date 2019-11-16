<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armas extends Model
{
    protected $table = "tb_armas";
    protected $primaryKey = 'id';

    //protected $guarded = ['id'];
    protected $fillable = [
        'numero_servicio',
        'abogado_integrado',
        'estado',
        'numero_expediente',
        'poligono',
        'solicitante',
        'encargado',
        'fecha_registro',
        'motivo_investigacion',
        'ofendido',
        'fecha_resolucion',
        'sentido_resolucion',
        'estado_procesal'
    ];

    public function scopeListado($query){
        return $query->select(
            'id',
            'numero_servicio',
            'abogado_integrado',
            'estado',
            'numero_expediente',
            'poligono',
            'solicitante',
            'encargado',
            'fecha_registro',
            'motivo_investigacion',
            'ofendido',
            'fecha_resolucion',
            'sentido_resolucion',
            'estado_procesal'
        )->where('activo', 1);
    }
}

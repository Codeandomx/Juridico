<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenalSiniestro extends Model
{
    protected $table = "tb_penaljuridico";
    protected $primaryKey = 'id';

    protected $fillable = [
        //'id',
        'numero_consecutivo',
        'carpeta_investigacion',
        'fecha_asignacion',
        'agencia_mp',
        'servidor_publico',
        'denunciante',
        'delito',
        'poligono',
        'estado_procesal',
        'observaciones'
    ];
    //protected $guarded = ['id'];

    public function scopeListado($query){
        return $query->select(
            'id',
            'numero_consecutivo',
            'carpeta_investigacion',
            'fecha_asignacion',
            'agencia_mp',
            'servidor_publico',
            'denunciante',
            'delito',
            'poligono',
            'observaciones',
            'estado_procesal'
        )->where('activo', 1);
    }
}

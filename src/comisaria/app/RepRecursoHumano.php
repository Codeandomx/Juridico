<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepRecursoHumano extends Model
{
    protected $table = "tb_reprecursoshumanos";
    protected $primaryKey = 'id';

    protected $fillable = [
        'queja',
        'fecha_recepcion',
        'abogados',
        'estado_procesal',
        'asunto',
        'derecho_violado',
        'activo'
    ];

    public function scopeListado($query){
        return $query->select(
            'id',
            'queja',
            'fecha_recepcion',
            'abogados',
            'estado_procesal',
            'asunto',
            'derecho_violado'
        )->where('activo', 1);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgenciasVarias extends Model
{
    protected $table = "tb_agenciasvarias";
    protected $primaryKey = "id";

    protected $fillable = [
    	//id,
    	'carpetaAdministrativa',
    	'carpetaInvestigacion',
    	'averiguacionPrevia',
    	'expediente',
    	'fechaAsignacion',
    	'civil',
    	'policia',
    	'observaciones',
    	'activo'
    ];

    public function scopeListado($query){
    	return $query->select(
    		'id',
	    	'carpetaAdministrativa',
	    	'carpetaInvestigacion',
	    	'averiguacionPrevia',
	    	'expediente',
	    	'fechaAsignacion',
	    	'civil',
	    	'policia',
	    	'observaciones',
	    	'activo'
    	)->where('activo', 1);
    }
}

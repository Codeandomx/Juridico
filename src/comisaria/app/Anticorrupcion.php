<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anticorrupcion extends Model
{
    protected $table = "tb_anticorrupcion";
    protected $primaryKey = "id";

    protected $fillable = [
    	//id,
    	'carpetaAdministracion',
    	'carpetaInvestigacion',
    	'averiguacionPrevia',
    	'expediente',
    	'fechaAsignacion',
    	'civilPresunto',
    	'civil',
    	'policia',
    	'observaciones',
    	'activo'
    ];

    public function scopeListado($query){
    	return $query->select(
    		'id',
	    	'carpetaAdministracion',
	    	'carpetaInvestigacion',
	    	'expediente',
	    	'fechaAsignacion',
	    	'averiguacionPrevia',
	    	'civil',
	    	'policia',
	    	'observaciones',
            'activo'
    	)->where('activo', 1);
    }        
}

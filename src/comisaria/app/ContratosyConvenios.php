<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratosyConvenios extends Model
{
    protected $table = "tb_contratosyconvenios";
    protected $primaryKey = "id";

    protected $fillable = [
    	//id,
    	'ObjetoContrato',
    	'Contratante',
    	'Vigencia',
    	'FundamentoLegal',
    	'Recurso',
    	'ContraPrestacion',
    	'Decreto',
    	'FechaElaboracion',
    	'Tipo',
    	'Observacion'
    ];

    public function scopeListado($query){
    	return $query->select(
    		'id',
	    	'ObjetoContrato',
	    	'Contratante',
	    	'Vigencia',
	    	'FundamentoLegal',
	    	'Recurso',
	    	'ContraPrestacion',
	    	'Decreto',
	    	'FechaElaboracion',
	    	'Tipo',
	    	'Observacion'
    	)->where('Activo', 1);
    } 
}

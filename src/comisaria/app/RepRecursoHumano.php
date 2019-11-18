<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Empleados;
use App\EstadoProcesal;

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

    /**
	 * The accessors to append to the model's array form.
	 *
	 * @var array
	 */
    protected $appends = ['empleado', 'estado'];
    
    /**
	 * Get the empleado.
	 *
	 * @return object
	 */
	public function getEmpleadoAttribute()
	{
		if($this->abogados != null){
			$empleado = Empleados::where('user', $this->abogados)->first();

	    	return $empleado->nombreCompleto;
	    } else {
	    	return '';
	    }
    }
    
    /**
	 * Get the estado.
	 *
	 * @return object
	 */
	public function getEstadoAttribute()
	{
		if($this->estado_procesal != null){
			$estado = EstadoProcesal::where('id', $this->estado_procesal)->first();

	    	return $estado->nombre;
	    } else {
	    	return '';
	    }
    }
    
    public function scopeListado($query){
        return $query->select(
            'id',
            'queja',
            'fecha_recepcion',
            'empleado',
            'estado',
            'asunto',
            'derecho_violado'
        )->where('activo', 1);
    }
}

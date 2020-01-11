<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Empleados;
use App\ActivosPasivos;
use App\Suspensiones;
use App\Semaforo;
use App\Incidentes;
use App\EstadosAmparos;

class Amparos extends Model
{
    protected $table = "tb_amparos";
    protected $primaryKey = 'id';

/*
    protected $fillable = [
        'queja',
        'fecha_recepcion',
        'abogados',
        'estado_procesal',
        'asunto',
        'derecho_violado',
        'activo'
    ];
    */

    /**
	 * The accessors to append to the model's array form.
	 *
	 * @var array
	 */
    protected $appends = ['empleado', 'nsuspension', 'nactivo', 'nsemaforo', 'nincidente', 'nestado'];
    
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
	 * Get the nactivo.
	 *
	 * @return object
	 */
	public function getNsuspensionAttribute()
	{
		if($this->suspension != null){
			$suspension = Suspensiones::where('id', $this->suspension)->first();

	    	return $suspension->nombre;
	    } else {
	    	return '';
	    }
    }

    /**
	 * Get the nsemaforo.
	 *
	 * @return object
	 */
	public function getNsemaforoAttribute()
	{
		if($this->semaforo != null){
			$semaforo = Semaforo::where('id', $this->semaforo)->first();

	    	return $semaforo->nombre;
	    } else {
	    	return '';
	    }
    }

    /**
	 * Get the nincidente.
	 *
	 * @return object
	 */
	public function getNincidenteAttribute()
	{
		if($this->incidente_ejecucion != null){
			$incidente = Incidentes::where('id', $this->incidente_ejecucion)->first();

	    	return $incidente->nombre;
	    } else {
	    	return '';
	    }
    }

    /**
	 * Get the nestado.
	 *
	 * @return object
	 */
	public function getNestadoAttribute()
	{
		if($this->status != null){
			$status = EstadosAmparos::where('id', $this->status)->first();

	    	return $status->nombre;
	    } else {
	    	return '';
	    }
    }
    
    /*
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
    */
}
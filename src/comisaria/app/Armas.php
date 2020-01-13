<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Empleados;
use App\Estado;
use App\EstadoProcesal;

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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['empleado', 'nestado', 'nprocesal'];

    /**
     * Get the empleado.
     *
     * @return object
     */
    public function getEmpleadoAttribute()
    {
        if($this->abogado_integrado != null){
            $empleado = Empleados::where('user', $this->abogado_integrado)->first();

            return $empleado->nombreCompleto;
        } else {
            return '';
        }
    }

    /**
     * Get the empleado.
     *
     * @return object
     */
    public function getNestadoAttribute()
    {
        if($this->estado != null){
            $estado = Estado::where('id', $this->estado)->first();

            return $estado->estado;
        } else {
            return '';
        }
    }

    /**
     * Get the empleado.
     *
     * @return object
     */
    public function getNprocesalAttribute()
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

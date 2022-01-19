<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarea
 *
 * @property $id
 * @property $desc_tarea
 * @property $fecha_creacion
 * @property $fecha_expiracion
 * @property $estado_tarea
 * @property $id_usuario
 * @property $created_at
 * @property $updated_at
 *
 * @property EstadoTarea $estadoTarea
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tarea extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['desc_tarea','fecha_creacion','fecha_expiracion','estado_tarea','id_usuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoTarea()
    {
        return $this->hasOne('App\Models\EstadoTarea', 'id', 'estado_tarea');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }
    

}

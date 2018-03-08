<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuarios extends Model
{
    //
    use SoftDeletes;
    protected $table = 'usuarios';
    protected $primaryKey='id_usuario';
    protected $fillable=['id_usuario','nombre','ap_paterno','ap_materno','usuario','contrasena','crear','modificar','eliminar','ver','id_tipo','activo','Created_at','Updtated_at'];
    protected $date=['deleted_at'];
}

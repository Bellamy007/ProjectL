<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class poliza_egresos extends Model
{
    //
    use SoftDeletes;
    protected $table = 'poliza_egresos';
    protected $primaryKey='id_polizaE';
    protected $fillable = ['id_polizaE','codigo_agrupador','concepto','debe','haber','uuid','id_empresa','activo','Created_at','Updtated_at'];
    protected $date=['deleted_at'];

}

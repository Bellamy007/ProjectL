<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class poliza_ingresos extends Model
{
    //
    use SoftDeletes;
    protected $table = 'poliza_ingresos';
    protected $primaryKey='id_polizaI';
    protected $fillable = ['id_polizaI','codigo_agrupador','concepto','debe','haber','uuid','id_empresa','activo','Created_at','Updtated_at'];
    protected $date=['deleted_at'];

}

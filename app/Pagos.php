<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagos extends Model
{
    protected $table = 'pagos';
    protected $primaryKey='id_pago';
    protected $fillable = ['id_pago','fecha_limite','fecha_inicio','cantidad','id_usuario','id_contrato','estatus','fecha_final'];
    public $timestamps = false;

}
